<?php
/**
 * @package   admintools
 * @copyright Copyright (c)2010-2021 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

namespace Akeeba\AdminTools\Admin\View\QuickStart;

defined('_JEXEC') || die;

use Akeeba\AdminTools\Admin\Helper\ServerTechnology;
use Akeeba\AdminTools\Admin\Model\ConfigureWAF;
use Akeeba\AdminTools\Admin\Model\ControlPanel;
use Akeeba\AdminTools\Admin\Model\QuickStart;
use FOF40\View\DataView\Html as BaseView;
use Joomla\CMS\Crypt\Crypt;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

class Html extends BaseView
{
	/**
	 * The detected IP of the current visitor
	 *
	 * @var  string
	 */
	public $myIp = '';

	/**
	 * The configuration of WAF
	 *
	 * @var  array
	 */
	public $wafconfig = null;

	/**
	 * Is this the first run of the Quick Setup wizard, i.e. no existing configuration was detected?
	 *
	 * @var  bool
	 */
	public $isFirstRun = true;

	/**
	 * Username for the Password Protect Administrator Directory feature
	 *
	 * @var  string
	 */
	public $admin_username;

	/**
	 * Password for the Password Protect Administrator Directory feature
	 *
	 * @var  string
	 */
	public $admin_password;

	/** @var  bool   Does the server technology seem to support .htaccess files? */
	public $hasHtaccess = false;

	protected function onBeforeMain()
	{
		// Get the reported IP
		/** @var ControlPanel $cpanelModel */
		$cpanelModel = $this->container->factory->model('ControlPanel')->tmpInstance();
		$this->myIp  = $cpanelModel->getVisitorIP();

		// Get the WAF configuration
		/** @var ConfigureWAF $wafConfigModel */
		$wafConfigModel  = $this->getModel('ConfigureWAF');
		$this->wafconfig = $wafConfigModel->getConfig();

		// Create an admin password if necessary
		if (empty($this->wafconfig['adminpw']))
		{
			$this->wafconfig['adminpw'] = $this->genRandomPassword(1, 'abcdefghijklmnopqrstuvwxyz') . $this->genRandomPassword(7);
		}

		// Populate email addresses if necessary
		if (empty($this->wafconfig['emailonadminlogin']))
		{
			$this->wafconfig['emailonadminlogin'] = $this->container->platform->getUser()->email;
		}

		if (empty($this->wafconfig['emailbreaches']))
		{
			$this->wafconfig['emailbreaches'] = $this->container->platform->getUser()->email;
		}

		if (empty($this->wafconfig['allowed_domains']))
		{
			$this->wafconfig['allowed_domains'] = strtolower(Uri::getInstance()->getHost());
		}

		// Get the administrator username/password
		$this->admin_username = '';
		$this->admin_password = '';

		/** @var QuickStart $model */
		$model            = $this->getModel();
		$this->isFirstRun = $model->isFirstRun();

		$this->hasHtaccess = ServerTechnology::isHtaccessSupported();

		$this->addJavascriptFile('admin://components/com_admintools/media/js/QuickStart.min.js', $this->container->mediaVersion, 'text/javascript', true);

		Text::script('JNO', true);
		Text::script('JYES', true);
	}

	/**
	 * Generate a random password. Forked from Joomla to allow the use of a different salt (characters to use in the
	 * password).
	 *
	 * @param   integer  $length  Length of the password to generate
	 *
	 * @return  string  Random Password
	 */
	protected function genRandomPassword($length = 8, $salt = 'abcdefghijklmnopqrstuvwxyz0123456789')
	{
		$base     = strlen($salt);
		$makepass = '';

		/*
		 * Start with a cryptographic strength random string, then convert it to
		 * a string with the numeric base of the salt.
		 * Shift the base conversion on each character so the character
		 * distribution is even, and randomize the start shift so it's not
		 * predictable.
		 */
		$random = random_bytes($length + 1);
		$shift  = ord($random[0]);

		for ($i = 1; $i <= $length; ++$i)
		{
			$makepass .= $salt[($shift + ord($random[$i])) % $base];
			$shift    += ord($random[$i]);
		}

		return $makepass;
	}

}

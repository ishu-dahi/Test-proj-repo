<?php
/**
 * @package     CSVI
 * @subpackage  Rules
 *
 * @author      RolandD Cyber Produksi <contact@rolandd.com>
 * @copyright   Copyright (C) 2006 - 2021 RolandD Cyber Produksi. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @link        https://rolandd.com
 */

defined('_JEXEC') or die;

/**
 * Rules Controller.
 *
 * @package     CSVI
 * @subpackage  Rules
 * @since       6.0
 */
class CsviControllerRules extends JControllerAdmin
{
	/**
	 * The prefix to use with controller messages.
	 *
	 * @var    string
	 * @since  7.2.1
	 */
	protected $text_prefix = 'COM_CSVI_RULES';

	/**
	 * Proxy for getModel.
	 *
	 * @param   string $name   The model name. Optional.
	 * @param   string $prefix The class prefix. Optional.
	 * @param   array  $config The array of possible config values. Optional.
	 *
	 * @return  JModel
	 *
	 * @since   6.6.0
	 */
	public function getModel($name = 'Rule', $prefix = 'CsviModel', $config = array('ignore_request' => true))
	{
		return parent::getModel($name, $prefix, $config);
	}

	/**
	 * Duplicate one or more rules.
	 *
	 * @return  void.
	 *
	 * @since   6.6.0
	 */
	public function duplicate()
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$cid = array();
		$id  = $this->input->get('id', 0, 'int');

		if ($id)
		{
			$cid[0] = $id;
		}
		else
		{
			$cid = $this->input->get('cid', array(), 'array');
		}

		/** @var CsviModelRule $model */
		$model = $this->getModel();

		try
		{
			$model->createCopy($cid);

			$this->setRedirect('index.php?option=com_csvi&view=rules', JText::_('COM_CSVI_RULE_COPIED'));
		}
		catch (Exception $e)
		{
			$this->setRedirect('index.php?option=com_csvi&view=rule', $e->getMessage(), 'error');
		}
	}

	/**
	 * Check in of one or more records.
	 *
	 * @since   7.8.0
	 */
	public function checkin()
	{
		// Check for request forgeries.
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$ids = JFactory::getApplication()->input->post->get('cid', array(), 'array');

		/** @var CsviModelRule $model */
		$model  = $this->getModel();
		$return = $model->resetLocked($ids);

		if (!$return)
		{
			$message = JText::sprintf('JLIB_APPLICATION_ERROR_CHECKIN_FAILED', $model->getError());
		}
		else
		{
			$message = JText::plural($this->text_prefix . '_N_ITEMS_CHECKED_IN', count($ids));
		}

		$url = 'index.php?option=com_csvi&view=rules';
		$this->setRedirect($url, $message);
	}
}

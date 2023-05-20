<?php
/**
 * @package     Techjoomla.Plugin
 * @subpackage  Fields.Tjtextareajson
 *
 * @copyright   Copyright (C) 2009 - 2021 Techjoomla. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$value = $field->value;

if ($value == '')
{
	return;
}

echo JHtml::_('content.prepare', $value);

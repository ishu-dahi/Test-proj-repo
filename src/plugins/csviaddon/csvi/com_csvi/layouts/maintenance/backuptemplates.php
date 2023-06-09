<?php
/**
 * @package     CSVI
 * @subpackage  Maintenance
 *
 * @author      RolandD Cyber Produksi <contact@rolandd.com>
 * @copyright   Copyright (C) 2006 - 2021 RolandD Cyber Produksi. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @link        https://rolandd.com
 */

defined('_JEXEC') or die;

?>
<div class="control-group ">
	<label class="control-label" for="exportto">
		<?php echo JText::_('COM_CSVI_JFORM_EXPORTTO_LABEL'); ?>
	</label>
	<div class="controls">
		<select id="jform_exportto" name="form[exportto]" onchange="Csvi.showExportSource(this.value)">

			<option value="todownload"
			        selected="selected"><?php echo JText::_('COM_CSVI_EXPORT_TO_DOWNLOAD_LABEL'); ?></option>
			<option value="tofile"><?php echo JText::_('COM_CSVI_EXPORT_TO_LOCAL_LABEL'); ?></option>
		</select>
	</div>
</div>
<div class="control-group" id="localfield" style="display:none">
	<label for="template_name" class="control-label ">
		<?php echo JText::_('COM_CSVI_CHOOSE_BACKUP_LOCATION_LABEL'); ?>
	</label>
	<div class="controls">
		<input type="text" name="form[backup_location]" id="backup_location"
		       value="<?php echo JPATH_ROOT . '/tmp/com_csvi'; ?>" class="input-xxlarge"/>
		<span class="help-block"
		      style="display: none;"><?php echo JText::_('COM_CSVI_CHOOSE_BACKUP_LOCATION_DESC'); ?></span>
	</div>
</div>
<?php
// Load the list of templates
/** @var CsviModelTemplates $templateModel */
$templateModel = JModelLegacy::getInstance('Templates', 'CsviModel');

$templates = $templateModel->getTemplates();
?>
<div class="control-group">
	<label for="template_name" class="control-label ">
		<?php echo JText::_('COM_CSVI_BACKUPTEMPLATES_LABEL'); ?>
	</label>
	<div class="controls">
        <div class="checkboxList">
            <input
                type="checkbox"
                onclick="Joomla.checkAll(this)"
                checked="checked"
                title="<?php echo JText::_('COM_CSVI_CHECK_ALL_FIELDS'); ?>"
                value=""
                name="checkall-toggle"
                id="toggleAll"
            />
		    <label for="toggleAll"><?php echo JText::_('COM_CSVI_CHECK_ALL_FIELDS'); ?></label>
        </div>

		<span class="help-block" style="display: none;"><?php echo JText::_('COM_CSVI_BACKUPTEMPLATES_DESC'); ?></span>
	</div>
</div>
<div class="span12">
	<?php
	foreach ($templates as $key => $template)
	{
		if ($key > 0)
		{
			if (empty($template->value))
			{
				if ($key > 1)
				{
					?></div><?php
				}
				?>
				<div class="span5"><label><?php echo $template->text; ?></label>
			<?php
			}
			else
			{
                ?>
                <div class="checkboxList">

                    <input type="checkbox" checked="checked" name="form[templates][]" id="cb<?php echo $key; ?>"
                           value="<?php echo $template->value; ?>"/>
                    <label for="cb<?php echo $key; ?>"><?php echo $template->text; ?></label>
                </div>
                <?php
			}
		}
	}
	?>
</div>

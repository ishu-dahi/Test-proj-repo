<?php
/**
 * @package     CSVI
 * @subpackage  Plugin.Multireplace
 *
 * @author      RolandD Cyber Produksi <contact@rolandd.com>
 * @copyright   Copyright (C) 2006 - 2021 RolandD Cyber Produksi. All rights reserved.
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 * @link        https://rolandd.com
 */

defined('_JEXEC') or die;

/**
 * Make thing clear
 *
 * @var JForm   $form       The form instance for render the section
 * @var string  $basegroup  The base group name
 * @var string  $group      Current group name
 * @var array   $buttons    Array of the buttons that will be rendered
 */
extract($displayData);

?>

<tr class="subform-repeatable-group-1" data-base-name="<?php echo $basegroup; ?>" data-group="<?php echo $group; ?>">
	<?php foreach($form->getGroup('') as $field): ?>
	<td>
		<?php
			echo $field->renderField();
		?>
	</td>
	<?php endforeach; ?>
	<?php if (!empty($buttons)):?>
	<td>
		<div class="btn-group">
			<?php if (!empty($buttons['add'])):?><a class="group-add-1 btn btn-mini button btn-success"><span class="icon-plus"></span> </a><?php endif;?>
			<?php if (!empty($buttons['remove'])):?><a class="group-remove-1 btn btn-mini button btn-danger"><span class="icon-minus"></span> </a><?php endif;?>
			<?php if (!empty($buttons['move'])):?><a class="group-move-1 btn btn-mini button btn-primary"><span class="icon-move"></span> </a><?php endif;?>
		</div>
	</td>
	<?php endif; ?>
</tr>

<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
?>
<div class="registration<?php echo $this->pageclass_sfx?>">
	<h1>GuideManager Registration</h1>
	<?php if ($this->params->get('show_page_heading')) : ?>
		<div class="page-header">
			<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
		</div>
	<?php endif; ?>

	<form id="member-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=registration.register'); ?>" method="post" class="form-validate form-horizontal well" enctype="multipart/form-data">
		<?php // Iterate through the form fieldsets and display each one. ?>
		<?php foreach ($this->form->getFieldsets() as $fieldset): ?>
			<?php $fields = $this->form->getFieldset($fieldset->name);?>
			<?php if (count($fields)):?>
				<fieldset>
				<?php // If the fieldset has a label set, display it as the legend. ?>
				<?php if (isset($fieldset->label)): ?>
					<legend><?php echo JText::_($fieldset->label);?></legend>
				<?php endif;?>
				<?php // Iterate through the fields in the set and display them. ?>
				<?php foreach ($fields as $field) : ?>
					<?php // If the field is hidden, just display the input. ?>
					<?php if ($field->hidden): ?>
						<?php echo $field->input;?>
					<?php else:?>
						<div class="control-group">
							<div class="control-label">
							<?php echo $field->label; ?>
							<?php if (!$field->required && $field->type != 'Spacer') : ?>
								<span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL');?></span>
							<?php endif; ?>
							</div>
							<div class="controls">
								<?php echo $field->input;?>
							</div>
						</div>
					<?php endif;?>
				<?php endforeach;?>
				</fieldset>
			<?php endif;?>
		<?php endforeach;?>
		<fieldset>
			<legend>
				<?php echo JText::_('PLG_USER_MG_CATEGORY_LIST') ?>
			</legend>
				<div class="control-group">
					<div class="control-label">
						<label title="" class="required" data-original-title="Interest" data-content="<?php echo JText::_('PLG_USER_MG_INTEREST') ?>">
							<?php echo JText::_('PLG_USER_MG_INTEREST') ?><span class="star">*</span>
						</label>
					</div>
					<div class="controls">
									<select name="interest" class="required registration-list" id="interest" aria-required="true" required="required" value="0">
										<option value="0"><?php echo JText::_('PLG_USER_MG_DEFAULT') ?></option>
										<option value="24"><?php echo JText::_('PLG_USER_MG_GUIDE') ?></option>
										<option value="25"><?php echo JText::_('PLG_USER_MG_TA') ?></option>
										<option value="26"><?php echo JText::_('PLG_USER_MG_TR') ?></option>
										<option value="98"><?php echo JText::_('PLG_USER_MG_OS') ?></option>
										<option value="99"><?php echo JText::_('PLG_USER_MG_TRAVELER') ?></option>
									</select>
		</fieldset>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-primary validate"><?php echo JText::_('JREGISTER');?></button>
				<a class="btn" href="<?php echo JRoute::_('');?>" title="<?php echo JText::_('JCANCEL');?>"><?php echo JText::_('JCANCEL');?></a>
				<input type="hidden" name="option" value="com_users" />
				<input type="hidden" name="task" value="registration.register" />
			</div>
		</div>
		<?php echo JHtml::_('form.token');?>
	</form>
</div>

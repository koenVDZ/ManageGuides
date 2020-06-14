<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Jobs
* @copyright	ManageGuides.com
* @author		Koenraad Vandezande - www.manageguides.com - koen@rioguides.com
* @license		GNU
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access
defined('_JEXEC') or die('Restricted access');


if (!$this->form)
	return;

$fieldSets = $this->form->getFieldsets();
?>

<?php $fieldSet = $this->form->getFieldset('job.admjobform');?>
<fieldset class="fieldsform form-horizontal">

	<?php
	// File Number
	$field = $fieldSet['jform_file_number'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// File Name
	$field = $fieldSet['jform_file_name'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Status
	$field = $fieldSet['jform_status'];
	$field->jdomOptions = array(
		'list' => GuideadmHelperEnum::_('jobs_status')
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Company
	$field = $fieldSet['jform_company_id'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['company_id']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Client
	$field = $fieldSet['jform_client_id'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['client_id']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Client Reference
	$field = $fieldSet['jform_client_reference'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Req. Language
	$field = $fieldSet['jform_requested_language'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['requested_language']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Sec. Language
	$field = $fieldSet['jform_second_language_option'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['second_language_option']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Operator
	$field = $fieldSet['jform_operator_name'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['operator_name']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Main Guide
	$field = $fieldSet['jform_main_guide'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['main_guide']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Coordination
	$field = $fieldSet['jform_coordination'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Guide Status
	$field = $fieldSet['jform_guide_status'];
	$field->jdomOptions = array(
		'list' => GuideadmHelperEnum::_('jobs_guide_status')
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// TL
	$field = $fieldSet['jform_trip_leader'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['trip_leader']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Remuneration
	$field = $fieldSet['jform_remunerations'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['remunerations']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Prices
	$field = $fieldSet['jform_invoicing'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['invoicing']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// PAX
	$field = $fieldSet['jform_pax'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Start Date
	$field = $fieldSet['jform_start_date'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// End Date
	$field = $fieldSet['jform_end_date'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Total Debet
	$field = $fieldSet['jform_total_debet'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Total Credit
	$field = $fieldSet['jform_total_credit'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Creation date
	$field = $fieldSet['jform_creation_date'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Created By
	$field = $fieldSet['jform_created_by'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['created_by']
			);
	?>
		<?php if (!method_exists($field, 'canView') || $field->canView()): ?>
		<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
			<div class="control-label">
				<?php echo $field->label; ?>
			</div>

		    <div class="controls">
				<?php echo $field->input; ?>
			</div>
		</div>
		<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>
		<?php endif; ?>



	<?php
	// Modification date
	$field = $fieldSet['jform_modification_date'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Modified By
	$field = $fieldSet['jform_modified_by'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['modified_by']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Joomla User
	$field = $fieldSet['jform_my_joomla_user'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['my_joomla_user']
			);
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Viewlevel
	$field = $fieldSet['jform_my_joomla_access'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Ordering
	$field = $fieldSet['jform_ordering'];
	$field->jdomOptions = array(
		'items' => $this->lists['ordering'],
		'labelKey' => 'file_name'
			);
	?>
		<?php if (!method_exists($field, 'canView') || $field->canView()): ?>
		<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
			<div class="control-label">
				<?php echo $field->label; ?>
			</div>

		    <div class="controls">
				<?php echo $field->input; ?>
			</div>
		</div>
		<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>
		<?php endif; ?>



	<?php
	// Published
	$field = $fieldSet['jform_published'];
	?>
		<?php if (!method_exists($field, 'canView') || $field->canView()): ?>
		<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
			<div class="control-label">
				<?php echo $field->label; ?>
			</div>

		    <div class="controls">
				<?php echo $field->input; ?>
			</div>
		</div>
		<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>
		<?php endif; ?>

</fieldset>
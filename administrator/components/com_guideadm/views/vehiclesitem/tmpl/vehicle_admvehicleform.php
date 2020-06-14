<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Vehicles
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

<?php $fieldSet = $this->form->getFieldset('vehicle.admvehicleform');?>
<fieldset class="fieldsform form-horizontal">

	<?php
	// Category
	$field = $fieldSet['jform_catid'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['catid']
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
	// Name
	$field = $fieldSet['jform_user_id'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['user_id']
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
	// Vehicle Type
	$field = $fieldSet['jform_vehicle_type'];
	$field->jdomOptions = array(
		'list' => GuideadmHelperEnum::_('vehicles_vehicle_type')
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
	// Brand
	$field = $fieldSet['jform_brand_id'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['brand_id']
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
	// Model
	$field = $fieldSet['jform_model'];
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
	// Color
	$field = $fieldSet['jform_color'];
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
	// Number plate
	$field = $fieldSet['jform_number_plate'];
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
	// Year of build
	$field = $fieldSet['jform_year_of_build'];
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
	// Fuel
	$field = $fieldSet['jform_fuel'];
	$field->jdomOptions = array(
		'list' => GuideadmHelperEnum::_('vehicles_fuel')
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
	// Car Insurance
	$field = $fieldSet['jform_car_insurance'];
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
	// Insurance for third parties
	$field = $fieldSet['jform_insurance_for_third_parties'];
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
	// Remarks
	$field = $fieldSet['jform_remarks'];
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
	// Ordering
	$field = $fieldSet['jform_ordering'];
	$field->jdomOptions = array(
		'items' => $this->lists['ordering'],
		'labelKey' => 'vehicle_type'
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

</fieldset>
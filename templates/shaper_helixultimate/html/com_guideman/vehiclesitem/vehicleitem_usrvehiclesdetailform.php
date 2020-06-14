<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.0
* @package		GuideMan
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

<?php $fieldSet = $this->form->getFieldset('vehicleitem.usrvehiclesdetailform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['vehicleitem.usrvehiclesdetailform']->label);?></legend>

	<?php
	// User Name
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



	<?php
	// Vehicle Type
	$field = $fieldSet['jform_vehicle_type'];
	$field->jdomOptions = array(
		'list' => GuidemanHelperEnum::_('vehicles_vehicle_type')
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



	<?php
	// Make
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



	<?php
	// Fuel
	$field = $fieldSet['jform_fuel'];
	$field->jdomOptions = array(
		'list' => GuidemanHelperEnum::_('vehicles_fuel')
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

</fieldset>
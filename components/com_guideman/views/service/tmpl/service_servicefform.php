<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Services
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

<?php $fieldSet = $this->form->getFieldset('service.servicefform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['service.servicefform']->label);?></legend>

	<?php
	// Company
	$field = $fieldSet['jform_company'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['company']
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Service Name
	$field = $fieldSet['jform_service_name'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Private Tour
	$field = $fieldSet['jform_private_tour'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Entrance Fees
	$field = $fieldSet['jform_entrance_fees'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Duration
	$field = $fieldSet['jform_duration'];
	$field->jdomOptions = array(
		'list' => GuidemanHelperEnum::_('services_duration')
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Meals
	$field = $fieldSet['jform_meals'];
	$field->jdomOptions = array(
		'list' => GuidemanHelperEnum::_('services_meals')
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Description
	$field = $fieldSet['jform_description'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Country / State
	$field = $fieldSet['jform_state'];
	$field->jdomOptions = array(
		'ajaxVars' => array('values' => array(
			$this->item->state,
			$this->item->_state_country_id,
		))
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Kid Friendly
	$field = $fieldSet['jform_kid_friendly'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Kid Comment
	$field = $fieldSet['jform_kid_comment'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Disabled Friendly
	$field = $fieldSet['jform_disabled_friendly'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Disabled Comment
	$field = $fieldSet['jform_disabled_comment'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Activity Level
	$field = $fieldSet['jform_activity_level'];
	$field->jdomOptions = array(
		'list' => GuidemanHelperEnum::_('services_activity_level')
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Activity Comment
	$field = $fieldSet['jform_activity_comment'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Min. PAX
	$field = $fieldSet['jform_min_pax'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Max. PAX
	$field = $fieldSet['jform_max_pax'];
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	    <div class="controls">
			<?php echo $field->input; ?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Remunaration
	$field = $fieldSet['jform_remunaration'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['remunaration']
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Sales
	$field = $fieldSet['jform_costs'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['costs']
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Policy
	$field = $fieldSet['jform_policy'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['policy']
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Image 01
	$field = $fieldSet['jform_image_01'];
	$field->jdomOptions = array(
		'cid' => (isset($this->item->id)?$this->item->id:null)
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Image 02
	$field = $fieldSet['jform_image_02'];
	$field->jdomOptions = array(
		'cid' => (isset($this->item->id)?$this->item->id:null)
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Image 03
	$field = $fieldSet['jform_image_03'];
	$field->jdomOptions = array(
		'cid' => (isset($this->item->id)?$this->item->id:null)
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Image 04
	$field = $fieldSet['jform_image_04'];
	$field->jdomOptions = array(
		'cid' => (isset($this->item->id)?$this->item->id:null)
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Image 05
	$field = $fieldSet['jform_image_05'];
	$field->jdomOptions = array(
		'cid' => (isset($this->item->id)?$this->item->id:null)
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// State
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
		<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>
		<?php endif; ?>

</fieldset>
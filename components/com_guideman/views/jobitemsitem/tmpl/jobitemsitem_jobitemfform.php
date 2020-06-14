<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Job Items
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

<?php $fieldSet = $this->form->getFieldset('jobitemsitem.jobitemfform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['jobitemsitem.jobitemfform']->label);?></legend>

	<?php
	// File Number
	$field = $fieldSet['jform_job_id'];
	$field->jdomOptions = array(
		'groupBy' => array(
			'company_id' => '_company_id_name'
		),
		'list' => $this->lists['fk']['job_id']
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
	// Type
	$field = $fieldSet['jform_type'];
	$field->jdomOptions = array(
		'list' => GuidemanHelperEnum::_('jobitems_type')
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
	// Item Status
	$field = $fieldSet['jform_item_status'];
	$field->jdomOptions = array(
		'list' => GuidemanHelperEnum::_('jobitems_item_status')
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Start Time
	$field = $fieldSet['jform_start_time'];
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// End Time
	$field = $fieldSet['jform_end_time'];
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
	// Service name
	$field = $fieldSet['jform_service'];
	$field->jdomOptions = array(
		'ajaxVars' => array('values' => array(
			$this->item->service,
			$this->item->_service_company,
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
	// Service Provider
	$field = $fieldSet['jform_service_provider'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['service_provider']
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
	// Service Provider Status
	$field = $fieldSet['jform_service_provider_status'];
	$field->jdomOptions = array(
		'list' => GuidemanHelperEnum::_('jobitems_service_provider_status')
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
	// Guide
	$field = $fieldSet['jform_guide'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['guide']
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
	// Guide Status
	$field = $fieldSet['jform_guide_status'];
	$field->jdomOptions = array(
		'list' => GuidemanHelperEnum::_('jobitems_guide_status')
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
	// Optional sold by Guide
	$field = $fieldSet['jform_optional'];
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
	// Transport Company
	$field = $fieldSet['jform_transport'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['transport']
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
	// Transport Status
	$field = $fieldSet['jform_transport_status'];
	$field->jdomOptions = array(
		'list' => GuidemanHelperEnum::_('jobitems_transport_status')
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
	// Driver
	$field = $fieldSet['jform_driver'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['driver']
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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



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
		<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>
		<?php endif; ?>

</fieldset>
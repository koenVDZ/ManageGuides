<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Prices
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

<?php $fieldSet = $this->form->getFieldset('price.admpriceform');?>
<fieldset class="fieldsform form-horizontal">

	<?php
	// Grouper
	$field = $fieldSet['jform_grouper'];
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
	$field = $fieldSet['jform_name'];
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
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Currency
	$field = $fieldSet['jform_currency'];
	$field->jdomOptions = array(
		'list' => $this->lists['fk']['currency']
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
	// Hourly Rate
	$field = $fieldSet['jform_hourly_rate'];
	$field->jdomOptions = array(
		'list' => GuideadmHelperEnum::_('prices_hourly_rate')
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
	// Min Time
	$field = $fieldSet['jform_min_time'];
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
	// From Date
	$field = $fieldSet['jform_from_date'];
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
	// Until Date
	$field = $fieldSet['jform_until_date'];
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
	$field = $fieldSet['jform_remuneration'];
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
	// Remark
	$field = $fieldSet['jform_remark'];
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
	// PAX 01
	$field = $fieldSet['jform_pax_01'];
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
	// PAX 02
	$field = $fieldSet['jform_pax_02'];
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
	// PAX 03
	$field = $fieldSet['jform_pax_03'];
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
	// PAX 04
	$field = $fieldSet['jform_pax_04'];
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
	// PAX 05
	$field = $fieldSet['jform_pax_05'];
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
	// PAX 06
	$field = $fieldSet['jform_pax_06'];
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
	// PAX 07
	$field = $fieldSet['jform_pax_07'];
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
	// PAX 08
	$field = $fieldSet['jform_pax_08'];
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
	// PAX 09
	$field = $fieldSet['jform_pax_09'];
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
	// PAX 10
	$field = $fieldSet['jform_pax_10'];
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
	// PAX 11
	$field = $fieldSet['jform_pax_11'];
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
	// PAX 12
	$field = $fieldSet['jform_pax_12'];
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
	// PAX 13
	$field = $fieldSet['jform_pax_13'];
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
	// PAX 14
	$field = $fieldSet['jform_pax_14'];
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
	// PAX 15
	$field = $fieldSet['jform_pax_15'];
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
	// PAX 16
	$field = $fieldSet['jform_pax_16'];
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
	// PAX 17
	$field = $fieldSet['jform_pax_17'];
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
	// PAX 18
	$field = $fieldSet['jform_pax_18'];
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
	// PAX 19
	$field = $fieldSet['jform_pax_19'];
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
	// PAX 20
	$field = $fieldSet['jform_pax_20'];
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
	// PAX 21
	$field = $fieldSet['jform_pax_21'];
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
	// Coordination in %
	$field = $fieldSet['jform_coordination_in'];
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
	// Coordination Fee
	$field = $fieldSet['jform_coordination_fee'];
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
	// Optional %
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
	<?php echo(GuideadmHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Extra Hour Day
	$field = $fieldSet['jform_extra_hour_day'];
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
	// Extra Hour Night
	$field = $fieldSet['jform_extra_hour_night'];
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
	// Night Shift
	$field = $fieldSet['jform_night_shift'];
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
	// Ordering
	$field = $fieldSet['jform_ordering'];
	$field->jdomOptions = array(
		'items' => $this->lists['ordering'],
		'labelKey' => 'company'
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
	$field = $fieldSet['jform_access'];
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
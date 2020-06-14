<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.0
* @package		GuideMan
* @subpackage	Documents
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

<?php $fieldSet = $this->form->getFieldset('documentsitem.usrdocsdetailform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['documentsitem.usrdocsdetailform']->label);?></legend>

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
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>



	<?php
	// Document Type Name
	$field = $fieldSet['jform_label_id'];
	$field->jdomOptions = array(
		'ajaxVars' => array('values' => array(
			$this->item->label_id,
			$this->item->_label_id_country_id,
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
	// Number
	$field = $fieldSet['jform_number'];
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
	// Emission Date
	$field = $fieldSet['jform_emission_date'];
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
	// Expiration Date
	$field = $fieldSet['jform_expiration_date'];
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
	// Emission Organ
	$field = $fieldSet['jform_emmision'];
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
	// Recto
	$field = $fieldSet['jform_image'];
	$field->jdomOptions = array('attrs' => array('crop','fit'),'cid' => (isset($this->item->id)?$this->item->id:null),'uploadMaxSize' => GuidemanHelperFile::getUploadMaxSize(true));
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

	  <div class="controls">
			<?php echo GuidemanHelperPermutations::IcomoonMenu($field->input);?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>

	<?php
	// Verso
	$field = $fieldSet['jform_image2'];
	$field->jdomOptions = array('attrs' => array('crop','fit'),'cid' => (isset($this->item->id)?$this->item->id:null),'uploadMaxSize' => GuidemanHelperFile::getUploadMaxSize(true));
	?>
	<div class="control-group <?php echo 'field-' . $field->id . $field->responsive; ?>">
		<div class="control-label">
			<?php echo $field->label; ?>
		</div>

    <div class="controls">
			<?php echo GuidemanHelperPermutations::IcomoonPic($field->input);?>
		</div>
	</div>
	<?php echo(GuidemanHelperHtmlValidator::loadValidator($field)); ?>


</fieldset>

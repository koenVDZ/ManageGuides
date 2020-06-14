<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
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

<?php $fieldSet = $this->form->getFieldset('admjob.admjobform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['admjob.admjobform']->label);?></legend>

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_company_id']->jdomOptions = array(
			'list' => $this->lists['fk']['company_id']
		);
	$fieldSet['jform_status']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('jobs_status')
		);
	$fieldSet['jform_client_id']->jdomOptions = array(
			'list' => $this->lists['fk']['client_id']
		);
	$fieldSet['jform_operator_name']->jdomOptions = array(
			'list' => $this->lists['fk']['operator_name']
		);
	$fieldSet['jform_main_guide']->jdomOptions = array(
			'list' => $this->lists['fk']['main_guide']
		);
	$fieldSet['jform_guide_status']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('jobs_guide_status')
		);
	$fieldSet['jform_trip_leader']->jdomOptions = array(
			'list' => $this->lists['fk']['trip_leader']
		);
	$fieldSet['jform_remunerations']->jdomOptions = array(
			'list' => $this->lists['fk']['remunerations']
		);
	$fieldSet['jform_invoicing']->jdomOptions = array(
			'list' => $this->lists['fk']['invoicing']
		);
	$fieldSet['jform_requested_language']->jdomOptions = array(
			'list' => $this->lists['fk']['requested_language']
		);
	$fieldSet['jform_second_language_option']->jdomOptions = array(
			'list' => $this->lists['fk']['second_language_option']
		);
	$fieldSet['jform_created_by']->jdomOptions = array(
			'list' => $this->lists['fk']['created_by']
		);
	$fieldSet['jform_modified_by']->jdomOptions = array(
			'list' => $this->lists['fk']['modified_by']
		);
	$fieldSet['jform_my_joomla_user']->jdomOptions = array(
			'list' => $this->lists['fk']['my_joomla_user']
		);
	$fieldSet['jform_ordering']->jdomOptions = array(
			'items' => $this->lists['ordering'],
			'labelKey' => 'file_name'
		);
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
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

<?php $fieldSet = $this->form->getFieldset('jobitemsitem.admjobitem');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['jobitemsitem.admjobitem']->label);?></legend>

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_job_id']->jdomOptions = array(
			'list' => $this->lists['fk']['job_id']
		);
	$fieldSet['jform_type']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('jobitems_type')
		);
	$fieldSet['jform_service']->jdomOptions = array(
			'list' => $this->lists['fk']['service']
		);
	$fieldSet['jform_service_provider']->jdomOptions = array(
			'list' => $this->lists['fk']['service_provider']
		);
	$fieldSet['jform_service_provider_status']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('jobitems_service_provider_status')
		);
	$fieldSet['jform_guide']->jdomOptions = array(
			'list' => $this->lists['fk']['guide']
		);
	$fieldSet['jform_guide_status']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('jobitems_guide_status')
		);
	$fieldSet['jform_transport']->jdomOptions = array(
			'list' => $this->lists['fk']['transport']
		);
	$fieldSet['jform_transport_status']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('jobitems_transport_status')
		);
	$fieldSet['jform_driver']->jdomOptions = array(
			'list' => $this->lists['fk']['driver']
		);
	$fieldSet['jform_created_by']->jdomOptions = array(
			'list' => $this->lists['fk']['created_by']
		);
	$fieldSet['jform_modified_by']->jdomOptions = array(
			'list' => $this->lists['fk']['modified_by']
		);
	$fieldSet['jform_ordering']->jdomOptions = array(
			'items' => $this->lists['ordering'],
			'labelKey' => 'job_id'
		);
	$fieldSet['jform_my_joomla_user']->jdomOptions = array(
			'list' => $this->lists['fk']['my_joomla_user']
		);
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>
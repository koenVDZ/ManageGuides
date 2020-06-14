<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.2   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.6.0
* @package		GuideMan
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
	<legend><i class='fa fa-folder-open-o fa-border'></i><?php echo ' ' . JText::_($fieldSets['jobitemsitem.jobitemfform']->label);?></legend>

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_job_id']->jdomOptions = array(
			'groupBy' => array(
				'company_id' => '_company_id_name'
			),
			'list' => $this->lists['fk']['job_id']
		);
	$fieldSet['jform_type']->jdomOptions = array(
			'list' => $this->lists['select']['type']->list
		);
	$fieldSet['jform_item_status']->jdomOptions = array(
			'list' => $this->lists['select']['item_status']->list
		);
	$fieldSet['jform_service']->jdomOptions = array(
			'ajaxVars' => array('values' => array(
				$this->item->service,
				$this->item->_service_company,
			))
		);
	$fieldSet['jform_service_provider']->jdomOptions = array(
			'list' => $this->lists['fk']['service_provider']
		);
	$fieldSet['jform_service_provider_status']->jdomOptions = array(
			'list' => $this->lists['select']['service_provider_status']->list
		);
	$fieldSet['jform_guide']->jdomOptions = array(
			'list' => $this->lists['fk']['guide']
		);
	$fieldSet['jform_guide_status']->jdomOptions = array(
			'list' => $this->lists['select']['guide_status']->list
		);
	$fieldSet['jform_transport']->jdomOptions = array(
			'list' => $this->lists['fk']['transport']
		);
	$fieldSet['jform_transport_status']->jdomOptions = array(
			'list' => $this->lists['select']['transport_status']->list
		);
	$fieldSet['jform_driver']->jdomOptions = array(
			'list' => $this->lists['fk']['driver']
		);
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>

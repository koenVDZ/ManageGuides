<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.2   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.6.1
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

<?php $fieldSet = $this->form->getFieldset('hotel.hotelform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><i class='fa fa-bed fa-border'></i><?php echo ' ' . JText::_($fieldSets['hotel.hotelform']->label);?></legend>

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_type']->jdomOptions = array(
			'list' => $this->lists['select']['type']->list
		);
	$fieldSet['jform_job_id']->jdomOptions = array(
			'list' => $this->lists['fk']['job_id']
		);
	$fieldSet['jform_item_status']->jdomOptions = array(
			'list' => $this->lists['select']['item_status']->list
		);
	$fieldSet['jform_service_provider']->jdomOptions = array(
			'list' => $this->lists['fk']['service_provider']
		);
	$fieldSet['jform_service_provider_status']->jdomOptions = array(
			'list' => $this->lists['select']['service_provider_status']->list
		);
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>

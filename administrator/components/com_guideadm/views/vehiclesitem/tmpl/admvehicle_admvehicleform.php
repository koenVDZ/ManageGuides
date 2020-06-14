<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
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

<?php $fieldSet = $this->form->getFieldset('admvehicle.admvehicleform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['admvehicle.admvehicleform']->label);?></legend>

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_catid']->jdomOptions = array(
			'list' => $this->lists['fk']['catid']
		);
	$fieldSet['jform_user_id']->jdomOptions = array(
			'list' => $this->lists['fk']['user_id']
		);
	$fieldSet['jform_vehicle_type']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('vehicles_vehicle_type')
		);
	$fieldSet['jform_brand_id']->jdomOptions = array(
			'list' => $this->lists['fk']['brand_id']
		);
	$fieldSet['jform_fuel']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('vehicles_fuel')
		);
	$fieldSet['jform_created_by']->jdomOptions = array(
			'list' => $this->lists['fk']['created_by']
		);
	$fieldSet['jform_modified_by']->jdomOptions = array(
			'list' => $this->lists['fk']['modified_by']
		);
	$fieldSet['jform_ordering']->jdomOptions = array(
			'items' => $this->lists['ordering'],
			'labelKey' => 'vehicle_type'
		);
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>
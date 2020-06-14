<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
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
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_company']->jdomOptions = array(
			'list' => $this->lists['fk']['company']
		);
	$fieldSet['jform_duration']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('services_duration')
		);
	$fieldSet['jform_meals']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('services_meals')
		);
	$fieldSet['jform_state']->jdomOptions = array(
			'ajaxVars' => array('values' => array(
				$this->item->state,
				$this->item->_state_country_id,
			))
		);
	$fieldSet['jform_activity_level']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('services_activity_level')
		);
	$fieldSet['jform_remunaration']->jdomOptions = array(
			'list' => $this->lists['fk']['remunaration']
		);
	$fieldSet['jform_costs']->jdomOptions = array(
			'list' => $this->lists['fk']['costs']
		);
	$fieldSet['jform_policy']->jdomOptions = array(
			'list' => $this->lists['fk']['policy']
		);
	$fieldSet['jform_image_01']->jdomOptions = array(
			'cid' => (isset($this->item->id)?$this->item->id:null)
		);
	$fieldSet['jform_image_02']->jdomOptions = array(
			'cid' => (isset($this->item->id)?$this->item->id:null)
		);
	$fieldSet['jform_image_03']->jdomOptions = array(
			'cid' => (isset($this->item->id)?$this->item->id:null)
		);
	$fieldSet['jform_image_04']->jdomOptions = array(
			'cid' => (isset($this->item->id)?$this->item->id:null)
		);
	$fieldSet['jform_image_05']->jdomOptions = array(
			'cid' => (isset($this->item->id)?$this->item->id:null)
		);
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>
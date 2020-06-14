<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
* @subpackage	Contacts
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

<?php $fieldSet = $this->form->getFieldset('admcontact.admcontactform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['admcontact.admcontactform']->label);?></legend>

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_type']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('contacts_type')
		);
	$fieldSet['jform_image']->jdomOptions = array(
			'attrs' => array('center','crop','fit'),
			'cid' => (isset($this->item->id)?$this->item->id:null),
			'uploadMaxSize' => GuideadmHelperFile::getUploadMaxSize(true)
		);
	$fieldSet['jform_gender']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('contacts_gender')
		);
	$fieldSet['jform_driverguide']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('contacts_driverguide')
		);
	$fieldSet['jform_company_id']->jdomOptions = array(
			'list' => $this->lists['fk']['company_id']
		);
	$fieldSet['jform_business_type']->jdomOptions = array(
			'ajaxVars' => array('values' => array(
				$this->item->business_type,
				$this->item->_business_type_country_id,
			))
		);
	$fieldSet['jform_catid']->jdomOptions = array(
			'list' => $this->lists['fk']['catid']
		);
	$fieldSet['jform_nationality']->jdomOptions = array(
			'list' => $this->lists['fk']['nationality']
		);
	$fieldSet['jform_country_id']->jdomOptions = array(
			'list' => $this->lists['fk']['country_id']
		);
	$fieldSet['jform_state_id']->jdomOptions = array(
			'list' => $this->lists['fk']['state_id']
		);
	$fieldSet['jform_ordering']->jdomOptions = array(
			'items' => $this->lists['ordering'],
			'labelKey' => 'name'
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
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>
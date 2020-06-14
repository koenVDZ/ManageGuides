<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
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

<?php $fieldSet = $this->form->getFieldset('admdoc.admdocsdetailt');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['admdoc.admdocsdetailt']->label);?></legend>

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_user_id']->jdomOptions = array(
			'list' => $this->lists['fk']['user_id']
		);
	$fieldSet['jform_catid']->jdomOptions = array(
			'list' => $this->lists['fk']['catid']
		);
	$fieldSet['jform_label_id']->jdomOptions = array(
			'list' => $this->lists['fk']['label_id']
		);
	$fieldSet['jform_image']->jdomOptions = array(
			'attrs' => array('crop','fit'),
			'cid' => (isset($this->item->id)?$this->item->id:null),
			'uploadMaxSize' => GuideadmHelperFile::getUploadMaxSize(true)
		);
	$fieldSet['jform_image2']->jdomOptions = array(
			'attrs' => array('crop','fit'),
			'cid' => (isset($this->item->id)?$this->item->id:null)
		);
	$fieldSet['jform_created_by']->jdomOptions = array(
			'list' => $this->lists['fk']['created_by']
		);
	$fieldSet['jform_modified_by']->jdomOptions = array(
			'list' => $this->lists['fk']['modified_by']
		);
	$fieldSet['jform_ordering']->jdomOptions = array(
			'items' => $this->lists['ordering'],
			'labelKey' => 'user_id'
		);
	$fieldSet['jform_my_joomla_user']->jdomOptions = array(
			'list' => $this->lists['fk']['my_joomla_user']
		);
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>
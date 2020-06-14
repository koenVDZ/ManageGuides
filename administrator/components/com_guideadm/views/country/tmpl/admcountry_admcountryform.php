<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
* @subpackage	Countries
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

<?php $fieldSet = $this->form->getFieldset('admcountry.admcountryform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['admcountry.admcountryform']->label);?></legend>

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_continent']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('countries_continent')
		);
	$fieldSet['jform_flag']->jdomOptions = array(
			'cid' => (isset($this->item->id)?$this->item->id:null)
		);
	$fieldSet['jform_language']->jdomOptions = array(
			'list' => $this->lists['fk']['language']
		);
	$fieldSet['jform_ordering']->jdomOptions = array(
			'items' => $this->lists['ordering'],
			'labelKey' => 'country_name'
		);
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>
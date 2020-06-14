<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
* @subpackage	Operators
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

<?php $fieldSet = $this->form->getFieldset('admteloperator.admteloperatorform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['admteloperator.admteloperatorform']->label);?></legend>

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_type']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('operators_type')
		);
	$fieldSet['jform_country_id']->jdomOptions = array(
			'list' => $this->lists['fk']['country_id']
		);
	$fieldSet['jform_contact_id']->jdomOptions = array(
			'list' => $this->lists['fk']['contact_id']
		);
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>
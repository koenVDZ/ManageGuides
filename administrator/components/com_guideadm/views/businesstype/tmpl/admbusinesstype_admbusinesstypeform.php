<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
* @subpackage	BusinessTypes
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

<?php $fieldSet = $this->form->getFieldset('admbusinesstype.admbusinesstypeform');?>
<fieldset class="fieldsform form-horizontal">
	<legend><?php echo JText::_($fieldSets['admbusinesstype.admbusinesstypeform']->label);?></legend>

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_country_id']->jdomOptions = array(
			'groupBy' => array(
				'country_name' => 'country_name'
			),
			'list' => $this->lists['fk']['country_id']
		);
	$fieldSet['jform_language']->jdomOptions = array(
			'list' => $this->lists['fk']['language']
		);
	$fieldSet['jform_created_by']->jdomOptions = array(
			'list' => $this->lists['fk']['created_by']
		);
	$fieldSet['jform_modified_by']->jdomOptions = array(
			'list' => $this->lists['fk']['modified_by']
		);
	$fieldSet['jform_ordering']->jdomOptions = array(
			'items' => $this->lists['ordering'],
			'labelKey' => 'country_id'
		);
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>
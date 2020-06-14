<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
* @subpackage	Accounts
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

<?php $fieldSet = $this->form->getFieldset('admaccount.admaccountform');?>
<fieldset class="fieldsform form-horizontal">

	<?php
	// JForms dynamic initialization (Cook Self Service proposal)
	$fieldSet['jform_catid']->jdomOptions = array(
			'list' => $this->lists['fk']['catid']
		);
	$fieldSet['jform_user_id']->jdomOptions = array(
			'list' => $this->lists['fk']['user_id']
		);
	$fieldSet['jform_bank_id']->jdomOptions = array(
			'list' => $this->lists['fk']['bank_id']
		);
	$fieldSet['jform_account_type']->jdomOptions = array(
			'list' => GuideadmHelperEnum::_('accounts_account_type')
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
	echo $this->renderFieldset($fieldSet);
	?>
</fieldset>
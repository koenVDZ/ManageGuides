<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.1
* @package		GuideMan
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



?>

<fieldset class="fieldsfly fly-horizontal">
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_CONTACT_BANK_ACCOUNT') ?></legend>

	<div class="control-group field-_user_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_USER_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_bank_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_BANK_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_bank_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-account_type">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ACCOUNT_TYPE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.enum', array(
				'dataKey' => 'account_type',
				'dataObject' => $this->item,
				'labelKey' => 'text',
				'list' => GuidemanHelperEnum::_('accounts_account_type'),
				'listKey' => 'value'
			));?>
		</div>
    </div>
	<div class="control-group field-agency">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_AGENCY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'agency',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-account">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ACCOUNT" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'account',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-swift">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SWIFT" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'swift',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-iban">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_IBAN" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'iban',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
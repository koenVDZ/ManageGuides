<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Addresses
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_CONTACT_ADDRESS') ?></legend>

	<div class="control-group field-_user_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACT" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_alias">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ALIAS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_alias',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-default_address">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DEFAULT_ADDRESS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.bool', array(
				'dataKey' => 'default_address',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_address_label_type">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TYPE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_address_label_type',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_country_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_country_id_country_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_state_id_state">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_STATE_PROVINCE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_state_id_state',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-address">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ADDRESS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'address',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-suburb">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SUBURB" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'suburb',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-zipcode">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ZIPCODE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'zipcode',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-city">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CITY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'city',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
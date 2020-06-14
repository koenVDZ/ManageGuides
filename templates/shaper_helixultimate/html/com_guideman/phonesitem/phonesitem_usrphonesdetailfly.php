<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.0
* @package		GuideMan
* @subpackage	Phones
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_DETAILED_EXTENSION_INFORMATION') ?></legend>

	<div class="control-group field-_user_id_alias">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_USER_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_alias',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-default_phone">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DEFAULT_PHONE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.bool', array(
				'dataKey' => 'default_phone',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_label_type">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_LABEL" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_label_type',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_cdc_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_FLAG" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_cdc_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_cdc_calling_code">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRY_DIALING_CODE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_cdc_calling_code',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-number">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_NUMBER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'number',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_operator_operator">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_OPERATOR" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_operator_operator',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
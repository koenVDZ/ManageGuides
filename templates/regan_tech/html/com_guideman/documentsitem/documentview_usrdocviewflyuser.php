<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.0
* @package		GuideMan
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



?>

<fieldset class="fieldsfly fly-horizontal">
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_CONTACT_INFORMATION') ?></legend>

	<div class="control-group field-user_id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_USERID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'user_id',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_type">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TYPE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.bool', array(
				'dataKey' => '_user_id_type',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_catid">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CATID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => '_user_id_catid',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_catid_mgcat">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CATEGORY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_catid_mgcat',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_nationality_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_FLAG" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_nationality_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_surname">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_OFFICIAL_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_surname',
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
	<div class="control-group field-_user_id_image">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_IMAGE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'attrs' => array('crop','fit'),
				'dataKey' => '_user_id_image',
				'dataObject' => $this->item,
				'height' => 150,
				'indirect' => false,
				'root' => '[DIR_CONTACTS_IMAGE]',
				'width' => 'auto'
			));?>
		</div>
    </div>
</fieldset>
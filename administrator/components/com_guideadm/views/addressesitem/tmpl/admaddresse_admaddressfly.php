<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
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
	<legend><?php echo JText::_('GUIDEADM_FIELDSET_CONTACT_INFORMATION') ?></legend>

	<div class="control-group field-_user_id_image visible-desktop">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_IMAGE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'attrs' => array('center','crop','fit','format:jpeg'),
				'dataKey' => '_user_id_image',
				'dataObject' => $this->item,
				'height' => 40,
				'indirect' => false,
				'root' => '[DIR_CONTACTS_IMAGE]',
				'width' => 40
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_user_id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => '_user_id_user_id',
				'dataObject' => $this->item,
				'modalHeight' => 600,
				'modalWidth' => 500,
				'target' => 'modal'
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_surname visible-desktop">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_SURNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_surname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_alias visible-desktop">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_ALIAS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_alias',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
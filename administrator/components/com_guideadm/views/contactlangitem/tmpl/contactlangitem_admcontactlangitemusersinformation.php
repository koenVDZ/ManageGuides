<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	ContactLang
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

	<div class="control-group field-_user_id_image">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_IMAGE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'attrs' => array('crop','fit','format:png'),
				'dataKey' => '_user_id_image',
				'dataObject' => $this->item,
				'height' => 'auto',
				'indirect' => false,
				'root' => '[DIR_CONTACTS_IMAGE]',
				'width' => 150
			));?>
		</div>
    </div>
	<div class="control-group field-user_id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'user_id',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_nationality_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_ISO2" ); ?></label>
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
			<label><?php echo JText::_( "GUIDEADM_FIELD_NAME" ); ?></label>
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
			<label><?php echo JText::_( "GUIDEADM_FIELD_LONG_NAME" ); ?></label>
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
			<label><?php echo JText::_( "GUIDEADM_FIELD_USERNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_alias',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_company_id_nationality_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_ISO2" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_company_id_nationality_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_company_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_COMPANY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_company_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
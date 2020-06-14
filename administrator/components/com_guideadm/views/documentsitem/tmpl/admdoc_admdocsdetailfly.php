<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
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
	<legend><?php echo JText::_('GUIDEADM_FIELDSET_USER_INFORMATION') ?></legend>

	<div class="control-group field-_user_id_user_id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_USERID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => '_user_id_user_id',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_user_id_alias">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_USER_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_alias',
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
			<label><?php echo JText::_( "GUIDEADM_FIELD_FAMILY_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_user_id_surname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-image">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_RECTO" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'attrs' => array('crop','fit'),
				'dataKey' => 'image',
				'dataObject' => $this->item,
				'height' => 150,
				'indirect' => false,
				'root' => '[DIR_DOCUMENTS_IMAGE]',
				'width' => 'auto'
			));?>
		</div>
    </div>
	<div class="control-group field-image2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_VERSO" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'attrs' => array('crop','fit'),
				'dataKey' => 'image2',
				'dataObject' => $this->item,
				'height' => 150,
				'indirect' => false,
				'root' => '[DIR_DOCUMENTS_IMAGE2]',
				'width' => 'auto'
			));?>
		</div>
    </div>
</fieldset>
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	States
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

	<div class="control-group field-country_id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_COUNTRY_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'country_id',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_continent">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_CONTINENT" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.enum', array(
				'dataKey' => '_country_id_continent',
				'dataObject' => $this->item,
				'labelKey' => 'text',
				'list' => GuideadmHelperEnum::_('countries_continent'),
				'listKey' => 'value'
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_country_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_COUNTRY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_country_id_country_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_long_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_LONG_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_country_id_long_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_flag">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_FLAG" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'attrs' => array('crop','fit','format:png'),
				'dataKey' => '_country_id_flag',
				'dataObject' => $this->item,
				'height' => 'auto',
				'indirect' => false,
				'root' => '[DIR_COUNTRIES_FLAG]',
				'width' => 40
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_ISO_2" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_country_id_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_iso_3">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_ISO_3" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_country_id_iso_3',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_numeric_code">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_NUMERIC_CODE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_country_id_numeric_code',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_un_member">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_UN_MEMBER_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.bool', array(
				'dataKey' => '_country_id_un_member',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_calling_code">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_CALLING_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_country_id_calling_code',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
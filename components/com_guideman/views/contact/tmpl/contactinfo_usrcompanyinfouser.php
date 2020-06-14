<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Contacts
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_COMPANY_INFORMATION') ?></legend>

	<div class="control-group field-type">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_RECORD_TYPE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.bool', array(
				'dataKey' => 'type',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_catid_MGcat">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CATEGORY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_catid_MGcat',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-user_id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_USER_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'user_id',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-surname">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_OFFICIAL_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'surname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-alias">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ALIAS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'alias',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_company_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_MOTHER_COMPANY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_company_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-image">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_IMAGE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'attrs' => array('crop','fit'),
				'dataKey' => 'image',
				'dataObject' => $this->item,
				'height' => 150,
				'indirect' => false,
				'root' => '[DIR_CONTACTS_IMAGE]',
				'width' => 'auto'
			));?>
		</div>
    </div>
	<div class="control-group field-email">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_EMAIL" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'email',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-birthdate">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_FOUNDATION_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'birthdate',
				'dataObject' => $this->item,
				'dateFormat' => 'd-m-Y'
			));?>
		</div>
    </div>
	<div class="control-group field-_nationality_country_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_nationality_country_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_FLAG" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_country_id_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_id_country_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_AREA_OF_OPERATION_COUNTRY" ); ?></label>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_AREA_OF_OPERATION_STATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_state_id_state',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_nationality_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_FLAG" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_nationality_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_nationality_country_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_nationality_country_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_business_type_type_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_BUSINESS_TYPE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_business_type_type_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-con_position">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACT_POSITION" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'con_position',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-gender">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_GENDER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.enum', array(
				'dataKey' => 'gender',
				'dataObject' => $this->item,
				'labelKey' => 'text',
				'list' => GuidemanHelperEnum::_('contacts_gender'),
				'listKey' => 'value'
			));?>
		</div>
    </div>
	<div class="control-group field-driverguide">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DRIVERGUIDE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.bool', array(
				'dataKey' => 'driverguide',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-birthdate">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_BIRTHDATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'birthdate',
				'dataObject' => $this->item,
				'dateFormat' => 'd-m-Y'
			));?>
		</div>
    </div>
</fieldset>
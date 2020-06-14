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

<fieldset class="fieldsfly fly-horizontal mg_fly">

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
	<div class="control-group field-image">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_IMAGE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'attrs' => array('crop','fit','format:jpeg'),
				'dataKey' => 'image',
				'dataObject' => $this->item,
				'height' => 150,
				'indirect' => false,
				'root' => '[DIR_CONTACTS_IMAGE]',
				'width' => 'auto'
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
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'id',
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
	<div class="control-group field-_country_id_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRYID_ISO_2" ); ?></label>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRYID_COUNTRY_NAME" ); ?></label>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_STATEID_STATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_state_id_state',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_catid_MGcat">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CATEGORY_ID_MGCATEGORY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_catid_MGcat',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_company_id_image">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COMPANY_ID_IMAGE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'attrs' => array('format:png'),
				'dataKey' => '_company_id_image',
				'dataObject' => $this->item,
				'height' => 'auto',
				'indirect' => false,
				'root' => '[DIR_CONTACTS_IMAGE]',
				'width' => 'auto'
			));?>
		</div>
    </div>
	<div class="control-group field-_company_id_nationality_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_NATIONALITY_ISO_2" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_company_id_nationality_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-catid">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CATEGORY_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'catid',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-company_id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COMPANY_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'company_id',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_company_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COMPANY_ID_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_company_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_company_id_surname">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COMPANY_ID_SURNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_company_id_surname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_company_id_alias">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COMPANY_ID_ALIAS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_company_id_alias',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_company_id_email">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COMPANY_ID_EMAIL" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_company_id_email',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_company_id_country_id_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRYID_ISO_2" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_company_id_country_id_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_company_id_country_id_country_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRYID_COUNTRY_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_company_id_country_id_country_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_company_id_state_id_state">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_STATEID_STATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_company_id_state_id_state',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-catid">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CATEGORY_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'catid',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
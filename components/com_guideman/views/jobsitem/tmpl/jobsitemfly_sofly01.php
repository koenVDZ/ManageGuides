<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Jobs
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_SERVICE_ORDER') ?></legend>

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
	<div class="control-group field-file_number">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_FILE_NUMBER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'file_number',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-file_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_FILE_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'file_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-status">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_STATUS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.enum', array(
				'dataKey' => 'status',
				'dataObject' => $this->item,
				'labelKey' => 'text',
				'list' => GuidemanHelperEnum::_('jobs_status'),
				'listKey' => 'value'
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
	<div class="control-group field-_client_id_nationality_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_NATIONALITY_ISO_2" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_client_id_nationality_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-client_id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CLIENT_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'client_id',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_client_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CLIENT_ID_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_client_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_requested_language_flag">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_REQUESTED_LANGUAGE_FLAG" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_requested_language_flag',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_requested_language_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_REQUESTED_LANGUAGE_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_requested_language_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_second_language_option_flag">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SECOND_LANGUAGE_OPTION_FLAG" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_second_language_option_flag',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_second_language_option_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SECOND_LANGUAGE_OPTION_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_second_language_option_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_operator_name_nationality_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_NATIONALITY_ISO_2" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_operator_name_nationality_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-operator_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_OPERATOR_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'operator_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_operator_name_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_OPERATOR_NAME_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_operator_name_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_operator_name_surname">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_OPERATOR_NAME_SURNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_operator_name_surname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_operator_name_alias">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_OPERATOR_NAME_ALIAS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_operator_name_alias',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-guide_status">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_GUIDE_STATUS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.enum', array(
				'dataKey' => 'guide_status',
				'dataObject' => $this->item,
				'labelKey' => 'text',
				'list' => GuidemanHelperEnum::_('jobs_guide_status'),
				'listKey' => 'value'
			));?>
		</div>
    </div>
	<div class="control-group field-_main_guide_nationality_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_NATIONALITY_ISO_2" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_main_guide_nationality_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-main_guide">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_MAIN_GUIDE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'main_guide',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_main_guide_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_MAIN_GUIDE_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_main_guide_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_main_guide_surname">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_MAIN_GUIDE_SURNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_main_guide_surname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_main_guide_alias">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_MAIN_GUIDE_ALIAS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_main_guide_alias',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_trip_leader_nationality_iso_2">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_NATIONALITY_ISO_2" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_trip_leader_nationality_iso_2',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-trip_leader">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TRIP_LEADER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'trip_leader',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_trip_leader_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TRIP_LEADER_NAME_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_trip_leader_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_trip_leader_surname">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TRIP_LEADER_SURNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_trip_leader_surname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_trip_leader_alias">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TRIP_LEADER_ALIAS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_trip_leader_alias',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-pax">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_PAX" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'pax',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-start_date">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_START_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'start_date',
				'dataObject' => $this->item,
				'dateFormat' => 'd-m-Y'
			));?>
		</div>
    </div>
	<div class="control-group field-end_date">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_END_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'end_date',
				'dataObject' => $this->item,
				'dateFormat' => 'd-m-Y'
			));?>
		</div>
    </div>
</fieldset>
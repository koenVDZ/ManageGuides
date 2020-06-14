<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.2   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.6.0
* @package		GuideMan
* @subpackage	Job Items
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_SERVICE_ORDER_DETAILS') ?></legend>

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
	<div class="control-group field-_job_id_file_number">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ID_FILE_NUMBER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_job_id_file_number',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-type">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TYPE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.enum', array(
				'dataKey' => 'type',
				'dataObject' => $this->item,
				'labelKey' => 'text',
				'list' => GuidemanHelper::enumList('jobitems', 'type'),
				'listKey' => 'value'
			));?>
		</div>
    </div>
	<div class="control-group field-item_status">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ITEM_STATUS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.enum', array(
				'dataKey' => 'item_status',
				'dataObject' => $this->item,
				'labelKey' => 'text',
				'list' => GuidemanHelper::enumList('jobitems', 'item_status'),
				'listKey' => 'value'
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
	<div class="control-group field-start_time">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_START_TIME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'start_time',
				'dataObject' => $this->item,
				'dateFormat' => 'H:i'
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
	<div class="control-group field-end_time">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_END_TIME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'end_time',
				'dataObject' => $this->item,
				'dateFormat' => 'H:i'
			));?>
		</div>
    </div>
	<div class="control-group field-_service_service_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SERVICE_SERVICE_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_service_service_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_service_provider_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SERVICE_PROVIDER_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_service_provider_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_guide_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_GUIDE_NAME_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_guide_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_guide_surname">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_GUIDE_SURNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_guide_surname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_guide_alias">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_GUIDE_ALIAS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_guide_alias',
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
				'list' => GuidemanHelper::enumList('jobitems', 'guide_status'),
				'listKey' => 'value'
			));?>
		</div>
    </div>
	<div class="control-group field-_transport_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TRANSPORT_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_transport_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-transport_status">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TRANSPORT_STATUS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.enum', array(
				'dataKey' => 'transport_status',
				'dataObject' => $this->item,
				'labelKey' => 'text',
				'list' => GuidemanHelper::enumList('jobitems', 'transport_status'),
				'listKey' => 'value'
			));?>
		</div>
    </div>
	<div class="control-group field-_driver_type">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DRIVER_RECORD_TYPE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.enum', array(
				'dataKey' => '_driver_type',
				'dataObject' => $this->item,
				'labelKey' => 'text',
				'list' => GuidemanHelper::enumList('contacts', 'type'),
				'listKey' => 'value'
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
	<div class="control-group field-total_debet">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TOTAL_DEBET" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'total_debet',
				'dataObject' => $this->item,
				'decimals' => 2
			));?>
		</div>
    </div>
	<div class="control-group field-total_credit">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TOTAL_CREDIT" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'total_credit',
				'dataObject' => $this->item,
				'decimals' => 2
			));?>
		</div>
    </div>
	<div class="control-group field-remark">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_REMARK" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'remark',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
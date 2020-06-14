<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_SERVICE_ORDER') ?></legend>

	<div class="control-group field-_job_id_status">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SERVICE_ORDER_STATUS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.enum', array(
				'dataKey' => '_job_id_status',
				'dataObject' => $this->item,
				'labelKey' => 'text',
				'list' => GuidemanHelperEnum::_('jobs_status'),
				'listKey' => 'value'
			));?>
		</div>
    </div>
	<div class="control-group field-_job_id_file_number">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_FILE_NUMBER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_job_id_file_number',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_job_id_file_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_FILE_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_job_id_file_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_job_id_pax">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_PAX" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => '_job_id_pax',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_job_id_start_date">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_START_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => '_job_id_start_date',
				'dataObject' => $this->item,
				'dateFormat' => 'D d M Y'
			));?>
		</div>
    </div>
	<div class="control-group field-_job_id_end_date">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_END_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => '_job_id_end_date',
				'dataObject' => $this->item,
				'dateFormat' => 'D d M Y'
			));?>
		</div>
    </div>
	<div class="control-group field-_job_id_client_id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CLIENT_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => '_job_id_client_id',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_job_id_client_id_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CLIENT_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_job_id_client_id_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_job_id_client_id_surname">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CLIENT_ID_SURNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_job_id_client_id_surname',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_job_id_client_id_alias">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CLIENT_ALIAS_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_job_id_client_id_alias',
				'dataObject' => $this->item
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
				'list' => GuidemanHelperEnum::_('jobitems_item_status'),
				'listKey' => 'value'
			));?>
		</div>
    </div>
</fieldset>
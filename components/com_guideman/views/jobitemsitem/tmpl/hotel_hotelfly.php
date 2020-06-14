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
</fieldset>
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Servicos
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

	<div class="control-group field-internal_service_id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_INTERNAL_SERVICE_ID_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'internal_service_id',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-service_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SERVICE_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'service_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-private_tour">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_PRIVATE_TOUR_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'private_tour',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-entrance_fees">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ENTRANCE_FEES_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'entrance_fees',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-duration">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DURATION" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'duration',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-company">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COMPANY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'company',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-meals">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_MEALS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'meals',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-description">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DESCRIPTION" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'description',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_country_country_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRY_COUNTRY_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_country_country_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_state_state">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_STATE_STATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_state_state',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-kid_friendly">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_KID_FRIENDLY_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'kid_friendly',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-kid_comment">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_KID_COMMENT_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'kid_comment',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-disabled_friendly">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DISABLED_FRIENDLY_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'disabled_friendly',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-disabled_comment">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DISABLED_COMMENT_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'disabled_comment',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-activity_level">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ACTIVITY_LEVEL_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'activity_level',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-activity_comment">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ACTIVITY_COMMENT_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'activity_comment',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-min_pax">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_MIN_PAX_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'min_pax',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-max_pax">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_MAX_PAX_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'max_pax',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-visits">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_VISITS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'visits',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-remunaration">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_REMUNARATION" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'remunaration',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-costs">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COSTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'costs',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_policy_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_POLICY_NAME_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_policy_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-image_01">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_IMAGE_01" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'image_01',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-image_02">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_IMAGE_02" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'image_02',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-image_03">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_IMAGE_03" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'image_03',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-image_04">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_IMAGE_04" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'image_04',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-image_05">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_IMAGE_05" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'image_05',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-created_by">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CREATED_BY_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'created_by',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-creation_date">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CREATION_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'creation_date',
				'dataObject' => $this->item,
				'dateFormat' => 'Y-m-d H:i'
			));?>
		</div>
    </div>
	<div class="control-group field-modified_by">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_MODIFIED_BY_1" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'modified_by',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-modification_date">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_MODIFICATION_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'modification_date',
				'dataObject' => $this->item,
				'dateFormat' => 'Y-m-d H:i'
			));?>
		</div>
    </div>
	<div class="control-group field-hits">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_HITS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'hits',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-ordering">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ORDERING" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'ordering',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-published">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_PUBLISHED" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.publish', array(
				'dataKey' => 'published',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
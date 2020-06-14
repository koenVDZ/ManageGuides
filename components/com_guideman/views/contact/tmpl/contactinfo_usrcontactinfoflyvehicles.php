<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.0
* @package		GuideMan
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_VEHICLES') ?></legend>

	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_VEHICLES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->vehicles))
			foreach($this->item->vehicles as $rel):?>
			<div class="badge">
				<?php echo($rel->vehicle_type); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_BRANDS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->brands))
			foreach($this->item->brands as $rel):?>
			<div class="badge">
				<?php echo($rel->name); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_VEHICLES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->vehicles))
			foreach($this->item->vehicles as $rel):?>
			<div class="badge">
				<?php echo($rel->model); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_VEHICLES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->vehicles))
			foreach($this->item->vehicles as $rel):?>
			<?php echo JDom::_('html.fly.color', array(
				'dataObject' => $rel,
				'dataKey' => 'color'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_VEHICLES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->vehicles))
			foreach($this->item->vehicles as $rel):?>
			<div class="badge">
				<?php echo($rel->pax); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_VEHICLES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->vehicles))
			foreach($this->item->vehicles as $rel):?>
			<div class="badge">
				<?php echo($rel->number_plate); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_VEHICLES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->vehicles))
			foreach($this->item->vehicles as $rel):?>
			<?php echo JDom::_('html.fly.datetime', array(
				'dataObject' => $rel,
				'dataKey' => 'year_of_build',
				'dateFormat' => 'd-m-Y'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_VEHICLES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->vehicles))
			foreach($this->item->vehicles as $rel):?>
			<div class="badge">
				<?php echo($rel->fuel); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_VEHICLES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->vehicles))
			foreach($this->item->vehicles as $rel):?>
			<?php echo JDom::_('html.fly.bool', array(
				'dataObject' => $rel,
				'dataKey' => 'car_insurance'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_VEHICLES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->vehicles))
			foreach($this->item->vehicles as $rel):?>
			<?php echo JDom::_('html.fly.bool', array(
				'dataObject' => $rel,
				'dataKey' => 'insurance_for_third_parties'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
</fieldset>
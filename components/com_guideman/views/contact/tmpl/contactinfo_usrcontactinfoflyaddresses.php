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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_ADRESSES') ?></legend>

	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ADDRESSES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->addresses))
			foreach($this->item->addresses as $rel):?>
			<?php echo JDom::_('html.fly.bool', array(
				'dataObject' => $rel,
				'dataKey' => 'default_address'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ADDRESS_LABELS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->addresslabels))
			foreach($this->item->addresslabels as $rel):?>
			<div class="badge">
				<?php echo($rel->type); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ADDRESSES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->addresses))
			foreach($this->item->addresses as $rel):?>
			<div class="badge">
				<?php echo($rel->address); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ADDRESSES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->addresses))
			foreach($this->item->addresses as $rel):?>
			<div class="badge">
				<?php echo($rel->suburb); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ADDRESSES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->addresses))
			foreach($this->item->addresses as $rel):?>
			<div class="badge">
				<?php echo($rel->zipcode); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ADDRESSES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->addresses))
			foreach($this->item->addresses as $rel):?>
			<div class="badge">
				<?php echo($rel->city); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRIES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->countries))
			foreach($this->item->countries as $rel):?>
			<div class="badge">
				<?php echo($rel->iso_2); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRIES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->countries))
			foreach($this->item->countries as $rel):?>
			<div class="badge">
				<?php echo($rel->country_name); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_STATES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->states))
			foreach($this->item->states as $rel):?>
			<div class="badge">
				<?php echo($rel->state); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
</fieldset>
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_PHONES') ?></legend>

	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_PHONES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->phones))
			foreach($this->item->phones as $rel):?>
			<?php echo JDom::_('html.fly.bool', array(
				'dataObject' => $rel,
				'dataKey' => 'default_phone'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_PHONE_LABELS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->phonelabels))
			foreach($this->item->phonelabels as $rel):?>
			<div class="badge">
				<?php echo($rel->type); ?>
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
				<?php echo($rel->calling_code); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_PHONES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->phones))
			foreach($this->item->phones as $rel):?>
			<div class="badge">
				<?php echo($rel->number); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_OPERATORS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->operators))
			foreach($this->item->operators as $rel):?>
			<div class="badge">
				<?php echo($rel->country_id); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_OPERATORS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->operators))
			foreach($this->item->operators as $rel):?>
			<div class="badge">
				<?php echo($rel->operator); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
</fieldset>
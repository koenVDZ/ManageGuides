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

	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->contacts))
			foreach($this->item->contacts as $rel):?>
			<div class="badge">
				<?php echo($rel->name); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->contacts))
			foreach($this->item->contacts as $rel):?>
			<div class="badge">
				<?php echo($rel->name); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ACCOUNTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->accounts))
			foreach($this->item->accounts as $rel):?>
			<div class="badge">
				<?php echo($rel->account_type); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ACCOUNTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->accounts))
			foreach($this->item->accounts as $rel):?>
			<div class="badge">
				<?php echo($rel->agency); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ACCOUNTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->accounts))
			foreach($this->item->accounts as $rel):?>
			<div class="badge">
				<?php echo($rel->account); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ACCOUNTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->accounts))
			foreach($this->item->accounts as $rel):?>
			<div class="badge">
				<?php echo($rel->swift); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_ACCOUNTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->accounts))
			foreach($this->item->accounts as $rel):?>
			<div class="badge">
				<?php echo($rel->iban); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
</fieldset>
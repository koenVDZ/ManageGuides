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

	<div class="control-group field-_company_id_catid_MGcat">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CATEGORY_ID_MGCATEGORY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_company_id_catid_MGcat',
				'dataObject' => $this->item
			));?>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRIES_USER_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->countries_user_id))
			foreach($this->item->countries_user_id as $rel):?>
			<div class="badge">
				<?php echo($rel->iso_2); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRIES_USER_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->countries_user_id))
			foreach($this->item->countries_user_id as $rel):?>
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
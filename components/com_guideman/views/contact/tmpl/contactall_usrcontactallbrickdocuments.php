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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DOC_LABELS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->doclabels))
			foreach($this->item->doclabels as $rel):?>
			<div class="badge">
				<?php echo($rel->doc_type_name); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DOC_LABELS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->doclabels))
			foreach($this->item->doclabels as $rel):?>
			<div class="badge">
				<?php echo($rel->doc_type_name); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DOCUMENTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->documents))
			foreach($this->item->documents as $rel):?>
			<div class="badge">
				<?php echo($rel->number); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DOCUMENTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->documents))
			foreach($this->item->documents as $rel):?>
			<?php echo JDom::_('html.fly.datetime', array(
				'dataObject' => $rel,
				'dataKey' => 'emission_date',
				'dateFormat' => 'd-m-Y'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_DOCUMENTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->documents))
			foreach($this->item->documents as $rel):?>
			<?php echo JDom::_('html.fly.datetime', array(
				'dataObject' => $rel,
				'dataKey' => 'expiration_date',
				'dateFormat' => 'd-m-Y'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
</fieldset>
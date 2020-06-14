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


var_dump ($this->item->languages);
?>

<fieldset class="fieldsfly fly-horizontal mg_fly">
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_LANGUAGES') ?></legend>

	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_LANGUAGES" ); ?></label>
		</div>

        <div class="controls">
			<?php
			if (isset($this->item->languages))
			foreach($this->item->languages as $rel):?>
			<div class="badge">
				<?php echo($rel->flag); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_LANGUAGES" ); ?></label>
		</div>

        <div class="controls">
			<?php
			if (isset($this->item->languages))
			foreach($this->item->languages as $rel):?>
			<div class="badge">
				<?php echo($rel->name); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTLANG" ); ?></label>
		</div>

        <div class="controls">
			<?php
			if (isset($this->item->contactlang))
			foreach($this->item->contactlang as $rel):?>
			<div class="badge">
				<?php echo($rel->prof_level); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
</fieldset>

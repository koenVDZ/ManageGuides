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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SOCIAL_LABELS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->sociallabels))
			foreach($this->item->sociallabels as $rel):?>
			<?php echo JDom::_('html.fly.file', array(
				'width' => '50',
				'height' => '50',
				'dataObject' => $rel,
				'dataKey' => 'logo',
				'indirect' => false,
				'root' => '[DIR_SOCIALLABELS_LOGO]'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SOCIAL_LABELS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->sociallabels))
			foreach($this->item->sociallabels as $rel):?>
			<div class="badge">
				<?php echo($rel->type); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SOCIAL_LABELS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->sociallabels))
			foreach($this->item->sociallabels as $rel):?>
			<div class="badge">
				<?php echo($rel->link); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SOCIAL" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->social))
			foreach($this->item->social as $rel):?>
			<div class="badge">
				<?php echo($rel->name); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
</fieldset>
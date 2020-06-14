<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	ContactLang
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

	<div class="control-group field-modification_date">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_MODIFICATION_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'modification_date',
				'dataObject' => $this->item,
				'dateFormat' => 'D d M Y'
			));?>
		</div>
    </div>
	<div class="control-group field-modified_by">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_ID" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'modified_by',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_modified_by_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_MODIFIED_BY" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_modified_by_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-_modified_by_username">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_USERNAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_modified_by_username',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
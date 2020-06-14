<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Prices
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_SERVICE') ?></legend>

	<div class="control-group field-name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_NAME" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-grouper">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_GROUPER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.int', array(
				'dataKey' => 'grouper',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
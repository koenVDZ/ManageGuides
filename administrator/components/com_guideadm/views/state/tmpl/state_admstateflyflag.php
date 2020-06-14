<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	States
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

	<div class="control-group field-flag">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEADM_FIELD_FLAG" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'dataKey' => 'flag',
				'dataObject' => $this->item,
				'height' => 'auto',
				'indirect' => false,
				'root' => '[DIR_STATES_FLAG]',
				'width' => 'auto'
			));?>
		</div>
    </div>
</fieldset>
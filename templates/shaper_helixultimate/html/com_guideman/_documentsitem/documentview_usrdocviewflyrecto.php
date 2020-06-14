<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.0
* @package		GuideMan
* @subpackage	Documents
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_DOCUMENT_IMAGE_RECTO') ?></legend>

	<div class="control-group field-image">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_RECTO" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.file', array(
				'attrs' => array('crop','fit'),
				'dataKey' => 'image',
				'dataObject' => $this->item,
				'height' => 150,
				'indirect' => false,
				'root' => '[DIR_DOCUMENTS_IMAGE]',
				'width' => 'auto'
			));?>
		</div>
    </div>
</fieldset>
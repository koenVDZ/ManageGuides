<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_DOCUMENT_DETAILS') ?></legend>

	<div class="control-group field-_label_id_doc_type_name">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_TYPE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => '_label_id_doc_type_name',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-number">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_NUMBER" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'number',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
	<div class="control-group field-emission_date">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_EMISSION_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'emission_date',
				'dataObject' => $this->item,
				'dateFormat' => 'd-m-Y'
			));?>
		</div>
    </div>
	<div class="control-group field-expiration_date">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_EXPIRATION_DATE" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.datetime', array(
				'dataKey' => 'expiration_date',
				'dataObject' => $this->item,
				'dateFormat' => 'd-m-Y'
			));?>
		</div>
    </div>
	<div class="control-group field-emmision">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_EMMISION" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly', array(
				'dataKey' => 'emmision',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Jobs
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
	<legend><?php echo JText::_('GUIDEMAN_FIELDSET_JOB_DETAILS') ?></legend>

	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<div class="badge">
				<?php echo($rel->job_id); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<div class="badge">
				<?php echo($rel->type); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<div class="badge">
				<?php echo($rel->item_status); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<?php echo JDom::_('html.fly.datetime', array(
				'dataObject' => $rel,
				'dataKey' => 'start_date',
				'dateFormat' => 'd-m-Y'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<?php echo JDom::_('html.fly.datetime', array(
				'dataObject' => $rel,
				'dataKey' => 'start_time',
				'dateFormat' => 'H:i'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<?php echo JDom::_('html.fly.datetime', array(
				'dataObject' => $rel,
				'dataKey' => 'end_date',
				'dateFormat' => 'd-m-Y'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<?php echo JDom::_('html.fly.datetime', array(
				'dataObject' => $rel,
				'dataKey' => 'end_time',
				'dateFormat' => 'H:i'
			));?>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SERVICES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->services))
			foreach($this->item->services as $rel):?>
			<div class="badge">
				<?php echo($rel->company); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_SERVICES" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->services))
			foreach($this->item->services as $rel):?>
			<div class="badge">
				<?php echo($rel->service_name); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<div class="badge">
				<?php echo($rel->remark); ?>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->contacts))
			foreach($this->item->contacts as $rel):?>
			<div class="badge">
				<?php echo($rel->user_id); ?>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->contacts))
			foreach($this->item->contacts as $rel):?>
			<div class="badge">
				<?php echo($rel->surname); ?>
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
				<?php echo($rel->alias); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<div class="badge">
				<?php echo($rel->service_provider_status); ?>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->contacts))
			foreach($this->item->contacts as $rel):?>
			<div class="badge">
				<?php echo($rel->user_id); ?>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->contacts))
			foreach($this->item->contacts as $rel):?>
			<div class="badge">
				<?php echo($rel->surname); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<div class="badge">
				<?php echo($rel->guide_status); ?>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->contacts))
			foreach($this->item->contacts as $rel):?>
			<div class="badge">
				<?php echo($rel->user_id); ?>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->contacts))
			foreach($this->item->contacts as $rel):?>
			<div class="badge">
				<?php echo($rel->surname); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<div class="badge">
				<?php echo($rel->transport_status); ?>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->contacts))
			foreach($this->item->contacts as $rel):?>
			<div class="badge">
				<?php echo($rel->user_id); ?>
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
			<label><?php echo JText::_( "GUIDEMAN_FIELD_CONTACTS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->contacts))
			foreach($this->item->contacts as $rel):?>
			<div class="badge">
				<?php echo($rel->surname); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-id">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_JOB_ITEMS" ); ?></label>
		</div>
		
        <div class="controls">
			<?php
			if (isset($this->item->jobitems))
			foreach($this->item->jobitems as $rel):?>
			<div class="badge">
				<?php echo($rel->pax); ?>
			</div>
			<?php endforeach; ?>
		</div>
    </div>
	<div class="control-group field-coordination">
    	<div class="control-label">
			<label><?php echo JText::_( "GUIDEMAN_FIELD_COORDINATION" ); ?></label>
		</div>
		
        <div class="controls">
			<?php echo JDom::_('html.fly.bool', array(
				'dataKey' => 'coordination',
				'dataObject' => $this->item
			));?>
		</div>
    </div>
</fieldset>
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.2   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.7.1
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


$var_catid = JDom::_('html.fly', array('dataKey' => 'catid','dataObject' => $this->item));
$var_type = JDom::_('html.fly', array('dataKey' => 'type','dataObject' => $this->item,'labelKey' => 'text','list' => GuidemanHelper::enumList('contacts', 'type'),'listKey' => 'value'));
?>
<fieldset class="fieldsfly fly-horizontal">
	<?php if ($var_catid == 24): ?>
		<div><h3><i class="fal fa-user"></i>&#160<?php echo JText::_('GUIDEMAN_FIELDSET_GUIDE_DETAILED_INFORMATION') ?></h3></div>
	<?php endif; ?>
	<?php if ($var_catid == 25): ?>
		<div><h3><i class="fal fa-user"></i>&#160<?php echo JText::_('GUIDEMAN_FIELDSET_AGENCY_DETAILED_INFORMATION') ?></h3></div>
	<?php endif; ?>
	<?php if ($var_catid == 58): ?>
		<div><h3><i class="fal fa-user"></i>&#160<?php echo JText::_('GUIDEMAN_FIELDSET_DRIVER_DETAILED_INFORMATION') ?></h3></div>
	<?php endif; ?>
	<?php if ($var_catid == 99): ?>
		<div><h3><i class="fal fa-user"></i>&#160<?php echo JText::_('GUIDEMAN_FIELDSET_OPERATOR_DETAILED_INFORMATION') ?></h3></div>
	<?php endif; ?>
<div class="row-fluid">
	<div class="span12>
		<div class="row-fluid">
				<div class="span2">
					<?php
					 	if (!JDom::_('html.fly.file', array('dataKey' => 'image','dataObject' => $this->item,'root' => '[DIR_CONTACTS_IMAGE]',))) { ?>
							<center><i class="fal fa-user fa-5x fa-border"></i></center>
						<?php
						}
						else {
							echo JDom::_('html.fly.file', array(
							'attrs' => array('crop','fit','format:jpeg'),
							'dataKey' => 'image',
							'dataObject' => $this->item,
							'height' => 150,
							'indirect' => false,
							'root' => '[DIR_CONTACTS_IMAGE]',
							'width' => 'auto'
							));
						}
					?>
				</div>
			<div class="span4">
				<h2>
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_nationality_iso_2','dataObject' => $this->item)));?>"></span>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => 'name',
							'dataObject' => $this->item
						));?>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => 'surname',
							'dataObject' => $this->item
						));?>
						</h2><i class="fal fa-user"></i>
				<?php echo JDom::_('html.fly', array(
					'dataKey' => 'id',
					'dataObject' => $this->item,
					'domClass' => 'badge badge-inverse'
				));?>
				<?php echo JDom::_('html.fly', array(
					'dataKey' => 'alias',
					'dataObject' => $this->item,
					'domClass' => 'label label-inverse'
				));?>
				<br><i class="fal fa-envelope"></i>
				<?php echo JDom::_('html.fly', array(
					'dataKey' => 'email',
					'dataObject' => $this->item
				));?>
				<br>
				<?php
					$var_gender = JDom::_('html.fly', array('dataKey' => 'gender','dataObject' => $this->item,'labelKey' => 'text','list' => GuidemanHelper::enumList('contacts', 'gender'),'listKey' => 'value'));
					if ($var_gender != "0") {
						echo JDom::_('html.fly.enum', array('dataKey' => 'gender','dataObject' => $this->item,'labelKey' => 'text','list' => GuidemanHelper::enumList('contacts', 'gender'),'listKey' => 'value')).'<br>';
					}
				?>
				<?php
				$var_date = strlen(JDom::_('html.fly.datetime', array('dataKey' => 'birthdate','dataObject' => $this->item,'dateFormat' => 'D d M Y')));
				if ($var_date > 40): ?>
					<i class="fal fa-birthday-cake"></i>
					<?php echo JDom::_('html.fly.datetime', array('dataKey' => 'birthdate','dataObject' => $this->item,'dateFormat' => 'D d M Y'));?>
					<br>
				<?php endif; ?>
				<?php
				$var_com = strlen(JDom::_('html.fly.int', array('dataKey' => 'company_id','dataObject' => $this->item,'route' => array('view' => 'contact','layout' => 'company','cid[]' => $this->item->company_id),'target' => 'modal')));
				if ($var_com > 5): ?>
					<i class="fal fa-building"></i>
						<?php echo JDom::_('html.fly.int', array('dataKey' => 'company_id','domClass' => 'badge badge-inverse','dataObject' => $this->item,'route' => array('view' => 'contact','layout' => 'company','cid[]' => $this->item->company_id),'target' => 'modal'));?>
						<?php echo JDom::_('html.fly', array('dataKey' => '_company_id_name','domClass' => 'label label-inverse','dataObject' => $this->item));?>
					<br>
				<?php endif; ?>
				<?php
//				echo $var_catid;
				if ($var_catid == 24): ?>
						<?php $driverguide = JDom::_('html.fly', array('dataKey' => 'driverguide','dataObject' => $this->item));
						if ($driverguide){
							$driverguide = "<i class='fal fa-check-square' style='color:green'></i>";
							}
							else{
								$driverguide = "<i class='fal fa-square' style='color:red'></i>";
							}
					?>
					<i class="fal fa-car"></i>
					<?php echo JText::_( "GUIDEMAN_FIELD_DRIVERGUIDE" ) . ': ' . $driverguide; ?>
					<br>
				<?php endif; ?>
				<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_country_id_iso_2','dataObject' => $this->item)));?>"></span>
				<?php echo ' ' . JDom::_('html.fly', array('dataKey' => '_country_id_country_name','dataObject' => $this->item)) . ', ' . JDom::_('html.fly', array('dataKey' => '_state_id_state','dataObject' => $this->item));?>
			</div>
			<div class="span6">
				<?php
					if (JDom::_('html.fly.file', array('attrs' => array('format:png'),'dataKey' => '_company_id_image','dataObject' => $this->item,'height' => '50','indirect' => true,'root' => '[DIR_CONTACTS_IMAGE]','width' => 'auto')) != NULL) :?>
					<?php echo JDom::_('html.fly.file', array(
							'attrs' => array('format:png'),
							'dataKey' => '_company_id_image',
							'dataObject' => $this->item,
							'height' => '50',
							'indirect' => true,
							'root' => '[DIR_CONTACTS_IMAGE]',
							'width' => 'auto'
						));?><br>
					<?php endif; ?>
				<div class="row-fluid">
					<div class=span12>
						<h2>
						<?php $flag = strtolower(JDom::_('html.fly', array(	'dataKey' => '_company_id_country_id_iso_2','dataObject' => $this->item)));
						if ($flag != NULL): ?>
							<span class="flag-icon flag-icon-<?php echo $flag;?>"></span>
						<?php endif;
						if (JDom::_('html.fly', array('dataKey' => '_company_id_name','dataObject' => $this->item)) != NULL): ?>
							<?php echo JDom::_('html.fly', array('dataKey' => '_company_id_name','dataObject' => $this->item));?>
							</h2>
						<i class="muted">
						<?php echo JDom::_('html.fly', array(
							'dataKey' => '_company_id_surname',
							'dataObject' => $this->item
						));?></i><br>
						<i class="fal fa-building"></i>
						<?php echo JDom::_('html.fly.int', array(
							'dataKey' => 'company_id',
							'dataObject' => $this->item,
							'domClass' => 'badge badge-inverse'
						));?>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => '_company_id_alias',
							'dataObject' => $this->item,
							'domClass' => 'label label-inverse'
						));?>
						<br><i class="fal fa-envelope"></i>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => '_company_id_email',
							'dataObject' => $this->item
						));?>
						<br>
						<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_company_id_country_id_iso_2','dataObject' => $this->item)));?>"></span>
						<?php echo ' ' . JDom::_('html.fly', array('dataKey' => '_company_id_country_id_country_name','dataObject' => $this->item)) . ', ' . JDom::_('html.fly', array('dataKey' => '_company_id_state_id_state','dataObject' => $this->item));?>
						<?php endif;?>
					</div>
				</div>
			</div>
</fieldset>

<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.1.4
* @package		GuideMan
* @subpackage	Addresses
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


JHtml::addIncludePath(JPATH_ADMIN_GUIDEMAN.'/helpers/html');
JHtml::_('behavior.tooltip');
//JHtml::_('behavior.multiselect');

$model		= $this->model;
$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$saveOrder	= $listOrder == 'a.ordering' && $listDirn != 'desc';
JDom::_('framework.sortablelist', array(
	'domId' => 'grid-addresses',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'addresses',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="">
	<table class='table' id='grid-addresses'>
		<thead>
			<tr>
				<?php if ($model->canSelect()): ?>
				<th>
					<?php echo JDom::_('html.form.input.checkbox', array(
						'dataKey' => 'checkall-toggle',
						'title' => JText::_('JGLOBAL_CHECK_ALL'),
						'selectors' => array(
							'onclick' => 'Joomla.checkAll(this);'
						)
					)); ?>
				</th>
				<?php endif; ?>

				<?php if ($model->canEditState()): ?>
				<th class="center hidden-xs" style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_NAME"); ?>
				</th>

				<th style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_DEFAULT_ADDRESS", 'a.default_address', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ADDRESS_TYPE", '_address_label_.type', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ADDRESS", 'a.address', $listDirn, $listOrder ); ?>
					<br/>
					<?php 
					echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ZIP", 'a.zipcode', $listDirn, $listOrder ) . " / " . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SUBURB", 'a.suburb', $listDirn, $listOrder ); 
					?>
					<br/>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_CITY", 'a.city', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATE", '_state_id_.state', $listDirn, $listOrder ); ?>
					<br/>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_COUNTRY", '_country_id_.country_name', $listDirn, $listOrder ); ?>
				</th>

			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			// KOEN 02/04/17
			if ($model->canEditState()) {
				$StateColorArray = GuidemanHelperFilehelp::GetBackGroundColor(JDom::_('html.fly', array('ctrl' => 'contacts','dataKey' => 'published','dataObject' => $row,'num' => $i)));
			}
			else {
				$StateColorArray = array( "status" => "", "button" => "");
			}
			?>
			<?php
			//Group results on : User ID > Name
			if (!isset($group_user_id) || ($row->user_id != $group_user_id)):?>
			<tr>
				<th colspan="7" class='grid-group grid-group-1'>
					<span>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => '_user_id_name',
							'dataObject' => $row
						));?>
					</span>
				</th>
			</tr>
			<?php
			$group_user_id = $row->user_id;
			$k = 0;
			endif;
			// KOEN 02/04/17
			if (!$StateColorArray ['status'] ) : ?>
				<tr class="<?php echo "row$k"; ?>" sortable-group-id="<?php echo $row->user_id; ?>">
			<?php else : ?>
				<tr class="<?php echo $StateColorArray ['status'] . ' ' . "row$k"; ?>" sortable-group-id="<?php echo $row->user_id; ?>">
			<?php endif; 	
			// KOEN 02/04/17 ?> 
				<?php if ($model->canSelect()): ?>
				<td>
					<?php if ($row->params->get('access-edit') || $row->params->get('tag-checkedout')): ?>
						<?php echo JDom::_('html.grid.checkedout', array(
													'dataObject' => $row,
													'num' => $i
														));
						?>
					<?php endif; ?>
				</td>
				<?php endif; ?>

				<?php if ($model->canEditState()): ?>
				<td class="center hidden-xs" style="text-align:center" width="1%">
					<?php echo JDom::_('html.grid.ordering', array(
						'aclAccess' => 'core.edit.state',
						'dataKey' => 'ordering',
						'dataObject' => $row,
						'domClass' => 'center hidden-xs',
						'enabled' => $saveOrder
					));?>
				</td>
				<?php endif; ?>

				<td style="text-align:left">
					<?php 
						$type = JDom::_('html.fly', array('dataKey' => '_user_id_type','dataObject' => $row));
					?>
					<?php if ($type === '1') : ?>
						<i class="fa fa-building-o"></i>
					<?php endif; ?>
					<?php if ($type === '0') : ?>
						<i class="fa fa-user"></i>
					<?php endif; ?>
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_user_id_nationality_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array('dataKey' => '_user_id_name','dataObject' => $row));?>
					<?php echo '[' . JDom::_('html.fly', array('dataKey' => '_user_id_alias','dataObject' => $row)) .  ']';?>
					<?php if ($type === '1') : ?>
					<br/>
						<strong>
					<?php echo JDom::_('html.fly', array('dataKey' => '_user_id_surname','dataObject' => $row));?>
						</strong>
					<?php endif; ?>
				</td>

				<td style="text-align:center" width="1%">
					<?php echo JDom::_('html.grid.bool', array(
						'commandAcl' => array('core.edit.own', 'core.edit'),
						'ctrl' => 'addressesitem',
						'dataKey' => 'default_address',
						'dataObject' => $row,
						'num' => $i,
						'taskYes' => 'toggle_default_address',
						'viewType' => 'icon'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_address_label_type',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'address',
						'dataObject' => $row
					));?>
				<br/>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'zipcode',
						'dataObject' => $row
					)) . " / " .
					JDom::_('html.fly', array(
						'dataKey' => 'suburb',
						'dataObject' => $row
					));?>
					<br/>
					<?php echo JDom::_('html.fly', array('dataKey' => 'city','dataObject' => $row));?>
					<?php 
						if (!empty(JDom::_('html.fly', array('dataKey' => '_state_id_abbreviation','dataObject' => $row)))) 
						{
							echo ', ' . JDom::_('html.fly', array('dataKey' => '_state_id_abbreviation','dataObject' => $row));
						} 
						;
					?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_state_id_state',
						'dataObject' => $row
					));?>
					<br/>
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_country_id_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_country_id_country_name',
						'dataObject' => $row
					));?>
				</td>

			</tr>
			<?php
			$k = 1 - $k;
		endfor;
		?>
		</tbody>
	</table>
</div>
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.7   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.5
* @package		GuideMan
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
	'domId' => 'grid-prices',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'prices',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="">
	<table class='table' id='grid-prices'>
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
					<?php
						echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_NAME", 'a.name', $listDirn, $listOrder );
			 			echo ' / ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_HOURLY_RATE", 'a.hourly_rate', $listDirn, $listOrder );
			 			echo ' / ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_MIN_TIME", 'a.min_time', $listDirn, $listOrder );
					?>
				</br>
					<?php echo JText::_("GUIDEMAN_FIELD_REMARK"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_COMPANY"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_CURRENCY", '_currency_.symbol', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_FROM_DATE", 'a.from_date', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_UNTIL_DATE", 'a.until_date', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_COORDINATION_IN", 'a.coordination_in', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_COORDINATION_FEE", 'a.coordination_fee', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_EXTRA_HOUR_DAY", 'a.extra_hour_day', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_EXTRA_HOUR_NIGHT", 'a.extra_hour_night', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_NIGHT_SHIFT", 'a.night_shift', $listDirn, $listOrder ); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATE", 'a.published', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_GROUPER", 'a.grouper', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.id', $listDirn, $listOrder ); ?>
				</th>

			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			?>

			<tr class="<?php echo "row$k"; ?>" sortable-group-id="<?php echo $row->company; ?>">
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
					<div class="label label-warning">
						<strong>
							<?php echo JDom::_('html.fly', array(
								'dataKey' => 'name',
								'dataObject' => $row
							));?>
						</div>
					</strong>
						<?php echo JDom::_('html.fly.enum', array(
							'dataKey' => 'hourly_rate',
							'dataObject' => $row,
							'labelKey' => 'text',
							'list' => GuidemanHelper::enumList('prices', 'hourly_rate'),
							'listKey' => 'value'
						));?>
						<?php if (JDom::_('html.fly', array('dataKey' => 'min_time','dataObject' => $row)) != "") : ?>
							<div class="label label-info"><i class="far fa-clock"></i>
							<?php echo JDom::_('html.fly.datetime', array('dataKey' => 'min_time','dataObject' => $row,'dateFormat' => 'H:i'));?>
							</div>
						<?php endif; ?>
				</br>
					<font size="1">
						<?php echo JDom::_('html.fly', array(
							'dataKey' => 'remark',
							'dataObject' => $row
						));?>
					</font>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_company_nationality_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_company_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_currency_symbol',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'from_date',
						'dataObject' => $row,
						'dateFormat' => 'd/m/Y'
					));?>
				</br>
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'until_date',
						'dataObject' => $row,
						'dateFormat' => 'd/m/Y'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.grid.bool', array(
						'commandAcl' => array('core.edit.own', 'core.edit'),
						'ctrl' => 'price',
						'dataKey' => 'coordination_in',
						'dataObject' => $row,
						'num' => $i,
						'taskYes' => 'toggle_coordination_in',
						'viewType' => 'icon'
					));?>
				</br>
					<?php if (!$row->coordination_in) echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)); ?>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'coordination_fee',
						'dataObject' => $row
					));?>
					<?php if ($row->coordination_in) echo ' %'; ?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row));?>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'extra_hour_day',
						'dataObject' => $row
					));?>
				</br>
					<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row));?>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'extra_hour_night',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php if (JDom::_('html.fly', array('dataKey' => 'night_shift','dataObject' => $row)) != "") : ?>
						<div class="label label-default"><i class="far fa-clock"></i>
						<?php echo JDom::_('html.fly.datetime', array(
							'dataKey' => 'night_shift',
							'dataObject' => $row,
								'dateFormat' => 'H:i'
						));
					endif; ?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center" width="1%">
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'prices',
						'dataKey' => 'published',
						'dataObject' => $row,
						'num' => $i
					));?>
				</td>
				<?php endif; ?>

				<td style="text-align:center">
					<div class="badge badge-inverse">
						<?php echo JDom::_('html.fly', array(
							'dataKey' => 'grouper',
							'dataObject' => $row
						));?>
					</div>
					</br>
					<div class="badge badge-inverse">
						<?php echo JDom::_('html.fly', array(
							'dataKey' => 'id',
							'dataObject' => $row
						));?>
					</div>
				</td>

			</tr>
			<?php
			$k = 1 - $k;
		endfor;
		?>
		</tbody>
	</table>
</div>
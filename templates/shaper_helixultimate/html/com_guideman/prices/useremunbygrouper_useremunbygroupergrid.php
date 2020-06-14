<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.4
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
<div class="row">
	<table class='table table-sm' id='grid-prices'>
		<thead>
			<tr  colspan="18">
				<?php if ($model->canSelect()): ?>
				<th style="text-align:center" width="3%">
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
				<th style="text-align:center" width="3%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:left" width="8%">
					<i class="far fa-calendar-alt"></i>&nbsp<?php echo JText::_("GUIDEMAN_FIELD_FROM_DATE"); ?>
					</br>
					<i class="fas fa-calendar-alt"></i>&nbsp<?php echo JText::_("GUIDEMAN_FIELD_UNTIL_DATE"); ?>
				</th>

				<th style="text-align:left" width="9%">
					<i class="fal fa-sun"></i>&nbsp<?php echo JText::_("GUIDEMAN_FIELD_EXTRA_HOUR_DAY"); ?>
					</br>
					<i class="fal fa-moon"></i>&nbsp<?php echo JText::_("GUIDEMAN_FIELD_EXTRA_HOUR_NIGHT"); ?>
				</th>

				<th style="text-align:center" width="7%"><i class="far fa-moon"></i>
					<?php echo JText::_("GUIDEMAN_FIELD_NIGHT_SHIFT"); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_01"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_11"); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_02"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_12"); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_03"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_13"); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_04"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_14"); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_05"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_15"); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_06"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_16"); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_07"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_17"); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_08"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_18"); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_09"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_19"); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_10"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX_20"); ?>
				</th>
				<th style="text-align:right" width="5%">
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PAX20"); ?>
				</th>
				<?php if ($model->canEditState()): ?>
					<th style="text-align:center" width="2%">
						<i class="fal fa-eye fa-2x"></i>
					</th>
				<?php endif; ?>
				<th style="text-align:left" width="10%">
					<?php echo JText::_("GUIDEMAN_FIELD_ACTION"); ?>
				</th>

			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			?>
			<?php
			//Group results on : Grouper
			if (!isset($group_grouper) || ($row->grouper != $group_grouper)):?>
			<tr>
				<th colspan="18" class='grid-group grid-group-1'>
					<div id=grid-group-title>
							<span class="badge badge-warning">
								<i class="fal fa-map-pin"></i>
								<?php echo JDom::_('html.fly', array(
									'dataKey' => 'name',
									'dataObject' => $row
								));?>
							</span>
						<span class="float-right badge badge-dark">
							<i class="fal fa-building"></i>
							<?php
							echo JDom::_('html.fly', array(
								'dataKey' => '_company_name',
								'dataObject' => $row
							));?>
						</span>
					</div>
					<br>

					<div class="alert alert-dark" role="alert">
						<a>
							<i class="far fa-user-circle"></i>
							<?php echo JDom::_('html.fly.enum', array(
								'dataKey' => 'hourly_rate',
								'dataObject' => $row,
								'labelKey' => 'text',
								'list' => GuidemanHelperEnum::_('prices_hourly_rate'),
								'listKey' => 'value'
							));?>
							<i class="fas fa-dot-circle" style="color: #00ad52"></i>
							<i class="fal fa-money-bill-alt"></i>
							<?php echo JDom::_('html.fly', array('dataKey' => '_currency_currency_id','dataObject' => $row)) . "(".JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)).")";?>
							<i class="fas fa-dot-circle" style="color: #00ad52"></i>
							<i class="fal fa-clock"></i>
							<?php echo JText::_("GUIDEMAN_FIELD_MIN_TIME");
							echo ": ";
							echo JDom::_('html.fly.datetime', array('dataKey' => 'min_time','dataObject' => $row,'dateFormat' => 'H:i'));?>
							<i class="fas fa-dot-circle" style="color: #00ad52"></i>
							<i class="far fa-user-plus"></i>
							<?php echo JText::_("GUIDEMAN_FIELD_COORDINATION_IN");
							echo ": ";
							echo JDom::_('html.fly.bool', array('dataKey' => 'coordination_in','dataObject' => $row,'togglable' => false,'viewType' => 'icon'));?>
							<i class="fas fa-dot-circle" style="color: #00ad52"></i>
							<?php echo JText::_("GUIDEMAN_FIELD_COORDINATION_FEE");
							echo ": ";
							echo JDom::_('html.fly', array('dataKey' => 'coordination_fee','dataObject' => $row));
							if (JDom::_('html.fly.bool', array('dataKey' => 'coordination_in','dataObject' => $row,'togglable' => false))) {
								echo " %";
							} else echo " " . JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row));
							?>
							<i class="fas fa-dot-circle" style="color: #00ad52"></i>
							<?php echo JText::_("GUIDEMAN_FIELD_OPTIONAL_1") .": ";
							echo JDom::_('html.fly', array('dataKey' => 'optional','dataObject' => $row));?>
						</div>

							<?php if (JDom::_('html.fly', array('dataKey' => 'remark','dataObject' => $row))):?>
								</h6>
									<div class="alert alert-danger" role="alert">
											<i class="fal fa-exclamation-triangle"></i>
											<?php echo JDom::_('html.fly', array('dataKey' => 'remark','dataObject' => $row));?>
									</div>
								</h6>
							<?php endif; ?>
					</div>
				</th>
			</tr>
			<?php
			$group_grouper = $row->grouper;
			$k = 0;
			endif; ?>

			<?php $pub = JDom::_('html.fly', array('ctrl' => 'prices','dataKey' => 'published','dataObject' => $row,'num' => $i));?>
			<?php echo GuidemanHelperPermutations::StateBackgroundColor($pub,$k,$row->company);?>

				<?php if ($model->canSelect()): ?>
					<td>
						<?php if ($row->params->get('access-edit') || $row->params->get('tag-checkedout')): ?>
						<?php echo JDom::_('html.grid.checkedout', array('dataObject' => $row,'num' => $i));?>
					</td>
					<?php endif; ?>
				<?php endif; ?>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center">
					<?php echo GuidemanHelperPermutations::IcomoonMenu(JDom::_('html.grid.ordering', array('aclAccess' => 'core.edit.state','dataKey' => 'ordering','dataObject' => $row,'enabled' => $saveOrder)));?>
				</td>
				<?php endif; ?>

				<td style="text-align:left">
					<i class="far fa-calendar-alt fa-fw"></i>
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'from_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-y'
					));?>
				</br><i class="fas fa-calendar-alt fa-fw"></i>
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'until_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-y'
					));?>
				</td>
				<td style="text-align:center">
					<i class="far fa-sun"></i>&nbsp<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'extra_hour_day','dataObject' => $row)), 2, ',', '.');?>
					</br>
					<i class="far fa-moon"></i>&nbsp<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'extra_hour_night','dataObject' => $row)), 2, ',', '.');?>
				</td>
				<td style="text-align:center"><i class="far fa-moon"></i>
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'night_shift',
						'dataObject' => $row,
						'dateFormat' => 'H:i'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_01','dataObject' => $row)), 0, ',', '.');?>
					</br>
					<?php if ((JDom::_('html.fly', array('dataKey' => 'hourly_rate','dataObject' => $row,'labelKey' => 'text','list' => GuidemanHelperEnum::_('prices_hourly_rate'),'listKey' => 'value')) == 0)):?>
					<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_11','dataObject' => $row)), 0, ',', '.');?>
					<?php endif;?>
				</td>
				<?php
				if ((JDom::_('html.fly', array('dataKey' => 'hourly_rate','dataObject' => $row,'labelKey' => 'text','list' => GuidemanHelperEnum::_('prices_hourly_rate'),'listKey' => 'value')) == 0)): ?>
					<td style="text-align:right">
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_02','dataObject' => $row)), 0, ',', '.');?>
						<br>
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_12','dataObject' => $row)), 0, ',', '.');?>
					</td>
					<td style="text-align:right">
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_03','dataObject' => $row)), 0, ',', '.');?>
						<br>
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_13','dataObject' => $row)), 0, ',', '.');?>
					</td>
					<td style="text-align:right">
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_04','dataObject' => $row)), 0, ',', '.');?>
						<br>
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_14','dataObject' => $row)), 0, ',', '.');?>
					</td>
					<td style="text-align:right">
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_05','dataObject' => $row)), 0, ',', '.');?>
						<br>
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_15','dataObject' => $row)), 0, ',', '.');?>
					</td>
					<td style="text-align:right">
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_06','dataObject' => $row)), 0, ',', '.');?>
						<br>
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_16','dataObject' => $row)), 0, ',', '.');?>
					</td>
					<td style="text-align:right">
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_07','dataObject' => $row)), 0, ',', '.');?>
						<br>
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_17','dataObject' => $row)), 0, ',', '.');?>
					</td>
					<td style="text-align:right">
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_08','dataObject' => $row)), 0, ',', '.');?>
						<br>
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_18','dataObject' => $row)), 0, ',', '.');?>
					</td>
					<td style="text-align:right">
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_09','dataObject' => $row)), 0, ',', '.');?>
						<br>
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_19','dataObject' => $row)), 0, ',', '.');?>
					</td>
					<td style="text-align:right">
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_10','dataObject' => $row)), 0, ',', '.');?>
						<br>
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_20','dataObject' => $row)), 0, ',', '.');?>
					</td>
					<td style="text-align:right">
						<br>
						<?php echo JDom::_('html.fly', array('dataKey' => '_currency_symbol','dataObject' => $row)). " " . number_format(JDom::_('html.fly', array('dataKey' => 'pax_21','dataObject' => $row)), 0, ',', '.');?>
					</td>
				<?php
				else:
				?>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				<?php
					endif;?>

				<?php if ($model->canEditState()): ?>
					<?php echo GuidemanHelperPermutations::StateIcon($pub);?>
				<?php endif;?>

				<td style="text-align:left">
					<div class="btn-group btn-group-sm" role="group">
				    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				      <?php echo JText::_("GUIDEMAN_FIELD_ACTION"); ?>
				    </button>
				    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
				      <a class="dropdown-item" href="index.php?option=com_guideman&view=price&layout=remuneration&cid=<?php echo JDom::_('html.fly', array('dataKey' => 'id','dataObject' => $row)) ?>"><i class="far fa-eye fa-fw"></i><?php echo JText::_("GUIDEMAN_FIELD_VIEW"); ?></a>
				      <a class="dropdown-item" href="index.php?option=com_guideman&view=price&layout=remunerationcopy&cid=<?php echo JDom::_('html.fly', array('dataKey' => 'id','dataObject' => $row)) ?>"><i class="far fa-clone fa-fw"></i><?php echo JText::_("GUIDEMAN_FIELD_CLONE"); ?></a>
				    </div>
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

<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V2.9.3   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.5.0
* @package		GuideMan
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
	'domId' => 'grid-jobs',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'jobs',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="">
	<table class='table' id='grid-jobs'>
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
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_FILE_NUMBER", 'a.file_number', $listDirn, $listOrder ); ?>
					</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.status', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_COMPANY_NAME"); ?>
					</br>
					<?php echo '[' . JText::_("GUIDEMAN_FIELD_ID") . '] ' . JText::_("GUIDEMAN_FIELD_OFFICIAL_NAME"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_CLIENT_NAME", '_client_id_.name', $listDirn, $listOrder ); ?>
					</br>
					<?php echo '[' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.client_id', $listDirn, $listOrder ) . ']'; ?>
					<?php echo ' ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_OFFICIAL_NAME", '_client_id_.surname', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_LANGUAGE", '_requested_language_language_.title', $listDirn, $listOrder ); ?>
					</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_BACKUP_LANGUAGE", '_second_language_option_.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_OPERATER_NAME", '_operator_name_.name', $listDirn, $listOrder ); ?>
					<?php echo ' ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SURNAME", '_operator_name_.surname', $listDirn, $listOrder ); ?>
					</br>
					<?php echo '[' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.operator_name', $listDirn, $listOrder ) . ']'; ?>
					<?php echo ' ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ALIAS", '_operator_name_.alias', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_MAIN_GUIDE", '_main_guide_.name', $listDirn, $listOrder ) . " " . JText::_("GUIDEMAN_FIELD_COORDINATION"); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_GUIDE_STATUS", 'a.guide_status', $listDirn, $listOrder ); ?>
					<?php echo ' [' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.main_guide', $listDirn, $listOrder ) . ']'; ?>
					<?php echo ' ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ALIAS", '_main_guide_.alias', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TRIP_LEADER_NAME", '_trip_leader_.name', $listDirn, $listOrder ); ?>
					<?php echo ' ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SURNAME", '_trip_leader_.surname', $listDirn, $listOrder ); ?>
					</br>
					<?php echo '[' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.trip_leader', $listDirn, $listOrder ) . ']'; ?>
					<?php echo ' ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ALIAS", '_trip_leader_.alias', $listDirn, $listOrder ); ?>
				</th>


				<th style="text-align:right">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_PAX", 'a.pax', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_START_DATE", 'a.start_date', $listDirn, $listOrder ); ?>
					</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_END_DATE", 'a.end_date', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left" width="25px">
					<?php echo '[' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.remunerations', $listDirn, $listOrder ) . ']'; ?>
					<?php echo ' ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_REMUNERATION", '_remunerations_.name', $listDirn, $listOrder ); ?>
					</br>
					<?php echo '[' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.invoicing', $listDirn, $listOrder ) . ']'; ?>
					<?php echo ' ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_PRICING", '_invoicing_.name', $listDirn, $listOrder ); ?>
				</th>
				<th style="text-align:right">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TOTAL_DEBET", 'a.total_debet', $listDirn, $listOrder ); ?>
					</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TOTAL_CREDIT", 'a.total_credit', $listDirn, $listOrder ); ?>
				</th>
				<?php if ($model->canEditState()): ?>
				<th style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATE", 'a.published', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.id', $listDirn, $listOrder ); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			switch (JDom::_('html.fly', array('dataKey' => 'status','dataObject' => $row,'labelKey' => 'text','list' => GuidemanHelper::enumList('jobs', 'status'),'listKey' => 'value'))) {
				case 0:
					$statuscolor = "warning";
					$buttoncolor = "warning";
					break;
				case 1:
					$statuscolor = "success";
					$buttoncolor = "success";
					break;
				case 2:
					$statuscolor = "error";
					$buttoncolor = "danger";
					break;
				default:
					echo "";
				}
			?>

			<tr class="<?php echo $statuscolor . ' ' . "row$k"; ?>" sortable-group-id="<?php echo $row->company_id; ?>">
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
					<!-- Split button -->
					<font color="black">
						<div class="btn-group">
							<button class="btn btn-<?php echo $buttoncolor ?> btn-mini dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <?php echo JDom::_('html.fly', array('dataKey' => 'file_number','dataObject' => $row));?>
									</br>
									<?php
									switch (JDom::_('html.fly', array('dataKey' => 'status','dataObject' => $row,'labelKey' => 'text','list' => GuidemanHelper::enumList('jobs', 'status'),'listKey' => 'value'))) {
											case '0':
												echo JText::_('GUIDEMAN_ENUM_JOBS_STATUS_PROPOSAL');
												break;
											case '1':
												echo JText::_('GUIDEMAN_ENUM_JOBS_STATUS_CONFIRMED');
												break;
											case '2':
												echo JText::_('GUIDEMAN_ENUM_JOBS_STATUS_CANCELED');
												break;
											default:
												echo "";
											}?> <span class="caret"></span>
						  </button>
							<ul class="dropdown-menu">
						    <li><a href="index.php?option=com_guideman&view=jobitems&filter_job_id=<?php echo JDom::_('html.fly', array('dataKey' => 'id','dataObject' => $row));?>"><i class='far fa-tasks fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_SEE_DETAILS'); ?></a></li>
								<li class="divider"></li>
								<li><a href="index.php?option=com_guideman&view=jobitemsitem&layout=jobitemsitem&filter_job_id=<?php echo JDom::_('html.fly', array('dataKey' => 'id','dataObject' => $row));?>"><i class='far fa-folder-open fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_ADD_SERVICE'); ?></a></li>
								<li><a href="index.php?option=com_guideman&view=jobitemsitem&layout=hotel&filter_job_id=<?php echo JDom::_('html.fly', array('dataKey' => 'id','dataObject' => $row));?>"><i class='far fa-bed fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_ADD_HOTEL'); ?></a></li>
								<li><a href="index.php?option=com_guideman&view=jobitemsitem&layout=restaurant&filter_job_id=<?php echo JDom::_('html.fly', array('dataKey' => 'id','dataObject' => $row));?>"><i class='far fa-utensils fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_ADD_RESTAURANT'); ?></a></li>
								<li><a href="index.php?option=com_guideman&view=jobitemsitem&layout=attraction&filter_job_id=<?php echo JDom::_('html.fly', array('dataKey' => 'id','dataObject' => $row));?>"><i class='far fa-map-pin fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_ADD_ATTRACTION'); ?></a></li>
						  </ul>
						</div>
					</font>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_company_id_nationality_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_company_id_name',
						'dataObject' => $row,
						'modalHeight' => 500,
						'modalWidth' => 600,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->company_id),
						'target' => 'modal'
					));?>
					</br>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'company_id',
						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_company_id_surname',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_client_id_nationality_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_client_id_name',
						'dataObject' => $row,
						'modalHeight' => 500,
						'modalWidth' => 600,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->client_id),
						'target' => 'modal'
					));?>
					</br>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'client_id',
						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
					<?php echo ' ' . JDom::_('html.fly', array(
						'dataKey' => '_client_id_surname',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_requested_language_flag','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_requested_language_name',
						'dataObject' => $row
					));?>
					</br>
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_second_language_option_flag','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_second_language_option_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_operator_name_nationality_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_operator_name_name',
						'dataObject' => $row,
						'modalHeight' => 500,
						'modalWidth' => 600,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->operator_name),
						'target' => 'modal')) . ' ' . JDom::_('html.fly', array('dataKey' => '_operator_name_surname','dataObject' => $row));?>
					</br>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'operator_name',

						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
					<?php echo JDom::_('html.fly', array('dataKey' => '_operator_name_alias','dataObject' => $row));?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_main_guide_nationality_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_main_guide_name',
						'dataObject' => $row,
						'modalHeight' => 500,
						'modalWidth' => 600,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->main_guide),
						'target' => 'modal'
					)) . ' ' . JDom::_('html.fly', array('dataKey' => '_main_guide_surname','dataObject' => $row));?>
				</br>
					<?php echo JDom::_('html.grid.bool', array(
						'commandAcl' => array('core.edit.own', 'core.edit'),
						'ctrl' => 'jobsitem',
						'dataKey' => 'coordination',
						'dataObject' => $row,
						'num' => $i,
						'taskYes' => 'toggle_coordination',
						'viewType' => 'icon'
					));?>
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'guide_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelper::enumList('jobs', 'guide_status'),
						'listKey' => 'value'
					));?>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'main_guide',
						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_main_guide_alias',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_trip_leader_name',
						'dataObject' => $row
					));?>
					<?php echo ' ' . JDom::_('html.fly', array(
						'dataKey' => '_trip_leader_surname',
						'dataObject' => $row
					));?>
					</br>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'trip_leader',
						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
					<?php echo ' ' . JDom::_('html.fly', array(
						'dataKey' => '_trip_leader_alias',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'pax',
						'dataObject' => $row,
						'domClass' => 'badge badge-success'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'start_date',
						'dataObject' => $row,
						'dateFormat' => 'd/m/Y'
					));?>
					</br>
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'end_date',
						'dataObject' => $row,
						'dateFormat' => 'd/m/Y'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'remunerations',
						'dataObject' => $row,
						'domClass' => 'badge  badge-info'
					));?>
					<?php echo ' ' . JDom::_('html.fly', array(
						'dataKey' => '_remunerations_name',
						'dataObject' => $row
					));?>
				</br>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'invoicing',
						'dataObject' => $row,
						'domClass' => 'badge  badge-info'
					));?>
					<?php echo ' ' . JDom::_('html.fly', array(
						'dataKey' => '_invoicing_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly.decimal', array('dataKey' => 'total_debet','dataObject' => $row,'decimals' => 2));?>
				</br>
					<?php echo JDom::_('html.fly.decimal', array('dataKey' => 'total_credit','dataObject' => $row,'decimals' => 2));?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center" width="1%">
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'jobs',
						'dataKey' => 'published',
						'dataObject' => $row,
						'num' => $i
					));?>
				</td>
				<?php endif; ?>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'id',
						'dataObject' => $row,
						'domClass' => 'badge badge-inverse'
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

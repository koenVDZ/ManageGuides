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

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.status', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_FILE_NUMBER", 'a.file_number', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:right">
					<?php echo JText::_("GUIDEMAN_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_COMPANY_NAME_1"); ?>
				</th>

				<th class="badge  badge-warning" style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_ID"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_OFFICIAL_NAME"); ?>
				</th>

				<th style="text-align:right">
					<?php echo JText::_("GUIDEMAN_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_CLIENT_NAME", 'client_id.name', $listDirn, $listOrder ); ?>
				</th>

				<th class="badge  badge-warning" style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.client_id', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_OFFICIAL_NAME", 'client_id.surname', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:right">
					<?php echo JText::_("GUIDEMAN_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:center" width="20px">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TOUR_LANG", 'requested_language.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_BACKUP_LANGUAGE", 'second_language_option.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_FLAG", 'operator_name.nationality.iso_2', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_OPERATER_NAME", 'operator_name.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SURNAME", 'operator_name.surname', $listDirn, $listOrder ); ?>
				</th>

				<th class="badge  badge-warning" style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.operator_name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ALIAS", 'operator_name.alias', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.guide_status', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_MAIN_GUIDE", 'main_guide.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_SURNAME"); ?>
				</th>

				<th class="badge  badge-warning" style="text-align:center" width="5px">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.main_guide', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ALIAS", 'main_guide.alias', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:right">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_PAX", 'a.pax', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_START_DATE", 'a.start_date', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_END_DATE", 'a.end_date', $listDirn, $listOrder ); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATE", 'a.published', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th class="badge badge-warning" style="text-align:center">

				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TRIP_LEADER_NAME", 'trip_leader.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SURNAME", 'trip_leader.surname', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left" width="5px">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.trip_leader', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ALIAS", 'trip_leader.alias', $listDirn, $listOrder ); ?>
				</th>

				<th class="badge  badge-info" style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.remunerations', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_REMUNERATION", 'remunerations.name', $listDirn, $listOrder ); ?>
				</th>

				<th class="badge  badge-info" style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.invoicing', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_PRICING", 'invoicing.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TOTAL_DEBET", 'a.total_debet', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TOTAL_CREDIT", 'a.total_credit', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_COORDINATION", 'a.coordination', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_JTOOLBAR_CHANGE_STATUS_2_CONFIRMED"); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			?>

			<tr class="<?php echo "row$k"; ?>" sortable-group-id="<?php echo $row->company_id; ?>">
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

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('jobs_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'file_number',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_company_id_nationality_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_company_id_name',
						'dataObject' => $row,
						'modalHeight' => 400,
						'modalWidth' => 500,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->company_id),
						'target' => 'modal'
					));?>
				</td>

				<td class="badge  badge-warning" style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'company_id',
						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_company_id_surname',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_client_id_nationality_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_client_id_name',
						'dataObject' => $row,
						'modalHeight' => 400,
						'modalWidth' => 500,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->client_id),
						'target' => 'modal'
					));?>
				</td>

				<td class="badge  badge-warning" style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'client_id',
						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_client_id_surname',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_requested_language_flag',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center" width="20px">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_requested_language_name',
						'dataObject' => $row,
						'modalHeight' => 500,
						'modalWidth' => 400,
						'target' => 'modal'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_second_language_option_flag',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_second_language_option_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_operator_name_nationality_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_operator_name_name',
						'dataObject' => $row,
						'modalHeight' => 400,
						'modalWidth' => 500,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->operator_name),
						'target' => 'modal'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_operator_name_surname',
						'dataObject' => $row
					));?>
				</td>

				<td class="badge  badge-warning" style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'operator_name',
						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_operator_name_alias',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'guide_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('jobs_guide_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_main_guide_nationality_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_main_guide_name',
						'dataObject' => $row,
						'modalHeight' => 400,
						'modalWidth' => 500,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->main_guide),
						'target' => 'modal'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_main_guide_surname',
						'dataObject' => $row
					));?>
				</td>

				<td class="badge  badge-warning" style="text-align:center" width="5px">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'main_guide',
						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_main_guide_alias',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'pax',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'start_date',
						'dataObject' => $row,
						'dateFormat' => 'dd/mm/YYYY'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'end_date',
						'dataObject' => $row,
						'dateFormat' => 'dd/mm/YYYY'
					));?>
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

				<td class="badge badge-warning" style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'id',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_trip_leader_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_trip_leader_surname',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left" width="5px">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'trip_leader',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_trip_leader_alias',
						'dataObject' => $row
					));?>
				</td>

				<td class="badge  badge-info" style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'remunerations',
						'dataObject' => $row,
						'domClass' => 'badge  badge-info'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_remunerations_name',
						'dataObject' => $row
					));?>
				</td>

				<td class="badge  badge-info" style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'invoicing',
						'dataObject' => $row,
						'domClass' => 'badge  badge-info'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_invoicing_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.decimal', array(
						'dataKey' => 'total_debet',
						'dataObject' => $row,
						'decimals' => 2
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.decimal', array(
						'dataKey' => 'total_credit',
						'dataObject' => $row,
						'decimals' => 2
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.grid.bool', array(
						'commandAcl' => array('core.edit.own', 'core.edit'),
						'ctrl' => 'jobsitem',
						'dataKey' => 'coordination',
						'dataObject' => $row,
						'num' => $i,
						'taskYes' => 'toggle_coordination',
						'togglable' => true,
						'viewType' => 'icon'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.grid.task', array(
						'label' => 'GUIDEMAN_JTOOLBAR_CHANGE_STATUS_2_CONFIRMED',
						'num' => $i,
						'task' => 'jobsitem.custom',
						'viewType' => 'text'
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
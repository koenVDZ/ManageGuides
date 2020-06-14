<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Job Items
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
	'domId' => 'grid-jobitems',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'jobitems',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="">
	<table class='table' id='grid-jobitems'>
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

				<th>

				</th>

				<?php if ($model->canEditState()): ?>
				<th class="center hidden-xs" style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TYPE", 'a.type', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.item_status', $listDirn, $listOrder ); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATE", 'a.published', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_FLAG", 'job_id.company_id.nationality.iso_2', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_COMPANY", 'job_id.company_id.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_START_DATE", 'a.start_date', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:right">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_START_TIME", 'a.start_time', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_END_DATE", 'a.end_date', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:right">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_END_TIME", 'a.end_time', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SERVICE", 'service.service_name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_PAX", 'a.pax', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.service_provider_status', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_FLAG", 'service_provider.nationality.iso_2', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SERVICE_PROVIDER", 'service_provider.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.guide_status', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_GUIDE_NAME", 'guide.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SURNAME", 'guide.surname', $listDirn, $listOrder ); ?>
				</th>

				<th class="badge  badge-warning" style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.guide', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ALIAS", 'guide.alias', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.transport_status', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TRANSPORT_COMPANY", 'transport.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_FLAG", 'driver.nationality.iso_2', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_DRIVER_NAME", 'driver.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SURNAME", 'driver.surname', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ALIAS", 'driver.alias', $listDirn, $listOrder ); ?>
				</th>

				<th class="badge  badge-warning" style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.driver', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'job_id.status', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">

				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_REMARK", 'a.remark', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_JOBID", 'a.job_id', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_REMUNARATIONCURRENCYID"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_REMUNARATIONCURRENCYSYMBOL"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TOTAL_DEBET", 'a.total_debet', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_COSTSCURRENCYID"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_COTSSYMBOL"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TOTAL_CREDIT", 'a.total_credit', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_OPTIONAL_1", 'a.optional', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_SERVICE_DURATION"); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			?>

			<tr class="<?php echo "row$k"; ?>">
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

				<td>
					<div class="btn-group">
						<?php echo JDom::_('html.grid.task', array(
							'label' => 'GUIDEMAN_JTOOLBAR_GUIDE_CONFIRMED',
							'num' => $i,
							'task' => 'jobitemsitem.custom'
						));?>
					</div>
				</td>

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
						'dataKey' => 'type',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('jobitems_type'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'item_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('jobitems_item_status'),
						'listKey' => 'value'
					));?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center">
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'jobitems',
						'dataKey' => 'published',
						'dataObject' => $row,
						'num' => $i
					));?>
				</td>
				<?php endif; ?>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_job_id_company_id_nationality_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_job_id_company_id_name',
						'dataObject' => $row,
						'modalHeight' => 400,
						'modalWidth' => 500,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->_job_id_company_id),
						'target' => 'modal'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'start_date',
						'dataObject' => $row,
						'dateFormat' => 'D d M Y'
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'start_time',
						'dataObject' => $row,
						'dateFormat' => 'H:i'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'end_date',
						'dataObject' => $row,
						'dateFormat' => 'D d M Y'
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'end_time',
						'dataObject' => $row,
						'dateFormat' => 'H:i'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_service_service_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'pax',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'service_provider_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('jobitems_service_provider_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_service_provider_nationality_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_service_provider_name',
						'dataObject' => $row,
						'modalHeight' => 400,
						'modalWidth' => 500,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->service_provider),
						'target' => 'modal'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'guide_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('jobitems_guide_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_guide_nationality_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_guide_name',
						'dataObject' => $row,
						'modalHeight' => 400,
						'modalWidth' => 500,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->guide),
						'target' => 'modal'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_guide_surname',
						'dataObject' => $row
					));?>
				</td>

				<td class="badge  badge-warning" style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'guide',
						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_guide_alias',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'transport_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('jobitems_transport_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_transport_nationality_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_transport_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_driver_nationality_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_driver_name',
						'dataObject' => $row,
						'modalHeight' => 400,
						'modalWidth' => 500,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $row->driver),
						'target' => 'modal'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_driver_surname',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_driver_alias',
						'dataObject' => $row
					));?>
				</td>

				<td class="badge  badge-warning" style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'driver',
						'dataObject' => $row,
						'domClass' => 'badge  badge-warning'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => '_job_id_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('jobs_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'id',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'remark',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'job_id',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_service_remunaration_currency',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_service_remunaration_currency_symbol',
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
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_service_costs_currency',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_service_costs_currency_symbol',
						'dataObject' => $row
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
						'ctrl' => 'jobitemsitem',
						'dataKey' => 'optional',
						'dataObject' => $row,
						'num' => $i,
						'taskYes' => 'toggle_optional',
						'togglable' => true,
						'viewType' => 'icon'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => '_service_duration',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('services_duration'),
						'listKey' => 'value'
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
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
* @subpackage	Services
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


JHtml::addIncludePath(JPATH_ADMIN_GUIDEADM.'/helpers/html');
JHtml::_('behavior.tooltip');
//JHtml::_('behavior.multiselect');

$model		= $this->model;
$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$saveOrder	= $listOrder == 'a.ordering' && $listDirn != 'desc';
JDom::_('framework.sortablelist', array(
	'domId' => 'grid-services',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'services',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="">
	<table class='table' id='grid-services'>
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
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_COMPANY"); ?>
				</th>

				<th style="text-align:center">

				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_INTERNAL_SERVICE_ID", 'a.internal_service_id', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_SERVICE_NAME", 'a.service_name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_DURATION", 'a.duration', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_PRIVATE_TOUR", 'a.private_tour', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_ENTRANCE_FEES", 'a.entrance_fees', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_KID_FRIENDLY", 'a.kid_friendly', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_DISABLED_FRIENDLY", 'a.disabled_friendly', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:right">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_MINPAX", 'a.min_pax', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:right" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_MAXPAX", 'a.max_pax', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_ACTIVITY_LEVEL", 'a.activity_level', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_COUNTRY_ISO_2", '_country_.iso_2', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_COUNTRY_COUNTRY_NAME", '_country_.country_name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_STATE_FLAG"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_STATE_STATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_ID", 'a.remunaration', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_REMUNARATION", '_remunaration_.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_ID", 'a.costs', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_SALES", '_costs_.name', $listDirn, $listOrder ); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_STATE", 'a.published', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th class="badge badge-warning" style="text-align:center">

				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION_GROUPER"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION_NAME"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION_HOURLY_RATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION_MIN_TIME"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION_FROM_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION_UNTIL_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION_REMUNERATION"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION_REMARK"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION_PAX_01"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMUNARATION_PAX_02"); ?>
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

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_company_nationality_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_company_name',
						'dataObject' => $row
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
						'dataKey' => 'internal_service_id',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_country_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'service_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center" width="5%">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'duration',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuideadmHelperEnum::_('services_duration'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center" width="5%">
					<?php echo JDom::_('html.grid.bool', array(
						'commandAcl' => array('core.edit.own', 'core.edit'),
						'ctrl' => 'service',
						'dataKey' => 'private_tour',
						'dataObject' => $row,
						'num' => $i,
						'taskYes' => 'toggle_private_tour',
						'viewType' => 'icon'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.grid.bool', array(
						'commandAcl' => array('core.edit.own', 'core.edit'),
						'ctrl' => 'service',
						'dataKey' => 'entrance_fees',
						'dataObject' => $row,
						'num' => $i,
						'taskYes' => 'toggle_entrance_fees',
						'viewType' => 'icon'
					));?>
				</td>

				<td style="text-align:center" width="5%">
					<?php echo JDom::_('html.grid.bool', array(
						'commandAcl' => array('core.edit.own', 'core.edit'),
						'ctrl' => 'service',
						'dataKey' => 'kid_friendly',
						'dataObject' => $row,
						'num' => $i,
						'taskYes' => 'toggle_kid_friendly',
						'viewType' => 'icon'
					));?>
				</td>

				<td style="text-align:center" width="5%">
					<?php echo JDom::_('html.grid.bool', array(
						'commandAcl' => array('core.edit.own', 'core.edit'),
						'ctrl' => 'service',
						'dataKey' => 'disabled_friendly',
						'dataObject' => $row,
						'num' => $i,
						'taskYes' => 'toggle_disabled_friendly',
						'viewType' => 'icon'
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'min_pax',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:right" width="5%">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'max_pax',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'activity_level',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuideadmHelperEnum::_('services_activity_level'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_country_iso_2',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_country_country_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.file', array(
						'dataKey' => '_state_flag',
						'dataObject' => $row,
						'height' => 'auto',
						'indirect' => false,
						'root' => '[DIR_STATES_FLAG]',
						'width' => 'auto'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_state_state',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'remunaration',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_remunaration_name',
						'dataObject' => $row,
						'modalHeight' => 500,
						'modalWidth' => 600,
						'target' => 'modal'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'costs',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_costs_name',
						'dataObject' => $row,
						'modalHeight' => 500,
						'modalWidth' => 600,
						'target' => 'modal'
					));?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center" width="1%">
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'services',
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

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'remunaration',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_remunaration_grouper',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_remunaration_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => '_remunaration_hourly_rate',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuideadmHelperEnum::_('prices_hourly_rate'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => '_remunaration_min_time',
						'dataObject' => $row,
						'dateFormat' => 'H:i'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => '_remunaration_from_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-Y'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => '_remunaration_until_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-Y'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.grid.bool', array(
						'dataKey' => '_remunaration_remuneration',
						'dataObject' => $row,
						'viewType' => 'icon'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_remunaration_remark',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_remunaration_pax_01',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_remunaration_pax_02',
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
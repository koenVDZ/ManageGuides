<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V2.9.2   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.5.0
* @package		GuideMan
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
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_COMPANY"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SERVICE_NAME_1", 'a.service_name', $listDirn, $listOrder ); ?>
					<?php echo '[' . JText::_("GUIDEMAN_FIELD_INTERNAL_SERVICE_ID") . ']'; ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_AREA_OF_OPERATION"); ?>
				</th>

				<th style="text-align:center" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_DURATION", 'a.duration', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_PRIVATE_TOUR", 'a.private_tour', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ENTRANCE_FEES", 'a.entrance_fees', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_KID_FRIENDLY", 'a.kid_friendly', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_DISABLED_FRIENDLY", 'a.disabled_friendly', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:right">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_MINPAX", 'a.min_pax', $listDirn, $listOrder ); ?>
					</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_MAXPAX", 'a.max_pax', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ACTIVITY_LEVEL", 'a.activity_level', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_REMUNARATION_NAME") . ' [' . JText::_("GUIDEMAN_FIELD_ID") . ']'; ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_COSTS_NAME") . ' [' . JText::_("GUIDEMAN_FIELD_ID") . ']'; ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATE", 'a.published', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_ID"); ?>
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
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_company_nationality_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array('dataKey' => '_company_name','dataObject' => $row));?>
				</td>

				<td style="text-align:left">
					<?php if (JDom::_('html.fly', array('dataKey' => 'internal_service_id','dataObject' => $row)) != NULL) {echo JDom::_('html.fly', array('dataKey' => 'internal_service_id','dataObject' => $row,'domClass' => 'label label-warning'));}?>
					<?php echo JDom::_('html.fly', array('dataKey' => 'service_name','dataObject' => $row));?>
					</br>
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_country_iso_2','dataObject' => $row)));?>"></span>
					<?php
						echo JDom::_('html.fly', array('dataKey' => '_country_country_name','dataObject' => $row));
						if ((JDom::_('html.fly', array('dataKey' => '_country_country_name','dataObject' => $row)) != NULL) and (JDom::_('html.fly', array('dataKey' => '_state_state','dataObject' => $row)) != NULL)) {echo ', ';}
				 		echo JDom::_('html.fly', array('dataKey' => '_state_state','dataObject' => $row));
					?>
				</td>

				<td style="text-align:center" width="5%">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'duration',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelper::enumList('services', 'duration'),
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
					<?php echo JDom::_('html.fly', array('dataKey' => 'min_pax','dataObject' => $row,'domClass' => 'badge badge-success'));?>
					</br>
					<?php echo JDom::_('html.fly', array('dataKey' => 'max_pax','dataObject' => $row,'domClass' => 'badge badge-info'));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'activity_level',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelper::enumList('services', 'activity_level'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array('dataKey' => '_remunaration_name','dataObject' => $row));?>
					<?php echo JDom::_('html.fly', array('dataKey' => 'remunaration','dataObject' => $row,'domClass' => 'badge'));?>
					</br>
					<?php echo JDom::_('html.fly', array('dataKey' => '_costs_name','dataObject' => $row));?>
					<?php echo JDom::_('html.fly', array('dataKey' => 'costs','dataObject' => $row,'domClass' => 'badge'));?>
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

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array('dataKey' => 'id','dataObject' => $row,'domClass' => 'badge badge-inverse'));?>
				</td>

			</tr>
			<?php
			$k = 1 - $k;
		endfor;
		?>
		</tbody>
	</table>
</div>

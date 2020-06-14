<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
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

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center" width="30px">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_FILE_NAME", 'job_id.file_name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_TYPE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_ITEM_STATUS"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_START_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_START_TIME"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_END_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_END_TIME"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEADM_FIELD_COMPANY"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_REMARK"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_COMPANY", 'service_provider.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_STATUS"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_GUIDE", 'guide.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_GUIDE_STATUS"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_OPTIONAL"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_TRANSPORT", 'transport.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_TRANSPORT_STATUS"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEADM_FIELD_DRIVER"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_PAX"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_TOTAL_DEBET"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_TOTAL_CREDIT"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_CREATION_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_CREATED_BY"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_MODIFICATION_DATE"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEADM_FIELD_MODIFIED_BY"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_MY_JOOMLA_ACCESS_TITLE"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_JOOMLA_USER", 'my_joomla_user.name', $listDirn, $listOrder ); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center" width="30px">
					<?php echo JText::_("GUIDEADM_FIELD_ID"); ?>
				</th>
				<?php endif; ?>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			?>
			<?php
			//Group results on : Job ID > File Number
			if (!isset($group_job_id) || ($row->job_id != $group_job_id)):?>
			<tr>
				<th colspan="31" class='grid-group grid-group-1'>
					<span>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => '_job_id_file_number',
							'dataObject' => $row
						));?>
					</span>
				</th>
			</tr>
			<?php
			$group_job_id = $row->job_id;
			$k = 0;
			endif; ?>
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

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center" width="30px">
					<?php echo JDom::_('html.grid.ordering', array(
						'aclAccess' => 'core.edit.state',
						'dataKey' => 'ordering',
						'dataObject' => $row,
						'enabled' => $saveOrder
					));?>
				</td>
				<?php endif; ?>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_job_id_file_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'type',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuideadmHelperEnum::_('jobitems_type'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'item_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuideadmHelperEnum::_('jobitems_item_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'start_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-y'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'start_time',
						'dataObject' => $row,
						'dateFormat' => 'H:i'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'end_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-y'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'end_time',
						'dataObject' => $row,
						'dateFormat' => 'H:i'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_service_company',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'remark',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_service_provider_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'service_provider_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuideadmHelperEnum::_('jobitems_service_provider_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_guide_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'guide_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuideadmHelperEnum::_('jobitems_guide_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.bool', array(
						'dataKey' => 'optional',
						'dataObject' => $row,
						'togglable' => false,
						'viewType' => 'icon'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_transport_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'transport_status',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuideadmHelperEnum::_('jobitems_transport_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_driver_name',
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
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'creation_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-y'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_created_by_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'modification_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-y'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_modified_by_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_my_joomla_access_title',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_my_joomla_user_name',
						'dataObject' => $row
					));?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center" width="30px">
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'jobitems',
						'dataKey' => 'published',
						'dataObject' => $row,
						'num' => $i
					));?>
				</td>
				<?php endif; ?>
			</tr>
			<?php
			$k = 1 - $k;
		endfor;
		?>
		</tbody>
	</table>
</div>
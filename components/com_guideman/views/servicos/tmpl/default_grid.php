<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Servicos
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
	'domId' => 'grid-servicos',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'servicos',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="">
	<table class='table' id='grid-servicos'>
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

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_INTERNAL_SERVICE_ID_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_SERVICE_NAME"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_PRIVATE_TOUR_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_ENTRANCE_FEES_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_DURATION"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_COMPANY"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_MEALS"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_DESCRIPTION"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_COUNTRY_COUNTRY_NAME"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_STATE_STATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_KID_FRIENDLY_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_KID_COMMENT_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_DISABLED_FRIENDLY_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_DISABLED_COMMENT_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_ACTIVITY_LEVEL_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_ACTIVITY_COMMENT_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_MIN_PAX_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_MAX_PAX_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_VISITS"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_REMUNARATION"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_COSTS"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_POLICY_NAME_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_IMAGE_01"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_IMAGE_02"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_IMAGE_03"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_IMAGE_04"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_IMAGE_05"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_CREATED_BY_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_CREATION_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_MODIFIED_BY_1"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_MODIFICATION_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_HITS"); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_PUBLISHED"); ?>
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

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'internal_service_id',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'service_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'private_tour',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'entrance_fees',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'duration',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'company',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'meals',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'description',
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
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_state_state',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'kid_friendly',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'kid_comment',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'disabled_friendly',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'disabled_comment',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'activity_level',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'activity_comment',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'min_pax',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'max_pax',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'visits',
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
						'dataKey' => 'costs',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_policy_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'image_01',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'image_02',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'image_03',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'image_04',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'image_05',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'created_by',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'creation_date',
						'dataObject' => $row,
						'dateFormat' => 'Y-m-d H:i'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'modified_by',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'modification_date',
						'dataObject' => $row,
						'dateFormat' => 'Y-m-d H:i'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'hits',
						'dataObject' => $row
					));?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center">
					<?php echo JDom::_('html.grid.ordering', array(
						'aclAccess' => 'core.edit.state',
						'dataKey' => 'ordering',
						'dataObject' => $row,
						'enabled' => $saveOrder
					));?>
				</td>
				<?php endif; ?>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center">
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'servicos',
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
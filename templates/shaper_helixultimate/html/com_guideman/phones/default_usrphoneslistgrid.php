<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Contacts
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
	'domId' => 'grid-phones',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'phones',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="row">
	<table class='table table-sm' id='grid-phones'>
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
					<?php echo JText::_("GUIDEMAN_HEADING_ORDERING"); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center" width="1%">
					<?php echo JText::_("GUIDEMAN_FIELD_DEFAULT_PHONE"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_PHONE_LABEL"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_NUMBER"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_OPERATOR"); ?>
				</th>

			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			//Group results on : User ID > Name
			if (!isset($group_user_id) || ($row->user_id != $group_user_id)):?>
			<tr>
				<th colspan="6" class='grid-group grid-group-1'>
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

			// KOEN 02/04/17
			$DefaultPhoneBool = JDom::_('html.fly', array('dataKey' => 'default_phone','dataObject' => $row));

			if ($DefaultPhoneBool == 1 ) : ?>
				<tr class="table-success <?php echo " row$k"; ?>" sortable-group-id="<?php echo $row->user_id; ?>">
			<?php else : ?>
				<tr class="<?php  echo "row$k"; ?>" sortable-group-id="<?php echo $row->user_id; ?>">
			<?php endif;
			// KOEN 02/04/17?>
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

				</td>
				<td style="text-align:center" width="1%">
					<?php if ($DefaultPhoneBool == 1) : ?>
						<span class="fa-stack" style="font-size: 1em; color: #00ad52;">
						  <i class="fal fa-square fa-stack-1x"></i>
							<i class="fas fa-check fa-stack-1x" style="color:Tomato"></i>
						</span>
					<?php else : ?>
						<span style="font-size: 1em; color: Tomato;">
						  <i class="fal fa-square"></i>
						</span>
					<?php endif;?>
				</td>


				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_label_type',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_cdc_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_cdc_calling_code',
						'dataObject' => $row,
						'domClass' => 'label label-default'
					));?>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'number',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_operator_country_id_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_operator_operator',
						'dataObject' => $row
					));?>
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => '_operator_type',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('operators_type'),
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

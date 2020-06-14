<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
	'domId' => 'grid-contacts',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'contacts',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class=" mg_grid">
	<table class='table' id='grid-contacts'>
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

				<th class="mg_company_thumb" style="text-align:center" width="38px">
					<?php echo JText::_("GUIDEMAN_FIELD_LOGO"); ?>
				</th>

				<th class="flag-icon" style="text-align:center" width="25px">
					<?php echo JText::_("GUIDEMAN_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_COMPANY"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_OFFICIAL_NAME"); ?>
				</th>

				<th class="flag-icon" style="text-align:center" width="25px">
					<?php echo JText::_("GUIDEMAN_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_COUNTRY"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_STATE"); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_STATE"); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">

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
			//Group results on : Name
			if (!isset($group_name) || ($row->name != $group_name)):?>
			<tr>
				<th colspan="13" class='grid-group grid-group-1'>
					<span>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => 'name',
							'dataObject' => $row
						));?>
					</span>
				</th>
			</tr>
			<?php
			$group_name = $row->name;
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

				<td class="mg_company_thumb" style="text-align:center" width="38px">
					<?php echo JDom::_('html.fly.file', array(
						'altKey' => 'id',
						'attrs' => array('crop','fit'),
						'dataKey' => 'image',
						'dataObject' => $row,
						'domClass' => 'mg_company_thumb',
						'height' => 30,
						'indirect' => false,
						'root' => '[DIR_CONTACTS_IMAGE]',
						'titleKey' => 'id',
						'tooltip' => true,
						'width' => 'auto'
					));?>
				</td>

				<td class="flag-icon" style="text-align:center" width="25px">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_nationality_iso_2',
						'dataObject' => $row,
						'domClass' => 'flag-icon'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'name',
						'dataObject' => $row,
						'modalHeight' => 1000,
						'modalWidth' => 800,
						'route' => array('view' => 'contact','layout' => 'company','cid[]' => $row->id),
						'target' => 'modal'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'surname',
						'dataObject' => $row
					));?>
				</td>

				<td class="flag-icon" style="text-align:center" width="25px">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_country_id_iso_2',
						'dataObject' => $row,
						'domClass' => 'flag-icon'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_country_id_country_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_state_id_state',
						'dataObject' => $row
					));?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center" width="5%">
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'contacts',
						'dataKey' => 'published',
						'dataObject' => $row,
						'num' => $i
					));?>
				</td>
				<?php endif; ?>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'id',
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
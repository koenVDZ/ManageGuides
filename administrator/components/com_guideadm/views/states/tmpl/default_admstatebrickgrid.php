<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	States
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
	'domId' => 'grid-states',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'states',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="">
	<table class='table' id='grid-states'>
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
				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:right">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_COUNTRY_ID", 'a.country_id', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_COUNTRY", 'country_id.country_name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_STATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_ABBREVIATION"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_CAPITAL", 'a.capital', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:right">
					<?php echo JText::_("GUIDEADM_FIELD_FLAG"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEADM_FIELD_LANGUAGE"); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_PUBLISHED"); ?>
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
			//Group results on : Country ID > Country Name
			if (!isset($group_country_id) || ($row->country_id != $group_country_id)):?>
			<tr>
				<th colspan="15" class='grid-group grid-group-1'>
					<span>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => '_country_id_country_name',
							'dataObject' => $row
						));?>
					</span>
				</th>
			</tr>
			<?php
			$group_country_id = $row->country_id;
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
				<td style="text-align:center">
					<?php echo JDom::_('html.grid.ordering', array(
						'aclAccess' => 'core.edit.state',
						'dataKey' => 'ordering',
						'dataObject' => $row,
						'enabled' => $saveOrder
					));?>
				</td>
				<?php endif; ?>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.file', array(
						'attrs' => array('crop','fit','format:png'),
						'dataKey' => '_country_id_flag',
						'dataObject' => $row,
						'height' => 'auto',
						'indirect' => false,
						'root' => '[DIR_COUNTRIES_FLAG]',
						'width' => 40
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'country_id',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_country_id_country_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.file', array(
						'attrs' => array('crop','fit','format:png'),
						'dataKey' => 'flag',
						'dataObject' => $row,
						'height' => 'auto',
						'indirect' => false,
						'root' => '[DIR_STATES_FLAG]',
						'width' => 50
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'state',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'abbreviation',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'capital',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_language_image',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_language_title',
						'dataObject' => $row
					));?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center">
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'states',
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
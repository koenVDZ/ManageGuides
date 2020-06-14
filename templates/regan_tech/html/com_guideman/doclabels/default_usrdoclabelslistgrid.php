<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V2.8.3   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.4.0
* @package		GuideMan
* @subpackage	Doc Labels
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
	'domId' => 'grid-doclabels',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'doclabels',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="">
	<table class='table' id='grid-doclabels'>
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

				<th class="center hidden-xs" style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ORDER", 'a.doc_type_name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">

					<?php echo JText::_("GUIDEMAN_FIELD_DOC_TYPE_NAME"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_DOC_TYPE_LONG"); ?>
				</th>				
				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_COUNTRY", '_country_id_.country_name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_CREATED_BY"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_LABEL_LANGUAGE", '_language_.title', $listDirn, $listOrder ); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATE", 'a.published', $listDirn, $listOrder ); ?>
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
			//Group results on : Country ID > Country Name
			if (!isset($group_country_id) || ($row->country_id != $group_country_id)):?>
			<tr>
				<th colspan="14" class='grid-group grid-group-1'>
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

				<td class="center hidden-xs" style="text-align:center" width="1%">
					<?php echo JDom::_('html.grid.ordering', array(
						'aclAccess' => 'core.edit.state',
						'dataKey' => 'ordering',
						'dataObject' => $row,
						'domClass' => 'center hidden-xs',
						'enabled' => $saveOrder
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'doc_type_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'doc_type_long',
						'dataObject' => $row
					));?>
				</td>

				
				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_country_id_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array('dataKey' => '_country_id_country_name','dataObject' => $row,'target' => 'modal'));?>
				</td>

				<td style="text-align:left">
					<span class="label label-warning"><?php echo JDom::_('html.fly', array('dataKey' => 'created_by','dataObject' => $row));?></span> 
					<?php echo JDom::_('html.fly', array('dataKey' => '_created_by_name','dataObject' => $row));?>
					<?php echo "[" . JDom::_('html.fly', array('dataKey' => '_created_by_username','dataObject' => $row)) . "]";?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_language_image','dataObject' => $row)));?>"></span>
					<?php 
						if (!empty(JDom::_('html.fly', array('dataKey' => '_language_title','dataObject' => $row)))) 
						{
							echo JDom::_('html.fly', array('dataKey' => '_state_id_abbreviation','dataObject' => $row));
						}
						else {
							echo 'All Languages';
						}
						;
					?>
					<?php echo JDom::_('html.fly', array('dataKey' => '_language_title','dataObject' => $row));?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center" width="5%">
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'doclabels',
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
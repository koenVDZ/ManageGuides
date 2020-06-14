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
	'domId' => 'grid-addresslabels',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'addresslabels',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="row">
	<table class='table table-sm' id='grid-addresslabels'>
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

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TYPE", 'a.type', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_CREATED_BY", '_created_by_.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_LANGUAGE", '_language_.title', $listDirn, $listOrder ); ?>
				</th>

			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];
			// KOEN 02/04/17
			if ($model->canEditState()) {
				$StateColorArray = GuidemanHelperFilehelp::GetBackGroundColor(JDom::_('html.fly', array('ctrl' => 'contacts','dataKey' => 'published','dataObject' => $row,'num' => $i)));
			}
			else {
				$StateColorArray = array( "status" => "", "button" => "");
			}
			?>
			<?php
			//Group results on : Language > Title
			if (!isset($group_language) || ($row->language != $group_language)):?>
			<tr>
				<th colspan="5" class='grid-group grid-group-1'>
					<span>
						<?php if (JDom::_('html.fly', array('dataKey' => '_language_title','dataObject' => $row)) == ""): echo JText::_('JUNDEFINED');
						else:?>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => '_language_title',
							'dataObject' => $row
						)); endif;?>
					</span>
				</th>
			</tr>
			<?php
			$group_language = $row->language;
			$k = 0;
			endif;
			// KOEN 02/04/17

			if (!$StateColorArray ['status'] ) : ?>
				<tr class="<?php echo "row$k"; ?>">
			<?php else : ?>
				<tr class="<?php echo $StateColorArray ['status'] . ' ' . "row$k"; ?>">
			<?php endif;
			// KOEN 02/04/17 ?>
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
					<?php echo GuidemanHelperPermutations::IcomoonMenu(JDom::_('html.grid.ordering', array('aclAccess' => 'core.edit.state','dataKey' => 'ordering','dataObject' => $row,'enabled' => $saveOrder)));?>
				</td>
				<?php endif; ?>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'type',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<span class="badge badge-warning"><?php echo JDom::_('html.fly', array('dataKey' => 'created_by','dataObject' => $row));?></span>
					<?php echo JDom::_('html.fly', array('dataKey' => '_created_by_name','dataObject' => $row));?>
					<?php echo "[" . JDom::_('html.fly', array('dataKey' => '_created_by_username','dataObject' => $row)) . "]";?>
				</td>

				<td style="text-align:left">
					<?php $lang =  JDom::_('html.fly', array('dataKey' => '_language_image','dataObject' => $row));?>
					<?php $langtit = JDom::_('html.fly', array('dataKey' => '_language_title','dataObject' => $row));?>
					<?php echo $langtit ? JHtml::_('image', 'mod_languages/' . $lang . '.gif', $langtit, array('title' => $langtit), true) . '&nbsp;' . $this->escape($langtit) : JText::_('JUNDEFINED'); ?>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		endfor;
		?>
		</tbody>
	</table>
</div>

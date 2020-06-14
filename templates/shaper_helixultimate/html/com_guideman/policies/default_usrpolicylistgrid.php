<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.0
* @package		GuideMan
* @subpackage	Policies
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
	'domId' => 'grid-policies',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'policies',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="row-fluid">
	<table class='table table-sm' id='grid-policies'>
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
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_COMPANY", '_company_id_.name', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_CATEGORY", '_catid_.mgcat', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_POLICY_NAME", 'a.name', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_POLICY_LANGUAGE", '_language_.lang_code', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TIME_1", 'a.time_1', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_PERCENT_1", 'a.percent_1', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TIME_2", 'a.time_2', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_PERCENT_2", 'a.percent_2', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TIME_3", 'a.time_3', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_PERCENT_3", 'a.percent_3', $listDirn, $listOrder ); ?>
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
			//Group results on : Language > Title
			if (!isset($group_language) || ($row->language != $group_language)):?>
			<tr>
				<th colspan="23" class='grid-group grid-group-1'>
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
					<?php echo GuidemanHelperPermutations::IcomoonMenu(JDom::_('html.grid.ordering', array('aclAccess' => 'core.edit.state','dataKey' => 'ordering','dataObject' => $row,'enabled' => $saveOrder)));?>
				</td>
				<?php endif; ?>

				<td style="text-align:left">
					<?php if (JDom::_('html.fly', array('dataKey' => 'company_id','dataObject' => $row)) != 0): ?>
						<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_company_id_nationality_iso_2','dataObject' => $row)));?>"></span>
						<?php echo JDom::_('html.fly', array('dataKey' => '_company_id_name','dataObject' => $row));?>
						<span class='text-smaller'>
							<?php
								echo '['.JDom::_('html.fly', array('dataKey' => 'company_id','dataObject' => $row,'domClass' => 'badge badge-secondary'));
								echo JDom::_('html.fly', array('dataKey' => '_company_id_alias','dataObject' => $row)).']';
							endif; ?>
						</span>
				</br>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_catid_mgcat',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'name',
						'dataObject' => $row,
						'route' => array('view' => 'policy','layout' => 'policy','cid[]' => $row->id),
						'target' => '_self'
					));?>
					</br>
					<?php $lang =  JDom::_('html.fly', array('dataKey' => '_language_image','dataObject' => $row));?>
					<?php $langtit = JDom::_('html.fly', array('dataKey' => '_language_title','dataObject' => $row));?>
					<?php echo $langtit ? JHtml::_('image', 'mod_languages/' . $lang . '.gif', $langtit, array('title' => $langtit), true) . '&nbsp;' . $this->escape($langtit) : JText::_('JUNDEFINED'); ?>
				</td>

				<td style="text-align:center">
					<?php
						echo JDom::_('html.fly', array('dataKey' => 'time_1','dataObject' => $row));
						echo JText::_("GUIDEMAN_DAYS");
					?>
				</br>
					<?php
						echo JDom::_('html.fly', array('dataKey' => 'percent_1','dataObject' => $row,'decimals' => 2)).' %';
					?>
				</td>

				<td style="text-align:center">
					<?php
						echo JDom::_('html.fly', array('dataKey' => 'time_2','dataObject' => $row));
						echo JText::_("GUIDEMAN_DAYS");
					?>
				</br>
					<?php
						echo JDom::_('html.fly', array('dataKey' => 'percent_2','dataObject' => $row,'decimals' => 2)).' %';
					?>
				</td>

				<td style="text-align:center">
					<?php
						echo JDom::_('html.fly', array('dataKey' => 'time_3','dataObject' => $row));
						echo JText::_("GUIDEMAN_DAYS");
					?>
				</br>
					<?php echo JDom::_('html.fly.decimal', array('dataKey' => 'percent_3','dataObject' => $row,'decimals' => 2)).' %';?>
				</td>

				<?php $pub = JDom::_('html.fly', array('ctrl' => 'policies','dataKey' => 'published','dataObject' => $row,'num' => $i));?>
				<?php if ($model->canEditState()): ?>
					<?php echo GuidemanHelperPermutations::StateIcon($pub);?>
				<?php endif; ?>

			</tr>
			<?php
			$k = 1 - $k;
		endfor;
		?>
		</tbody>
	</table>
</div>

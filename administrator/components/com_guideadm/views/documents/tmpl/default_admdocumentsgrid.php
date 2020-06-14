<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Documents
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
	'domId' => 'grid-documents',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'documents',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="">
	<table class='table' id='grid-documents'>
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
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_CATEGORY", 'catid.MGcat', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_NAME", 'user_id.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEADM_FIELD_DOCUMENT_TYP", 'label_id.doc_type_name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_NUMBER"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_EMISSION_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_EXPIRATION_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_EMMISION"); ?>
				</th>

				<th style="text-align:center" width="60px">
					<?php echo JText::_("GUIDEADM_FIELD_RECTO"); ?>
				</th>

				<th style="text-align:center" width="60px">
					<?php echo JText::_("GUIDEADM_FIELD_VERSO"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_CREATION_DATE"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEADM_FIELD_CREATED_BY"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_MODIFICATION_DATE"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_MODIFIED_BY_NAME"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_VIEWLEVELS"); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEADM_FIELD_JOOMLA_USER"); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th style="text-align:center" width="30px">
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
			//Group results on : User ID > Name
			if (!isset($group_user_id) || ($row->user_id != $group_user_id)):?>
			<tr>
				<th colspan="21" class='grid-group grid-group-1'>
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
						'dataKey' => '_catid_MGcat',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_user_id_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_label_id_doc_type_name',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'number',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'emission_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-y'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'expiration_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-y'
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'emmision',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:center" width="60px">
					<?php echo JDom::_('html.fly.file', array(
						'attrs' => array('crop','fit','format:png'),
						'dataKey' => 'image',
						'dataObject' => $row,
						'height' => 'auto',
						'indirect' => false,
						'root' => '[DIR_DOCUMENTS_IMAGE]',
						'width' => 50
					));?>
				</td>

				<td style="text-align:center" width="60px">
					<?php echo JDom::_('html.fly.file', array(
						'attrs' => array('crop','fit','format:png'),
						'dataKey' => 'image2',
						'dataObject' => $row,
						'height' => 'auto',
						'indirect' => false,
						'root' => '[DIR_DOCUMENTS_IMAGE2]',
						'width' => 50
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'creation_date',
						'dataObject' => $row,
						'dateFormat' => 'd-m-y'
					));?>
				</td>

				<td style="text-align:left">
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

				<td style="text-align:center">
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

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_my_joomla_user_name',
						'dataObject' => $row
					));?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td style="text-align:center" width="30px">
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'documents',
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
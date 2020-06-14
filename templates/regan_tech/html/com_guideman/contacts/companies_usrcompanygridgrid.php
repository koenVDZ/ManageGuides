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
				<th class="center hidden-xs" style="text-align:center" width="5%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th class="mg_company_thumb" style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_LOGO"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_COMPANY"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_OFFICIAL_NAME"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_COUNTRY"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JText::_("GUIDEMAN_FIELD_STATE"); ?>
				</th>

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

			// KOEN 02/04/17
			if ($model->canEditState()) {
				$StateColorArray = GuidemanHelperFilehelp::GetBackGroundColor(JDom::_('html.fly', array('ctrl' => 'contacts','dataKey' => 'published','dataObject' => $row,'num' => $i)));
			}
			else {
				$StateColorArray = array( "status" => "", "button" => "");
			}
			?>
			<?php
			//Group results on : Category ID > MGCategory
			if (!isset($group_catid) || ($row->catid != $group_catid)):?>
			<tr>
				<th colspan="8" class='grid-group grid-group-1'>
					<span>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => '_catid_MGcat',
							'dataObject' => $row
						));?>
					</span>
				</th>
			</tr>
			<?php
			$group_catid = $row->catid;
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
				<td class="center hidden-xs" style="text-align:center" width="5%">
					<?php echo JDom::_('html.grid.ordering', array(
						'aclAccess' => 'core.edit.state',
						'dataKey' => 'ordering',
						'dataObject' => $row,
						'domClass' => 'center hidden-xs',
						'enabled' => $saveOrder
					));?>
				</td>
				<?php endif; ?>

				<td class="mg_company_thumb" style="text-align:center">
					<?php echo JDom::_('html.fly.file', array(

						'attrs' => array('crop','fit','format:png'),
						'dataKey' => 'image',
						'dataObject' => $row,
						'domClass' => 'mg_company_thumb',
						'height' => 30,
						'indirect' => false,
						'root' => '[DIR_CONTACTS_IMAGE]',


						'width' => 'auto'
					));?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_nationality_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'name',
						'dataObject' => $row,
					));?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_nationality_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'surname',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_country_id_iso_2','dataObject' => $row)));?>"></span>
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

				<td style="text-align:center">
					<span class="badge badge-inverse">
						<?php echo JDom::_('html.fly', array(
								'dataKey' => 'id',
								'dataObject' => $row
						));?>
					</span>
				</td>
			</tr>
			<?php
			$k = 1 - $k;
		endfor;
		?>
		</tbody>
	</table>
</div>
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V2.9.3   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.5.0
* @package		GuideMan
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

JHtml::addIncludePath(JPATH_ADMIN_GUIDEMAN.'/helpers/html');
JHtml::_('behavior.tooltip');
//JHtml::_('behavior.multiselect');

$model		= $this->model;
$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$saveOrder	= $listOrder == 'a.start_date' && $listDirn != 'asce';
JDom::_('framework.sortablelist', array(
	'domId' => 'grid-jobitems',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'jobitems',
	'proceedSaveOrderButton' => true,
));
// - - - - - - - - - - - - - - - - - - - - - -
// Prepare Job Order Information
// - - - - - - - - - - - - - - - - - - - - - -
$allthesame = TRUE;
if (!count( $this->items )) {
		$allthesame = FALSE;
}
for ($i=0, $n=count( $this->items ); $i < $n; $i++):
	$jobs_array = $this->items[$i];
	$idcounter [$i] = JDom::_('html.fly', array('dataKey' => 'job_id','dataObject' => $jobs_array));
	if ($i > 0) {
		if ($idcounter [$i] != $idcounter [$i - 1]) {
			$allthesame = FALSE;
		}
	}
endfor;
if ($allthesame == TRUE) {
	// Get Job Record
	$jobs_array = GuidemanHelperFilehelp::GetJob($idcounter [0]);
	switch ($jobs_array ['status']) {
		case '0':
			$statuscolor = "warning";
			$buttoncolor = "warning";
			break;
		case '1':
			$statuscolor = "success";
			$buttoncolor = "success";
			break;
		case '2':
			$statuscolor = "error";
			$buttoncolor = "danger";
			break;
		default:
			echo "";
		}
		// Get Company Info GuidemanHelperDates::explodeDate($remuneration_array ['night_shift'], 'H:i:s');
		$company = GuidemanHelperFilehelp::GetContact($jobs_array['company_id']);
		// Get Client Info
		$client = GuidemanHelperFilehelp::GetContact($jobs_array['client_id']);
		// Get Operator Info
		$operator = GuidemanHelperFilehelp::GetContact($jobs_array['operator_name']);
		// Get Guide Info
		$guide = GuidemanHelperFilehelp::GetContact($jobs_array['main_guide']);
		// Get tripleader Info
		$tripleader = GuidemanHelperFilehelp::GetContact($jobs_array['trip_leader']);
		// Get Language Info
		$lang1 = GuidemanHelperFilehelp::GetLanguage($jobs_array['requested_language']);
		$lang2 = GuidemanHelperFilehelp::GetLanguage($jobs_array['second_language_option']);
		?>
		<div class="alert alert-<?php echo $statuscolor ?>" role="alert">
			<div class="row-fluid">
				<div class="span12">
					<div class="span1">
						<div class="btn-group">
							<button class="btn btn-<?php echo $buttoncolor ?> btn-mini dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<?php echo $jobs_array['file_number'];?>
									</br>
									<?php
										switch ($jobs_array ['status']) {
											case '0':
												echo JText::_('GUIDEMAN_ENUM_JOBS_STATUS_PROPOSAL');
												break;
											case '1':
												echo JText::_('GUIDEMAN_ENUM_JOBS_STATUS_CONFIRMED');
												break;
											case '2':
												echo JText::_('GUIDEMAN_ENUM_JOBS_STATUS_CANCELED');
												break;
											default:
												echo "";
											}?> <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
						    <li><a href="index.php?option=com_guideman&view=jobitems&filter_job_id=<?php echo $idcounter [0]; ?>"><i class='far fa-tasks fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_SEE_DETAILS'); ?></a></li>
								<li><a href="index.php?option=com_guideman&view=jobitemsitem&layout=jobitemsitem&filter_job_id=<?php echo $idcounter [0]; ?>"><i class='far fa-folder-open fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_ADD_SERVICE'); ?></a></li>
								<li><a href="index.php?option=com_guideman&view=jobitemsitem&layout=hotel&filter_job_id=<?php echo $idcounter [0]; ?>"><i class='far fa-bed fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_ADD_HOTEL'); ?></a></li>
								<li><a href="index.php?option=com_guideman&view=jobitemsitem&layout=restaurant&filter_job_id=<?php echo $idcounter [0]; ?>"><i class='far fa-utensils fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_ADD_RESTAURANT'); ?></a></li>
								<li><a href="index.php?option=com_guideman&view=jobitemsitem&layout=attraction&filter_job_id=<?php echo $idcounter [0]; ?>"><i class='far fa-map-pin fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_ADD_ATTRACTION'); ?></a></li>
						  </ul>
						</div>
					</br>
						<i class='far fa-users fa-border'></i><span class="badge badge-info"><?php echo $jobs_array['pax'];?></span>
					</br>
						<i class='far fa-calendar fa-border'></i><?php echo $jobs_array['start_date'];?>
					</br>
						<i class='far fa-calendar fa-border'></i><?php echo $jobs_array['end_date'];?>
					</div>
					<div class="span2">
						<h4>
							<font color="black">
								<i class='far fa-building'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_COMPANY'); ?>
							</font>
						</h4>
							<strong>
								<?php echo $jobs_array['file_name'];?>
							</strong>
							<span class="badge">
								<?php echo $jobs_array['id'];?>
							</span>
						</br>
							<span class="flag-icon flag-icon-<?php echo GuidemanHelperFilehelp::GetFlag($jobs_array['company_id']);?>"></span> <strong><?php echo ' ' . $company['name'];?></strong>
						</br>
							<span class="badge badge-warning"><?php echo $company['id'];?></span><?php echo ' ' . $company['name'];?>
					</div>
					<div class="span2">
						<h4>
							<font color="black">
								<i class='far fa-user'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_CLIENT_NAME'); ?>
							</font>
						</h4>
							<span class="flag-icon flag-icon-<?php echo GuidemanHelperFilehelp::GetFlag($jobs_array['client_id']);?>"></span> <strong><?php echo ' ' . $client['name'];?></strong>
						</br>
						<span class="badge badge-warning"><?php echo $client['id'];?></span><?php echo ' ' . $client['name'];?>
						</br>
						<?php echo ' ' . JText::_('COM_GM_CLIENT_REFERENCE');?><span class="label label-<?php echo $buttoncolor ?>"><?php echo $jobs_array['client_reference'];?></span>
					</div>
					<div class="span2">
						<h4>
							<font color="black">
								<i class='far fa-user'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_OPERATER_NAME'); ?>
							</font>
						</h4>
							<span class="flag-icon flag-icon-<?php echo GuidemanHelperFilehelp::GetFlag($jobs_array['operator_name']);?>"></span> <strong><?php echo ' ' . $operator['name'] . ' ' . $operator['name'];?></strong>
						</br>
							<span class="badge badge-warning"><?php echo $operator['id'];?></span><?php echo ' ' . $operator['alias'];?>
					</div>
					<div class="span2">
						<h4>
							<font color="black">
								<i class='far fa-map-signs'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_MAIN_GUIDE'); ?>
								<?php if ($jobs_array['coordination'] == '1'): ?><i class='far fa-user-plus'></i><?php endif;?>
							</font>
						</h4>
							<span class="flag-icon flag-icon-<?php echo GuidemanHelperFilehelp::GetFlag($jobs_array['main_guide']);?>"></span> <strong><?php echo ' ' . $guide['name'] . ' ' . $guide['name'];?></strong>
						</br>
							<span class="badge badge-warning"><?php echo $guide['id'];?></span><?php echo ' ' . $guide['alias'];?>
						</br>
							<span class="label">
							<?php
							switch ($jobs_array ['guide_status']) {
								case '0':
									echo JText::_('GUIDEMAN_ENUM_JOBITEMS_GUIDE_STATUS_UNSOLICITED');
									break;
								case '1':
									echo JText::_('GUIDEMAN_ENUM_JOBITEMS_GUIDE_STATUS_REQUESTED');
									break;
								case '2':
									echo JText::_('GUIDEMAN_ENUM_JOBITEMS_GUIDE_STATUS_CONFIRMED');
									break;
								case '3':
									echo JText::_('GUIDEMAN_ENUM_JOBITEMS_GUIDE_STATUS_DENIED');
									break;
								case '4':
									echo JText::_('GUIDEMAN_ENUM_JOBITEMS_GUIDE_STATUS_CANCELED');
									break;
								default:
									echo "";
								}
							?>
						</span>
					</div>
					<div class="span2">
						<h4>
							<font color="black">
						<i class='far fa-map-signs'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_TRIP_LEADER_NAME'); ?>
					</font>
				</h4>
						<span class="flag-icon flag-icon-<?php echo GuidemanHelperFilehelp::GetFlag($jobs_array['trip_leader']);?>"></span> <strong><?php echo ' ' . $tripleader['name'] . ' ' . $tripleader['name'];?></strong>
						</br>
						<span class="badge badge-warning"><?php echo $tripleader['id'];?></span><?php echo ' ' . $tripleader['alias'];?>
					</div>
					<div class="span1">
						<h4>
							<font color="black">
						<i class='far fa-language'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_LANGUAGE'); ?>
					</font>
				</h4>
						<span class="flag-icon flag-icon-<?php echo strtolower($lang1['flag']);?>"></span> <strong><?php echo ' ' . $lang1['name'];?></strong>
						</br>
							<font color="black"><?php echo JText::_('GUIDEMAN_FIELD_BACKUP_LANGUAGE'); ?></font>
						</br>
						<span class="flag-icon flag-icon-<?php echo strtolower($lang2['flag']);?>"></span> <strong><?php echo ' ' . $lang2['name'];?></strong>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
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
				<th class="center hidden-xs" style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TYPE", 'a.type', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_COMPANY", '_job_id_company_id_.name', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.item_status', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_START_DATE", 'a.start_date', $listDirn, $listOrder ); ?>
				</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_END_DATE", 'a.end_date', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center" width="10px">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_START_TIME", 'a.start_time', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center" width="10px">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_END_TIME", 'a.end_time', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SERVICE", '_service_.service_name', $listDirn, $listOrder ); ?>
					</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_REMARK", 'a.remark', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_PAX", 'a.pax', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SERVICE_PROVIDER", '_service_provider_.name', $listDirn, $listOrder ); ?>
					</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.service_provider_status', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_GUIDE_NAME", '_guide_.name', $listDirn, $listOrder ); ?>
					<?php echo ' ' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_SURNAME", '_guide_.surname', $listDirn, $listOrder ); ?>
					</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.guide_status', $listDirn, $listOrder ); ?>
					<?php echo ' [' . JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.guide', $listDirn, $listOrder ) . ']'; ?>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ALIAS", '_guide_.alias', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_TRANSPORT_COMPANY", '_transport_.name', $listDirn, $listOrder ); ?>
					</br>
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_STATUS", 'a.transport_status', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_DRIVER_NAME", '_driver_.name', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:center">
					<?php echo JText::_("GUIDEMAN_FIELD_TOTAL_DEBET"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_TOTAL_CREDIT"); ?>
				</th>

				<?php if ($model->canEditState()): ?>
				<th>
					<?php echo JText::_("GUIDEMAN_FIELD_PUBLISHED"); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_ID", 'a.id', $listDirn, $listOrder ); ?>
				</th>

			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$jobs_array = $this->items[$i];
			switch (JDom::_('html.fly', array('dataKey' => 'item_status','dataObject' => $jobs_array,'labelKey' => 'text','list' => GuidemanHelper::enumList('jobitems', 'item_status'),'listKey' => 'value'))) {
				case 0:
					$stauscolor = "warning";
					break;
				case 1:
					$stauscolor = "success";
					break;
				case 2:
					$stauscolor = "error";
					break;
				default:
					echo "";
				}

			?>

			<tr class="<?php echo $stauscolor . ' ' . "row$k"; ?>">
				<?php if ($model->canSelect()): ?>
				<td>
					<?php if ($jobs_array->params->get('access-edit') || $jobs_array->params->get('tag-checkedout')): ?>
						<?php echo JDom::_('html.grid.checkedout', array(
													'dataObject' => $jobs_array,
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
						'dataObject' => $jobs_array,
						'domClass' => 'center hidden-xs',
						'enabled' => $saveOrder
					));?>
				</td>
				<?php endif; ?>
				<td style="text-align:center">
					<?php
					$typesymbol = "";
//					$ItemType = JDom::_('html.fly', array('dataKey' => 'type','dataObject' => $jobs_array,'labelKey' => 'text','list' => GuidemanHelper::enumList('jobitems', 'type'),'listKey' => 'value'));
//					echo "ItemType = " . $ItemType;
						switch (JDom::_('html.fly', array('dataKey' => 'type','dataObject' => $jobs_array,'labelKey' => 'text','list' => GuidemanHelper::enumList('jobitems', 'type'),'listKey' => 'value'))) {
						case 0:
							$typesymbol = "<i class='far fa-folder-open fa-2x fa-border'></i>";
							break;
						case 1:
							$typesymbol = "<i class='far fa-bed fa-2x fa-border'></i>";
							break;
						case 2:
							$typesymbol = "<i class='far fa-utensils fa-2x fa-border'></i>";
							break;
						case 3:
							$typesymbol = "<i class='far fa-map-pin fa-2x fa-border'></i>";
							break;
						case 4:
							$typesymbol = "<i class='far fa-plain fa-2x fa-border'></i>";
							break;
						case 5:
							$typesymbol = "<i class='far fa-ship fa-2x fa-border'></i>";
							break;
						case 6:
							$typesymbol = "<i class='far fa-train fa-2x fa-border'></i>";
							break;
						default:
							$typesymbol = "<i class='far fa-clock fa-2x fa-border'></i>";
						}
					?>
				<?php echo $typesymbol;?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_job_id_company_id_nationality_iso_2','dataObject' => $jobs_array)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_job_id_company_id_name',
						'dataObject' => $jobs_array,
						'modalHeight' => 500,
						'modalWidth' => 600,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $jobs_array->_job_id_company_id),
						'target' => 'modal'
					));?>
					</br>
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'item_status',
						'dataObject' => $jobs_array,
						'labelKey' => 'text',
						'list' => GuidemanHelper::enumList('jobitems', 'item_status'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly.datetime', array('dataKey' => 'start_date','dataObject' => $jobs_array,'dateFormat' => 'D d M Y'));?>
				</br>
					<?php if (JDom::_('html.fly.datetime', array('dataKey' => 'start_date','dataObject' => $jobs_array)) != JDom::_('html.fly.datetime', array('dataKey' => 'end_date','dataObject' => $jobs_array))): ?>
						<?php echo JDom::_('html.fly.datetime', array('dataKey' => 'end_date','dataObject' => $jobs_array,'dateFormat' => 'D d M Y'));?>
					<?php endif; ?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'start_time',
						'dataObject' => $jobs_array,
						'dateFormat' => 'H:i'
					));?>
				</br>
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => '_service_duration',
						'dataObject' => $jobs_array,
						'labelKey' => 'text',
						'list' => GuidemanHelper::enumList('services', 'duration'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly.datetime', array(
						'dataKey' => 'end_time',
						'dataObject' => $jobs_array,
						'dateFormat' => 'H:i'
					));?>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array('dataKey' => '_service_service_name','dataObject' => $jobs_array,'domClass' => 'strong'));?>
					</br>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'remark',
						'dataObject' => $jobs_array
					));?>
				</td>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'pax',
						'dataObject' => $jobs_array,
						'domClass' => 'badge badge-info'
					));?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_service_provider_nationality_iso_2','dataObject' => $jobs_array)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_service_provider_name',
						'dataObject' => $jobs_array,
						'modalHeight' => 500,
						'modalWidth' => 600,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $jobs_array->service_provider),
						'target' => 'modal'
					));?>
				</br>
					<?php if (JDom::_('html.fly', array('dataKey' => '_service_provider_name','dataObject' => $jobs_array)) != null): ?>
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'service_provider_status',
						'dataObject' => $jobs_array,
						'labelKey' => 'text',
						'list' => GuidemanHelper::enumList('jobitems', 'service_provider_status'),
						'listKey' => 'value'
					));?>
					<?php endif; ?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_guide_nationality_iso_2','dataObject' => $jobs_array)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_guide_name',
						'dataObject' => $jobs_array,
						'modalHeight' => 500,
						'modalWidth' => 600,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $jobs_array->guide),
						'target' => 'modal'
						)) . ' ' . JDom::_('html.fly', array('dataKey' => '_guide_surname','dataObject' => $jobs_array));
					?>
				</br>
					<?php if (JDom::_('html.fly', array('dataKey' => '_guide_name','dataObject' => $jobs_array)) != Null): ?>
					<?php echo JDom::_('html.fly.enum', array('dataKey' => 'guide_status','dataObject' => $jobs_array,'labelKey' => 'text','list' => GuidemanHelper::enumList('jobitems', 'guide_status'),'listKey' => 'value'));?>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_guide_alias',
						'dataObject' => $jobs_array
					));?>
				<?php endif; ?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_transport_nationality_iso_2','dataObject' => $jobs_array)));?>"></span>
					<?php echo JDom::_('html.fly', array('dataKey' => '_transport_name','dataObject' => $jobs_array));?>
				</br>
					<?php if (JDom::_('html.fly', array('dataKey' => '_transport_name','dataObject' => $jobs_array)) != null): ?>
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => 'transport_status',
						'dataObject' => $jobs_array,
						'labelKey' => 'text',
						'list' => GuidemanHelper::enumList('jobitems', 'transport_status'),
						'listKey' => 'value'
					));?>
				<?php endif; ?>
				</td>

				<td style="text-align:left">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_driver_nationality_iso_2','dataObject' => $jobs_array)));?>"></span>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_driver_name',
						'dataObject' => $jobs_array,
						'modalHeight' => 500,
						'modalWidth' => 600,
						'route' => array('view' => 'contact','layout' => 'contactall','cid[]' => $jobs_array->driver),
						'target' => 'modal'
						)) . ' ' . JDom::_('html.fly', array('dataKey' => '_driver_surname','dataObject' => $jobs_array));
					?>
				</br>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_driver_alias',
						'dataObject' => $jobs_array
					));?>
				</td>

				<td style="text-align:right">
					<?php echo JDom::_('html.fly', array('dataKey' => '_service_remunaration_currency_symbol','dataObject' => $jobs_array));?>
					<?php echo JDom::_('html.fly.decimal', array('dataKey' => 'total_debet','dataObject' => $jobs_array,'decimals' => 2));?>
				</br>
					<?php echo JDom::_('html.fly', array('dataKey' => '_service_costs_currency_symbol','dataObject' => $jobs_array));?>
					<?php echo JDom::_('html.fly.decimal', array('dataKey' => 'total_credit','dataObject' => $jobs_array,'decimals' => 2));?>
				</td>

				<?php if ($model->canEditState()): ?>
				<td>
					<?php echo JDom::_('html.grid.publish', array(
						'ctrl' => 'jobitems',
						'dataKey' => 'published',
						'dataObject' => $jobs_array,
						'num' => $i
					));?>
				</td>
				<?php endif; ?>

				<td style="text-align:center">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'id',
						'dataObject' => $jobs_array,
						'domClass' => 'badge badge-inverse'
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

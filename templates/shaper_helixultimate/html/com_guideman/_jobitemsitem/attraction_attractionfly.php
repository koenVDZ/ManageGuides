<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.2   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.6.1
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
$model = $this->getModel();
$item = $model->getItem();
// var_dump ($item);
// echo "</br> Jobid:";
// echo $item->job_id;
// Get Job Record
if ($item->job_id) {
	$jobs_array = GuidemanHelperFilehelp::GetJob($item->job_id);
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
		// Get Company Info
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
							<li><a href="index.php?option=com_guideman&view=jobitems&filter_job_id=<?php echo $item->job_id; ?>"><i class='fa fa-tasks fa-fw' aria-hidden='true'></i><?php echo ' ' . JText::_('COM_GM_ACTIONS_SEE_DETAILS'); ?></a></li>
						</ul>
					</div>
				</br>
					<i class='fa fa-users fa-border'></i><span class="badge badge-info"><?php echo $jobs_array['pax'];?></span>
				</br>
					<i class='fa fa-calendar fa-border'></i><?php echo JDom::_('html.fly.datetime', array('dataKey' => '_job_id_end_date','dataObject' => $this->item,'dateFormat' => 'D d M y'));?>
				</br>
					<i class='fa fa-calendar fa-border'></i><?php echo JDom::_('html.fly.datetime', array('dataKey' => '_job_id_start_date','dataObject' => $this->item,'dateFormat' => 'D d M y'));?>
				</div>

				<div class="span2">
					<strong>
						<span class="label label-<?php echo $buttoncolor ?>"><?php echo $jobs_array['file_name'];?></span>
					</strong>
					<span class="badge">
						<?php echo $jobs_array['id'];?>
					</span>
					<h5>
						<font color="black">
							<i class='fa fa-building'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_COMPANY'); ?>
						</font>
					</h5>
						<span class="flag-icon flag-icon-<?php echo GuidemanHelperFilehelp::GetFlag($jobs_array['company_id']);?>"></span> <strong><?php echo ' ' . $company['name'];?></strong>
					</br>
						<span class="badge badge-warning"><?php echo $company['id'];?></span><?php echo ' ' . $company['name'];?>
				</div>

				<div class="span2">
					<h5>
						<font color="black">
							<i class='fa fa-user'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_CLIENT_NAME'); ?>
						</font>
					</h5>
						<span class="flag-icon flag-icon-<?php echo GuidemanHelperFilehelp::GetFlag($jobs_array['client_id']);?>"></span> <strong><?php echo ' ' . $client['name'];?></strong>
					</br>
					<span class="badge badge-warning"><?php echo $client['id'];?></span><?php echo ' ' . $client['name'];?>
					</br>
					<?php echo ' ' . JText::_('COM_GM_CLIENT_REFERENCE');?><span class="label label-<?php echo $buttoncolor ?>"><?php echo $jobs_array['client_reference'];?></span>
				</div>

				<div class="span2">
					<h5>
						<font color="black">
							<i class='fa fa-user'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_OPERATER_NAME'); ?>
						</font>
					</h5>
						<span class="flag-icon flag-icon-<?php echo GuidemanHelperFilehelp::GetFlag($jobs_array['operator_name']);?>"></span> <strong><?php echo ' ' . $operator['name'] . ' ' . $operator['name'];?></strong>
					</br>
						<span class="badge badge-warning"><?php echo $operator['id'];?></span><?php echo ' ' . $operator['alias'];?>
				</div>

				<div class="span2">
					<h5>
						<font color="black">
							<i class='fa fa-map-signs'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_MAIN_GUIDE'); ?>
							<?php if ($jobs_array['coordination'] == '1'): ?><i class='fa fa-user-plus'></i><?php endif;?>
						</font>
					</h5>
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
					<h5>
						<font color="black">
					<i class='fa fa-map-signs'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_TRIP_LEADER_NAME'); ?>
				</font>
			</h5>
					<span class="flag-icon flag-icon-<?php echo GuidemanHelperFilehelp::GetFlag($jobs_array['trip_leader']);?>"></span> <strong><?php echo ' ' . $tripleader['name'] . ' ' . $tripleader['name'];?></strong>
					</br>
					<span class="badge badge-warning"><?php echo $tripleader['id'];?></span><?php echo ' ' . $tripleader['alias'];?>
				</div>
				<div class="span1">
					<h5>
						<font color="black">
					<i class='fa fa-language'></i><?php echo ' ' . JText::_('GUIDEMAN_FIELD_LANGUAGE'); ?>
				</font>
			</h5>
					<span class="flag-icon flag-icon-<?php echo strtolower($lang1['flag']);?>"></span> <strong><?php echo ' ' . $lang1['name'];?></strong>
					</br>
						<font color="black"><?php echo JText::_('GUIDEMAN_FIELD_BACKUP_LANGUAGE'); ?></font>
					</br>
					<span class="flag-icon flag-icon-<?php echo strtolower($lang2['flag']);?>"></span> <strong><?php echo ' ' . $lang2['name'];?></strong>
				</div>
			</div>
		</div>
	</div>
<?php }; ?>

<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Jobs
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


GuideadmHelper::headerDeclarations();
//Load the formvalidator scripts requirements.
JDom::_('html.toolbar');
?>

<form action="<?php echo(JRoute::_("index.php")); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row-fluid guideadm">
		<div id="sidebar" class="span2">
			<div class="sidebar-nav">

			<!-- BRICK : menu -->
			<?php echo JDom::_('html.menu.submenu', array(
				'list' => $this->menu
			)); ?>
			<div class = "nav-filters">
				<!-- BRICK : admjobsfilters -->
				<?php if ($this->canDo->get('core.edit.state')): ?>
					<?php echo $this->filters['filter_published']->input;?>
				<?php endif; ?>

				<hr class="hr-condensed">
				<?php echo $this->filters['filter_company_id']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_client_id']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_requested_language']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_second_language_option']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_operator_name']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_main_guide']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_trip_leader']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_remunerations_company']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_invoicing_company']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_start_date']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_end_date']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_creation_date']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_created_by']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_modification_date']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_modified_by']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_my_joomla_user']->input;?>
				<hr class="hr-condensed">
				<?php echo $this->filters['filter_my_joomla_access']->input;?>
			</div>

			</div>
		</div>
		<div id="contents" class="span10">
			<!-- BRICK : search -->
			<?php echo $this->filters['search_search']->input;?>
			<!-- BRICK : display -->
			<div class="pull-right">
				<?php echo $this->filters['sortTable']->input;?>
			</div>


			<div class="pull-right">
				<?php echo $this->filters['directionTable']->input;?>
			</div>


			<div class="pull-right">
				<?php echo $this->filters['limit']->input;?>
			</div>

			<div class="clearfix"></div>

			<!-- BRICK : admjobsgrid -->
			<?php echo $this->loadTemplate('admjobsgrid'); ?>

			<!-- BRICK : pagination -->
			<?php echo $this->pagination->getListFooter(); ?>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'values' => array(
					'view' => $jinput->get('view', 'jobs'),
					'layout' => $jinput->get('layout', 'default'),
					'boxchecked' => '0',
					'filter_order' => $this->escape($this->state->get('list.ordering')),
					'filter_order_Dir' => $this->escape($this->state->get('list.direction'))
				)));
	?>
</form>
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.7   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.5
* @package		GuideMan
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


GuidemanHelper::headerDeclarations();
//Load the formvalidator scripts requirements.
JDom::_('html.toolbar');
?>

<?php
// Render the page title
echo JLayoutHelper::render('title', array(
	'params' => $this->params,
	'title' => null,
	'browserTitle' => null
)); ?>
<form action="<?php echo(JRoute::_("index.php")); ?>" method="post" name="adminForm" id="adminForm">
	<div class="row-fluid">
		<div id="contents" class="span12">

			<!-- BRICK : usrjobstb -->

			<?php echo $this->renderToolbar($this->items);?>

			<!-- BRICK : usrjobsfilt -->

			<div class="pull-left">
				<?php echo $this->filters['search_search']->input;?>
			</div>


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


			<!-- BRICK : usrjobsfilt -->

			<div class="pull-left">
				<?php if ($this->canDo->get('core.edit.state')): ?>
					<?php echo $this->filters['filter_published']->input;?>
				<?php endif; ?>

			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_company_id']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_client_id']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_requested_language']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_second_language_option']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_operator_name']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_main_guide']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_trip_leader']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_remunerations_company']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_invoicing_company']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_start_date']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_end_date']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_creation_date']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_created_by']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_modification_date']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_modified_by']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_my_joomla_user']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_my_joomla_access']->input;?>
			</div>


			<div class="clearfix"></div>

			<!-- BRICK : usrjobsfilt -->


			<!-- BRICK : usrjobsgrid -->

			<?php echo $this->loadTemplate('usrjobsgrid'); ?>

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
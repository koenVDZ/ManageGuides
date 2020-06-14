<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V2.9.5   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.5.6
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


GuidemanHelper::headerDeclarations();
//Load the formvalidator scripts requirements.
JDom::_('html.toolbar');
?>

<?php
// Render the page title
echo JLayoutHelper::render('title', array(
	'params' => $this->params
)); ?>
<form action="<?php echo(JRoute::_("index.php")); ?>" method="post" name="adminForm" id="adminForm">
	<div>
		<div>
			<!-- BRICK : usrjobitemlistfilter -->

			<div class="pull-left">
				<?php echo $this->filters['filter_item_status']->input;?>
			</div>
			<div class="pull-left">
				<?php echo $this->filters['filter_job_id']->input;?>
			</div>
			<div class="pull-left">
				<?php echo $this->filters['filter_job_id_company_id']->input;?>
			</div>
			<div class="pull-left">
				<?php echo $this->filters['filter_job_id_operator_name']->input;?>
			</div>
			<div class="pull-left">
				<?php echo $this->filters['filter_transport']->input;?>
			</div>
			<div class="pull-left">
				<?php echo $this->filters['filter_driver']->input;?>
			</div>
			<div class="pull-left">
				<?php echo $this->filters['filter_guide']->input;?>
			</div>
			<div class="pull-left">
				<?php echo $this->filters['filter_start_date']->input;?>
			</div>
			<div class="pull-left">
				<?php if ($this->canDo->get('core.edit.state')): ?>
					<?php echo $this->filters['filter_published']->input;?>
				<?php endif; ?>

			</div>
			<div class="pull-right">
				<?php echo $this->filters['limit']->input;?>
			</div>
			<div class="pull-right">
				<?php echo $this->filters['directionTable']->input;?>
			</div>
			<div class="pull-right">
				<?php echo $this->filters['sortTable']->input;?>
			</div>
			<div class="clearfix"></div>

		</div>
		<div>
			<!-- BRICK : usrjobitemlisttoolbar -->

			<?php echo $this->renderToolbar($this->items);?>
		</div>
		<div>
			<!-- BRICK : usrjobitemlistgrid -->

			<?php echo $this->loadTemplate('usrjobitemlistgrid'); ?>
		</div>
		<div>
			<!-- BRICK : usrjobitemlisttoolbar -->

			<?php echo $this->renderToolbar($this->items);?>
		</div>
		<div>
			<!-- BRICK : pagination -->

			<?php echo $this->pagination->getListFooter(); ?>
		</div>
	</div>


	<?php
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'values' => array(
					'view' => $jinput->get('view', 'jobitems'),
					'layout' => $jinput->get('layout', 'default'),
					'boxchecked' => '0',
					'filter_order' => $this->escape($this->state->get('list.ordering')),
					'filter_order_Dir' => $this->escape($this->state->get('list.direction'))
				)));
	?>
</form>

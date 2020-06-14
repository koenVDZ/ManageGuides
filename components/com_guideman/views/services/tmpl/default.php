<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Services
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

			<!-- BRICK : toolbar_plur -->
			<?php echo $this->renderToolbar($this->items);?>

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


			<!-- BRICK : filters -->
			<div class="pull-left">
				<?php if ($this->canDo->get('core.edit.state')): ?>
					<?php echo $this->filters['filter_published']->input;?>
				<?php endif; ?>

			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_company']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_state']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_private_tour']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_entrance_fees']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_kid_friendly']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_disabled_friendly']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_activity_level']->input;?>
			</div>


			<div class="clearfix"></div>

			<!-- BRICK : grid -->
			<?php echo $this->loadTemplate('grid'); ?>

			<!-- BRICK : pagination -->
			<?php echo $this->pagination->getListFooter(); ?>

		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'values' => array(
					'view' => $jinput->get('view', 'services'),
					'layout' => $jinput->get('layout', 'default'),
					'boxchecked' => '0',
					'filter_order' => $this->escape($this->state->get('list.ordering')),
					'filter_order_Dir' => $this->escape($this->state->get('list.direction'))
				)));
	?>
</form>
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.7   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.5
* @package		GuideMan
* @subpackage	Prices
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

			<!-- BRICK : usrpricesfulltb -->

			<?php echo $this->renderToolbar($this->items);?>

			<!-- BRICK : usrpricesfullfilt -->

			<div class="pull-left">
				<?php echo $this->filters['search_search_3']->input;?>
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


			<!-- BRICK : usrpricesfullfilt -->

			<div class="pull-left">
				<?php if ($this->canDo->get('core.edit.state')): ?>
					<?php echo $this->filters['filter_published']->input;?>
				<?php endif; ?>

			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_company']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_currency']->input;?>
			</div>


			<div class="pull-left">
				<div class="input-prepend input-append">
					<?php echo $this->filters['filter_min_time_from']->input;?>
					<?php echo $this->filters['filter_min_time_to']->input;?>
					<?php echo JDom::_('html.link.button.icon', array(
						'icon' => 'search',
						'link_title' => JText::_('GUIDEMAN_JSEARCH_SEARCH_MIN_TIME'),
						'submitEventName' => 'onclick',
					)); ?>
				</div>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_from_date']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_until_date']->input;?>
			</div>


			<div class="pull-left">
				<div class="input-prepend input-append">
					<?php echo $this->filters['filter_night_shift_from']->input;?>
					<?php echo $this->filters['filter_night_shift_to']->input;?>
					<?php echo JDom::_('html.link.button.icon', array(
						'icon' => 'search',
						'link_title' => JText::_('GUIDEMAN_JSEARCH_SEARCH_NIGHT_SHIFT'),
						'submitEventName' => 'onclick',
					)); ?>
				</div>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_created_by']->input;?>
			</div>


			<div class="pull-left">
					<?php echo $this->filters['filter_creation_date_from']->input;?>
					<?php echo $this->filters['filter_creation_date_to']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_modified_by']->input;?>
			</div>


			<div class="pull-left">
					<?php echo $this->filters['filter_modification_date_from']->input;?>
					<?php echo $this->filters['filter_modification_date_to']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_access']->input;?>
			</div>


			<div class="clearfix"></div>

			<!-- BRICK : usrpricesfullfilt -->


			<!-- BRICK : usrpricesfullgrid -->

			<?php echo $this->loadTemplate('usrpricesfullgrid'); ?>

			<!-- BRICK : pagination -->

			<?php echo $this->pagination->getListFooter(); ?>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'values' => array(
					'view' => $jinput->get('view', 'prices'),
					'layout' => $jinput->get('layout', 'usrpricesfull'),
					'boxchecked' => '0',
					'filter_order' => $this->escape($this->state->get('list.ordering')),
					'filter_order_Dir' => $this->escape($this->state->get('list.direction'))
				)));
	?>
</form>
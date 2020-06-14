<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V2.8.3   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.4.0
* @package		GuideMan
* @subpackage	Doc Labels
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
			<!-- BRICK : usrdoclabelslistsearch -->

			<div class="pull-left">
				<?php if ($this->canDo->get('core.edit.state')): ?>
					<?php echo $this->filters['filter_published']->input;?>
				<?php endif; ?>

			</div>
			<div class="pull-left">
				<?php echo $this->filters['filter_country_id']->input;?>
			</div>
			<div class="pull-left">
				<?php echo $this->filters['filter_language']->input;?>
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
			<!-- BRICK : DocLabels -->

			<?php echo $this->loadTemplate('usrdoclabelslistgrid'); ?>
		</div>
		<div>
			<!-- BRICK : DocLabels -->

				<?php echo GuidemanHelperPermutations::IcomoonToolbar($this->renderToolbar($this->items));?>
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
					'view' => $jinput->get('view', 'doclabels'),
					'layout' => $jinput->get('layout', 'default'),
					'boxchecked' => '0',
					'filter_order' => $this->escape($this->state->get('list.ordering')),
					'filter_order_Dir' => $this->escape($this->state->get('list.direction'))
				)));
	?>
</form>

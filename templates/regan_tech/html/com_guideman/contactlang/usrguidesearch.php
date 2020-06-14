<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.0
* @package		GuideMan
* @subpackage	ContactLang
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



			<!-- BRICK : usrguidesearchtb -->



			<!-- BRICK : display -->

			<div class="pull-right">
				<?php echo $this->filters['sortTable']->input;?>
			</div>


			<div class="pull-right">
				<?php echo $this->filters['limit']->input;?>
			</div>


			<!-- BRICK : usrguidesearchtb -->

			<div class="pull-left">
				<?php echo $this->filters['filter_language']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_user_id_country_id']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_user_id_state_id']->input;?>
			</div>


			<div class="pull-left">
				<?php echo $this->filters['filter_user_id_driverguide']->input;?>
			</div>


			<div class="clearfix"></div>

			<!-- BRICK : usrguidesearchtb -->


			<!-- BRICK : usrguidesearchgrid -->

			<?php echo $this->loadTemplate('usrguidesearchgrid'); ?>

			<!-- BRICK : pagination -->

			<?php echo $this->pagination->getListFooter(); ?>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'values' => array(
					'view' => $jinput->get('view', 'contactlang'),
					'layout' => $jinput->get('layout', 'usrguidesearch'),
					'boxchecked' => '0',
					'filter_order' => $this->escape($this->state->get('list.ordering')),
					'filter_order_Dir' => $this->escape($this->state->get('list.direction'))
				)));
	?>
</form>
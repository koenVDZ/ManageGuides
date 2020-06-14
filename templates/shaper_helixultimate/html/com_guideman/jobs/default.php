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

			<?php echo GuidemanHelperPermutations::IcomoonToolbar($this->renderToolbar($this->items));?>

			<!-- BRICK : usrjobsfilt -->

			<div class="pull-left">
				<?php echo $this->filters['search_search']->input;?>
			</div>
<br>
			<div class="row">
				<div class="col-sm-6">
					<!-- BRICK : usrjobsfilt -->
					<div class="pull-left">
						<?php if ($this->canDo->get('core.edit.state')): ?>
							<?php echo $this->filters['filter_published']->input;?>
						<?php endif; ?>
					</div>
					<br>
				</div>
				<div class="col-sm-6">
					<div class="pull-left">
						<?php echo $this->filters['filter_company_id']->input;?>
					</div>
					<br>
				</div>
			</div>
			<!-- BRICK : usrjobsgrid -->

			<?php echo $this->loadTemplate('usrjobsgrid'); ?>

			<?php echo GuidemanHelperPermutations::IcomoonToolbar($this->renderToolbar($this->items));?>

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

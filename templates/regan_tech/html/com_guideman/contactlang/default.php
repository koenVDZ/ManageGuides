<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.1.4
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

			<!-- BRICK : usrcontactlangstb -->

			<?php echo $this->renderToolbar($this->items);?>

			<!-- BRICK : usrcontactlangsfilt -->



			<!-- BRICK : display -->

			<div class="pull-right">
				<?php echo $this->filters['limit']->input;?>
			</div>


			<!-- BRICK : usrcontactlangsfilt -->

			<div class="pull-left">
				<?php if ($this->canDo->get('core.edit.state')): ?>
					<?php echo $this->filters['filter_published']->input;?>
				<?php endif; ?>

			</div>

			<div class="pull-left">
				<?php echo $this->filters['filter_language']->input;?>
			</div>
			<div class="clearfix"></div>

			<!-- BRICK : usrcontactlangsfilt -->


			<!-- BRICK : ContactLanguagesF -->

			<?php echo $this->loadTemplate('usrcontactlangsgrid'); ?>

			<!-- BRICK : usrcontactlangstb -->

			<?php echo $this->renderToolbar($this->items);?>

			<!-- BRICK : pagination -->

			<?php echo $this->pagination->getListFooter(); ?>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'values' => array(
					'view' => $jinput->get('view', 'contactlang'),
					'layout' => $jinput->get('layout', 'default'),
					'boxchecked' => '0',
					'filter_order' => $this->escape($this->state->get('list.ordering')),
					'filter_order_Dir' => $this->escape($this->state->get('list.direction'))
				)));
	?>
</form>
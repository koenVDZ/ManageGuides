<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.0
* @package		GuideMan
* @subpackage	Phone Labels
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
	<div class="container-fluid">
		<div class="row">
			<div id="contents" class="span12">

				<!-- BRICK : usrphonelabellisttoolbar -->

				<?php echo GuidemanHelperPermutations::IcomoonToolbar($this->renderToolbar($this->items));?>


				<div class="clearfix"></div>

				<!-- BRICK : usrphonelabellistgrid -->

				<?php echo $this->loadTemplate('usrphonelabellistgrid'); ?>

				<!-- BRICK : usrphonelabellisttoolbar -->

				<?php echo GuidemanHelperPermutations::IcomoonToolbar($this->renderToolbar($this->items));?>

				<!-- BRICK : pagination -->

				<?php echo $this->pagination->getListFooter(); ?>
			</div>
			<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		</div>


		<?php
			$jinput = JFactory::getApplication()->input;
			echo JDom::_('html.form.footer', array(
			'values' => array(
						'view' => $jinput->get('view', 'phonelabels'),
						'layout' => $jinput->get('layout', 'default'),
						'boxchecked' => '0',
						'filter_order' => $this->escape($this->state->get('list.ordering')),
						'filter_order_Dir' => $this->escape($this->state->get('list.direction'))
					)));
		?>
	</div>
</form>

<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.0
* @package		GuideMan
* @subpackage	Contacts
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
	<div class="row">
		<div id="contents" class="span12">

			<!-- BRICK : usrcompanygridtb -->

			<?php echo GuidemanHelperPermutations::IcomoonToolbar($this->renderToolbar($this->items));?>

			<div class="clearfix"></div>

			<!-- BRICK : usrcompanygridgrid -->

			<?php echo $this->loadTemplate('usrcompanygridgrid'); ?>

			<!-- BRICK : usrcompanygridtb -->

			<?php echo GuidemanHelperPermutations::IcomoonToolbar($this->renderToolbar($this->items));?>
			<?php echo $this->pagination->getListFooter(); ?>
		</br></br></br></br></br>
		</div>
	</div>


	<?php
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'values' => array(
					'view' => $jinput->get('view', 'contacts'),
					'layout' => $jinput->get('layout', 'companies'),
					'boxchecked' => '0',
					'filter_order' => $this->escape($this->state->get('list.ordering')),
					'filter_order_Dir' => $this->escape($this->state->get('list.direction'))
				)));
	?>
</form>

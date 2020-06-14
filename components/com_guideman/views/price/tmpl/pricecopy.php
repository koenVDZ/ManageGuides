<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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

<script language="javascript" type="text/javascript">
	//Secure the user navigation on the page, in order preserve datas.
	var holdForm = true;
	window.onbeforeunload = function closeIt(){	if (holdForm) return false;};
</script>

<?php
// Render the page title
echo JLayoutHelper::render('title', array(
	'params' => $this->params,
	'title' => null,
	'browserTitle' => null
)); ?>
<form action="<?php echo(JRoute::_("index.php")); ?>" method="post" name="adminForm" id="adminForm" class='form-validate' enctype='multipart/form-data'>
	<div class="row-fluid">
		<div id="contents" class="span12">
			<!-- BRICK : pricecopytb -->
			<?php echo $this->renderToolbar();?>
			<!-- BRICK : Service -->
			<?php echo $this->loadTemplate('pricecopyflyc'); ?>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#pricecopyfa" data-toggle="tab">
						<?php echo(JText::_('GUIDEMAN_TAB_GENERAL')); ?>
					</a>
				</li>
				<li class="">
					<a href="#pricecopyfb" data-toggle="tab">
						<?php echo(JText::_('GUIDEMAN_TAB_PRICES')); ?>
					</a>
				</li>
				<li class="">
					<a href="#pricecopyfc" data-toggle="tab">
						<?php echo(JText::_('GUIDEMAN_TAB_ADMINISTRATION')); ?>
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="pricecopyfa">
					<!-- BRICK : General -->
					<?php echo $this->loadTemplate('pricecopyfa'); ?>
				</div>
				<div class="tab-pane" id="pricecopyfb">
					<!-- BRICK : Prices -->
					<?php echo $this->loadTemplate('pricecopyfb'); ?>
				</div>
				<div class="tab-pane" id="pricecopyfc">
					<!-- BRICK : Administration -->
					<?php echo $this->loadTemplate('pricecopyfc'); ?>
				</div>
			</div>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'dataObject' => $this->item,
		'values' => array(
					'id' => $this->state->get('price.id')
				)));
	?>
</form>
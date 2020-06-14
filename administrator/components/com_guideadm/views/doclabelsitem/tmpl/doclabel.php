<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
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


GuideadmHelper::headerDeclarations();
//Load the formvalidator scripts requirements.
JDom::_('html.toolbar');
?>

<script language="javascript" type="text/javascript">
	//Secure the user navigation on the page, in order preserve datas.
	var holdForm = true;
	window.onbeforeunload = function closeIt(){	if (holdForm) return false;};
</script>

<form action="<?php echo(JRoute::_("index.php")); ?>" method="post" name="adminForm" id="adminForm" class='form-validate' enctype='multipart/form-data'>
	<div class="row-fluid guideadm">
		<div id="contents" class="span12">
			<!-- BRICK : admdoclabeltb -->
			<?php echo $this->renderToolbar();?>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#admdoclabelform" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_DETAILED_DOCUMENT_LABEL_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admdoclabelcreator" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_CREATOR_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admdoclabelmodifier" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_LAST_USER_TO_MODIFY')); ?>
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="admdoclabelform">
					<!-- BRICK : Detailed Document Label Information -->
					<?php echo $this->loadTemplate('admdoclabelform'); ?>
				</div>
				<div class="tab-pane" id="admdoclabelcreator">
					<!-- BRICK : Creator Information -->
					<?php echo $this->loadTemplate('admdoclabelcreator'); ?>
				</div>
				<div class="tab-pane" id="admdoclabelmodifier">
					<!-- BRICK : Last User to Modify -->
					<?php echo $this->loadTemplate('admdoclabelmodifier'); ?>
				</div>
			</div>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'dataObject' => $this->item,
		'values' => array(
					'id' => $this->state->get('doclabelsitem.id')
				)));
	?>
</form>
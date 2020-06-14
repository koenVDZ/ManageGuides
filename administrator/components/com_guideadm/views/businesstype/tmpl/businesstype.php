<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	BusinessTypes
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
			<!-- BRICK : toolbar_sing -->
			<?php echo $this->renderToolbar();?>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#admbusinesstypeform" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_DETAILED_BUSINESS_TYPE_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admbusinesstypecreator" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_CREATOR_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admbusinesstypemodifier" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_LAST_USER_TO_MODIFY')); ?>
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="admbusinesstypeform">
					<!-- BRICK : Detailed Business Type Information -->
					<?php echo $this->loadTemplate('admbusinesstypeform'); ?>
				</div>
				<div class="tab-pane" id="admbusinesstypecreator">
					<!-- BRICK : Creator Information -->
					<?php echo $this->loadTemplate('admbusinesstypecreator'); ?>
				</div>
				<div class="tab-pane" id="admbusinesstypemodifier">
					<!-- BRICK : Last User to Modify -->
					<?php echo $this->loadTemplate('admbusinesstypemodifier'); ?>
				</div>
			</div>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'dataObject' => $this->item,
		'values' => array(
					'id' => $this->state->get('businesstype.id')
				)));
	?>
</form>
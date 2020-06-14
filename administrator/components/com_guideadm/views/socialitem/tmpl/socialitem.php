<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Social
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
			<!-- BRICK : admsocialitemtb -->
			<?php echo $this->renderToolbar();?>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#admsocialitemform" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_SOCIAL_CONTACT_DETAILS')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admsocialitemuser" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_USERS_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admsocialitemcreator" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_CREATOR_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admsocialitemmodifier" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_LAST_USER_TO_MODIFY')); ?>
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="admsocialitemform">
					<!-- BRICK : Social contact Details -->
					<?php echo $this->loadTemplate('admsocialitemform'); ?>
				</div>
				<div class="tab-pane" id="admsocialitemuser">
					<!-- BRICK : User's Information -->
					<?php echo $this->loadTemplate('admsocialitemuser'); ?>
				</div>
				<div class="tab-pane" id="admsocialitemcreator">
					<!-- BRICK : Creator Information -->
					<?php echo $this->loadTemplate('admsocialitemcreator'); ?>
				</div>
				<div class="tab-pane" id="admsocialitemmodifier">
					<!-- BRICK : Last User to Modify -->
					<?php echo $this->loadTemplate('admsocialitemmodifier'); ?>
				</div>
			</div>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'dataObject' => $this->item,
		'values' => array(
					'id' => $this->state->get('socialitem.id')
				)));
	?>
</form>
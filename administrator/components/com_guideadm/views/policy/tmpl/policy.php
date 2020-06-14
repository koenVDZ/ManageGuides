<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Policies
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
			<!-- BRICK : admpolicytb -->
			<?php echo $this->renderToolbar();?>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#admpolicyform" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_GENERAL_CONDITIONS_DETAILS')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admpolicycompany" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_COMPANY_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admpolicycreator" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_CREATOR_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admpolicymodifier" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_LAST_USER_TO_MODIFY')); ?>
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="admpolicyform">
					<!-- BRICK : General Conditions Details -->
					<?php echo $this->loadTemplate('admpolicyform'); ?>
				</div>
				<div class="tab-pane" id="admpolicycompany">
					<!-- BRICK : Company Information -->
					<?php echo $this->loadTemplate('admpolicycompany'); ?>
				</div>
				<div class="tab-pane" id="admpolicycreator">
					<!-- BRICK : Creator Information -->
					<?php echo $this->loadTemplate('admpolicycreator'); ?>
				</div>
				<div class="tab-pane" id="admpolicymodifier">
					<!-- BRICK : Last User to Modify -->
					<?php echo $this->loadTemplate('admpolicymodifier'); ?>
				</div>
			</div>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'dataObject' => $this->item,
		'values' => array(
					'id' => $this->state->get('policy.id')
				)));
	?>
</form>
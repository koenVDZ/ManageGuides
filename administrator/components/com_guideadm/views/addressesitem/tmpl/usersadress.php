<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Addresses
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
			<!-- BRICK : admusersadresstb -->
			<?php echo $this->renderToolbar();?>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#admusersadressform" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_DETAILED_ADDRESS_INFOMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admusersadressusersinfo" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_USER_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#fly_1" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_CREATOR_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#fly_2" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_LAST_USER_TO_UPDATE')); ?>
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="admusersadressform">
					<!-- BRICK : Detailed Address Infomation -->
					<?php echo $this->loadTemplate('admusersadressform'); ?>
				</div>
				<div class="tab-pane" id="admusersadressusersinfo">
					<!-- BRICK : User Information -->
					<?php echo $this->loadTemplate('admusersadressusersinfo'); ?>
				</div>
				<div class="tab-pane" id="fly_1">
					<!-- BRICK : Creator Information -->
					<?php echo $this->loadTemplate('fly_1'); ?>
				</div>
				<div class="tab-pane" id="fly_2">
					<!-- BRICK : Last User to Update -->
					<?php echo $this->loadTemplate('fly_2'); ?>
				</div>
			</div>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'dataObject' => $this->item,
		'values' => array(
					'id' => $this->state->get('addressesitem.id')
				)));
	?>
</form>
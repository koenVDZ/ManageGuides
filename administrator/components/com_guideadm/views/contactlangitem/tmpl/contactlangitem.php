<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
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
			<!-- BRICK : admcontactlangitemtb -->
			<?php echo $this->renderToolbar();?>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#admcontactlangitemform" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_USERS_LANGUAGE')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admcontactlangitemusersinformation" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_USERS_LANGUAGE_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admcontactlangitemcreator" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_CREATORS_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admcontactlangitemmodifier" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_LAST_USER_TO_MODIFY_1')); ?>
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="admcontactlangitemform">
					<!-- BRICK : User's Language -->
					<?php echo $this->loadTemplate('admcontactlangitemform'); ?>
				</div>
				<div class="tab-pane" id="admcontactlangitemusersinformation">
					<!-- BRICK : Users Language Information -->
					<?php echo $this->loadTemplate('admcontactlangitemusersinformation'); ?>
				</div>
				<div class="tab-pane" id="admcontactlangitemcreator">
					<!-- BRICK : Creator's Information -->
					<?php echo $this->loadTemplate('admcontactlangitemcreator'); ?>
				</div>
				<div class="tab-pane" id="admcontactlangitemmodifier">
					<!-- BRICK : Last user to Modify -->
					<?php echo $this->loadTemplate('admcontactlangitemmodifier'); ?>
				</div>
			</div>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'dataObject' => $this->item,
		'values' => array(
					'id' => $this->state->get('contactlangitem.id')
				)));
	?>
</form>
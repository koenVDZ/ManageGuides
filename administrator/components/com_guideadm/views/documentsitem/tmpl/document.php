<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Documents
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
			<!-- BRICK : admdocumenttb -->
			<?php echo $this->renderToolbar();?>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#admdocumentform" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_DOCUMENT_DETAILS')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admdocumentuser" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_DOCUMENTS_OWNER_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admdocumentcreator" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_CREATOR_INFORMATION')); ?>
					</a>
				</li>
				<li class="">
					<a href="#admdocumentmodifier" data-toggle="tab">
						<?php echo(JText::_('GUIDEADM_TAB_LATS_USER_TO_MODIFY')); ?>
					</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="admdocumentform">
					<!-- BRICK : Document Details -->
					<?php echo $this->loadTemplate('admdocumentform'); ?>
				</div>
				<div class="tab-pane" id="admdocumentuser">
					<!-- BRICK : Document's owner Information -->
					<?php echo $this->loadTemplate('admdocumentuser'); ?>
				</div>
				<div class="tab-pane" id="admdocumentcreator">
					<!-- BRICK : Creator Information -->
					<?php echo $this->loadTemplate('admdocumentcreator'); ?>
				</div>
				<div class="tab-pane" id="admdocumentmodifier">
					<!-- BRICK : Lats User to Modify -->
					<?php echo $this->loadTemplate('admdocumentmodifier'); ?>
				</div>
			</div>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'dataObject' => $this->item,
		'values' => array(
					'id' => $this->state->get('documentsitem.id')
				)));
	?>
</form>
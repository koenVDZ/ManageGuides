<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	States
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
			<!-- BRICK : admstatetb -->
			<?php echo $this->renderToolbar();?>
			<div class="accordion" id="accordion">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#admstatestateform">
							<?php echo(JText::_('GUIDEADM_TAB_STATE_PROVINCE_INFORMATION')); ?>
						</a>
					</div>
					<div id="admstatestateform" class="accordion-body collapse in">
						<div class="accordion-inner">
								<!-- BRICK : State / Province Information -->
					<?php echo $this->loadTemplate('admstatestateform'); ?>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#admstateflyflag">
							<?php echo(JText::_('GUIDEADM_TAB_FLAG')); ?>
						</a>
					</div>
					<div id="admstateflyflag" class="accordion-body collapse">
						<div class="accordion-inner">
								<!-- BRICK : Flag -->
					<?php echo $this->loadTemplate('admstateflyflag'); ?>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#admstateflycountry">
							<?php echo(JText::_('GUIDEADM_TAB_COUNTRY_INFORMATION')); ?>
						</a>
					</div>
					<div id="admstateflycountry" class="accordion-body collapse">
						<div class="accordion-inner">
								<!-- BRICK : Country Information -->
					<?php echo $this->loadTemplate('admstateflycountry'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php 
		$jinput = JFactory::getApplication()->input;
		echo JDom::_('html.form.footer', array(
		'dataObject' => $this->item,
		'values' => array(
					'id' => $this->state->get('state.id')
				)));
	?>
</form>
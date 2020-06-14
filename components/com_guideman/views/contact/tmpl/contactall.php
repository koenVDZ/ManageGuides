<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
<form action="<?php echo(JRoute::_("index.php")); ?>" method="post" name="adminForm" id="adminForm" enctype='multipart/form-data'>
	<div class="row-fluid">
		<div id="contents" class="span12">

			<div class="accordion" id="accordion">
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickuser">
							<?php echo(JText::_('GUIDEMAN_TAB_USER_DETAILED_INFORMATION')); ?>
						</a>
					</div>
					<div id="usrcontactallbrickuser" class="accordion-body collapse in">
						<div class="accordion-inner">
								<!-- BRICK : User Detailed Information -->
					<?php echo $this->loadTemplate('usrcontactallbrickuser'); ?>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickadresses">
							<?php echo(JText::_('GUIDEMAN_TAB_ADRESSES')); ?>
						</a>
					</div>
					<div id="usrcontactallbrickadresses" class="accordion-body collapse">
						<div class="accordion-inner">
								<!-- BRICK : Adresses -->
					<?php echo $this->loadTemplate('usrcontactallbrickadresses'); ?>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickphones">
							<?php echo(JText::_('GUIDEMAN_TAB_COMMUNICATION')); ?>
						</a>
					</div>
					<div id="usrcontactallbrickphones" class="accordion-body collapse">
						<div class="accordion-inner">
								<!-- BRICK : Communication -->
					<?php echo $this->loadTemplate('usrcontactallbrickphones'); ?>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbricksocial">
							<?php echo(JText::_('GUIDEMAN_TAB_SOCIAL_NETWORKING')); ?>
						</a>
					</div>
					<div id="usrcontactallbricksocial" class="accordion-body collapse">
						<div class="accordion-inner">
								<!-- BRICK : Social Networking -->
					<?php echo $this->loadTemplate('usrcontactallbricksocial'); ?>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickvehicles">
							<?php echo(JText::_('GUIDEMAN_TAB_VEHICLES')); ?>
						</a>
					</div>
					<div id="usrcontactallbrickvehicles" class="accordion-body collapse">
						<div class="accordion-inner">
								<!-- BRICK : Vehicles -->
					<?php echo $this->loadTemplate('usrcontactallbrickvehicles'); ?>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickdocuments">
							<?php echo(JText::_('GUIDEMAN_TAB_DOCUMENTS')); ?>
						</a>
					</div>
					<div id="usrcontactallbrickdocuments" class="accordion-body collapse">
						<div class="accordion-inner">
								<!-- BRICK : Documents -->
					<?php echo $this->loadTemplate('usrcontactallbrickdocuments'); ?>
						</div>
					</div>
				</div>
				<div class="accordion-group">
					<div class="accordion-heading">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickbank">
							<?php echo(JText::_('GUIDEMAN_TAB_BANK_INFORMATION')); ?>
						</a>
					</div>
					<div id="usrcontactallbrickbank" class="accordion-body collapse">
						<div class="accordion-inner">
								<!-- BRICK : Bank Information -->
					<?php echo $this->loadTemplate('usrcontactallbrickbank'); ?>
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
					'id' => $this->state->get('contact.id')
				)));
	?>
</form>
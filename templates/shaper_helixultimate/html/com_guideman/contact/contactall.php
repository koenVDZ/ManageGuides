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
	<div class="container-fluid">
		<div class="row">
			<!-- BRICK : User Detailed Information -->
			<?php echo $this->loadTemplate('usrcontactallbrickuser'); ?>
		</div>
		<?php if ($this->item->addresslabels != NULL): ?>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickadresses">
					<h4>&#160<i class="fas fa-home"></i>&#160<?php echo(JText::_('GUIDEMAN_TAB_ADRESSES')); ?>&#160<i class="fal fa-plus-circle"></i></h4>
				</a>
			</div>
			<div id="usrcontactallbrickadresses" class="accordion-body collapse">
				<div class="accordion-inner">
						<!-- BRICK : Adresses -->
			<?php echo $this->loadTemplate('usrcontactallbrickadresses'); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($this->item->addresslabels != NULL): ?>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickphones">
					<h4>&#160<i class="fas fa-phone"></i>&#160<?php echo(JText::_('GUIDEMAN_TAB_COMMUNICATION')); ?>&#160<i class="fal fa-plus-circle"></i></h4>
				</a>
			</div>
			<div id="usrcontactallbrickphones" class="accordion-body collapse">
				<div class="accordion-inner">
						<!-- BRICK : Communication -->
			<?php echo $this->loadTemplate('usrcontactallbrickphones'); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($this->item->addresslabels != NULL): ?>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbricksocial">
					<h4>&#160<i class="fas fa-user"></i>&#160<?php echo(JText::_('GUIDEMAN_TAB_SOCIAL_NETWORKING')); ?>&#160<i class="fal fa-plus-circle"></i></h4>
				</a>
			</div>
			<div id="usrcontactallbricksocial" class="accordion-body collapse">
				<div class="accordion-inner">
						<!-- BRICK : Social Networking -->
			<?php echo $this->loadTemplate('usrcontactallbricksocial'); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($this->item->addresslabels != NULL): ?>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickvehicles">
					<h4>&#160<i class="fas fa-car"></i>&#160<?php echo(JText::_('GUIDEMAN_TAB_VEHICLES')); ?>&#160<i class="fal fa-plus-circle"></i></h4>
				</a>
			</div>
			<div id="usrcontactallbrickvehicles" class="accordion-body collapse">
				<div class="accordion-inner">
						<!-- BRICK : Vehicles -->
			<?php echo $this->loadTemplate('usrcontactallbrickvehicles'); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($this->item->addresslabels != NULL): ?>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickdocuments">
					<h4>&#160<i class="fas fa-address-card"></i>&#160<?php echo(JText::_('GUIDEMAN_TAB_DOCUMENTS')); ?>&#160<i class="fal fa-plus-circle"></i></h4>
				</a>
			</div>
			<div id="usrcontactallbrickdocuments" class="accordion-body collapse">
				<div class="accordion-inner">
						<!-- BRICK : Documents -->
			<?php echo $this->loadTemplate('usrcontactallbrickdocuments'); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php if ($this->item->addresslabels != NULL): ?>
		<div class="accordion-group">
			<div class="accordion-heading">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#usrcontactallbrickbank">
					<h4>&#160<i class="fas fa-university"></i>&#160<?php echo(JText::_('GUIDEMAN_TAB_BANK_INFORMATION')); ?>&#160<i class="fal fa-plus-circle"></i></h3>
				</a>
			</div>
			<div id="usrcontactallbrickbank" class="accordion-body collapse">
				<div class="accordion-inner">
						<!-- BRICK : Bank Information -->
			<?php echo $this->loadTemplate('usrcontactallbrickbank'); ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
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

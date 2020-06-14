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
<link rel="stylesheet" href="<?php echo JUri::root(true); ?>/media/jui/css/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo JUri::root(true); ?>/media/jui/css/flag-icon/css/flag-icon.min.css">
	<div>
		<div>
			<!-- BRICK : User Detailed Information -->
			<?php echo $this->loadTemplate('usrcontactallbrickuser'); ?>
		</div>
		<div class="accordion" id="accordion2">
			<?php if ($this->item->addresslabels != NULL): ?>
				<div class="accordion-group">
					<!-- BRICK : Addresses -->
					<?php echo $this->loadTemplate('usrcontactallbrickadresses'); ?>
				</div>
			<?php endif; ?>
			<?php if ($this->item->phonelabels != NULL): ?>
				<div class="accordion-group">
					<!-- BRICK : Communication -->
					<?php echo $this->loadTemplate('usrcontactallbrickphones'); ?>
				</div>
			<?php endif; ?>
			<?php if ($this->item->sociallabels != NULL): ?>
				<div class="accordion-group">
					<!-- BRICK : Social Networking -->
					<?php echo $this->loadTemplate('usrcontactallbricksocial'); ?>
				</div>
			<?php endif; ?>
			<?php if ($this->item->vehicles != NULL): ?>
				<div class="accordion-group">
					<!-- BRICK : Vehicles -->
					<?php echo $this->loadTemplate('usrcontactallbrickvehicles'); ?>
				</div>
			<?php endif; ?>
			<?php if ($this->item->documents != NULL): ?>
				<div class="accordion-group">
					<!-- BRICK : Documents -->
					<?php echo $this->loadTemplate('usrcontactallbrickdocuments'); ?>
				</div>
			<?php endif; ?>
			<?php if ($this->item->contacts != NULL): ?>
				<div class="accordion-group">
					<!-- BRICK : Bank Information -->
					<?php echo $this->loadTemplate('usrcontactallbrickbank'); ?>
				</div>
			<?php endif; ?>
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

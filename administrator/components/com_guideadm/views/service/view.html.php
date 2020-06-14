<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Services
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



/**
* HTML View class for the Guideadm component
*
* @package	Guideadm
* @subpackage	Service
*/
class GuideadmCkViewService extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('service');

	/**
	* Execute and display a template : Service
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayService($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.service');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuideadmHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_SERVICE'), $this->item, 'company');

		$user		= JFactory::getUser();
		$isNew		= ($model->getId() == 0);

		//Check ACL before opening the form (prevent from direct access)
		if (!$model->canEdit($item, true))
			$model->setError(JText::_('JERROR_ALERTNOAUTHOR'));

		// Check for errors.
		if (count($errors = $model->getErrors()))
		{
			JError::raiseError(500, implode(BR, array_unique($errors)));
			return false;
		}
		//Toolbar
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_SERVICE'), 'pencil-2');

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('service.save', "GUIDEADM_JTOOLBAR_SAVE_CLOSE");
		// Save
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::apply('service.apply', "GUIDEADM_JTOOLBAR_SAVE");
		// Cancel
		JToolBarHelper::cancel('service.cancel', "GUIDEADM_JTOOLBAR_CANCEL");
		// Publish
		if (!$isNew && $model->canEditState($item) && ($item->published != 1))
			JToolBarHelper::publish('services.publish', "GUIDEADM_JTOOLBAR_PUBLISH");
		// Unpublish
		if (!$isNew && $model->canEditState($item) && ($item->published != 0))
			JToolBarHelper::unpublish('services.unpublish', "GUIDEADM_JTOOLBAR_UNPUBLISH");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('services.trash', "GUIDEADM_JTOOLBAR_TRASH", false);
		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('services.archive', 'archive', 'archive',  "GUIDEADM_JTOOLBAR_ARCHIVE", false);



	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewService')){ class GuideadmViewService extends GuideadmCkViewService{} }


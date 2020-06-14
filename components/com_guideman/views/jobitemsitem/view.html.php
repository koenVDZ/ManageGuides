<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Job Items
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
* HTML View class for the Guideman component
*
* @package	Guideman
* @subpackage	Jobitemsitem
*/
class GuidemanCkViewJobitemsitem extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('jobitemsitem', 'jobview', 'hotel', 'restaurant', 'attraction');

	/**
	* Execute and display a template : Attraction
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayAttraction($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.attraction');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_ATTRACTION'), $this->item, 'job_id');

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

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('jobitemsitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('jobitemsitem.save2new', "GUIDEMAN_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('jobitemsitem.save2copy', "GUIDEMAN_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('jobitemsitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('jobitems.trash', "GUIDEMAN_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEMAN_JTOOLBAR_DELETE", 'jobitemsitem.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('jobitems.archive', 'archive', 'archive',  "GUIDEMAN_JTOOLBAR_ARCHIVE", false);



		$this->toolbar = JToolbar::getInstance();
		$model_job_id = CkJModel::getInstance('Jobs', 'GuidemanModel');
		$model_job_id->addGroupOrder("a.file_number");
		$lists['fk']['job_id'] = $model_job_id->getItems();

		$model_service_provider = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_service_provider->addGroupOrder("a.name");
		$lists['fk']['service_provider'] = $model_service_provider->getItems();
	}

	/**
	* Execute and display a template : Hotel
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayHotel($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.hotel');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_HOTEL'), $this->item, 'job_id');

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

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('jobitemsitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('jobitemsitem.save2new', "GUIDEMAN_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('jobitemsitem.save2copy', "GUIDEMAN_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('jobitemsitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('jobitems.trash', "GUIDEMAN_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEMAN_JTOOLBAR_DELETE", 'jobitemsitem.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('jobitems.archive', 'archive', 'archive',  "GUIDEMAN_JTOOLBAR_ARCHIVE", false);



		$this->toolbar = JToolbar::getInstance();
		$model_job_id = CkJModel::getInstance('Jobs', 'GuidemanModel');
		$model_job_id->addGroupOrder("a.file_number");
		$lists['fk']['job_id'] = $model_job_id->getItems();

		$model_service_provider = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_service_provider->addGroupOrder("a.name");
		$lists['fk']['service_provider'] = $model_service_provider->getItems();
	}

	/**
	* Execute and display a template : Job Items item
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayJobitemsitem($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.jobitemsitem');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_JOB_ITEMS_ITEM'), $this->item, 'job_id');

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

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('jobitemsitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('jobitemsitem.save2new', "GUIDEMAN_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('jobitemsitem.save2copy', "GUIDEMAN_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('jobitemsitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('jobitems.trash', "GUIDEMAN_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEMAN_JTOOLBAR_DELETE", 'jobitemsitem.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('jobitems.archive', 'archive', 'archive',  "GUIDEMAN_JTOOLBAR_ARCHIVE", false);



		$this->toolbar = JToolbar::getInstance();
		$model_job_id = CkJModel::getInstance('Jobs', 'GuidemanModel');
		$model_job_id->addJoin("`#__guideman_contacts` AS _company_id_ ON _company_id_.id = a.company_id", 'LEFT');
		$model_job_id->addSelect("_company_id_.name AS _company_id_name");
		$model_job_id->addGroupOrder("_company_id_.name");
		$model_job_id->addGroupOrder("a.file_number");
		$lists['fk']['job_id'] = $model_job_id->getItems();

		$model_service_provider = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_service_provider->addGroupOrder("a.name");
		$lists['fk']['service_provider'] = $model_service_provider->getItems();

		$model_guide = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_guide->addGroupOrder("a.alias");
		$lists['fk']['guide'] = $model_guide->getItems();

		$model_transport = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_transport->addGroupOrder("a.name");
		$lists['fk']['transport'] = $model_transport->getItems();

		$model_driver = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_driver->addGroupOrder("a.alias");
		$lists['fk']['driver'] = $model_driver->getItems();
	}

	/**
	* Execute and display a template : Job View
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayJobview($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.jobview');
		$this->item		= $item		= $this->get('Item');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_JOB_VIEW'), $this->item, 'job_id');

		$user		= JFactory::getUser();
		$isNew		= ($model->getId() == 0);

		//Check ACL before opening the view (prevent from direct access)
		if (!$model->canAccess($item))
			$model->setError(JText::_('JERROR_ALERTNOAUTHOR'));

		// Check for errors.
		if (count($errors = $model->getErrors()))
		{
			JError::raiseError(500, implode(BR, array_unique($errors)));
			return false;
		}
		//Toolbar

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('jobitemsitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Cancel
		JToolBarHelper::cancel('jobitemsitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");

		$this->toolbar = JToolbar::getInstance();

	}

	/**
	* Execute and display a template : Restaurant
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayRestaurant($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.restaurant');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_RESTAURANT'), $this->item, 'job_id');

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

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('jobitemsitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('jobitemsitem.save2new', "GUIDEMAN_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('jobitemsitem.save2copy', "GUIDEMAN_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('jobitemsitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('jobitems.trash', "GUIDEMAN_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEMAN_JTOOLBAR_DELETE", 'jobitemsitem.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('jobitems.archive', 'archive', 'archive',  "GUIDEMAN_JTOOLBAR_ARCHIVE", false);



		$this->toolbar = JToolbar::getInstance();
		$model_job_id = CkJModel::getInstance('Jobs', 'GuidemanModel');
		$model_job_id->addGroupOrder("a.file_number");
		$lists['fk']['job_id'] = $model_job_id->getItems();

		$model_service_provider = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_service_provider->addGroupOrder("a.name");
		$lists['fk']['service_provider'] = $model_service_provider->getItems();

		$model_guide = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_guide->addGroupOrder("a.alias");
		$lists['fk']['guide'] = $model_guide->getItems();
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewJobitemsitem')){ class GuidemanViewJobitemsitem extends GuidemanCkViewJobitemsitem{} }


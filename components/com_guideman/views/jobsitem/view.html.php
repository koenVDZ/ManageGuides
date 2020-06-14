<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Jobs
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
* @subpackage	Jobsitem
*/
class GuidemanCkViewJobsitem extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('jobsitemfly', 'jobsedit');

	/**
	* Execute and display a template : Job Details
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayJobsedit($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.jobsedit');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_JOB_DETAILS'), $this->item, 'file_name');

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
			JToolBarHelper::save('jobsitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('jobsitem.save2new', "GUIDEMAN_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('jobsitem.save2copy', "GUIDEMAN_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('jobsitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Publish
		if (!$isNew && $model->canEditState($item) && ($item->published != 1))
			JToolBarHelper::publish('jobs.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");
		// Unpublish
		if (!$isNew && $model->canEditState($item) && ($item->published != 0))
			JToolBarHelper::unpublish('jobs.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('jobs.trash', "GUIDEMAN_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEMAN_JTOOLBAR_DELETE", 'jobsitem.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('jobs.archive', 'archive', 'archive',  "GUIDEMAN_JTOOLBAR_ARCHIVE", false);



		$this->toolbar = JToolbar::getInstance();
		$model_company_id = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_company_id->addGroupOrder("a.name");
		$lists['fk']['company_id'] = $model_company_id->getItems();

		$model_client_id = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_client_id->addGroupOrder("a.name");
		$lists['fk']['client_id'] = $model_client_id->getItems();

		$model_operator_name = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_operator_name->addGroupOrder("a.alias");
		$lists['fk']['operator_name'] = $model_operator_name->getItems();

		$model_main_guide = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_main_guide->addGroupOrder("a.alias");
		$lists['fk']['main_guide'] = $model_main_guide->getItems();

		$model_trip_leader = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_trip_leader->addGroupOrder("a.alias");
		$lists['fk']['trip_leader'] = $model_trip_leader->getItems();

		$model_remunerations = CkJModel::getInstance('Prices', 'GuidemanModel');
		$model_remunerations->addGroupOrder("a.name");
		$lists['fk']['remunerations'] = $model_remunerations->getItems();

		$model_invoicing = CkJModel::getInstance('Prices', 'GuidemanModel');
		$model_invoicing->addGroupOrder("a.name");
		$lists['fk']['invoicing'] = $model_invoicing->getItems();

		$model_requested_language = CkJModel::getInstance('Languages', 'GuidemanModel');
		$model_requested_language->addGroupOrder("a.name");
		$lists['fk']['requested_language'] = $model_requested_language->getItems();

		$model_second_language_option = CkJModel::getInstance('Languages', 'GuidemanModel');
		$model_second_language_option->addGroupOrder("a.name");
		$lists['fk']['second_language_option'] = $model_second_language_option->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Jobs', 'GuidemanModel');
		if (isset($item->company_id))
			$orderModel->addWhere("a.company_id = '" . $item->company_id . "'");
		$lists["ordering"] = $orderModel->getItems();
	}

	/**
	* Execute and display a template : Jobs item Fly
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayJobsitemfly($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.jobsitemfly');
		$this->item		= $item		= $this->get('Item');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_JOBS_ITEM_FLY'), $this->item, 'file_name');

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

		// Cancel
		JToolBarHelper::cancel('jobsitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");

		$this->toolbar = JToolbar::getInstance();

	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewJobsitem')){ class GuidemanViewJobsitem extends GuidemanCkViewJobsitem{} }


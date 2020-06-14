<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
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
* HTML View class for the Guideadm component
*
* @package	Guideadm
* @subpackage	Jobsitem
*/
class GuideadmCkViewJobsitem extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('job');

	/**
	* Execute and display a template : Job
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayJob($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.job');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuideadmHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_JOB'), $this->item, 'file_name');

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
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_JOB'), 'pencil-2');

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('jobsitem.save', "GUIDEADM_JTOOLBAR_SAVE_CLOSE");
		// Save
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::apply('jobsitem.apply', "GUIDEADM_JTOOLBAR_SAVE");
		// Cancel
		JToolBarHelper::cancel('jobsitem.cancel', "GUIDEADM_JTOOLBAR_CANCEL");
		// Publish
		if (!$isNew && $model->canEditState($item) && ($item->published != 1))
			JToolBarHelper::publish('jobs.publish', "GUIDEADM_JTOOLBAR_PUBLISH");
		// Unpublish
		if (!$isNew && $model->canEditState($item) && ($item->published != 0))
			JToolBarHelper::unpublish('jobs.unpublish', "GUIDEADM_JTOOLBAR_UNPUBLISH");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('jobs.trash', "GUIDEADM_JTOOLBAR_TRASH", false);
		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('jobs.archive', 'archive', 'archive',  "GUIDEADM_JTOOLBAR_ARCHIVE", false);


		$model_company_id = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_company_id->addGroupOrder("a.name");
		$lists['fk']['company_id'] = $model_company_id->getItems();

		$model_client_id = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_client_id->addGroupOrder("a.name");
		$lists['fk']['client_id'] = $model_client_id->getItems();

		$model_requested_language = CkJModel::getInstance('Languages', 'GuideadmModel');
		$model_requested_language->addGroupOrder("a.name");
		$lists['fk']['requested_language'] = $model_requested_language->getItems();

		$model_second_language_option = CkJModel::getInstance('Languages', 'GuideadmModel');
		$model_second_language_option->addGroupOrder("a.name");
		$lists['fk']['second_language_option'] = $model_second_language_option->getItems();

		$model_operator_name = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_operator_name->addGroupOrder("a.name");
		$lists['fk']['operator_name'] = $model_operator_name->getItems();

		$model_main_guide = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_main_guide->addGroupOrder("a.name");
		$lists['fk']['main_guide'] = $model_main_guide->getItems();

		$model_trip_leader = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_trip_leader->addGroupOrder("a.name");
		$lists['fk']['trip_leader'] = $model_trip_leader->getItems();

		$model_remunerations = CkJModel::getInstance('Prices', 'GuideadmModel');
		$model_remunerations->addGroupOrder("a.company");
		$lists['fk']['remunerations'] = $model_remunerations->getItems();

		$model_invoicing = CkJModel::getInstance('Prices', 'GuideadmModel');
		$model_invoicing->addGroupOrder("a.company");
		$lists['fk']['invoicing'] = $model_invoicing->getItems();

		$model_created_by = CkJModel::getInstance('ThirdUsers', 'GuideadmModel');
		$model_created_by->addGroupOrder("a.name");
		$lists['fk']['created_by'] = $model_created_by->getItems();

		$model_modified_by = CkJModel::getInstance('ThirdUsers', 'GuideadmModel');
		$model_modified_by->addGroupOrder("a.name");
		$lists['fk']['modified_by'] = $model_modified_by->getItems();

		$model_my_joomla_user = CkJModel::getInstance('ThirdUsers', 'GuideadmModel');
		$model_my_joomla_user->addGroupOrder("a.name");
		$lists['fk']['my_joomla_user'] = $model_my_joomla_user->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Jobs', 'GuideadmModel');
		if (isset($item->company_id))
			$orderModel->addWhere("a.company_id = '" . $item->company_id . "'");
		$lists["ordering"] = $orderModel->getItems();
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewJobsitem')){ class GuideadmViewJobsitem extends GuideadmCkViewJobsitem{} }


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
* @subpackage	Jobs
*/
class GuidemanCkViewJobs extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Jobs (Service Orders)
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayDefault($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_guideman', true);
		$state->set('context', 'layout.default');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuidemanHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('default.filters');
		$this->menu = GuidemanHelper::addSubmenu('jobs', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_JOBS_SERVICE_ORDERS'));

		

		//Filters
		// Company
		$modelCompany_id = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelCompany_id->set('context', $model->get('context'));
		$filters['filter_company_id']->jdomOptions = array(
			'list' => $modelCompany_id->getItems()
		);

		// Client
		$modelClient_id = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelClient_id->set('context', $model->get('context'));
		$filters['filter_client_id']->jdomOptions = array(
			'list' => $modelClient_id->getItems()
		);

		// Req. Lang.
		$modelRequested_language = CkJModel::getInstance('languages', 'GuidemanModel');
		$modelRequested_language->set('context', $model->get('context'));
		$filters['filter_requested_language']->jdomOptions = array(
			'list' => $modelRequested_language->getItems()
		);

		// Back. Lang.
		$modelSecond_language_option = CkJModel::getInstance('languages', 'GuidemanModel');
		$modelSecond_language_option->set('context', $model->get('context'));
		$filters['filter_second_language_option']->jdomOptions = array(
			'list' => $modelSecond_language_option->getItems()
		);

		// Operator
		$modelOperator_name = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelOperator_name->set('context', $model->get('context'));
		$filters['filter_operator_name']->jdomOptions = array(
			'list' => $modelOperator_name->getItems()
		);

		// Main Guide
		$modelMain_guide = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelMain_guide->set('context', $model->get('context'));
		$filters['filter_main_guide']->jdomOptions = array(
			'list' => $modelMain_guide->getItems()
		);

		// Trip Leader
		$modelTrip_leader = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelTrip_leader->set('context', $model->get('context'));
		$filters['filter_trip_leader']->jdomOptions = array(
			'list' => $modelTrip_leader->getItems()
		);

		// Remuneration
		$modelRemunerations_company = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelRemunerations_company->set('context', $model->get('context'));
		$filters['filter_remunerations_company']->jdomOptions = array(
			'list' => $modelRemunerations_company->getItems()
		);

		// Pricing
		$modelInvoicing_company = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelInvoicing_company->set('context', $model->get('context'));
		$filters['filter_invoicing_company']->jdomOptions = array(
			'list' => $modelInvoicing_company->getItems()
		);

		// Created By
		$modelCreated_by = CkJModel::getInstance('thirdusers', 'GuidemanModel');
		$modelCreated_by->set('context', $model->get('context'));
		$filters['filter_created_by']->jdomOptions = array(
			'list' => $modelCreated_by->getItems()
		);

		// Modified By
		$modelModified_by = CkJModel::getInstance('thirdusers', 'GuidemanModel');
		$modelModified_by->set('context', $model->get('context'));
		$filters['filter_modified_by']->jdomOptions = array(
			'list' => $modelModified_by->getItems()
		);

		// My Joomla user > Name
		$modelMy_joomla_user = CkJModel::getInstance('thirdusers', 'GuidemanModel');
		$modelMy_joomla_user->set('context', $model->get('context'));
		$filters['filter_my_joomla_user']->jdomOptions = array(
			'list' => $modelMy_joomla_user->getItems()
		);

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('default')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('jobsitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('jobsitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('jobs.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('jobs.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('jobs.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'jobsitem.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('jobs.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		// Custom
		JToolBarHelper::custom('jobsitem.custom', 'cog', 'cog', "GUIDEMAN_JTOOLBAR_CUSTOM", true);


		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Jobs (Service Orders)
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayModal($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_guideman', true);
		$state->set('context', 'layout.modal');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuidemanHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('modal.filters');
		$this->menu = GuidemanHelper::addSubmenu('jobs', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_JOBS_SERVICE_ORDERS'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('jobsitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('jobsitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('jobs.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('jobs.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('jobs.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'jobsitem.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('jobs.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		// Custom
		JToolBarHelper::custom('jobsitem.custom', 'cog', 'cog', "GUIDEMAN_JTOOLBAR_CUSTOM", true);


		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Returns an array of fields the table can be sorted by.
	*
	* @access	protected
	* @param	string	$layout	The name of the called layout. Not used yet
	*
	*
	* @since	3.0
	*
	* @return	array	Array containing the field name to sort by as the key and display text as value.
	*/
	protected function getSortFields($layout = null)
	{
		return array(
			'ordering' => JText::_('GUIDEMAN_FIELD_ORDER'),
			'status' => JText::_('GUIDEMAN_FIELD_STATUS'),
			'file_number' => JText::_('GUIDEMAN_FIELD_FILE_NUMBER'),
			'company_id' => JText::_('GUIDEMAN_FIELD_ID'),
			'client_id.name' => JText::_('GUIDEMAN_FIELD_CLIENT_NAME'),
			'client_id' => JText::_('GUIDEMAN_FIELD_ID'),
			'client_id.surname' => JText::_('GUIDEMAN_FIELD_OFFICIAL_NAME'),
			'requested_language.name' => JText::_('GUIDEMAN_FIELD_TOUR_LANG'),
			'second_language_option.name' => JText::_('GUIDEMAN_FIELD_BACKUP_LANGUAGE'),
			'operator_name.nationality.iso_2' => JText::_('GUIDEMAN_FIELD_FLAG'),
			'operator_name.name' => JText::_('GUIDEMAN_FIELD_OPERATER_NAME'),
			'operator_name.surname' => JText::_('GUIDEMAN_FIELD_SURNAME'),
			'operator_name' => JText::_('GUIDEMAN_FIELD_ID'),
			'operator_name.alias' => JText::_('GUIDEMAN_FIELD_ALIAS'),
			'guide_status' => JText::_('GUIDEMAN_FIELD_STATUS'),
			'main_guide.name' => JText::_('GUIDEMAN_FIELD_MAIN_GUIDE'),
			'main_guide' => JText::_('GUIDEMAN_FIELD_ID'),
			'main_guide.alias' => JText::_('GUIDEMAN_FIELD_ALIAS'),
			'pax' => JText::_('GUIDEMAN_FIELD_PAX'),
			'start_date' => JText::_('GUIDEMAN_FIELD_START_DATE'),
			'end_date' => JText::_('GUIDEMAN_FIELD_END_DATE'),
			'published' => JText::_('GUIDEMAN_FIELD_STATE'),
			'' => JText::_('GUIDEMAN_FIELD_ID'),
			'trip_leader.name' => JText::_('GUIDEMAN_FIELD_TRIP_LEADER_NAME'),
			'trip_leader.surname' => JText::_('GUIDEMAN_FIELD_SURNAME'),
			'trip_leader' => JText::_('GUIDEMAN_FIELD_ID'),
			'trip_leader.alias' => JText::_('GUIDEMAN_FIELD_ALIAS'),
			'remunerations' => JText::_('GUIDEMAN_FIELD_ID'),
			'remunerations.name' => JText::_('GUIDEMAN_FIELD_REMUNERATION'),
			'invoicing' => JText::_('GUIDEMAN_FIELD_ID'),
			'invoicing.name' => JText::_('GUIDEMAN_FIELD_PRICING'),
			'total_debet' => JText::_('GUIDEMAN_FIELD_TOTAL_DEBET'),
			'total_credit' => JText::_('GUIDEMAN_FIELD_TOTAL_CREDIT'),
			'coordination' => JText::_('GUIDEMAN_FIELD_COORDINATION')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewJobs')){ class GuidemanViewJobs extends GuidemanCkViewJobs{} }


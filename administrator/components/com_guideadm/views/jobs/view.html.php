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
* @subpackage	Jobs
*/
class GuideadmCkViewJobs extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Jobs
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
		$this->params 		= JComponentHelper::getParams('com_guideadm', true);
		$state->set('context', 'layout.default');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuideadmHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('default.filters');
		$this->menu = GuideadmHelper::addSubmenu('jobs', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_JOBS'));

		

		//Filters
		// Company
		$modelCompany_id = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelCompany_id->set('context', $model->get('context'));
		$filters['filter_company_id']->jdomOptions = array(
			'list' => $modelCompany_id->getItems()
		);

		// Name
		$modelClient_id = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelClient_id->set('context', $model->get('context'));
		$filters['filter_client_id']->jdomOptions = array(
			'list' => $modelClient_id->getItems()
		);

		// Req. language
		$modelRequested_language = CkJModel::getInstance('languages', 'GuideadmModel');
		$modelRequested_language->set('context', $model->get('context'));
		$filters['filter_requested_language']->jdomOptions = array(
			'list' => $modelRequested_language->getItems()
		);

		// Seq. Language
		$modelSecond_language_option = CkJModel::getInstance('languages', 'GuideadmModel');
		$modelSecond_language_option->set('context', $model->get('context'));
		$filters['filter_second_language_option']->jdomOptions = array(
			'list' => $modelSecond_language_option->getItems()
		);

		// operator
		$modelOperator_name = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelOperator_name->set('context', $model->get('context'));
		$filters['filter_operator_name']->jdomOptions = array(
			'list' => $modelOperator_name->getItems()
		);

		// Main Guide
		$modelMain_guide = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelMain_guide->set('context', $model->get('context'));
		$filters['filter_main_guide']->jdomOptions = array(
			'list' => $modelMain_guide->getItems()
		);

		// Trip Leader
		$modelTrip_leader = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelTrip_leader->set('context', $model->get('context'));
		$filters['filter_trip_leader']->jdomOptions = array(
			'list' => $modelTrip_leader->getItems()
		);

		// Remuneration
		$modelRemunerations_company = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelRemunerations_company->set('context', $model->get('context'));
		$filters['filter_remunerations_company']->jdomOptions = array(
			'list' => $modelRemunerations_company->getItems()
		);

		// Prices
		$modelInvoicing_company = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelInvoicing_company->set('context', $model->get('context'));
		$filters['filter_invoicing_company']->jdomOptions = array(
			'list' => $modelInvoicing_company->getItems()
		);

		// Created By
		$modelCreated_by = CkJModel::getInstance('thirdusers', 'GuideadmModel');
		$modelCreated_by->set('context', $model->get('context'));
		$filters['filter_created_by']->jdomOptions = array(
			'list' => $modelCreated_by->getItems()
		);

		// Modified By
		$modelModified_by = CkJModel::getInstance('thirdusers', 'GuideadmModel');
		$modelModified_by->set('context', $model->get('context'));
		$filters['filter_modified_by']->jdomOptions = array(
			'list' => $modelModified_by->getItems()
		);

		// Joomla User
		$modelMy_joomla_user = CkJModel::getInstance('thirdusers', 'GuideadmModel');
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
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_JOBS'), 'list');

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('jobsitem.add', "GUIDEADM_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('jobsitem.edit', "GUIDEADM_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEADM_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'jobsitem.delete', "GUIDEADM_JTOOLBAR_DELETE");

		// Config
		if ($model->canAdmin())
			JToolBarHelper::preferences('com_guideadm');

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('jobs.publish', "GUIDEADM_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('jobs.unpublish', "GUIDEADM_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('jobs.trash', "GUIDEADM_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('jobs.archive', "GUIDEADM_JTOOLBAR_ARCHIVE");
	}

	/**
	* Execute and display a template : Jobs
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
		$this->params 		= JComponentHelper::getParams('com_guideadm', true);
		$state->set('context', 'layout.modal');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuideadmHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('modal.filters');
		$this->menu = GuideadmHelper::addSubmenu('jobs', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_JOBS'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_JOBS'), 'list');


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
			'ordering' => JText::_('GUIDEADM_FIELD_ORDER'),
			'status' => JText::_('GUIDEADM_FIELD_STATUS'),
			'file_number' => JText::_('GUIDEADM_FIELD_FILE_NUMBER'),
			'file_name' => JText::_('GUIDEADM_FIELD_FILE_NAME'),
			'client_id.name' => JText::_('GUIDEADM_FIELD_CLIENT'),
			'requested_language.name' => JText::_('GUIDEADM_FIELD_LANGUAGE'),
			'second_language_option.name' => JText::_('GUIDEADM_FIELD_SEC_LANGUAGE'),
			'trip_leader.name' => JText::_('GUIDEADM_FIELD_TL'),
			'remunerations.company' => JText::_('GUIDEADM_FIELD_RENUMERATION'),
			'invoicing.company' => JText::_('GUIDEADM_FIELD_PRICES')
		);
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewJobs')){ class GuideadmViewJobs extends GuideadmCkViewJobs{} }


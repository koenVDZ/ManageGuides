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
* @subpackage	Services
*/
class GuideadmCkViewServices extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Services
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
		$this->menu = GuideadmHelper::addSubmenu('services', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_SERVICES'));

		

		//Filters
		// Company > Name
		$modelCompany = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelCompany->set('context', $model->get('context'));
		$filters['filter_company']->jdomOptions = array(
			'list' => $modelCompany->getItems()
		);

		// Country > Country Name
		$modelCountry = CkJModel::getInstance('countries', 'GuideadmModel');
		$modelCountry->set('context', $model->get('context'));
		$filters['filter_country']->jdomOptions = array(
			'list' => $modelCountry->getItems()
		);

		// State > State
		$modelState = CkJModel::getInstance('states', 'GuideadmModel');
		$modelState->set('context', $model->get('context'));
		$filters['filter_state']->jdomOptions = array(
			'list' => $modelState->getItems()
		);

		// Company > ID
		$modelRemunaration_company = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelRemunaration_company->set('context', $model->get('context'));
		$filters['filter_remunaration_company']->jdomOptions = array(
			'list' => $modelRemunaration_company->getItems()
		);

		// Company > ID
		$modelCosts_company = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelCosts_company->set('context', $model->get('context'));
		$filters['filter_costs_company']->jdomOptions = array(
			'list' => $modelCosts_company->getItems()
		);

		// Policy > Name
		$modelPolicy = CkJModel::getInstance('policies', 'GuideadmModel');
		$modelPolicy->set('context', $model->get('context'));
		$filters['filter_policy']->jdomOptions = array(
			'list' => $modelPolicy->getItems()
		);

		// Created By > Name
		$modelCreated_by = CkJModel::getInstance('thirdusers', 'GuideadmModel');
		$modelCreated_by->set('context', $model->get('context'));
		$filters['filter_created_by']->jdomOptions = array(
			'list' => $modelCreated_by->getItems()
		);

		// Modified by > Name
		$modelModified_by = CkJModel::getInstance('thirdusers', 'GuideadmModel');
		$modelModified_by->set('context', $model->get('context'));
		$filters['filter_modified_by']->jdomOptions = array(
			'list' => $modelModified_by->getItems()
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
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_SERVICES'), 'list');

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('service.add', "GUIDEADM_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('service.edit', "GUIDEADM_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEADM_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'service.delete', "GUIDEADM_JTOOLBAR_DELETE");

		// Config
		if ($model->canAdmin())
			JToolBarHelper::preferences('com_guideadm');

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('services.publish', "GUIDEADM_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('services.unpublish', "GUIDEADM_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('services.trash', "GUIDEADM_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('services.archive', "GUIDEADM_JTOOLBAR_ARCHIVE");
	}

	/**
	* Execute and display a template : Services
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
		$this->menu = GuideadmHelper::addSubmenu('services', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_SERVICES'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_SERVICES'), 'list');


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
			'company' => JText::_('GUIDEADM_FIELD_COMPANY')
		);
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewServices')){ class GuideadmViewServices extends GuideadmCkViewServices{} }


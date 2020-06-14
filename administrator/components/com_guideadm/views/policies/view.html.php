<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Policies
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
* @subpackage	Policies
*/
class GuideadmCkViewPolicies extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Policies
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
		$this->menu = GuideadmHelper::addSubmenu('policies', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_POLICIES'));

		

		//Filters
		// Category
		$modelCatid = CkJModel::getInstance('categories', 'GuideadmModel');
		$modelCatid->set('context', $model->get('context'));
		$filters['filter_catid']->jdomOptions = array(
			'list' => $modelCatid->getItems()
		);

		// Company
		$modelCompany_id = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelCompany_id->set('context', $model->get('context'));
		$filters['filter_company_id']->jdomOptions = array(
			'list' => $modelCompany_id->getItems()
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

		// Language > Title
		$modelLanguage = CkJModel::getInstance('lang', 'GuideadmModel');
		$modelLanguage->set('context', $model->get('context'));
		$filters['filter_language']->jdomOptions = array(
			'list' => $modelLanguage->getItems()
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
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_POLICIES'), 'list');

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('policy.add', "GUIDEADM_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('policy.edit', "GUIDEADM_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEADM_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'policy.delete', "GUIDEADM_JTOOLBAR_DELETE");

		// Config
		if ($model->canAdmin())
			JToolBarHelper::preferences('com_guideadm');

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('policies.publish', "GUIDEADM_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('policies.unpublish', "GUIDEADM_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('policies.trash', "GUIDEADM_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('policies.archive', "GUIDEADM_JTOOLBAR_ARCHIVE");
	}

	/**
	* Execute and display a template : Policies
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
		$this->menu = GuideadmHelper::addSubmenu('policies', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_POLICIES'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_POLICIES'), 'list');


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
			'name' => JText::_('GUIDEADM_FIELD_NAME'),
			'alias' => JText::_('GUIDEADM_FIELD_ALIAS'),
			'company_id.name' => JText::_('GUIDEADM_FIELD_COMPANY')
		);
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewPolicies')){ class GuideadmViewPolicies extends GuideadmCkViewPolicies{} }


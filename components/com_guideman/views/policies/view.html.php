<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
* HTML View class for the Guideman component
*
* @package	Guideman
* @subpackage	Policies
*/
class GuidemanCkViewPolicies extends GuidemanClassView
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
		$this->params 		= JComponentHelper::getParams('com_guideman', true);
		$state->set('context', 'layout.default');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuidemanHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('default.filters');
		$this->menu = GuidemanHelper::addSubmenu('policies', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_POLICIES'));

		

		//Filters
		// Created By
		$modelCreated_by = CkJModel::getInstance('thirdusers', 'GuidemanModel');
		$modelCreated_by->set('context', $model->get('context'));
		$filters['filter_created_by']->jdomOptions = array(
			'list' => $modelCreated_by->getItems()
		);

		// Language
		$modelLanguage = CkJModel::getInstance('lang', 'GuidemanModel');
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

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('policy.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('policy.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('policies.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('policies.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('policies.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'policy.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('policies.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
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
		$this->params 		= JComponentHelper::getParams('com_guideman', true);
		$state->set('context', 'layout.modal');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuidemanHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('modal.filters');
		$this->menu = GuidemanHelper::addSubmenu('policies', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_POLICIES'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('policy.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('policy.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('policies.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('policies.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('policies.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'policy.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('policies.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

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
			'catid' => JText::_('GUIDEMAN_FIELD_CATID'),
			'catid.MGcat' => JText::_('GUIDEMAN_FIELD_CATEGORY'),
			'company_id.name' => JText::_('GUIDEMAN_FIELD_COMPANY'),
			'name' => JText::_('GUIDEMAN_FIELD_POLICY_NAME'),
			'language.lang_code' => JText::_('GUIDEMAN_FIELD_POLICY_LANGUAGE'),
			'language.title' => JText::_('GUIDEMAN_FIELD_LANGUAGE'),
			'time_1' => JText::_('GUIDEMAN_FIELD_TIME_1'),
			'percent_1' => JText::_('GUIDEMAN_FIELD_PERCENT_1'),
			'time_2' => JText::_('GUIDEMAN_FIELD_TIME_2'),
			'percent_2' => JText::_('GUIDEMAN_FIELD_PERCENT_2'),
			'time_3' => JText::_('GUIDEMAN_FIELD_TIME_3'),
			'percent_3' => JText::_('GUIDEMAN_FIELD_PERCENT_3'),
			'published' => JText::_('GUIDEMAN_FIELD_STATE'),
			'' => JText::_('GUIDEMAN_FIELD_ID')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewPolicies')){ class GuidemanViewPolicies extends GuidemanCkViewPolicies{} }


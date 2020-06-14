<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Servicos
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
* @subpackage	Servicos
*/
class GuidemanCkViewServicos extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Servicos
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
		$this->menu = GuidemanHelper::addSubmenu('servicos', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_SERVICOS'));

		

		//Filters
		// Country > Country Name
		$modelCountry = CkJModel::getInstance('countries', 'GuidemanModel');
		$modelCountry->set('context', $model->get('context'));
		$filters['filter_country']->jdomOptions = array(
			'list' => $modelCountry->getItems()
		);

		// State > State
		$modelState = CkJModel::getInstance('states', 'GuidemanModel');
		$modelState->set('context', $model->get('context'));
		$filters['filter_state']->jdomOptions = array(
			'list' => $modelState->getItems()
		);

		// Policy > Name
		$modelPolicy = CkJModel::getInstance('policies', 'GuidemanModel');
		$modelPolicy->set('context', $model->get('context'));
		$filters['filter_policy']->jdomOptions = array(
			'list' => $modelPolicy->getItems()
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

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'servico.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('servicos.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('servicos.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('servicos.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('servicos.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Servicos
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
		$this->menu = GuidemanHelper::addSubmenu('servicos', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_SERVICOS'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'servico.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('servicos.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('servicos.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('servicos.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('servicos.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

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
			'ordering' => JText::_('GUIDEMAN_FIELD_ORDERING')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewServicos')){ class GuidemanViewServicos extends GuidemanCkViewServicos{} }


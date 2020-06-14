<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Prices
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
* @subpackage	Prices
*/
class GuidemanCkViewPrices extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('usrremun', 'default', 'useremunbygrouper', 'usrpricesbygrouper', 'modal');

	/**
	* Execute and display a template : Prices
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
		$this->menu = GuidemanHelper::addSubmenu('prices', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_PRICES'));

		

		//Filters
		// Company
		$modelCompany = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelCompany->set('context', $model->get('context'));
		$filters['filter_company']->jdomOptions = array(
			'list' => $modelCompany->getItems()
		);

		// Currency
		$modelCurrency = CkJModel::getInstance('currencies', 'GuidemanModel');
		$modelCurrency->set('context', $model->get('context'));
		$filters['filter_currency']->jdomOptions = array(
			'list' => $modelCurrency->getItems()
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
			JToolBarHelper::addNew('price.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('price.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'price.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// New Period
		JToolBarHelper::custom('price.new_period', 'cog', 'cog', "GUIDEMAN_JTOOLBAR_NEW_PERIOD", true);


		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Prices
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
		$this->menu = GuidemanHelper::addSubmenu('prices', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_PRICES'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('price.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('price.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'price.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Custom
		JToolBarHelper::custom('price.custom', 'cog', 'cog', "GUIDEMAN_JTOOLBAR_CUSTOM", true);


		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Remunerations by type of Service
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayUseremunbygrouper($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_guideman', true);
		$state->set('context', 'layout.useremunbygrouper');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuidemanHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('useremunbygrouper.filters');
		$this->menu = GuidemanHelper::addSubmenu('prices', 'useremunbygrouper');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_REMUNERATIONS_BY_TYPE_OF_SERVICE'));

		

		//Filters
		// Company
		$modelCompany = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelCompany->set('context', $model->get('context'));
		$filters['filter_company']->jdomOptions = array(
			'list' => $modelCompany->getItems()
		);

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('useremunbygrouper')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('price.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('price.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'price.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('prices.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('prices.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('prices.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('prices.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		// Custom
		JToolBarHelper::custom('price.custom', 'cog', 'cog', "GUIDEMAN_JTOOLBAR_CUSTOM", true);


		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Prices Services By type of Service
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayUsrpricesbygrouper($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_guideman', true);
		$state->set('context', 'layout.usrpricesbygrouper');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuidemanHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('usrpricesbygrouper.filters');
		$this->menu = GuidemanHelper::addSubmenu('prices', 'usrpricesbygrouper');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_PRICES_SERVICES_BY_TYPE_OF_SERVICE'));

		

		//Filters
		// Compamy
		$modelCompany = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelCompany->set('context', $model->get('context'));
		$filters['filter_company']->jdomOptions = array(
			'list' => $modelCompany->getItems()
		);

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('usrpricesbygrouper')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('price.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('price.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'price.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('prices.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('prices.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('prices.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('prices.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		// Custom
		JToolBarHelper::custom('price.custom', 'cog', 'cog', "GUIDEMAN_JTOOLBAR_CUSTOM", true);


		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Remunerations
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayUsrremun($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_guideman', true);
		$state->set('context', 'layout.usrremun');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuidemanHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('usrremun.filters');
		$this->menu = GuidemanHelper::addSubmenu('prices', 'usrremun');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_REMUNERATIONS'));

		

		//Filters
		// Currency
		$modelCurrency = CkJModel::getInstance('currencies', 'GuidemanModel');
		$modelCurrency->set('context', $model->get('context'));
		$filters['filter_currency']->jdomOptions = array(
			'list' => $modelCurrency->getItems()
		);

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('usrremun')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('price.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('price.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('prices.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('prices.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('prices.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'price.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('prices.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		// New Period
		JToolBarHelper::custom('price.new_period', 'cog', 'cog', "GUIDEMAN_JTOOLBAR_NEW_PERIOD", true);


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
			'ordering' => JText::_('GUIDEMAN_FIELD_ORDERING'),
			'name' => JText::_('GUIDEMAN_FIELD_NAME'),
			'currency.symbol' => JText::_('GUIDEMAN_FIELD_CURRENCY'),
			'hourly_rate' => JText::_('GUIDEMAN_FIELD_HOURLY_RATE'),
			'from_date' => JText::_('GUIDEMAN_FIELD_FROM'),
			'until_date' => JText::_('GUIDEMAN_FIELD_UNTIL'),
			'published' => JText::_('GUIDEMAN_FIELD_STATE'),
			'' => JText::_('GUIDEMAN_FIELD_ID'),
			'remuneration' => JText::_('GUIDEMAN_FIELD_REMUNERATION'),
			'coordination_in' => JText::_('GUIDEMAN_FIELD_COORDINATION_IN'),
			'coordination_fee' => JText::_('GUIDEMAN_FIELD_COORDINATION_FEE'),
			'extra_hour_day' => JText::_('GUIDEMAN_FIELD_EXTRA_HOUR_DAY'),
			'extra_hour_night' => JText::_('GUIDEMAN_FIELD_EXTRA_HOUR_NIGHT'),
			'night_shift' => JText::_('GUIDEMAN_FIELD_NIGHT_SHIFT'),
			'grouper' => JText::_('GUIDEMAN_FIELD_GROUPER'),
			'remark' => JText::_('GUIDEMAN_FIELD_REMARK'),
			'optional' => JText::_('GUIDEMAN_FIELD_OPTIONAL'),
			'currency.currency_id' => JText::_('GUIDEMAN_FIELD_CURRENCY'),
			'min_time' => JText::_('GUIDEMAN_FIELD_MIN_TIME_1'),
			'company' => JText::_('GUIDEMAN_FIELD_COMPANY')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewPrices')){ class GuidemanViewPrices extends GuidemanCkViewPrices{} }


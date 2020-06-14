<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Vehicles
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
* @subpackage	Vehicles
*/
class GuidemanCkViewVehicles extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Vehicles
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
		$this->menu = GuidemanHelper::addSubmenu('vehicles', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_VEHICLES'));

		

		//Filters
		// Contact
		$modelUser_id = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelUser_id->set('context', $model->get('context'));
		$filters['filter_user_id']->jdomOptions = array(
			'list' => $modelUser_id->getItems()
		);

		// Make
		$modelBrand_id = CkJModel::getInstance('brands', 'GuidemanModel');
		$modelBrand_id->set('context', $model->get('context'));
		$filters['filter_brand_id']->jdomOptions = array(
			'list' => $modelBrand_id->getItems()
		);

		// Created By
		$modelCreated_by = CkJModel::getInstance('thirdusers', 'GuidemanModel');
		$modelCreated_by->set('context', $model->get('context'));
		$filters['filter_created_by']->jdomOptions = array(
			'list' => $modelCreated_by->getItems()
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
			JToolBarHelper::addNew('vehiclesitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('vehiclesitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('vehicles.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('vehicles.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('vehicles.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Vehicles
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
		$this->menu = GuidemanHelper::addSubmenu('vehicles', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_VEHICLES'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('vehiclesitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('vehiclesitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('vehicles.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('vehicles.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('vehicles.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

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
			'vehicle_type' => JText::_('GUIDEMAN_FIELD_TYPE'),
			'brand_id.name' => JText::_('GUIDEMAN_FIELD_MAKE'),
			'model' => JText::_('GUIDEMAN_FIELD_MODEL'),
			'color' => JText::_('GUIDEMAN_FIELD_COLOR'),
			'pax' => JText::_('GUIDEMAN_FIELD_PAX'),
			'number_plate' => JText::_('GUIDEMAN_FIELD_LICENSE_PLATE'),
			'fuel' => JText::_('GUIDEMAN_FIELD_FUEL'),
			'car_insurance' => JText::_('GUIDEMAN_FIELD_CAR_INSURANCE'),
			'insurance_for_third_parties' => JText::_('GUIDEMAN_FIELD_INSURANCE_THIRD_PARTIES'),
			'year_of_build' => JText::_('GUIDEMAN_FIELD_BUILD'),
			'published' => JText::_('GUIDEMAN_FIELD_STATE'),
			'' => JText::_('GUIDEMAN_FIELD_ID')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewVehicles')){ class GuidemanViewVehicles extends GuidemanCkViewVehicles{} }


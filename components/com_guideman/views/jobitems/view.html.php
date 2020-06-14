<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Job Items
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
* @subpackage	Jobitems
*/
class GuidemanCkViewJobitems extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Job Items
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
		$this->menu = GuidemanHelper::addSubmenu('jobitems', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_JOB_ITEMS'));

		

		//Filters
		// Service Order
		$modelJob_id = CkJModel::getInstance('jobs', 'GuidemanModel');
		$modelJob_id->set('context', $model->get('context'));
		$filters['filter_job_id']->jdomOptions = array(
			'list' => $modelJob_id->getItems()
		);

		// Company
		$modelJob_id_company_id = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelJob_id_company_id->set('context', $model->get('context'));
		$filters['filter_job_id_company_id']->jdomOptions = array(
			'list' => $modelJob_id_company_id->getItems()
		);

		// Operator
		$modelJob_id_operator_name = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelJob_id_operator_name->set('context', $model->get('context'));
		$filters['filter_job_id_operator_name']->jdomOptions = array(
			'list' => $modelJob_id_operator_name->getItems()
		);

		// Transport Company
		$modelTransport = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelTransport->set('context', $model->get('context'));
		$filters['filter_transport']->jdomOptions = array(
			'list' => $modelTransport->getItems()
		);

		// Driver
		$modelDriver = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelDriver->set('context', $model->get('context'));
		$filters['filter_driver']->jdomOptions = array(
			'list' => $modelDriver->getItems()
		);

		// Guide
		$modelGuide = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelGuide->set('context', $model->get('context'));
		$filters['filter_guide']->jdomOptions = array(
			'list' => $modelGuide->getItems()
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
			JToolBarHelper::addNew('jobitemsitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('jobitemsitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('jobitems.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('jobitems.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('jobitems.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'jobitemsitem.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('jobitems.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Job Items
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
		$this->menu = GuidemanHelper::addSubmenu('jobitems', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_JOB_ITEMS'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('jobitemsitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('jobitemsitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('jobitems.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('jobitems.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('jobitems.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'jobitemsitem.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('jobitems.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

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
			'type' => JText::_('GUIDEMAN_FIELD_TYPE'),
			'item_status' => JText::_('GUIDEMAN_FIELD_STATUS'),
			'published' => JText::_('GUIDEMAN_FIELD_STATE'),
			'job_id.company_id.nationality.iso_2' => JText::_('GUIDEMAN_FIELD_FLAG'),
			'job_id.company_id.name' => JText::_('GUIDEMAN_FIELD_COMPANY'),
			'start_date' => JText::_('GUIDEMAN_FIELD_START_DATE'),
			'start_time' => JText::_('GUIDEMAN_FIELD_START_TIME'),
			'end_date' => JText::_('GUIDEMAN_FIELD_END_DATE'),
			'end_time' => JText::_('GUIDEMAN_FIELD_END_TIME'),
			'service.service_name' => JText::_('GUIDEMAN_FIELD_SERVICE'),
			'pax' => JText::_('GUIDEMAN_FIELD_PAX'),
			'service_provider_status' => JText::_('GUIDEMAN_FIELD_STATUS'),
			'service_provider.nationality.iso_2' => JText::_('GUIDEMAN_FIELD_FLAG'),
			'service_provider.name' => JText::_('GUIDEMAN_FIELD_SERVICE_PROVIDER'),
			'guide_status' => JText::_('GUIDEMAN_FIELD_STATUS'),
			'guide.name' => JText::_('GUIDEMAN_FIELD_GUIDE_NAME'),
			'guide.surname' => JText::_('GUIDEMAN_FIELD_SURNAME'),
			'guide' => JText::_('GUIDEMAN_FIELD_ID'),
			'guide.alias' => JText::_('GUIDEMAN_FIELD_ALIAS'),
			'transport_status' => JText::_('GUIDEMAN_FIELD_STATUS'),
			'transport.name' => JText::_('GUIDEMAN_FIELD_TRANSPORT_COMPANY'),
			'driver.nationality.iso_2' => JText::_('GUIDEMAN_FIELD_FLAG'),
			'driver.name' => JText::_('GUIDEMAN_FIELD_DRIVER_NAME'),
			'driver.surname' => JText::_('GUIDEMAN_FIELD_SURNAME'),
			'driver.alias' => JText::_('GUIDEMAN_FIELD_ALIAS'),
			'driver' => JText::_('GUIDEMAN_FIELD_ID'),
			'job_id.status' => JText::_('GUIDEMAN_FIELD_STATUS'),
			'' => JText::_('GUIDEMAN_FIELD_ID'),
			'remark' => JText::_('GUIDEMAN_FIELD_REMARK'),
			'job_id' => JText::_('GUIDEMAN_FIELD_JOBID'),
			'total_debet' => JText::_('GUIDEMAN_FIELD_TOTAL_DEBET'),
			'total_credit' => JText::_('GUIDEMAN_FIELD_TOTAL_CREDIT'),
			'optional' => JText::_('GUIDEMAN_FIELD_OPTIONAL_1')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewJobitems')){ class GuidemanViewJobitems extends GuidemanCkViewJobitems{} }


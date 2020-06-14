<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Addresses
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
* @subpackage	Addresses
*/
class GuideadmCkViewAddresses extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Addresses
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
		$this->menu = GuideadmHelper::addSubmenu('addresses', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_ADDRESSES'));

		

		//Filters
		// Category
		$modelCatid = CkJModel::getInstance('categories', 'GuideadmModel');
		$modelCatid->set('context', $model->get('context'));
		$filters['filter_catid']->jdomOptions = array(
			'list' => $modelCatid->getItems()
		);

		// UserName
		$modelUser_id = CkJModel::getInstance('contacts', 'GuideadmModel');
		$modelUser_id->set('context', $model->get('context'));
		$filters['filter_user_id']->jdomOptions = array(
			'list' => $modelUser_id->getItems()
		);

		// Address Type
		$modelAddress_label = CkJModel::getInstance('addresslabels', 'GuideadmModel');
		$modelAddress_label->set('context', $model->get('context'));
		$filters['filter_address_label']->jdomOptions = array(
			'list' => $modelAddress_label->getItems()
		);

		// Country
		$modelCountry_id = CkJModel::getInstance('countries', 'GuideadmModel');
		$modelCountry_id->set('context', $model->get('context'));
		$filters['filter_country_id']->jdomOptions = array(
			'list' => $modelCountry_id->getItems()
		);

		// State
		$modelState_id = CkJModel::getInstance('states', 'GuideadmModel');
		$modelState_id->set('context', $model->get('context'));
		$filters['filter_state_id']->jdomOptions = array(
			'list' => $modelState_id->getItems()
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

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('default')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_ADDRESSES'), 'list');

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('addressesitem.add', "GUIDEADM_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('addressesitem.edit', "GUIDEADM_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEADM_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'addressesitem.delete', "GUIDEADM_JTOOLBAR_DELETE");

		// Config
		if ($model->canAdmin())
			JToolBarHelper::preferences('com_guideadm');

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('addresses.publish', "GUIDEADM_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('addresses.unpublish', "GUIDEADM_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('addresses.trash', "GUIDEADM_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('addresses.archive', "GUIDEADM_JTOOLBAR_ARCHIVE");
	}

	/**
	* Execute and display a template : Addresses
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
		$this->menu = GuideadmHelper::addSubmenu('addresses', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_ADDRESSES'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_ADDRESSES'), 'list');


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
			'catid.MGcat' => JText::_('GUIDEADM_FIELD_CATEGORY'),
			'address_label.type' => JText::_('GUIDEADM_FIELD_TYPE'),
			'country_id.country_name' => JText::_('GUIDEADM_FIELD_COUNTRY'),
			'state_id.state' => JText::_('GUIDEADM_FIELD_STATE'),
			'suburb' => JText::_('GUIDEADM_FIELD_SUBURB'),
			'created_by.name' => JText::_('GUIDEADM_FIELD_CREATED_BY'),
			'published' => JText::_('GUIDEADM_FIELD_PUBLISHED'),
			'' => JText::_('GUIDEADM_FIELD_ID'),
			'user_id' => JText::_('GUIDEADM_FIELD_USER_ID')
		);
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewAddresses')){ class GuideadmViewAddresses extends GuideadmCkViewAddresses{} }


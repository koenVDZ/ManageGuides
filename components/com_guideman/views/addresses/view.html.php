<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
* HTML View class for the Guideman component
*
* @package	Guideman
* @subpackage	Addresses
*/
class GuidemanCkViewAddresses extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal');

	/**
	* Execute and display a template : Contact Addresses
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
		$this->menu = GuidemanHelper::addSubmenu('addresses', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_CONTACT_ADDRESSES'));

		

		//Filters
		// Address Type
		$modelAddress_label = CkJModel::getInstance('addresslabels', 'GuidemanModel');
		$modelAddress_label->set('context', $model->get('context'));
		$filters['filter_address_label']->jdomOptions = array(
			'list' => $modelAddress_label->getItems()
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
			JToolBarHelper::addNew('addressesitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('addressesitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('addresses.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('addresses.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('addresses.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'addressesitem.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('addresses.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Contact Addresses
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
		$this->menu = GuidemanHelper::addSubmenu('addresses', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_CONTACT_ADDRESSES'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('addressesitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('addressesitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('addresses.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('addresses.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('addresses.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'addressesitem.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('addresses.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

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
			'default_address' => JText::_('GUIDEMAN_FIELD_DEFAULT_ADDRESS'),
			'address_label.type' => JText::_('GUIDEMAN_FIELD_ADDRESS_TYPE'),
			'address' => JText::_('GUIDEMAN_FIELD_ADDRESS'),
			'zipcode' => JText::_('GUIDEMAN_FIELD_ZIP'),
			'suburb' => JText::_('GUIDEMAN_FIELD_SUBURB'),
			'city' => JText::_('GUIDEMAN_FIELD_CITY'),
			'state_id.abbreviation' => JText::_('GUIDEMAN_FIELD_STATE_ABR'),
			'state_id.state' => JText::_('GUIDEMAN_FIELD_STATE'),
			'country_id.country_name' => JText::_('GUIDEMAN_FIELD_COUNTRY'),
			'published' => JText::_('GUIDEMAN_FIELD_STATE'),
			'' => JText::_('GUIDEMAN_FIELD_ID'),
			'catid' => JText::_('GUIDEMAN_FIELD_CATID'),
			'catid.MGcat' => JText::_('GUIDEMAN_FIELD_CATEGORY'),
			'user_id' => JText::_('GUIDEMAN_FIELD_USER_ID')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewAddresses')){ class GuidemanViewAddresses extends GuidemanCkViewAddresses{} }


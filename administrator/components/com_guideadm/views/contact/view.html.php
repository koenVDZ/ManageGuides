<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Contacts
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
* @subpackage	Contact
*/
class GuideadmCkViewContact extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('contact');

	/**
	* Execute and display a template : Contact
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayContact($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.contact');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuideadmHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_CONTACT'), $this->item, 'name');

		$user		= JFactory::getUser();
		$isNew		= ($model->getId() == 0);

		//Check ACL before opening the form (prevent from direct access)
		if (!$model->canEdit($item, true))
			$model->setError(JText::_('JERROR_ALERTNOAUTHOR'));

		// Check for errors.
		if (count($errors = $model->getErrors()))
		{
			JError::raiseError(500, implode(BR, array_unique($errors)));
			return false;
		}
		//Toolbar
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_CONTACT'), 'pencil-2');

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('contact.save', "GUIDEADM_JTOOLBAR_SAVE_CLOSE");
		// Save
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::apply('contact.apply', "GUIDEADM_JTOOLBAR_SAVE");
		// Cancel
		JToolBarHelper::cancel('contact.cancel', "GUIDEADM_JTOOLBAR_CANCEL");
		// Publish
		if (!$isNew && $model->canEditState($item) && ($item->published != 1))
			JToolBarHelper::publish('contacts.publish', "GUIDEADM_JTOOLBAR_PUBLISH");
		// Unpublish
		if (!$isNew && $model->canEditState($item) && ($item->published != 0))
			JToolBarHelper::unpublish('contacts.unpublish', "GUIDEADM_JTOOLBAR_UNPUBLISH");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('contacts.trash', "GUIDEADM_JTOOLBAR_TRASH", false);
		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('contacts.archive', 'archive', 'archive',  "GUIDEADM_JTOOLBAR_ARCHIVE", false);


		$model_catid = CkJModel::getInstance('Categories', 'GuideadmModel');
		$model_catid->addGroupOrder("a.MGcat");
		$lists['fk']['catid'] = $model_catid->getItems();

		$model_company_id = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_company_id->addGroupOrder("a.name");
		$lists['fk']['company_id'] = $model_company_id->getItems();

		$model_business_type = CkJModel::getInstance('Businesstypes', 'GuideadmModel');
		$model_business_type->addGroupOrder("a.country_id");
		$lists['fk']['business_type'] = $model_business_type->getItems();

		$model_nationality = CkJModel::getInstance('Countries', 'GuideadmModel');
		$model_nationality->addGroupOrder("a.country_name");
		$lists['fk']['nationality'] = $model_nationality->getItems();

		$model_country_id = CkJModel::getInstance('Countries', 'GuideadmModel');
		$model_country_id->addGroupOrder("a.country_name");
		$lists['fk']['country_id'] = $model_country_id->getItems();

		$model_state_id = CkJModel::getInstance('States', 'GuideadmModel');
		$model_state_id->addGroupOrder("a.state");
		$lists['fk']['state_id'] = $model_state_id->getItems();

		$model_visits_id = CkJModel::getInstance('Categories', 'GuideadmModel');
		$model_visits_id->addGroupOrder("a.MGcat");
		$lists['fk']['visits_id'] = $model_visits_id->getItems();

		$model_created_by = CkJModel::getInstance('ThirdUsers', 'GuideadmModel');
		$model_created_by->addGroupOrder("a.name");
		$lists['fk']['created_by'] = $model_created_by->getItems();

		$model_modified_by = CkJModel::getInstance('ThirdUsers', 'GuideadmModel');
		$model_modified_by->addGroupOrder("a.name");
		$lists['fk']['modified_by'] = $model_modified_by->getItems();

		$model_my_joomla_user = CkJModel::getInstance('ThirdUsers', 'GuideadmModel');
		$model_my_joomla_user->addGroupOrder("a.name");
		$lists['fk']['my_joomla_user'] = $model_my_joomla_user->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Contacts', 'GuideadmModel');
				$lists["ordering"] = $orderModel->getItems();
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewContact')){ class GuideadmViewContact extends GuideadmCkViewContact{} }


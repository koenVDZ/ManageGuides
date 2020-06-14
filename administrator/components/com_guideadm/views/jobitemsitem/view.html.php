<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
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
* HTML View class for the Guideadm component
*
* @package	Guideadm
* @subpackage	Jobitemsitem
*/
class GuideadmCkViewJobitemsitem extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('jobitem');

	/**
	* Execute and display a template : Job Item
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayJobitem($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.jobitem');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuideadmHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_JOB_ITEM'), $this->item, 'job_id');

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
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_JOB_ITEM'), 'pencil-2');

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('jobitemsitem.save', "GUIDEADM_JTOOLBAR_SAVE_CLOSE");
		// Save
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::apply('jobitemsitem.apply', "GUIDEADM_JTOOLBAR_SAVE");
		// Cancel
		JToolBarHelper::cancel('jobitemsitem.cancel', "GUIDEADM_JTOOLBAR_CANCEL");
		// Publish
		if (!$isNew && $model->canEditState($item) && ($item->published != 1))
			JToolBarHelper::publish('jobitems.publish', "GUIDEADM_JTOOLBAR_PUBLISH");
		// Unpublish
		if (!$isNew && $model->canEditState($item) && ($item->published != 0))
			JToolBarHelper::unpublish('jobitems.unpublish', "GUIDEADM_JTOOLBAR_UNPUBLISH");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('jobitems.trash', "GUIDEADM_JTOOLBAR_TRASH", false);
		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('jobitems.archive', 'archive', 'archive',  "GUIDEADM_JTOOLBAR_ARCHIVE", false);


		$model_job_id = CkJModel::getInstance('Jobs', 'GuideadmModel');
		$model_job_id->addGroupOrder("a.file_name");
		$lists['fk']['job_id'] = $model_job_id->getItems();

		$model_service = CkJModel::getInstance('Services', 'GuideadmModel');
		$model_service->addGroupOrder("a.company");
		$lists['fk']['service'] = $model_service->getItems();

		$model_service_provider = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_service_provider->addGroupOrder("a.name");
		$lists['fk']['service_provider'] = $model_service_provider->getItems();

		$model_guide = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_guide->addGroupOrder("a.name");
		$lists['fk']['guide'] = $model_guide->getItems();

		$model_transport = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_transport->addGroupOrder("a.name");
		$lists['fk']['transport'] = $model_transport->getItems();

		$model_driver = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_driver->addGroupOrder("a.name");
		$lists['fk']['driver'] = $model_driver->getItems();

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
		$orderModel = CkJModel::getInstance('Jobitems', 'GuideadmModel');
				$lists["ordering"] = $orderModel->getItems();
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewJobitemsitem')){ class GuideadmViewJobitemsitem extends GuideadmCkViewJobitemsitem{} }


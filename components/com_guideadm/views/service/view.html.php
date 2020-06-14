<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
* @subpackage	Services
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
* @subpackage	Service
*/
class GuideadmCkViewService extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('service');

	/**
	* Execute and display a template : Service
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayService($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'service.service');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuideadmHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_SERVICE'), $this->item, 'company');

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

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('service.save', "GUIDEADM_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('service.save2new', "GUIDEADM_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('service.save2copy', "GUIDEADM_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('service.cancel', "GUIDEADM_JTOOLBAR_CANCEL");
		// Publish
		if (!$isNew && $model->canEditState($item) && ($item->published != 1))
			JToolBarHelper::publish('services.publish', "GUIDEADM_JTOOLBAR_PUBLISH");
		// Unpublish
		if (!$isNew && $model->canEditState($item) && ($item->published != 0))
			JToolBarHelper::unpublish('services.unpublish', "GUIDEADM_JTOOLBAR_UNPUBLISH");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('services.trash', "GUIDEADM_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEADM_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEADM_JTOOLBAR_DELETE", 'service.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('services.archive', 'archive', 'archive',  "GUIDEADM_JTOOLBAR_ARCHIVE", false);



		$this->toolbar = JToolbar::getInstance();
		$model_company = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_company->addGroupOrder("a.name");
		$lists['fk']['company'] = $model_company->getItems();

		$model_remunaration = CkJModel::getInstance('Prices', 'GuideadmModel');
		$model_remunaration->addGroupOrder("a.name");
		$lists['fk']['remunaration'] = $model_remunaration->getItems();

		$model_costs = CkJModel::getInstance('Prices', 'GuideadmModel');
		$model_costs->addGroupOrder("a.name");
		$lists['fk']['costs'] = $model_costs->getItems();

		$model_policy = CkJModel::getInstance('Policies', 'GuideadmModel');
		$model_policy->addGroupOrder("a.name");
		$lists['fk']['policy'] = $model_policy->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Services', 'GuideadmModel');
		if (isset($item->company))
			$orderModel->addWhere("a.company = '" . $item->company . "'");
		$lists["ordering"] = $orderModel->getItems();
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewService')){ class GuideadmViewService extends GuideadmCkViewService{} }

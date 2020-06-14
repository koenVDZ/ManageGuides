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
* @subpackage	Price
*/
class GuidemanCkViewPrice extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('remuneration', 'price', 'pricecopy', 'remunerationcopy');

	/**
	* Execute and display a template : Price
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayPrice($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.price');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_PRICE'), $this->item, 'company');

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
			JToolBarHelper::save('price.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('price.save2new', "GUIDEMAN_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('price.save2copy', "GUIDEMAN_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('price.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('prices.trash', "GUIDEMAN_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEMAN_JTOOLBAR_DELETE", 'price.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('prices.archive', 'archive', 'archive',  "GUIDEMAN_JTOOLBAR_ARCHIVE", false);


		// Custom
		JToolBarHelper::custom('price.custom', 'cog', 'cog', "GUIDEMAN_JTOOLBAR_CUSTOM", false);


		$this->toolbar = JToolbar::getInstance();
		$model_company = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_company->addGroupOrder("a.name");
		$lists['fk']['company'] = $model_company->getItems();

		$model_currency = CkJModel::getInstance('Currencies', 'GuidemanModel');
		$model_currency->addGroupOrder("a.title");
		$lists['fk']['currency'] = $model_currency->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Prices', 'GuidemanModel');
		if (isset($item->company))
			$orderModel->addWhere("a.company = '" . $item->company . "'");
		$lists["ordering"] = $orderModel->getItems();
	}

	/**
	* Execute and display a template : Clone a Price Detailed Information Page
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayPricecopy($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.pricecopy');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_CLONE_A_PRICE_DETAILED_INFORMATION_PAGE'), $this->item, 'company');

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

		// Cancel
		JToolBarHelper::cancel('price.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('price.save2copy', "GUIDEMAN_JTOOLBAR_SAVE_TO_COPY");

		$this->toolbar = JToolbar::getInstance();
		$model_company = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_company->addGroupOrder("a.name");
		$lists['fk']['company'] = $model_company->getItems();

		$model_currency = CkJModel::getInstance('Currencies', 'GuidemanModel');
		$model_currency->addGroupOrder("a.title");
		$lists['fk']['currency'] = $model_currency->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Prices', 'GuidemanModel');
		if (isset($item->company))
			$orderModel->addWhere("a.company = '" . $item->company . "'");
		$lists["ordering"] = $orderModel->getItems();

		$model_created_by = CkJModel::getInstance('ThirdUsers', 'GuidemanModel');
		$model_created_by->addGroupOrder("a.name");
		$lists['fk']['created_by'] = $model_created_by->getItems();

		$model_modified_by = CkJModel::getInstance('ThirdUsers', 'GuidemanModel');
		$model_modified_by->addGroupOrder("a.name");
		$lists['fk']['modified_by'] = $model_modified_by->getItems();
	}

	/**
	* Execute and display a template : Remuneration
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayRemuneration($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.remuneration');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_REMUNERATION'), $this->item, 'company');

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
			JToolBarHelper::save('price.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('price.save2new', "GUIDEMAN_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('price.save2copy', "GUIDEMAN_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('price.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('prices.trash', "GUIDEMAN_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEMAN_JTOOLBAR_DELETE", 'price.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('prices.archive', 'archive', 'archive',  "GUIDEMAN_JTOOLBAR_ARCHIVE", false);


		// Custom
		JToolBarHelper::custom('price.custom', 'cog', 'cog', "GUIDEMAN_JTOOLBAR_CUSTOM", false);


		$this->toolbar = JToolbar::getInstance();
		$model_company = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_company->addGroupOrder("a.name");
		$lists['fk']['company'] = $model_company->getItems();

		$model_currency = CkJModel::getInstance('Currencies', 'GuidemanModel');
		$model_currency->addGroupOrder("a.title");
		$lists['fk']['currency'] = $model_currency->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Prices', 'GuidemanModel');
		if (isset($item->company))
			$orderModel->addWhere("a.company = '" . $item->company . "'");
		$lists["ordering"] = $orderModel->getItems();
	}

	/**
	* Execute and display a template : Clone a Remuneration Detailed Information
	* Page
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayRemunerationcopy($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.remunerationcopy');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_CLONE_A_REMUNERATION_DETAILED_INFORMATION_PAGE'), $this->item, 'company');

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

		// Cancel
		JToolBarHelper::cancel('price.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('price.save2copy', "GUIDEMAN_JTOOLBAR_SAVE_TO_COPY");

		$this->toolbar = JToolbar::getInstance();
		$model_company = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_company->addGroupOrder("a.name");
		$lists['fk']['company'] = $model_company->getItems();

		$model_currency = CkJModel::getInstance('Currencies', 'GuidemanModel');
		$model_currency->addGroupOrder("a.title");
		$lists['fk']['currency'] = $model_currency->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Prices', 'GuidemanModel');
		if (isset($item->company))
			$orderModel->addWhere("a.company = '" . $item->company . "'");
		$lists["ordering"] = $orderModel->getItems();

		$model_created_by = CkJModel::getInstance('ThirdUsers', 'GuidemanModel');
		$model_created_by->addGroupOrder("a.name");
		$lists['fk']['created_by'] = $model_created_by->getItems();

		$model_modified_by = CkJModel::getInstance('ThirdUsers', 'GuidemanModel');
		$model_modified_by->addGroupOrder("a.name");
		$lists['fk']['modified_by'] = $model_modified_by->getItems();
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewPrice')){ class GuidemanViewPrice extends GuidemanCkViewPrice{} }


<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
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
* HTML View class for the Guideadm component
*
* @package	Guideadm
* @subpackage	Price
*/
class GuideadmCkViewPrice extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('remuneration', 'price');

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
		$state->set('context', 'price.price');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuideadmHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_PRICE'), $this->item, 'company');

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
			JToolBarHelper::save('price.save', "GUIDEADM_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('price.save2new', "GUIDEADM_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('price.save2copy', "GUIDEADM_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('price.cancel', "GUIDEADM_JTOOLBAR_CANCEL");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('prices.trash', "GUIDEADM_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEADM_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEADM_JTOOLBAR_DELETE", 'price.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('prices.archive', 'archive', 'archive',  "GUIDEADM_JTOOLBAR_ARCHIVE", false);


		// Custom
		JToolBarHelper::custom('price.custom', 'cog', 'cog', "GUIDEADM_JTOOLBAR_CUSTOM", false);


		$this->toolbar = JToolbar::getInstance();
		$model_company = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_company->addGroupOrder("a.name");
		$lists['fk']['company'] = $model_company->getItems();

		$model_currency = CkJModel::getInstance('Currencies', 'GuideadmModel');
		$model_currency->addGroupOrder("a.title");
		$lists['fk']['currency'] = $model_currency->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Prices', 'GuideadmModel');
		if (isset($item->company))
			$orderModel->addWhere("a.company = '" . $item->company . "'");
		$lists["ordering"] = $orderModel->getItems();
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
		$state->set('context', 'price.remuneration');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuideadmHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_REMUNERATION'), $this->item, 'company');

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
			JToolBarHelper::save('price.save', "GUIDEADM_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('price.save2new', "GUIDEADM_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('price.save2copy', "GUIDEADM_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('price.cancel', "GUIDEADM_JTOOLBAR_CANCEL");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('prices.trash', "GUIDEADM_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEADM_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEADM_JTOOLBAR_DELETE", 'price.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('prices.archive', 'archive', 'archive',  "GUIDEADM_JTOOLBAR_ARCHIVE", false);


		// Custom
		JToolBarHelper::custom('price.custom', 'cog', 'cog', "GUIDEADM_JTOOLBAR_CUSTOM", false);


		$this->toolbar = JToolbar::getInstance();
		$model_company = CkJModel::getInstance('Contacts', 'GuideadmModel');
		$model_company->addGroupOrder("a.name");
		$lists['fk']['company'] = $model_company->getItems();

		$model_currency = CkJModel::getInstance('Currencies', 'GuideadmModel');
		$model_currency->addGroupOrder("a.title");
		$lists['fk']['currency'] = $model_currency->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Prices', 'GuideadmModel');
		if (isset($item->company))
			$orderModel->addWhere("a.company = '" . $item->company . "'");
		$lists["ordering"] = $orderModel->getItems();
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewPrice')){ class GuideadmViewPrice extends GuideadmCkViewPrice{} }

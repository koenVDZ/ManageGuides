<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.1.4
* @package		GuideMan
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
* @subpackage	Addressesitem
*/
class GuidemanViewAddressesitem extends GuidemanCkViewAddressesitem
{
	/**
	* Execute and display a template : Addresses item
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayUsraddress($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.usraddress');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_ADDRESSES_ITEM'), $this->item, 'user_id');

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
		// KOEN 30/03/17 - LookUp Language
		$LangSelect = GuidemanHelperFilehelp::GetUserLang();
		// KOEN 30/03/17 - LookUp Language
		
		//Toolbar

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('addressesitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Cancel
		JToolBarHelper::cancel('addressesitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");

		$this->toolbar = JToolbar::getInstance();
		$model_user_id = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_user_id->addGroupOrder("a.alias");
		// KOEN 30/03/17
		$model_user_id->addWhere('a.created_by = ' . (int)JFactory::getUser()->get('id'));
		// KOEN 30/03/17
		$lists['fk']['user_id'] = $model_user_id->getItems();

		$model_address_label = CkJModel::getInstance('Addresslabels', 'GuidemanModel');
		$model_address_label->addJoin("`#__guideman_lang` AS _language_ ON _language_.id = a.language", 'LEFT');
		$model_address_label->addSelect("_language_.title AS _language_title");
		$model_address_label->addGroupOrder("_language_.title");
		$model_address_label->addGroupOrder("a.type");
		if ($LangSelect != 0) {
			$model_address_label->addWhere('a.language = ' . $LangSelect );
		}
		$lists['fk']['address_label'] = $model_address_label->getItems();
		//Ordering
		$orderModel = CkJModel::getInstance('Addresses', 'GuidemanModel');
		if (isset($item->user_id))
			$orderModel->addWhere("a.user_id = '" . $item->user_id . "'");
		$lists["ordering"] = $orderModel->getItems();
	}


}




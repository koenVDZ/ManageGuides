<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Accounts
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
* @subpackage	Accountsitem
*/
class GuidemanViewAccountsitem extends GuidemanCkViewAccountsitem
{
	/**
	* Execute and display a template : Contact Bank Account
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayUsrbankaccount($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.usrbankaccount');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_CONTACT_BANK_ACCOUNT'), $this->item, 'user_id');

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
			JToolBarHelper::save('accountsitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Cancel
		JToolBarHelper::cancel('accountsitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");

		$this->toolbar = JToolbar::getInstance();
		$model_user_id = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_user_id->addGroupOrder("a.name");
		$model_user_id->addGroupOrder("a.alias");
		//WHERE @koen --> select only the owner of the file = logged in UserID
		$JoomlaUser = JFactory::getUser();
		$model_user_id->addWhere("a.created_by = " . (int)$JoomlaUser->id);
		//WHERE @Koen
		$lists['fk']['user_id'] = $model_user_id->getItems();
	}
}




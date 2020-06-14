<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Phones
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
* @subpackage	Phonesitem
*/
class GuidemanViewPhonesitem extends GuidemanCkViewPhonesitem
{
	/**
	* Execute and display a template : Phones item Own
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayPhonesitemown($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.phonesitemown');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_PHONES_ITEM_OWN'), $this->item, 'user_id');

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
			JToolBarHelper::save('phonesitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Cancel
		JToolBarHelper::cancel('phonesitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Publish
		if (!$isNew && $model->canEditState($item) && ($item->published != 1))
			JToolBarHelper::publish('phones.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");
		// Unpublish
		if (!$isNew && $model->canEditState($item) && ($item->published != 0))
			JToolBarHelper::unpublish('phones.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('phones.trash', "GUIDEMAN_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEMAN_JTOOLBAR_DELETE", 'phonesitem.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('phones.archive', 'archive', 'archive',  "GUIDEMAN_JTOOLBAR_ARCHIVE", false);



		$this->toolbar = JToolbar::getInstance();
		$model_user_id = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_user_id->addGroupOrder("a.alias");
		// KOEN 30/03/17
		$model_user_id->addWhere('a.created_by = ' . (int)JFactory::getUser()->get('id'));
		// KOEN 30/03/17
		$lists['fk']['user_id'] = $model_user_id->getItems();

		$model_label = CkJModel::getInstance('Phonelabels', 'GuidemanModel');
		$model_label->addGroupOrder("a.type");
		if ($LangSelect != 0) {
			$model_label->addWhere('a.language = ' . $LangSelect );
		}
		$lists['fk']['label'] = $model_label->getItems();

		$model_cdc = CkJModel::getInstance('Countries', 'GuidemanModel');
		$model_cdc->addGroupOrder("a.country_name");
		$lists['fk']['cdc'] = $model_cdc->getItems();
	}
}




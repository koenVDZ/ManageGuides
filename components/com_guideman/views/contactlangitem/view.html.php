<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	ContactLang
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
* @subpackage	Contactlangitem
*/
class GuidemanCkViewContactlangitem extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('contactlangitem');

	/**
	* Execute and display a template : ContactLang item
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayContactlangitem($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.contactlangitem');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_CONTACTLANG_ITEM'), $this->item, 'user_id');

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
			JToolBarHelper::save('contactlangitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Cancel
		JToolBarHelper::cancel('contactlangitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Publish
		if (!$isNew && $model->canEditState($item) && ($item->published != 1))
			JToolBarHelper::publish('contactlang.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");
		// Unpublish
		if (!$isNew && $model->canEditState($item) && ($item->published != 0))
			JToolBarHelper::unpublish('contactlang.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('contactlang.trash', "GUIDEMAN_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEMAN_JTOOLBAR_DELETE", 'contactlangitem.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('contactlang.archive', 'archive', 'archive',  "GUIDEMAN_JTOOLBAR_ARCHIVE", false);



		$this->toolbar = JToolbar::getInstance();
		$model_user_id = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_user_id->addGroupOrder("a.alias");
		$lists['fk']['user_id'] = $model_user_id->getItems();

		$model_language = CkJModel::getInstance('Languages', 'GuidemanModel');
		$model_language->addGroupOrder("a.name");
		$lists['fk']['language'] = $model_language->getItems();
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewContactlangitem')){ class GuidemanViewContactlangitem extends GuidemanCkViewContactlangitem{} }


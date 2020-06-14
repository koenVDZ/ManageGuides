<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
* @subpackage	Address Labels
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
* @subpackage	Addresslabel
*/
class GuideadmCkViewAddresslabel extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('usraddresslabel');

	/**
	* Execute and display a template : Address Label
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayUsraddresslabel($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'addresslabel.usraddresslabel');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuideadmHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_ADDRESS_LABEL'), $this->item, 'type');

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
			JToolBarHelper::save('addresslabel.save', "GUIDEADM_JTOOLBAR_SAVE_CLOSE");
		// Cancel
		JToolBarHelper::cancel('addresslabel.cancel', "GUIDEADM_JTOOLBAR_CANCEL");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('addresslabels.trash', "GUIDEADM_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEADM_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEADM_JTOOLBAR_DELETE", 'addresslabel.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('addresslabels.archive', 'archive', 'archive',  "GUIDEADM_JTOOLBAR_ARCHIVE", false);



		$this->toolbar = JToolbar::getInstance();
		$model_language = CkJModel::getInstance('Lang', 'GuideadmModel');
		$model_language->addGroupOrder("a.lang_code");
		$lists['fk']['language'] = $model_language->getItems();
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewAddresslabel')){ class GuideadmViewAddresslabel extends GuideadmCkViewAddresslabel{} }

<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Doc Labels
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
* @subpackage	Doclabelsitem
*/
class GuideadmCkViewDoclabelsitem extends GuideadmClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('doclabel');

	/**
	* Execute and display a template : Document Label
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayDoclabel($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.doclabel');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuideadmHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEADM_LAYOUT_DOCUMENT_LABEL'), $this->item, 'doc_type_name');

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
		JToolBarHelper::title(JText::_('GUIDEADM_LAYOUT_DOCUMENT_LABEL'), 'pencil-2');

		// Save & Close
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save('doclabelsitem.save', "GUIDEADM_JTOOLBAR_SAVE_CLOSE");
		// Save
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::apply('doclabelsitem.apply', "GUIDEADM_JTOOLBAR_SAVE");
		// Cancel
		JToolBarHelper::cancel('doclabelsitem.cancel', "GUIDEADM_JTOOLBAR_CANCEL");
		// Publish
		if (!$isNew && $model->canEditState($item) && ($item->published != 1))
			JToolBarHelper::publish('doclabels.publish', "GUIDEADM_JTOOLBAR_PUBLISH");
		// Unpublish
		if (!$isNew && $model->canEditState($item) && ($item->published != 0))
			JToolBarHelper::unpublish('doclabels.unpublish', "GUIDEADM_JTOOLBAR_UNPUBLISH");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('doclabels.trash', "GUIDEADM_JTOOLBAR_TRASH", false);
		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('doclabels.archive', 'archive', 'archive',  "GUIDEADM_JTOOLBAR_ARCHIVE", false);


		$model_country_id = CkJModel::getInstance('Countries', 'GuideadmModel');
		$model_country_id->addGroupOrder("a.country_name");
		$lists['fk']['country_id'] = $model_country_id->getItems();

		$model_language = CkJModel::getInstance('Lang', 'GuideadmModel');
		$model_language->addGroupOrder("a.title");
		$lists['fk']['language'] = $model_language->getItems();

		$model_created_by = CkJModel::getInstance('ThirdUsers', 'GuideadmModel');
		$model_created_by->addGroupOrder("a.name");
		$lists['fk']['created_by'] = $model_created_by->getItems();

		$model_modified_by = CkJModel::getInstance('ThirdUsers', 'GuideadmModel');
		$model_modified_by->addGroupOrder("a.name");
		$lists['fk']['modified_by'] = $model_modified_by->getItems();

		//Ordering
		$orderModel = CkJModel::getInstance('Doclabels', 'GuideadmModel');
				$lists["ordering"] = $orderModel->getItems();
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmViewDoclabelsitem')){ class GuideadmViewDoclabelsitem extends GuideadmCkViewDoclabelsitem{} }


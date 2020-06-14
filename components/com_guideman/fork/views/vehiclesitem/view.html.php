<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Vehicles
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
* @subpackage	Vehiclesitem
*/
class GuidemanViewVehiclesitem extends GuidemanCkViewVehiclesitem
{
	/**
	* Execute and display a template : Vehicle Item
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayVehicleitem($tpl = null)
	{
		// Initialiase variables.
		$this->model	= $model	= $this->getModel();
		$this->state	= $state	= $this->get('State');
		$this->params 	= $state->get('params');
		$state->set('context', 'layout.vehicleitem');
		$this->item		= $item		= $this->get('Item');

		$this->form		= $form		= $this->get('Form');
		$this->canDo	= $canDo	= GuidemanHelper::getActions($model->getId());
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_VEHICLE_ITEM'), $this->item, 'vehicle_type');

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
			JToolBarHelper::save('vehiclesitem.save', "GUIDEMAN_JTOOLBAR_SAVE_CLOSE");
		// Save & New
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2new('vehiclesitem.save2new', "GUIDEMAN_JTOOLBAR_SAVE_NEW");
		// Save to Copy
		if (($isNew && $model->canCreate()) || (!$isNew && $item->params->get('access-edit')))
			JToolBarHelper::save2copy('vehiclesitem.save2copy', "GUIDEMAN_JTOOLBAR_SAVE_TO_COPY");
		// Cancel
		JToolBarHelper::cancel('vehiclesitem.cancel', "GUIDEMAN_JTOOLBAR_CANCEL");
		// Publish
		if (!$isNew && $model->canEditState($item) && ($item->published != 1))
			JToolBarHelper::publish('vehicles.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");
		// Unpublish
		if (!$isNew && $model->canEditState($item) && ($item->published != 0))
			JToolBarHelper::unpublish('vehicles.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");
		// Trash
		if (!$isNew && $model->canEditState($item) && ($item->published != -2))
			JToolBarHelper::trash('vehicles.trash', "GUIDEMAN_JTOOLBAR_TRASH", false);
		// Delete
		if (!$isNew && $item->params->get('access-delete'))
			JToolbar::getInstance('toolbar')->appendButton('Confirm', JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'delete', "GUIDEMAN_JTOOLBAR_DELETE", 'vehiclesitem.delete', false);

		// Archive
		if (!$isNew && $model->canEditState($item) && ($item->published != 2))
			JToolBarHelper::custom('vehicles.archive', 'archive', 'archive',  "GUIDEMAN_JTOOLBAR_ARCHIVE", false);



		$this->toolbar = JToolbar::getInstance();
		$model_user_id = CkJModel::getInstance('Contacts', 'GuidemanModel');
		$model_user_id->addGroupOrder("a.alias");
		//WHERE @koen --> select only the owner of the file = logged in UserID
		$JoomlaUser = JFactory::getUser();
		$model_user_id->addWhere("a.created_by = " . (int)$JoomlaUser->id);
		//WHERE @Koen
		$lists['fk']['user_id'] = $model_user_id->getItems();

		$model_brand_id = CkJModel::getInstance('Brands', 'GuidemanModel');
		$model_brand_id->addWhere("a.published = 1");
		$model_brand_id->addGroupOrder("a.name");
		$lists['fk']['brand_id'] = $model_brand_id->getItems();
	}
}




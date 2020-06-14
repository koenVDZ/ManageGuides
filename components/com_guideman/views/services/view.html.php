<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
* HTML View class for the Guideman component
*
* @package	Guideman
* @subpackage	Services
*/
class GuidemanCkViewServices extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('default', 'modal', 'ajax');

	/**
	* Execute and display ajax queries
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayAjax($tpl = null)
	{
		$jinput = JFactory::getApplication()->input;
		$render = $jinput->get('render', null, 'CMD');
		$token = $jinput->get('token', null, 'BASE64');
		$values = $jinput->get('values', null, 'ARRAY');



		switch($render)
		{
			case 'groupby7':
			/* Ajax Chain : Service > Service Name
			 * Called from: view:jobitemsitem, layout:jobitemsitem
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.service_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#jform_service").val(this.value);';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_service',
							'dataValue' => $selected,
							'labelKey' => 'service_name',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_SERVICE',
							'selectors' => array(
									'onchange' => $event
								)
							));
					echo '</div>';
				echo '</div>';

				break;
		}

		exit();
	}

	/**
	* Execute and display a template : Services with Pricing
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayDefault($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_guideman', true);
		$state->set('context', 'layout.default');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuidemanHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('default.filters');
		$this->menu = GuidemanHelper::addSubmenu('services', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_SERVICES_WITH_PRICING'));

		

		//Filters
		// Company
		$modelCompany = CkJModel::getInstance('contacts', 'GuidemanModel');
		$modelCompany->set('context', $model->get('context'));
		$filters['filter_company']->jdomOptions = array(
			'list' => $modelCompany->getItems()
		);

		// State
		$filters['filter_state']->jdomOptions = array(
			'ajaxVars' => array('values' => array(
				$model->getState("filter.state"),
				$model->getState("filter.state_country_id"),
			))
		);

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('default')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('service.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('service.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('services.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('services.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('services.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'service.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('services.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Services with Pricing
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayModal($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_guideman', true);
		$state->set('context', 'layout.modal');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuidemanHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('modal.filters');
		$this->menu = GuidemanHelper::addSubmenu('services', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_SERVICES_WITH_PRICING'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('service.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('service.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('services.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('services.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('services.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'service.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('services.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Returns an array of fields the table can be sorted by.
	*
	* @access	protected
	* @param	string	$layout	The name of the called layout. Not used yet
	*
	*
	* @since	3.0
	*
	* @return	array	Array containing the field name to sort by as the key and display text as value.
	*/
	protected function getSortFields($layout = null)
	{
		return array(
			'ordering' => JText::_('GUIDEMAN_FIELD_ORDER'),
			'' => JText::_('GUIDEMAN_FIELD_ID'),
			'internal_service_id' => JText::_('GUIDEMAN_FIELD_INTERNAL_SERVICE_ID'),
			'service_name' => JText::_('GUIDEMAN_FIELD_SERVICE_NAME_1'),
			'duration' => JText::_('GUIDEMAN_FIELD_DURATION'),
			'private_tour' => JText::_('GUIDEMAN_FIELD_PRIVATE_TOUR'),
			'entrance_fees' => JText::_('GUIDEMAN_FIELD_ENTRANCE_FEES'),
			'kid_friendly' => JText::_('GUIDEMAN_FIELD_KID_FRIENDLY'),
			'disabled_friendly' => JText::_('GUIDEMAN_FIELD_DISABLED_FRIENDLY'),
			'min_pax' => JText::_('GUIDEMAN_FIELD_MINPAX'),
			'max_pax' => JText::_('GUIDEMAN_FIELD_MAXPAX'),
			'activity_level' => JText::_('GUIDEMAN_FIELD_ACTIVITY_LEVEL'),
			'country.iso_2' => JText::_('GUIDEMAN_FIELD_COUNTRY_ISO_2'),
			'country.country_name' => JText::_('GUIDEMAN_FIELD_COUNTRY_COUNTRY_NAME'),
			'remunaration' => JText::_('GUIDEMAN_FIELD_ID'),
			'remunaration.name' => JText::_('GUIDEMAN_FIELD_REMUNARATION'),
			'costs' => JText::_('GUIDEMAN_FIELD_ID'),
			'costs.name' => JText::_('GUIDEMAN_FIELD_SALES'),
			'published' => JText::_('GUIDEMAN_FIELD_STATE'),
			'company' => JText::_('GUIDEMAN_FIELD_COMPANY')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewServices')){ class GuidemanViewServices extends GuidemanCkViewServices{} }


<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Phone Labels
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
* @subpackage	Phonelabels
*/
class GuidemanCkViewPhonelabels extends GuidemanClassView
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
			case 'phones_label_ajax':
			/* Ajax Chain : Label > Type
			 * Called from: view:phonesitem, layout:phonesitemown
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.type');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#jform_label").val(this.value);';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_label',
							'dataValue' => $selected,
							'labelKey' => 'type',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_PHONE_LABELS_ITEM',
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
	* Execute and display a template : Phone Labels
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
		$this->menu = GuidemanHelper::addSubmenu('phonelabels', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_PHONE_LABELS'));

		

		//Filters
		// Language
		$modelLanguage = CkJModel::getInstance('lang', 'GuidemanModel');
		$modelLanguage->set('context', $model->get('context'));
		$filters['filter_language']->jdomOptions = array(
			'list' => $modelLanguage->getItems()
		);

		// Created By
		$modelCreated_by = CkJModel::getInstance('thirdusers', 'GuidemanModel');
		$modelCreated_by->set('context', $model->get('context'));
		$filters['filter_created_by']->jdomOptions = array(
			'list' => $modelCreated_by->getItems()
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
			JToolBarHelper::addNew('phonelabelsitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('phonelabelsitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('phonelabels.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('phonelabels.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('phonelabels.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'phonelabelsitem.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('phonelabels.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Phone Labels
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
		$this->menu = GuidemanHelper::addSubmenu('phonelabels', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_PHONE_LABELS'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('phonelabelsitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('phonelabelsitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('phonelabels.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('phonelabels.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('phonelabels.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'phonelabelsitem.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('phonelabels.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

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
			'type' => JText::_('GUIDEMAN_FIELD_TYPE'),
			'created_by' => JText::_('GUIDEMAN_FIELD_CREATED_BY'),
			'language.title' => JText::_('GUIDEMAN_FIELD_LABEL_LANGUAGE'),
			'published' => JText::_('GUIDEMAN_FIELD_STATE'),
			'' => JText::_('GUIDEMAN_FIELD_ID')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewPhonelabels')){ class GuidemanViewPhonelabels extends GuidemanCkViewPhonelabels{} }


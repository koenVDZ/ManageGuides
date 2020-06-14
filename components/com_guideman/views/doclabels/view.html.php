<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
* HTML View class for the Guideman component
*
* @package	Guideman
* @subpackage	Doclabels
*/
class GuidemanCkViewDoclabels extends GuidemanClassView
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
			case 'doc_labels':
			/* Ajax Filter : Label ID > Doc Type Name
			 * Called from: view:documents, layout:default
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.doc_type_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#filter_label_id").val(this.value);return Joomla.submitform();return Joomla.submitform();';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_label_id',
							'dataValue' => $selected,
							'domClass' => 'span-2 element-filter',
							'labelKey' => 'doc_type_name',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_DOCLABELSITEM',
							'selectors' => array(
									'onchange' => $event
								),
							'ui' => 'chosen'
							));
					echo '</div>';
				echo '</div>';

				break;

			case 'groupby6':
			/* Ajax Chain : Label ID > Doc Type Name
			 * Called from: view:documentsitem, layout:documentsitem
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.doc_type_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#jform_label_id").val(this.value);';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_label_id',
							'dataValue' => $selected,
							'labelKey' => 'doc_type_name',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_DOCLABELSITEM',
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
	* Execute and display a template : Document Label Definitions
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
		$this->menu = GuidemanHelper::addSubmenu('doclabels', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_DOCUMENT_LABEL_DEFINITIONS'));

		

		//Filters
		// Country ID > Country Name
		$modelCountry_id = CkJModel::getInstance('countries', 'GuidemanModel');
		$modelCountry_id->set('context', $model->get('context'));
		$filters['filter_country_id']->jdomOptions = array(
			'list' => $modelCountry_id->getItems()
		);

		// Language > Title
		$modelLanguage = CkJModel::getInstance('lang', 'GuidemanModel');
		$modelLanguage->set('context', $model->get('context'));
		$filters['filter_language']->jdomOptions = array(
			'list' => $modelLanguage->getItems()
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
			JToolBarHelper::addNew('doclabelsitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('doclabelsitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Document Label Definitions
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
		$this->menu = GuidemanHelper::addSubmenu('doclabels', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_DOCUMENT_LABEL_DEFINITIONS'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('doclabelsitem.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('doclabelsitem.edit', "GUIDEMAN_JTOOLBAR_EDIT");

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
			'doc_type_name' => JText::_('GUIDEMAN_FIELD_DOCUMENT_TYPE'),
			'country_id.iso_2' => JText::_('GUIDEMAN_FIELD_FLAG'),
			'country_id.country_name' => JText::_('GUIDEMAN_FIELD_COUNTRY'),
			'doc_type_long' => JText::_('GUIDEMAN_FIELD_DOCUMENT_TYPE_LONG_NAME'),
			'created_by.name' => JText::_('GUIDEMAN_FIELD_CREATED_BY'),
			'created_by' => JText::_('GUIDEMAN_FIELD_ID'),
			'created_by.username' => JText::_('GUIDEMAN_FIELD_ALIAS'),
			'language.title' => JText::_('GUIDEMAN_FIELD_LANGUAGE'),
			'published' => JText::_('GUIDEMAN_FIELD_STATE'),
			'' => JText::_('GUIDEMAN_FIELD_ID')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewDoclabels')){ class GuidemanViewDoclabels extends GuidemanCkViewDoclabels{} }


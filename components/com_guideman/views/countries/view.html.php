<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Countries
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
* @subpackage	Countries
*/
class GuidemanCkViewCountries extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('countriesdata', 'default', 'modal', 'ajax');

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
			case 'filter1':
			/* Ajax Filter : CountryID > Country Name
			 * Called from: view:contactlang, layout:usrguidesearch
			 * Group Level : 1
			 */
				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.states.ajax.filter1";
				$wrapper = "_ajax_states_$render";

				$event = 'jQuery("#filter_user_id_state_id").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_country_id":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => 'filter_user_id_state_id_country_id',
						'dataValue' => $selected,
						'domClass' => 'span-2 element-filter',
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							),
						'ui' => 'chosen'
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_country_id' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;

			case 'doc_labels':
			/* Ajax Filter : Country ID > Country Name
			 * Called from: view:documents, layout:default
			 * Group Level : 1
			 */
				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.doclabels.ajax.doc_labels";
				$wrapper = "_ajax_doclabels_$render";

				$event = 'jQuery("#filter_label_id").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_country_id":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}return Joomla.submitform();';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => 'filter_label_id_country_id',
						'dataValue' => $selected,
						'domClass' => 'span-2 element-filter',
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							),
						'ui' => 'chosen'
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_country_id' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;

			case 'filter3':
			/* Ajax Filter : Country ID > Country Name
			 * Called from: view:services, layout:default
			 * Group Level : 1
			 */
				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.states.ajax.filter3";
				$wrapper = "_ajax_states_$render";

				$event = 'jQuery("#filter_state").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_country_id":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}return Joomla.submitform();';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => 'filter_state_country_id',
						'dataValue' => $selected,
						'domClass' => 'span-2 element-filter',
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							),
						'ui' => 'chosen'
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_country_id' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;

			case 'groupby1':

				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.contacts.ajax.groupby1";
				$wrapper = "_ajax_contacts_$render";

				$event = 'jQuery("#__ajx_bank_id").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_nationality":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => '_bank_id_nationality',
						'dataValue' => $selected,
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							)
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_nationality' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;

			case 'groupby2':

				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.states.ajax.groupby2";
				$wrapper = "_ajax_states_$render";

				$event = 'jQuery("#__ajx_state_id").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_country_id":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => '_state_id_country_id',
						'dataValue' => $selected,
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							)
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_country_id' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;

			case 'area_ajax':

				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.states.ajax.area_ajax";
				$wrapper = "_ajax_states_$render";

				$event = 'jQuery("#__ajx_state_id").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_country_id":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => '_state_id_country_id',
						'dataValue' => $selected,
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							)
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_country_id' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;

			case 'groupby4':

				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.businesstypes.ajax.groupby4";
				$wrapper = "_ajax_businesstypes_$render";

				$event = 'jQuery("#__ajx_business_type").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_country_id":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => '_business_type_country_id',
						'dataValue' => $selected,
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							)
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_country_id' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;

			case 'groupby5':

				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.states.ajax.groupby5";
				$wrapper = "_ajax_states_$render";

				$event = 'jQuery("#__ajx_state_id").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_country_id":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => '_state_id_country_id',
						'dataValue' => $selected,
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							)
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_country_id' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;

			case 'groupby6':

				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.doclabels.ajax.groupby6";
				$wrapper = "_ajax_doclabels_$render";

				$event = 'jQuery("#__ajx_label_id").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_country_id":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => '_label_id_country_id',
						'dataValue' => $selected,
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							)
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_country_id' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;

			case 'groupby9':

				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.operators.ajax.groupby9";
				$wrapper = "_ajax_operators_$render";

				$event = 'jQuery("#__ajx_operator").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_country_id":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => '_operator_country_id',
						'dataValue' => $selected,
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							)
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_country_id' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;

			case 'groupby10':

				$model = $this->getModel();
				$model->addSelect('a.country_name');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.states.ajax.groupby10";
				$wrapper = "_ajax_states_$render";

				$event = 'jQuery("#__ajx_state").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_country_id":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => '_state_country_id',
						'dataValue' => $selected,
						'labelKey' => 'country_name',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_COUNTRY',
						'selectors' => array(
								'onchange' => $event
							)
						));
				echo '</div>';

				//Ajax chain on load -> Follows the values
				echo JDom::_('html.form.input.ajax.chain', array(
					'ajaxWrapper' => $wrapper,
					'ajaxContext' => $ajaxNamespace,
					'ajaxVars' => array(
									'filter_country_id' => $selected,
									'values' => $values),
					'ajaxToken' => $token,

				));


				//Wrapper Div
				echo("<div id='" . $wrapper ."' class='ajaxchain-wrapper ajaxchain-wrapper-hz'></div>");
				break;
		}

		exit();
	}

	/**
	* Execute and display a template : Countries Data
	*
	* @access	protected
	* @param	string	$tpl	The name of the template file to parse; automatically searches through the template paths.
	*
	*
	* @since	11.1
	*
	* @return	mixed	A string if successful, otherwise a JError object.
	*/
	protected function displayCountriesdata($tpl = null)
	{
		$this->model		= $model	= $this->getModel();
		$this->state		= $state	= $this->get('State');
		$this->params 		= JComponentHelper::getParams('com_guideman', true);
		$state->set('context', 'layout.countriesdata');
		$this->items		= $items	= $this->get('Items');
		$this->canDo		= $canDo	= GuidemanHelper::getActions();
		$this->pagination	= $this->get('Pagination');
		$this->filters = $filters = $model->getForm('countriesdata.filters');
		$this->menu = GuidemanHelper::addSubmenu('countries', 'countriesdata');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_COUNTRIES_DATA'));

		

		//Filters
		// Language > Title
		$modelLanguage = CkJModel::getInstance('lang', 'GuidemanModel');
		$modelLanguage->set('context', $model->get('context'));
		$filters['filter_language']->jdomOptions = array(
			'list' => $modelLanguage->getItems()
		);

		// Sort by
		$filters['sortTable']->jdomOptions = array(
			'list' => $this->getSortFields('countriesdata')
		);

		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('country.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Countries
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
		$this->menu = GuidemanHelper::addSubmenu('countries', 'default');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_COUNTRIES'));

		

		//Filters
		// Language
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
			JToolBarHelper::addNew('country.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('country.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'country.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('countries.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('countries.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('countries.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('countries.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

		$this->toolbar = JToolbar::getInstance();
	}

	/**
	* Execute and display a template : Countries
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
		$this->menu = GuidemanHelper::addSubmenu('countries', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_COUNTRIES'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar

		// New
		if ($model->canCreate())
			JToolBarHelper::addNew('country.add', "GUIDEMAN_JTOOLBAR_NEW");

		// Edit
		if ($model->canEdit())
			JToolBarHelper::editList('country.edit', "GUIDEMAN_JTOOLBAR_EDIT");

		// Delete
		if ($model->canDelete())
			JToolBarHelper::deleteList(JText::_('GUIDEMAN_JTOOLBAR_ARE_YOU_SURE_TO_DELETE'), 'country.delete', "GUIDEMAN_JTOOLBAR_DELETE");

		// Publish
		if ($model->canEditState())
			JToolBarHelper::publishList('countries.publish', "GUIDEMAN_JTOOLBAR_PUBLISH");

		// Unpublish
		if ($model->canEditState())
			JToolBarHelper::unpublishList('countries.unpublish', "GUIDEMAN_JTOOLBAR_UNPUBLISH");

		// Trash
		if ($model->canEditState())
			JToolBarHelper::trash('countries.trash', "GUIDEMAN_JTOOLBAR_TRASH");

		// Archive
		if ($model->canEditState())
			JToolBarHelper::archiveList('countries.archive', "GUIDEMAN_JTOOLBAR_ARCHIVE");

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
			'ordering' => JText::_('GUIDEMAN_FIELD_ORDERING'),
			'country_name' => JText::_('GUIDEMAN_FIELD_COUNTRY'),
			'population' => JText::_('GUIDEMAN_FIELD_POPULATION'),
			'total_area' => JText::_('GUIDEMAN_FIELD_TOTAL_AREA'),
			'land_area' => JText::_('GUIDEMAN_FIELD_LAND_AREA'),
			'water_area' => JText::_('GUIDEMAN_FIELD_WATER_AREA'),
			'published' => JText::_('GUIDEMAN_FIELD_STATE'),
			'' => JText::_('GUIDEMAN_FIELD_ID'),
			'long_name' => JText::_('GUIDEMAN_FIELD_LONG_NAME'),
			'iso_2' => JText::_('GUIDEMAN_FIELD_ISO_2'),
			'iso_3' => JText::_('GUIDEMAN_FIELD_ISO_3'),
			'un_member' => JText::_('GUIDEMAN_FIELD_UN'),
			'numeric_code' => JText::_('GUIDEMAN_FIELD_NUMERIC_CODE'),
			'calling_code' => JText::_('GUIDEMAN_FIELD_CALLING_CODE'),
			'cctld' => JText::_('GUIDEMAN_FIELD_CCTLD'),
			'language.title' => JText::_('GUIDEMAN_FIELD_LANGUAGE')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewCountries')){ class GuidemanViewCountries extends GuidemanCkViewCountries{} }


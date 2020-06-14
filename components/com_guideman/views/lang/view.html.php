<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Lang
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
* @subpackage	Lang
*/
class GuidemanCkViewLang extends GuidemanClassView
{
	/**
	* List of the reachables layouts. Fill this array in every view file.
	*
	* @var array
	*/
	protected $layouts = array('modal', 'ajax');

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

				$model = $this->getModel();
				$model->addSelect('a.title');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;

				$ajaxNamespace = "guideman.phonelabels.ajax.phones_label_ajax";
				$wrapper = "_ajax_phonelabels_$render";

				$event = 'jQuery("#__ajx_label").val("");'
						.	'if(this.value != ""){'
						.		'jQuery("#' . $wrapper . '").jdomAjax({namespace:"' . $ajaxNamespace . '", vars:{"filter_language":this.value}})'
						.	'}else{'
						.		'jQuery("#' . $wrapper . '").innerHTML = "";'
						.	'}';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo JDom::_('html.form.input.select', array(
						'dataKey' => '_label_language',
						'dataValue' => $selected,
						'labelKey' => 'title',
						'list' => $items,
						'listKey' => 'id',
						'nullLabel' => 'GUIDEMAN_FILTER_NULL_LANGITEM',
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
									'filter_language' => $selected,
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
	* Execute and display a template : Lang
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
		$this->menu = GuidemanHelper::addSubmenu('lang', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_LANG'));

		

		//Filters
		// Limit
		$filters['limit']->jdomOptions = array(
			'pagination' => $this->pagination
		);

		// Toolbar



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
		return array();
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewLang')){ class GuidemanViewLang extends GuidemanCkViewLang{} }


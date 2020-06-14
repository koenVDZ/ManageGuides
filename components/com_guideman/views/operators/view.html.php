<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Operators
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
* @subpackage	Operators
*/
class GuidemanCkViewOperators extends GuidemanClassView
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
			case 'groupby9':
			/* Ajax Chain : Operator > Operator
			 * Called from: view:phonesitem, layout:phonesitemown
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.operator');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#jform_operator").val(this.value);';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_operator',
							'dataValue' => $selected,
							'labelKey' => 'operator',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_OPERATOR',
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
	* Execute and display a template : Operators
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
		$this->menu = GuidemanHelper::addSubmenu('operators', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_OPERATORS'));

		

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
		return array(
			'country_id' => JText::_('GUIDEMAN_FIELD_COUNTRY_ID')
		);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanViewOperators')){ class GuidemanViewOperators extends GuidemanCkViewOperators{} }


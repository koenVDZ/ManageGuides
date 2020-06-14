<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	States
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
* @subpackage	States
*/
class GuidemanCkViewStates extends GuidemanClassView
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
			case 'filter1':
			/* Ajax Filter : StateID > State
			 * Called from: view:contactlang, layout:usrguidesearch
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.state');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#filter_user_id_state_id").val(this.value);return Joomla.submitform();return Joomla.submitform();';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_user_id_state_id',
							'dataValue' => $selected,
							'domClass' => 'span-2 element-filter',
							'labelKey' => 'state',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_STATE',
							'selectors' => array(
									'onchange' => $event
								),
							'ui' => 'chosen'
							));
					echo '</div>';
				echo '</div>';

				break;

			case 'filter3':
			/* Ajax Filter : State > State
			 * Called from: view:services, layout:default
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.state');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#filter_state").val(this.value);return Joomla.submitform();return Joomla.submitform();';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_state',
							'dataValue' => $selected,
							'domClass' => 'span-2 element-filter',
							'labelKey' => 'state',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_STATE',
							'selectors' => array(
									'onchange' => $event
								),
							'ui' => 'chosen'
							));
					echo '</div>';
				echo '</div>';

				break;

			case 'groupby2':
			/* Ajax Chain : StateID > State
			 * Called from: view:addressesitem, layout:usraddress
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.state');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#jform_state_id").val(this.value);';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_state_id',
							'dataValue' => $selected,
							'labelKey' => 'state',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_STATE',
							'selectors' => array(
									'onchange' => $event
								)
							));
					echo '</div>';
				echo '</div>';

				break;

			case 'area_ajax':
			/* Ajax Chain : StateID > State
			 * Called from: view:contact, layout:contact
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.state');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#jform_state_id").val(this.value);';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_state_id',
							'dataValue' => $selected,
							'labelKey' => 'state',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_STATE',
							'selectors' => array(
									'onchange' => $event
								)
							));
					echo '</div>';
				echo '</div>';

				break;

			case 'groupby5':
			/* Ajax Chain : StateID > State
			 * Called from: view:contact, layout:company
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.state');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#jform_state_id").val(this.value);';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_state_id',
							'dataValue' => $selected,
							'labelKey' => 'state',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_STATE',
							'selectors' => array(
									'onchange' => $event
								)
							));
					echo '</div>';
				echo '</div>';

				break;

			case 'groupby10':
			/* Ajax Chain : State > State
			 * Called from: view:service, layout:service
			 * Group Level : 0
			 */
				$model = $this->getModel();
				$model->addSelect('a.state');
				$items = $model->getItems();


				$selected = (is_array($values))?$values[count($values)-1]:$values;



				$event = 'jQuery("#jform_state").val(this.value);';

				echo '<div class="ajaxchain-filter ajaxchain-filter-hz">';
					echo '<div class="separator">';
						echo JDom::_('html.form.input.select', array(
							'dataKey' => '__ajx_state',
							'dataValue' => $selected,
							'labelKey' => 'state',
							'list' => $items,
							'listKey' => 'id',
							'nullLabel' => 'GUIDEMAN_FILTER_NULL_STATE',
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
	* Execute and display a template : States
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
		$this->menu = GuidemanHelper::addSubmenu('states', 'modal');
		$lists = array();
		$this->lists = &$lists;

		// Define the title
		$this->_prepareDocument(JText::_('GUIDEMAN_LAYOUT_STATES'));

		

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
if (!class_exists('GuidemanViewStates')){ class GuidemanViewStates extends GuidemanCkViewStates{} }


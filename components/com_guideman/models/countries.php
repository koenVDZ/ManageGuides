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
* Guideman List Model
*
* @package	Guideman
* @subpackage	Classes
*/
class GuidemanCkModelCountries extends GuidemanClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'usrcountrydata';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'country';

	/**
	* Constructor
	*
	* @access	public
	* @param	array	$config	An optional associative array of configuration settings.
	*
	* @return	void
	*/
	public function __construct($config = array())
	{
		//Define the sortables fields (in lists)
		if (empty($config['filter_fields'])) {
			$config['filter_fields'] = array(
				'a.ordering', 'ordering',
				'a.country_name', 'country_name',
				'a.population', 'population',
				'a.total_area', 'total_area',
				'a.land_area', 'land_area',
				'a.water_area', 'water_area',
				'a.published', 'published',
				'a.id', '',
				'a.long_name', 'long_name',
				'a.iso_2', 'iso_2',
				'a.iso_3', 'iso_3',
				'a.un_member', 'un_member',
				'a.numeric_code', 'numeric_code',
				'a.calling_code', 'calling_code',
				'a.cctld', 'cctld',
				'_language_.title', 'language.title',
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'language' => 'cmd',
			'user_id_state_id' => 'cmd',
			'label_id' => 'cmd',
			'state' => 'cmd'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string',
			'search_1' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('language', // name
			'lang', // foreignModelClass
			'language', // localKey
			'id' // foreignKey
		);
	}

	/**
	* Method to get the layout (including default).
	*
	* @access	public
	*
	* @return	string	The layout alias.
	*/
	public function getLayout()
	{
		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', 'default', 'STRING');
	}

	/**
	* Method to get a store id based on model configuration state.
	* 
	* This is necessary because the model is used by the component and different
	* modules that might need different sets of data or differen ordering
	* requirements.
	*
	* @access	protected
	* @param	string	$id	A prefix for the store id.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	protected function getStoreId($id = '')
	{
		// Compile the store id.

		$id	.= ':'.$this->getState('sortTable');
		$id	.= ':'.$this->getState('directionTable');
		$id	.= ':'.$this->getState('limit');
		$id	.= ':'.$this->getState('search.search');
		$id	.= ':'.$this->getState('filter.published');
		$id	.= ':'.$this->getState('filter.language');
		$id	.= ':'.$this->getState('search.search_1');
		$id	.= ':'.$this->getState('filter.user_id_state_id');
		$id	.= ':'.$this->getState('filter.label_id');
		$id	.= ':'.$this->getState('filter.state');
		return parent::getStoreId($id);
	}

	/**
	* Predefined query for the search plugin.
	*
	* @access	protected
	*
	*
	* @since	Cook 3.1.4
	*
	* @return	void
	*/
	protected function ormSearchPlugin()
	{
		$method = $this->getState('search.plugin.method');
		$ordering = $this->getState('search.plugin.ordering');

		switch ( $ordering )
		{

			//Alphabetic, ascending
			case 'alpha':
			default:
				$orderField = 'a.country_name';
				$orderDir = 'ASC';
				break;
		}

		$this->orm(array(
			'select' => array(
				'country_name' => 'title',
				"{country_name} {iso_2} {long_name} {iso_3} {numeric_code} {calling_code} {cctld}" => 'text',
			),

			'search' => array(

				'plugin' => array(
					'on' => array(
						'{country_name} {iso_2} {long_name} {iso_3} {numeric_code} {calling_code} {cctld}' => $method,
					),
				),
			),
			'order' => array(
				$orderField => $orderDir
			),
		));
	}

	/**
	* Populate the required fields for the search plugin.
	*
	* @access	protected
	* @param	object	&$item	The object to populate.
	*
	* @return	void
	*/
	protected function populateSearchResult(&$item)
	{
		$item->section = JText::_('GUIDEMAN') . ' - ' . JText::_('GUIDEMAN_VIEW_COUNTRY');
		$item->href = $this->getRoute($item->id);
	}

	/**
	* Preparation of the list query.
	*
	* @access	protected
	* @param	object	&$query	returns a filled query object.
	*
	* @return	void
	*/
	protected function prepareQuery(&$query)
	{
		//FROM : Main table
		$query->from('#__guideman_countries AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.countriesdata':

				$this->orm->select(array(
					'continent',
					'country_name',
					'flag',
					'land_area',
					'ordering',
					'population',
					'total_area',
					'water_area'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'continent' => 'ASC'
				));
				break;

			case 'layout.default':

				$this->orm->select(array(
					'calling_code',
					'cctld',
					'continent',
					'country_name',
					'flag',
					'iso_2',
					'iso_3',
					'land_area',
					'language',
					'language.image',
					'language.title',
					'long_name',
					'numeric_code',
					'ordering',
					'population',
					'total_area',
					'un_member',
					'water_area'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'continent' => 'ASC'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'country_name'
				));
				break;

			case 'all':
				//SELECT : raw complete query without joins
				$this->addSelect('a.*');

				// Disable the pagination
				$this->setState('list.limit', null);
				$this->setState('list.start', null);
				break;
		}

		// SELECT required fields for all profiles
		$this->orm->select(array(
			'published'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'publish' => 'published'
		));

		// SEARCH : ISO 2 + Country Name + Long Name + ISO 3 + Numeric Code + Calling Code + CCTLD
		$this->orm->search('search', array(
			'on' => array(
				'iso_2' => 'like',
				'country_name' => 'like',
				'long_name' => 'like',
				'iso_3' => 'like',
				'numeric_code' => 'like',
				'calling_code' => 'like',
				'cctld' => 'like'
			)
		));

		//WHERE - FILTER : Publish state
		$published = $this->getState('filter.published');
		if (is_numeric($published))
			$query->where('a.published = ' . (int) $published);
		elseif (!$published)
			$query->where('(a.published = 0 OR a.published = 1 OR a.published IS NULL)');

		// FILTER : Language
		if($filter_language = $this->getState('filter.language'))
		{
			if ($filter_language > 0){
				$this->addWhere("a.language = " . (int)$filter_language);
			}
		}

		// SEARCH : ISO 2 + Country Name + Long Name + ISO 3 + Numeric Code + Calling Code + CCTLD
		$this->orm->search('search_1', array(
			'on' => array(
				'iso_2' => 'like',
				'country_name' => 'like',
				'long_name' => 'like',
				'iso_3' => 'like',
				'numeric_code' => 'like',
				'calling_code' => 'like',
				'cctld' => 'like'
			)
		));

		// FILTER : State (Province)
		if($filter_user_id_state_id = $this->getState('filter.user_id_state_id'))
		{
			$this->addJoin("`#__guideman_contacts` AS _user_id_ ON _user_id_.id = a.user_id", 'LEFT');
			if ($filter_user_id_state_id > 0){
				$this->addWhere("_user_id_.state_id = " . (int)$filter_user_id_state_id);
			}
		}

		// FILTER : Document type
		if($filter_label_id = $this->getState('filter.label_id'))
		{
			if ($filter_label_id > 0){
				$this->addWhere("a.label_id = " . (int)$filter_label_id);
			}
		}

		// FILTER : State
		if($filter_state = $this->getState('filter.state'))
		{
			if ($filter_state > 0){
				$this->addWhere("a.state = " . (int)$filter_state);
			}
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'country_name');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanModelCountries')){ class GuidemanModelCountries extends GuidemanCkModelCountries{} }


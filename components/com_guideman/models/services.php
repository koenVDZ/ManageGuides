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
* Guideman List Model
*
* @package	Guideman
* @subpackage	Classes
*/
class GuidemanCkModelServices extends GuidemanClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'service';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'service';

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
				'a.id', '',
				'a.internal_service_id', 'internal_service_id',
				'a.service_name', 'service_name',
				'a.duration', 'duration',
				'a.private_tour', 'private_tour',
				'a.entrance_fees', 'entrance_fees',
				'a.kid_friendly', 'kid_friendly',
				'a.disabled_friendly', 'disabled_friendly',
				'a.min_pax', 'min_pax',
				'a.max_pax', 'max_pax',
				'a.activity_level', 'activity_level',
				'_country_.iso_2', 'country.iso_2',
				'_country_.country_name', 'country.country_name',
				'a.remunaration', 'remunaration',
				'_remunaration_.name', 'remunaration.name',
				'a.costs', 'costs',
				'_costs_.name', 'costs.name',
				'a.published', 'published',
				'a.company', 'company',
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'company' => 'cmd',
			'private_tour' => 'cmd',
			'entrance_fees' => 'cmd',
			'kid_friendly' => 'cmd',
			'disabled_friendly' => 'cmd',
			'activity_level' => 'varchar',
			'state' => 'cmd',
			'state_country_id' => 'cmd'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('company', // name
			'contacts', // foreignModelClass
			'company', // localKey
			'id' // foreignKey
		);

		$this->hasOne('country', // name
			'countries', // foreignModelClass
			'country', // localKey
			'id' // foreignKey
		);

		$this->hasOne('state', // name
			'states', // foreignModelClass
			'state', // localKey
			'id' // foreignKey
		);

		$this->hasOne('remunaration', // name
			'prices', // foreignModelClass
			'remunaration', // localKey
			'id' // foreignKey
		);

		$this->hasOne('costs', // name
			'prices', // foreignModelClass
			'costs', // localKey
			'id' // foreignKey
		);

		$this->hasOne('policy', // name
			'policies', // foreignModelClass
			'policy', // localKey
			'id' // foreignKey
		);

		$this->hasOne('created_by', // name
			'.users', // foreignModelClass
			'created_by', // localKey
			'id' // foreignKey
		);

		$this->hasOne('modified_by', // name
			'.users', // foreignModelClass
			'modified_by', // localKey
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
		$id	.= ':'.$this->getState('filter.company');
		$id	.= ':'.$this->getState('filter.private_tour');
		$id	.= ':'.$this->getState('filter.entrance_fees');
		$id	.= ':'.$this->getState('filter.kid_friendly');
		$id	.= ':'.$this->getState('filter.disabled_friendly');
		$id	.= ':'.$this->getState('filter.activity_level');
		$id	.= ':'.$this->getState('filter.state');
		$id	.= ':'.$this->getState('filter.state_country_id');
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
			// Oldest first
			case 'oldest':
				$orderField = 'a.creation_date';
				$orderDir = 'ASC';
				break;

			// Newest first
			case 'newest':
				$orderField = 'a.creation_date';
				$orderDir = 'DESC';
				break;

			// Popular first
			case 'popular':
				$orderField = 'a.hits';
				$orderDir = 'DESC';
				break;

			//Alphabetic, ascending
			case 'alpha':
			default:
				$orderField = 'a.company';
				$orderDir = 'ASC';
				break;
		}

		$this->orm(array(
			'select' => array(
				'company' => 'title',
				"{company} {service_name}" => 'text',
			),

			'search' => array(

				'plugin' => array(
					'on' => array(
						'{company} {service_name}' => $method,
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
		$item->section = JText::_('GUIDEMAN') . ' - ' . JText::_('GUIDEMAN_VIEW_SERVICE');
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
		$query->from('#__guideman_services AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'activity_level',
					'company',
					'company.name',
					'company.nationality',
					'company.nationality.iso_2',
					'costs',
					'costs.name',
					'country',
					'country.country_name',
					'country.iso_2',
					'disabled_friendly',
					'duration',
					'entrance_fees',
					'internal_service_id',
					'kid_friendly',
					'max_pax',
					'min_pax',
					'ordering',
					'private_tour',
					'remunaration',
					'remunaration.from_date',
					'remunaration.grouper',
					'remunaration.hourly_rate',
					'remunaration.min_time',
					'remunaration.name',
					'remunaration.pax_01',
					'remunaration.pax_02',
					'remunaration.remark',
					'remunaration.remuneration',
					'remunaration.until_date',
					'service_name',
					'state',
					'state.flag',
					'state.state'
				));
				break;

			case 'layout.modal':


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
			'company',
			'created_by',
			'published'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'publish' => 'published',
			'author' => 'created_by'
		));

		// SEARCH : Service Name
		$this->orm->search('search', array(
			'on' => array(
				'service_name' => 'like'
			)
		));

		//WHERE - FILTER : Publish state
		$published = $this->getState('filter.published');
		if (is_numeric($published))
		{
			$allowAuthor = '';
			if (($published == 1) && !$acl->get('core.edit.state')) //ACL Limit to publish = 1
			{
				//Allow the author to see its own unpublished/archived/trashed items
				if ($acl->get('core.edit.own') || $acl->get('core.view.own'))
					$allowAuthor = ' OR a.created_by = ' . (int)JFactory::getUser()->get('id');
			}
			$query->where('(a.published = ' . (int) $published . $allowAuthor . ')');
		}
		elseif (!$published)
		{
			$query->where('(a.published = 0 OR a.published = 1 OR a.published IS NULL)');
		}

		// FILTER : Company
		if($filter_company = $this->getState('filter.company'))
		{
			if ($filter_company > 0){
				$this->addWhere("a.company = " . (int)$filter_company);
			}
		}

		// FILTER : Private
		$filter_private_tour = $this->getState('filter.private_tour');

		if ($filter_private_tour !== null){
			$this->addWhere("a.private_tour = " . (int)$filter_private_tour);
		}

		// FILTER : Entrance Fees
		$filter_entrance_fees = $this->getState('filter.entrance_fees');

		if ($filter_entrance_fees !== null){
			$this->addWhere("a.entrance_fees = " . (int)$filter_entrance_fees);
		}

		// FILTER : Kid Friendly
		$filter_kid_friendly = $this->getState('filter.kid_friendly');

		if ($filter_kid_friendly !== null){
			$this->addWhere("a.kid_friendly = " . (int)$filter_kid_friendly);
		}

		// FILTER : Disabled Friendly
		$filter_disabled_friendly = $this->getState('filter.disabled_friendly');

		if ($filter_disabled_friendly !== null){
			$this->addWhere("a.disabled_friendly = " . (int)$filter_disabled_friendly);
		}

		// FILTER : Activity level
		if($filter_activity_level = $this->getState('filter.activity_level'))
		{
			if ($filter_activity_level !== null){
				$this->addWhere("a.activity_level = " . $this->_db->Quote($filter_activity_level));
			}
		}

		// FILTER : State
		if($filter_state = $this->getState('filter.state'))
		{
			if ($filter_state > 0){
				$this->addWhere("a.state = " . (int)$filter_state);
			}
		}

		// FILTER : State
		if($filter_state_country_id = $this->getState('filter.state_country_id'))
		{
			$this->addJoin("`#__guideman_states` AS _state_ ON _state_.id = a.state", 'LEFT');
			if ($filter_state_country_id > 0){
				$this->addWhere("_state_.country_id = " . (int)$filter_state_country_id);
			}
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'company');
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
if (!class_exists('GuidemanModelServices')){ class GuidemanModelServices extends GuidemanCkModelServices{} }


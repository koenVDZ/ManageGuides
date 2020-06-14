<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Prices
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
class GuidemanCkModelPrices extends GuidemanClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'remuneration';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'price';

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
				'a.name', 'name',
				'_currency_.symbol', 'currency.symbol',
				'a.hourly_rate', 'hourly_rate',
				'a.from_date', 'from_date',
				'a.until_date', 'until_date',
				'a.published', 'published',
				'a.id', '',
				'a.remuneration', 'remuneration',
				'a.coordination_in', 'coordination_in',
				'a.coordination_fee', 'coordination_fee',
				'a.extra_hour_day', 'extra_hour_day',
				'a.extra_hour_night', 'extra_hour_night',
				'a.night_shift', 'night_shift',
				'a.grouper', 'grouper',
				'a.remark', 'remark',
				'a.optional', 'optional',
				'_currency_.currency_id', 'currency.currency_id',
				'a.min_time', 'min_time',
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
			'from_date' => 'date:d-m-Y',
			'until_date' => 'date:d-m-Y',
			'pax_01_from' => 'varchar',
			'pax_01_to' => 'varchar',
			'currency' => 'cmd',
			'min_time_from' => 'varchar',
			'min_time_to' => 'varchar',
			'night_shift_from' => 'varchar',
			'night_shift_to' => 'varchar',
			'company' => 'cmd',
			'created_by' => 'cmd',
			'creation_date_from' => 'varchar',
			'creation_date_to' => 'varchar',
			'modified_by' => 'cmd',
			'modification_date_from' => 'varchar',
			'modification_date_to' => 'varchar',
			'access' => 'cmd',
			'remuneration' => 'cmd'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string',
			'search_1' => 'string',
			'search_2' => 'string',
			'search_3' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('company', // name
			'contacts', // foreignModelClass
			'company', // localKey
			'id' // foreignKey
		);

		$this->hasOne('currency', // name
			'currencies', // foreignModelClass
			'currency', // localKey
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

		$this->hasOne('access', // name
			'.viewlevels', // foreignModelClass
			'access', // localKey
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
		$id	.= ':'.$this->getState('filter.from_date');
		$id	.= ':'.$this->getState('filter.until_date');
		$id	.= ':'.$this->getState('filter.pax_01');
		$id	.= ':'.$this->getState('filter.currency');
		$id	.= ':'.$this->getState('filter.min_time');
		$id	.= ':'.$this->getState('filter.night_shift');
		$id	.= ':'.$this->getState('search.search_1');
		$id	.= ':'.$this->getState('filter.company');
		$id	.= ':'.$this->getState('filter.created_by');
		$id	.= ':'.$this->getState('filter.creation_date');
		$id	.= ':'.$this->getState('filter.modified_by');
		$id	.= ':'.$this->getState('filter.modification_date');
		$id	.= ':'.$this->getState('filter.access');
		$id	.= ':'.$this->getState('search.search_2');
		$id	.= ':'.$this->getState('filter.remuneration');
		$id	.= ':'.$this->getState('search.search_3');
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
				"{company} {name} {grouper}" => 'text',
			),

			'search' => array(

				'plugin' => array(
					'on' => array(
						'{company} {name} {grouper}' => $method,
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
		$item->section = JText::_('GUIDEMAN') . ' - ' . JText::_('GUIDEMAN_VIEW_PRICE');
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
		$query->from('#__guideman_prices AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.usrremun':

				$this->orm->select(array(
					'company',
					'company.name',
					'company.nationality',
					'company.nationality.iso_2',
					'coordination_fee',
					'coordination_in',
					'currency',
					'currency.symbol',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'min_time',
					'name',
					'night_shift',
					'ordering',
					'remark',
					'remuneration',
					'until_date'
				));
				break;

			case 'layout.default':

				$this->orm->select(array(
					'company',
					'company.name',
					'company.nationality',
					'company.nationality.iso_2',
					'coordination_fee',
					'currency',
					'currency.symbol',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'name',
					'optional',
					'ordering',
					'remark',
					'remuneration',
					'until_date'
				));
				break;

			case 'layout.useremunbygrouper':

				$this->orm->select(array(
					'company',
					'company.name',
					'coordination_fee',
					'coordination_in',
					'currency',
					'currency.currency_id',
					'currency.symbol',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'min_time',
					'name',
					'night_shift',
					'optional',
					'ordering',
					'pax_01',
					'pax_02',
					'pax_03',
					'pax_04',
					'pax_05',
					'pax_06',
					'pax_07',
					'pax_08',
					'pax_09',
					'pax_10',
					'pax_11',
					'pax_12',
					'pax_13',
					'pax_14',
					'pax_15',
					'pax_16',
					'pax_17',
					'pax_18',
					'pax_19',
					'pax_20',
					'pax_21',
					'remark',
					'remuneration',
					'until_date'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'grouper' => 'ASC'
				));
				break;

			case 'layout.usrpricesbygrouper':

				$this->orm->select(array(
					'company',
					'company.name',
					'coordination_fee',
					'coordination_in',
					'currency',
					'currency.currency_id',
					'currency.symbol',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'min_time',
					'name',
					'night_shift',
					'optional',
					'ordering',
					'pax_01',
					'pax_02',
					'pax_03',
					'pax_04',
					'pax_05',
					'pax_06',
					'pax_07',
					'pax_08',
					'pax_09',
					'pax_10',
					'pax_11',
					'pax_12',
					'pax_13',
					'pax_14',
					'pax_15',
					'pax_16',
					'pax_17',
					'pax_18',
					'pax_19',
					'pax_20',
					'pax_21',
					'remark',
					'remuneration',
					'until_date'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'grouper' => 'ASC'
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
			'access',
			'company',
			'created_by',
			'published'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'access' => 'access',
			'publish' => 'published',
			'author' => 'created_by'
		));

		// SEARCH : Name + Grouper
		$this->orm->search('search', array(
			'on' => array(
				'name' => 'like',
				'grouper' => 'like'
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

		// FILTER : From Date
		if($filter_from_date = $this->getState('filter.from_date'))
		{
			if ($filter_from_date !== null){
				$this->addWhere("a.from_date = " . $this->_db->Quote($filter_from_date));
			}
		}

		// FILTER : Until Date
		if($filter_until_date = $this->getState('filter.until_date'))
		{
			if ($filter_until_date !== null){
				$this->addWhere("a.until_date = " . $this->_db->Quote($filter_until_date));
			}
		}

		// FILTER (Range) : PAX 01
		if($filter_pax_01_from = $this->getState('filter.pax_01_from'))
		{
			if ($filter_pax_01_from !== null){
				$this->addWhere("a.pax_01 >= " . (float)$filter_pax_01_from);
			}
		}

		// FILTER (Range) : PAX 01
		if($filter_pax_01_to = $this->getState('filter.pax_01_to'))
		{
			if ($filter_pax_01_to !== null){
				$this->addWhere("a.pax_01 <= " . (float)$filter_pax_01_to);
			}
		}

		// FILTER : Currency
		if($filter_currency = $this->getState('filter.currency'))
		{
			if ($filter_currency > 0){
				$this->addWhere("a.currency = " . (int)$filter_currency);
			}
		}

		// FILTER (Range) : Min Time
		if($filter_min_time_from = $this->getState('filter.min_time_from'))
		{
			if ($filter_min_time_from !== null){
				$this->addWhere("a.min_time >= " . $this->_db->Quote($filter_min_time_from));
			}
		}

		// FILTER (Range) : Min Time
		if($filter_min_time_to = $this->getState('filter.min_time_to'))
		{
			if ($filter_min_time_to !== null){
				$this->addWhere("a.min_time <= " . $this->_db->Quote($filter_min_time_to));
			}
		}

		// FILTER (Range) : Night Shift
		if($filter_night_shift_from = $this->getState('filter.night_shift_from'))
		{
			if ($filter_night_shift_from !== null){
				$this->addWhere("a.night_shift >= " . $this->_db->Quote($filter_night_shift_from));
			}
		}

		// FILTER (Range) : Night Shift
		if($filter_night_shift_to = $this->getState('filter.night_shift_to'))
		{
			if ($filter_night_shift_to !== null){
				$this->addWhere("a.night_shift <= " . $this->_db->Quote($filter_night_shift_to));
			}
		}

		// SEARCH : Name
		$this->orm->search('search_1', array(
			'on' => array(
				'name' => 'like'
			)
		));

		// FILTER : Compamy
		if($filter_company = $this->getState('filter.company'))
		{
			if ($filter_company > 0){
				$this->addWhere("a.company = " . (int)$filter_company);
			}
		}

		// FILTER : Created By
		if($filter_created_by = $this->getState('filter.created_by'))
		{
			if ($filter_created_by == 'auto'){
				$this->addWhere('a.created_by = ' . (int)JFactory::getUser()->get('id'));
			}
			else 
			if ($filter_created_by > 0){
				$this->addWhere("a.created_by = " . (int)$filter_created_by);
			}
		}

		// FILTER (Range) : Creation date
		if($filter_creation_date_from = $this->getState('filter.creation_date_from'))
		{
			if ($filter_creation_date_from !== null){
				$this->addWhere("a.creation_date >= " . $this->_db->Quote($filter_creation_date_from));
			}
		}

		// FILTER (Range) : Creation date
		if($filter_creation_date_to = $this->getState('filter.creation_date_to'))
		{
			if ($filter_creation_date_to !== null){
				$this->addWhere("a.creation_date <= " . $this->_db->Quote($filter_creation_date_to));
			}
		}

		// FILTER : Modified By
		if($filter_modified_by = $this->getState('filter.modified_by'))
		{
			if ($filter_modified_by == 'auto'){
				$this->addWhere('a.modified_by = ' . (int)JFactory::getUser()->get('id'));
			}
			else 
			if ($filter_modified_by > 0){
				$this->addWhere("a.modified_by = " . (int)$filter_modified_by);
			}
		}

		// FILTER (Range) : Modification date
		if($filter_modification_date_from = $this->getState('filter.modification_date_from'))
		{
			if ($filter_modification_date_from !== null){
				$this->addWhere("a.modification_date >= " . $this->_db->Quote($filter_modification_date_from));
			}
		}

		// FILTER (Range) : Modification date
		if($filter_modification_date_to = $this->getState('filter.modification_date_to'))
		{
			if ($filter_modification_date_to !== null){
				$this->addWhere("a.modification_date <= " . $this->_db->Quote($filter_modification_date_to));
			}
		}

		// FILTER : Access > Title
		if($filter_access = $this->getState('filter.access'))
		{
			if ($filter_access > 0){
				$this->addWhere("a.access = " . (int)$filter_access);
			}
		}

		// SEARCH : Name
		$this->orm->search('search_2', array(
			'on' => array(
				'name' => 'like'
			)
		));

		// FILTER : Renum
		$filter_remuneration = $this->getState('filter.remuneration');

		if ($filter_remuneration !== null){
			$this->addWhere("a.remuneration = " . (int)$filter_remuneration);
		}

		// SEARCH : Name
		$this->orm->search('search_3', array(
			'on' => array(
				'name' => 'like'
			)
		));

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
if (!class_exists('GuidemanModelPrices')){ class GuidemanModelPrices extends GuidemanCkModelPrices{} }


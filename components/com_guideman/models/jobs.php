<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Jobs
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
class GuidemanCkModelJobs extends GuidemanClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'jobsitemfly';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'jobsitem';

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
				'a.status', 'status',
				'a.file_number', 'file_number',
				'a.company_id', 'company_id',
				'_client_id_.name', 'client_id.name',
				'a.client_id', 'client_id',
				'_client_id_.surname', 'client_id.surname',
				'_requested_language_.name', 'requested_language.name',
				'_second_language_option_.name', 'second_language_option.name',
				'_operator_name_nationality_.iso_2', 'operator_name.nationality.iso_2',
				'_operator_name_.name', 'operator_name.name',
				'_operator_name_.surname', 'operator_name.surname',
				'a.operator_name', 'operator_name',
				'_operator_name_.alias', 'operator_name.alias',
				'a.guide_status', 'guide_status',
				'_main_guide_.name', 'main_guide.name',
				'a.main_guide', 'main_guide',
				'_main_guide_.alias', 'main_guide.alias',
				'a.pax', 'pax',
				'a.start_date', 'start_date',
				'a.end_date', 'end_date',
				'a.published', 'published',
				'a.id', '',
				'_trip_leader_.name', 'trip_leader.name',
				'_trip_leader_.surname', 'trip_leader.surname',
				'a.trip_leader', 'trip_leader',
				'_trip_leader_.alias', 'trip_leader.alias',
				'a.remunerations', 'remunerations',
				'_remunerations_.name', 'remunerations.name',
				'a.invoicing', 'invoicing',
				'_invoicing_.name', 'invoicing.name',
				'a.total_debet', 'total_debet',
				'a.total_credit', 'total_credit',
				'a.coordination', 'coordination',
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'company_id' => 'cmd',
			'client_id' => 'cmd',
			'requested_language' => 'cmd',
			'second_language_option' => 'cmd',
			'operator_name' => 'cmd',
			'main_guide' => 'cmd',
			'trip_leader' => 'cmd',
			'remunerations' => 'cmd',
			'invoicing' => 'cmd',
			'start_date' => 'date:d-m-Y',
			'end_date' => 'date:d-m-Y',
			'creation_date' => 'date:Y-m-d',
			'created_by' => 'cmd',
			'modification_date' => 'date:Y-m-d',
			'modified_by' => 'cmd',
			'my_joomla_user' => 'cmd',
			'my_joomla_access' => 'cmd'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('company_id', // name
			'contacts', // foreignModelClass
			'company_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('client_id', // name
			'contacts', // foreignModelClass
			'client_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('requested_language', // name
			'languages', // foreignModelClass
			'requested_language', // localKey
			'id' // foreignKey
		);

		$this->hasOne('second_language_option', // name
			'languages', // foreignModelClass
			'second_language_option', // localKey
			'id' // foreignKey
		);

		$this->hasOne('operator_name', // name
			'contacts', // foreignModelClass
			'operator_name', // localKey
			'id' // foreignKey
		);

		$this->hasOne('main_guide', // name
			'contacts', // foreignModelClass
			'main_guide', // localKey
			'id' // foreignKey
		);

		$this->hasOne('trip_leader', // name
			'contacts', // foreignModelClass
			'trip_leader', // localKey
			'id' // foreignKey
		);

		$this->hasOne('remunerations', // name
			'prices', // foreignModelClass
			'remunerations', // localKey
			'id' // foreignKey
		);

		$this->hasOne('invoicing', // name
			'prices', // foreignModelClass
			'invoicing', // localKey
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

		$this->hasOne('my_joomla_user', // name
			'.users', // foreignModelClass
			'my_joomla_user', // localKey
			'id' // foreignKey
		);

		$this->hasOne('my_joomla_access', // name
			'.viewlevels', // foreignModelClass
			'my_joomla_access', // localKey
			'id' // foreignKey
		);

		$this->hasMany('jobitems', // name
			'jobitems', // foreignModelClass
			'id', // localKey
			'job_id' // foreignKey
		);

		$this->belongsToMany('services', // name
			'services', // foreignModelClass
			'id', // localKey
			'id', // foreignKey,
			'jobitems', // pivotModelClass,
			'job_id', // pivotLocalKey
			'service' // pivotForeignKey
		);

		$this->belongsToMany('contacts', // name
			'contacts', // foreignModelClass
			'id', // localKey
			'id', // foreignKey,
			'jobitems', // pivotModelClass,
			'job_id', // pivotLocalKey
			'driver' // pivotForeignKey
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
		$id	.= ':'.$this->getState('filter.company_id');
		$id	.= ':'.$this->getState('filter.client_id');
		$id	.= ':'.$this->getState('filter.requested_language');
		$id	.= ':'.$this->getState('filter.second_language_option');
		$id	.= ':'.$this->getState('filter.operator_name');
		$id	.= ':'.$this->getState('filter.main_guide');
		$id	.= ':'.$this->getState('filter.trip_leader');
		$id	.= ':'.$this->getState('filter.remunerations');
		$id	.= ':'.$this->getState('filter.invoicing');
		$id	.= ':'.$this->getState('filter.start_date');
		$id	.= ':'.$this->getState('filter.end_date');
		$id	.= ':'.$this->getState('filter.creation_date');
		$id	.= ':'.$this->getState('filter.created_by');
		$id	.= ':'.$this->getState('filter.modification_date');
		$id	.= ':'.$this->getState('filter.modified_by');
		$id	.= ':'.$this->getState('filter.my_joomla_user');
		$id	.= ':'.$this->getState('filter.my_joomla_access');
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
				$orderField = 'a.file_name';
				$orderDir = 'ASC';
				break;
		}

		$this->orm(array(
			'select' => array(
				'file_name' => 'title',
				"{file_name} {file_number} {client_reference}" => 'text',
			),

			'search' => array(

				'plugin' => array(
					'on' => array(
						'{file_name} {file_number} {client_reference}' => $method,
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
		$item->section = JText::_('GUIDEMAN') . ' - ' . JText::_('GUIDEMAN_VIEW_JOBS_ITEM');
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
		$query->from('#__guideman_jobs AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'client_id',
					'client_id.name',
					'client_id.nationality',
					'client_id.nationality.iso_2',
					'client_id.surname',
					'company_id',
					'company_id.name',
					'company_id.nationality',
					'company_id.nationality.iso_2',
					'company_id.surname',
					'coordination',
					'end_date',
					'file_number',
					'guide_status',
					'invoicing',
					'invoicing.name',
					'main_guide',
					'main_guide.alias',
					'main_guide.name',
					'main_guide.nationality',
					'main_guide.nationality.iso_2',
					'main_guide.surname',
					'operator_name',
					'operator_name.alias',
					'operator_name.name',
					'operator_name.nationality',
					'operator_name.nationality.iso_2',
					'operator_name.surname',
					'ordering',
					'pax',
					'remunerations',
					'remunerations.name',
					'requested_language',
					'requested_language.flag',
					'requested_language.name',
					'second_language_option',
					'second_language_option.flag',
					'second_language_option.name',
					'start_date',
					'status',
					'total_credit',
					'total_debet',
					'trip_leader',
					'trip_leader.alias',
					'trip_leader.name',
					'trip_leader.surname'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'file_name'
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
			'company_id',
			'created_by',
			'published'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'publish' => 'published',
			'author' => 'created_by'
		));

		// SEARCH : File Number + File Name + Client Reference
		$this->orm->search('search', array(
			'on' => array(
				'file_number' => 'like',
				'file_name' => 'like',
				'client_reference' => 'like'
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
		if($filter_company_id = $this->getState('filter.company_id'))
		{
			if ($filter_company_id > 0){
				$this->addWhere("a.company_id = " . (int)$filter_company_id);
			}
		}

		// FILTER : Client
		if($filter_client_id = $this->getState('filter.client_id'))
		{
			if ($filter_client_id > 0){
				$this->addWhere("a.client_id = " . (int)$filter_client_id);
			}
		}

		// FILTER : Req. Lang.
		if($filter_requested_language = $this->getState('filter.requested_language'))
		{
			if ($filter_requested_language > 0){
				$this->addWhere("a.requested_language = " . (int)$filter_requested_language);
			}
		}

		// FILTER : Back. Lang.
		if($filter_second_language_option = $this->getState('filter.second_language_option'))
		{
			if ($filter_second_language_option > 0){
				$this->addWhere("a.second_language_option = " . (int)$filter_second_language_option);
			}
		}

		// FILTER : Operator
		if($filter_operator_name = $this->getState('filter.operator_name'))
		{
			if ($filter_operator_name > 0){
				$this->addWhere("a.operator_name = " . (int)$filter_operator_name);
			}
		}

		// FILTER : Main Guide
		if($filter_main_guide = $this->getState('filter.main_guide'))
		{
			if ($filter_main_guide > 0){
				$this->addWhere("a.main_guide = " . (int)$filter_main_guide);
			}
		}

		// FILTER : Trip Leader
		if($filter_trip_leader = $this->getState('filter.trip_leader'))
		{
			if ($filter_trip_leader > 0){
				$this->addWhere("a.trip_leader = " . (int)$filter_trip_leader);
			}
		}

		// FILTER : Remuneration
		if($filter_remunerations_company = $this->getState('filter.remunerations_company'))
		{
			$this->addJoin("`#__guideman_prices` AS _remunerations_ ON _remunerations_.id = a.remunerations", 'LEFT');
			if ($filter_remunerations_company > 0){
				$this->addWhere("_remunerations_.company = " . (int)$filter_remunerations_company);
			}
		}

		// FILTER : Pricing
		if($filter_invoicing_company = $this->getState('filter.invoicing_company'))
		{
			$this->addJoin("`#__guideman_prices` AS _invoicing_ ON _invoicing_.id = a.invoicing", 'LEFT');
			if ($filter_invoicing_company > 0){
				$this->addWhere("_invoicing_.company = " . (int)$filter_invoicing_company);
			}
		}

		// FILTER : Start Date
		if($filter_start_date = $this->getState('filter.start_date'))
		{
			if ($filter_start_date !== null){
				$this->addWhere("a.start_date = " . $this->_db->Quote($filter_start_date));
			}
		}

		// FILTER : End Date
		if($filter_end_date = $this->getState('filter.end_date'))
		{
			if ($filter_end_date !== null){
				$this->addWhere("a.end_date = " . $this->_db->Quote($filter_end_date));
			}
		}

		// FILTER : Creation date
		if($filter_creation_date = $this->getState('filter.creation_date'))
		{
			if ($filter_creation_date !== null){
				$this->addWhere("a.creation_date = " . $this->_db->Quote($filter_creation_date));
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

		// FILTER : Modification date
		if($filter_modification_date = $this->getState('filter.modification_date'))
		{
			if ($filter_modification_date !== null){
				$this->addWhere("a.modification_date = " . $this->_db->Quote($filter_modification_date));
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

		// FILTER : My Joomla user > Name
		if($filter_my_joomla_user = $this->getState('filter.my_joomla_user'))
		{
			if ($filter_my_joomla_user == 'auto'){
				$this->addWhere('a.my_joomla_user = ' . (int)JFactory::getUser()->get('id'));
			}
			else 
			if ($filter_my_joomla_user > 0){
				$this->addWhere("a.my_joomla_user = " . (int)$filter_my_joomla_user);
			}
		}

		// FILTER : My Joomla access > Title
		if($filter_my_joomla_access = $this->getState('filter.my_joomla_access'))
		{
			if ($filter_my_joomla_access > 0){
				$this->addWhere("a.my_joomla_access = " . (int)$filter_my_joomla_access);
			}
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'file_name');
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
if (!class_exists('GuidemanModelJobs')){ class GuidemanModelJobs extends GuidemanCkModelJobs{} }


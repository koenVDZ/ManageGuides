<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
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
* Guideadm List Model
*
* @package	Guideadm
* @subpackage	Classes
*/
class GuideadmCkModelJobs extends GuideadmClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'job';

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
				'a.file_name', 'file_name',
				'_client_id_.name', 'client_id.name',
				'_requested_language_.name', 'requested_language.name',
				'_second_language_option_.name', 'second_language_option.name',
				'_trip_leader_.name', 'trip_leader.name',
				'_remunerations_company_.company', 'remunerations.company',
				'_invoicing_company_.company', 'invoicing.company',
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
					'client_reference',
					'company_id',
					'company_id.name',
					'coordination',
					'created_by',
					'created_by.name',
					'creation_date',
					'end_date',
					'file_name',
					'file_number',
					'guide_status',
					'invoicing',
					'invoicing.company',
					'main_guide',
					'main_guide.name',
					'modification_date',
					'modified_by',
					'modified_by.name',
					'my_joomla_access',
					'my_joomla_access.title',
					'my_joomla_user',
					'my_joomla_user.name',
					'operator_name',
					'operator_name.name',
					'ordering',
					'pax',
					'remunerations',
					'remunerations.company',
					'requested_language',
					'requested_language.name',
					'second_language_option',
					'second_language_option.name',
					'start_date',
					'status',
					'total_credit',
					'total_debet',
					'trip_leader',
					'trip_leader.name'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'company_id.name' => 'ASC'
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

		// FILTER : Name
		if($filter_client_id = $this->getState('filter.client_id'))
		{
			if ($filter_client_id > 0){
				$this->addWhere("a.client_id = " . (int)$filter_client_id);
			}
		}

		// FILTER : Req. language
		if($filter_requested_language = $this->getState('filter.requested_language'))
		{
			if ($filter_requested_language > 0){
				$this->addWhere("a.requested_language = " . (int)$filter_requested_language);
			}
		}

		// FILTER : Seq. Language
		if($filter_second_language_option = $this->getState('filter.second_language_option'))
		{
			if ($filter_second_language_option > 0){
				$this->addWhere("a.second_language_option = " . (int)$filter_second_language_option);
			}
		}

		// FILTER : operator
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

		// FILTER : Prices
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

		// FILTER : Joomla User
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

		// FILTER : Viewlevel
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
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmModelJobs')){ class GuideadmModelJobs extends GuideadmCkModelJobs{} }


<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Contacts
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
class GuideadmCkModelContacts extends GuideadmClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'contact';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'contact';

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
				'a.surname', 'surname',
				'a.alias', 'alias',
				'_company_id_.name', 'company_id.name',
				'_business_type_country_id_.country_id', 'business_type.country_id',
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'catid' => 'cmd',
			'company_id' => 'cmd',
			'business_type' => 'cmd',
			'birthdate' => 'date:d-m-Y',
			'nationality' => 'cmd',
			'country_id' => 'cmd',
			'state_id' => 'cmd',
			'visits_id' => 'cmd',
			'creation_date' => 'date:Y-m-d',
			'created_by' => 'cmd',
			'modification_date' => 'date:Y-m-d',
			'modified_by' => 'cmd',
			'my_joomla_access' => 'cmd',
			'my_joomla_user' => 'cmd'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('catid', // name
			'categories', // foreignModelClass
			'catid', // localKey
			'id' // foreignKey
		);

		$this->hasOne('company_id', // name
			'contacts', // foreignModelClass
			'company_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('business_type', // name
			'businesstypes', // foreignModelClass
			'business_type', // localKey
			'id' // foreignKey
		);

		$this->hasOne('nationality', // name
			'countries', // foreignModelClass
			'nationality', // localKey
			'id' // foreignKey
		);

		$this->hasOne('country_id', // name
			'countries', // foreignModelClass
			'country_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('state_id', // name
			'states', // foreignModelClass
			'state_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('visits_id', // name
			'categories', // foreignModelClass
			'visits_id', // localKey
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

		$this->hasOne('my_joomla_access', // name
			'.viewlevels', // foreignModelClass
			'my_joomla_access', // localKey
			'id' // foreignKey
		);

		$this->hasOne('my_joomla_user', // name
			'.users', // foreignModelClass
			'my_joomla_user', // localKey
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
		$id	.= ':'.$this->getState('filter.catid');
		$id	.= ':'.$this->getState('filter.company_id');
		$id	.= ':'.$this->getState('filter.business_type');
		$id	.= ':'.$this->getState('filter.birthdate');
		$id	.= ':'.$this->getState('filter.nationality');
		$id	.= ':'.$this->getState('filter.country_id');
		$id	.= ':'.$this->getState('filter.state_id');
		$id	.= ':'.$this->getState('filter.visits_id');
		$id	.= ':'.$this->getState('filter.creation_date');
		$id	.= ':'.$this->getState('filter.created_by');
		$id	.= ':'.$this->getState('filter.modification_date');
		$id	.= ':'.$this->getState('filter.modified_by');
		$id	.= ':'.$this->getState('filter.my_joomla_access');
		$id	.= ':'.$this->getState('filter.my_joomla_user');
		return parent::getStoreId($id);
	}

	/**
	* Prepare some additional derivated objects.
	*
	* @access	public
	* @param	object	&$items	The items to populate.
	*
	*
	* @since	Cook 2.0
	*
	* @return	void
	*/
	public function populateObjects(&$items)
	{
		if (!empty($item->settings) && is_string($item->settings))
		{
			$registry = new JRegistry;
			$registry->loadString($item->settings);
			$item->settings = $registry->toObject();
		}

		parent::populateObjects($items);
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
		$query->from('#__guideman_contacts AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'alias',
					'birthdate',
					'business_type',
					'business_type.country_id',
					'catid',
					'catid.MGcat',
					'ce_details_id',
					'company_id',
					'company_id.name',
					'con_position',
					'country_id',
					'country_id.country_name',
					'created_by',
					'created_by.name',
					'creation_date',
					'driverguide',
					'email',
					'gender',
					'hits',
					'image',
					'modification_date',
					'modified_by',
					'modified_by.name',
					'my_joomla_access',
					'my_joomla_access.title',
					'my_joomla_user',
					'my_joomla_user.name',
					'name',
					'nationality',
					'nationality.country_name',
					'ordering',
					'progress',
					'settings',
					'state_id',
					'state_id.state',
					'surname',
					'type',
					'user_id',
					'visits_id',
					'visits_id.MGcat'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'catid.MGcat' => 'ASC'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'name'
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
			'created_by',
			'published'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'publish' => 'published',
			'author' => 'created_by'
		));

		// SEARCH : Name + Surname + Alias + Contact Position + Email
		$this->orm->search('search', array(
			'on' => array(
				'name' => 'like',
				'surname' => 'like',
				'alias' => 'like',
				'con_position' => 'like',
				'email' => 'like'
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

		// FILTER : Category
		if($filter_catid = $this->getState('filter.catid'))
		{
			if ($filter_catid > 0){
				$this->addWhere("a.catid = " . (int)$filter_catid);
			}
		}

		// FILTER : Company
		if($filter_company_id = $this->getState('filter.company_id'))
		{
			if ($filter_company_id > 0){
				$this->addWhere("a.company_id = " . (int)$filter_company_id);
			}
		}

		// FILTER : Country
		if($filter_business_type_country_id = $this->getState('filter.business_type_country_id'))
		{
			$this->addJoin("`#__guideman_businesstypes` AS _business_type_ ON _business_type_.id = a.business_type", 'LEFT');
			if ($filter_business_type_country_id > 0){
				$this->addWhere("_business_type_.country_id = " . (int)$filter_business_type_country_id);
			}
		}

		// FILTER : Birthdate
		if($filter_birthdate = $this->getState('filter.birthdate'))
		{
			if ($filter_birthdate !== null){
				$this->addWhere("a.birthdate = " . $this->_db->Quote($filter_birthdate));
			}
		}

		// FILTER : Nationality
		if($filter_nationality = $this->getState('filter.nationality'))
		{
			if ($filter_nationality > 0){
				$this->addWhere("a.nationality = " . (int)$filter_nationality);
			}
		}

		// FILTER : Country Name
		if($filter_country_id = $this->getState('filter.country_id'))
		{
			if ($filter_country_id > 0){
				$this->addWhere("a.country_id = " . (int)$filter_country_id);
			}
		}

		// FILTER : State / Province
		if($filter_state_id = $this->getState('filter.state_id'))
		{
			if ($filter_state_id > 0){
				$this->addWhere("a.state_id = " . (int)$filter_state_id);
			}
		}

		// FILTER : Category
		if($filter_visits_id = $this->getState('filter.visits_id'))
		{
			if ($filter_visits_id > 0){
				$this->addWhere("a.visits_id = " . (int)$filter_visits_id);
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

		// FILTER : Viewlevels
		if($filter_my_joomla_access = $this->getState('filter.my_joomla_access'))
		{
			if ($filter_my_joomla_access > 0){
				$this->addWhere("a.my_joomla_access = " . (int)$filter_my_joomla_access);
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

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'name');
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
if (!class_exists('GuideadmModelContacts')){ class GuideadmModelContacts extends GuideadmCkModelContacts{} }


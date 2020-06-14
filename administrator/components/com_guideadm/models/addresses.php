<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Addresses
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
class GuideadmCkModelAddresses extends GuideadmClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'usersadress';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'addressesitem';

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
				'_catid_.MGcat', 'catid.MGcat',
				'_address_label_.type', 'address_label.type',
				'_country_id_.country_name', 'country_id.country_name',
				'_state_id_.state', 'state_id.state',
				'a.suburb', 'suburb',
				'_created_by_.name', 'created_by.name',
				'a.published', 'published',
				'a.id', '',
				'a.user_id', 'user_id',
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
			'user_id' => 'cmd',
			'address_label' => 'cmd',
			'country_id' => 'cmd',
			'state_id' => 'cmd',
			'creation_date' => 'date:Y-m-d',
			'created_by' => 'cmd',
			'modification_date' => 'date:Y-m-d',
			'modified_by' => 'cmd'
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

		$this->hasOne('user_id', // name
			'contacts', // foreignModelClass
			'user_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('address_label', // name
			'addresslabels', // foreignModelClass
			'address_label', // localKey
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
		$id	.= ':'.$this->getState('filter.catid');
		$id	.= ':'.$this->getState('filter.user_id');
		$id	.= ':'.$this->getState('filter.address_label');
		$id	.= ':'.$this->getState('filter.country_id');
		$id	.= ':'.$this->getState('filter.state_id');
		$id	.= ':'.$this->getState('filter.creation_date');
		$id	.= ':'.$this->getState('filter.created_by');
		$id	.= ':'.$this->getState('filter.modification_date');
		$id	.= ':'.$this->getState('filter.modified_by');
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
		$query->from('#__guideman_addresses AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'address',
					'address_label',
					'address_label.type',
					'catid',
					'catid.MGcat',
					'city',
					'country_id',
					'country_id.country_name',
					'country_id.iso_2',
					'created_by',
					'created_by.name',
					'creation_date',
					'default_address',
					'modification_date',
					'modified_by',
					'modified_by.name',
					'ordering',
					'state_id',
					'state_id.flag',
					'state_id.state',
					'suburb',
					'user_id',
					'user_id.name',
					'zipcode'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'catid.MGcat' => 'ASC'
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
			'created_by',
			'published',
			'user_id'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'publish' => 'published',
			'author' => 'created_by'
		));

		// SEARCH : Address + Suburb + ZipCode + City
		$this->orm->search('search', array(
			'on' => array(
				'address' => 'like',
				'suburb' => 'like',
				'zipcode' => 'like',
				'city' => 'like'
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

		// FILTER : UserName
		if($filter_user_id = $this->getState('filter.user_id'))
		{
			if ($filter_user_id > 0){
				$this->addWhere("a.user_id = " . (int)$filter_user_id);
			}
		}

		// FILTER : Address Type
		if($filter_address_label = $this->getState('filter.address_label'))
		{
			if ($filter_address_label > 0){
				$this->addWhere("a.address_label = " . (int)$filter_address_label);
			}
		}

		// FILTER : Country
		if($filter_country_id = $this->getState('filter.country_id'))
		{
			if ($filter_country_id > 0){
				$this->addWhere("a.country_id = " . (int)$filter_country_id);
			}
		}

		// FILTER : State
		if($filter_state_id = $this->getState('filter.state_id'))
		{
			if ($filter_state_id > 0){
				$this->addWhere("a.state_id = " . (int)$filter_state_id);
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

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'user_id');
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
if (!class_exists('GuideadmModelAddresses')){ class GuideadmModelAddresses extends GuideadmCkModelAddresses{} }


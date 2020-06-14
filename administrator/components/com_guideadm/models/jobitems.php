<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Job Items
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
class GuideadmCkModelJobitems extends GuideadmClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'jobitem';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'jobitemsitem';

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
				'_job_id_.file_name', 'job_id.file_name',
				'_service_company_.company', 'service.company',
				'_service_provider_.name', 'service_provider.name',
				'_guide_.name', 'guide.name',
				'_transport_.name', 'transport.name',
				'_my_joomla_user_.name', 'my_joomla_user.name',
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'job_id' => 'cmd',
			'start_date' => 'date:d-m-Y',
			'start_time_from' => 'varchar',
			'start_time_to' => 'varchar',
			'end_date' => 'date:d-m-Y',
			'end_time_from' => 'varchar',
			'end_time_to' => 'varchar',
			'service' => 'cmd',
			'service_provider' => 'cmd',
			'guide' => 'cmd',
			'transport' => 'cmd',
			'driver' => 'cmd',
			'creation_date' => 'date:Y-m-d',
			'created_by' => 'cmd',
			'modification_date' => 'date:Y-m-d',
			'modified_by' => 'cmd',
			'my_joomla_access' => 'cmd',
			'my_joomla_user' => 'cmd'
				));


		parent::__construct($config);

		$this->hasOne('job_id', // name
			'jobs', // foreignModelClass
			'job_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('service', // name
			'services', // foreignModelClass
			'service', // localKey
			'id' // foreignKey
		);

		$this->hasOne('service_provider', // name
			'contacts', // foreignModelClass
			'service_provider', // localKey
			'id' // foreignKey
		);

		$this->hasOne('guide', // name
			'contacts', // foreignModelClass
			'guide', // localKey
			'id' // foreignKey
		);

		$this->hasOne('transport', // name
			'contacts', // foreignModelClass
			'transport', // localKey
			'id' // foreignKey
		);

		$this->hasOne('driver', // name
			'contacts', // foreignModelClass
			'driver', // localKey
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
		$id	.= ':'.$this->getState('filter.published');
		$id	.= ':'.$this->getState('filter.job_id');
		$id	.= ':'.$this->getState('filter.start_date');
		$id	.= ':'.$this->getState('filter.start_time');
		$id	.= ':'.$this->getState('filter.end_date');
		$id	.= ':'.$this->getState('filter.end_time');
		$id	.= ':'.$this->getState('filter.service');
		$id	.= ':'.$this->getState('filter.service_provider');
		$id	.= ':'.$this->getState('filter.guide');
		$id	.= ':'.$this->getState('filter.transport');
		$id	.= ':'.$this->getState('filter.driver');
		$id	.= ':'.$this->getState('filter.creation_date');
		$id	.= ':'.$this->getState('filter.created_by');
		$id	.= ':'.$this->getState('filter.modification_date');
		$id	.= ':'.$this->getState('filter.modified_by');
		$id	.= ':'.$this->getState('filter.my_joomla_access');
		$id	.= ':'.$this->getState('filter.my_joomla_user');
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
		$query->from('#__guideman_jobitems AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'created_by',
					'created_by.name',
					'creation_date',
					'driver',
					'driver.name',
					'end_date',
					'end_time',
					'guide',
					'guide.name',
					'guide_status',
					'item_status',
					'job_id',
					'job_id.file_name',
					'job_id.file_number',
					'modification_date',
					'modified_by',
					'modified_by.name',
					'my_joomla_access',
					'my_joomla_access.title',
					'my_joomla_user',
					'my_joomla_user.name',
					'optional',
					'ordering',
					'pax',
					'remark',
					'service',
					'service.company',
					'service_provider',
					'service_provider.name',
					'service_provider_status',
					'start_date',
					'start_time',
					'total_credit',
					'total_debet',
					'transport',
					'transport.name',
					'transport_status',
					'type'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'job_id.file_number' => 'ASC'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'job_id'
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

		// FILTER : File Name
		if($filter_job_id = $this->getState('filter.job_id'))
		{
			if ($filter_job_id > 0){
				$this->addWhere("a.job_id = " . (int)$filter_job_id);
			}
		}

		// FILTER : Start Date
		if($filter_start_date = $this->getState('filter.start_date'))
		{
			if ($filter_start_date !== null){
				$this->addWhere("a.start_date = " . $this->_db->Quote($filter_start_date));
			}
		}

		// FILTER (Range) : Start Time
		if($filter_start_time_from = $this->getState('filter.start_time_from'))
		{
			if ($filter_start_time_from !== null){
				$this->addWhere("a.start_time >= " . $this->_db->Quote($filter_start_time_from));
			}
		}

		// FILTER (Range) : Start Time
		if($filter_start_time_to = $this->getState('filter.start_time_to'))
		{
			if ($filter_start_time_to !== null){
				$this->addWhere("a.start_time <= " . $this->_db->Quote($filter_start_time_to));
			}
		}

		// FILTER : End Date
		if($filter_end_date = $this->getState('filter.end_date'))
		{
			if ($filter_end_date !== null){
				$this->addWhere("a.end_date = " . $this->_db->Quote($filter_end_date));
			}
		}

		// FILTER (Range) : End Time
		if($filter_end_time_from = $this->getState('filter.end_time_from'))
		{
			if ($filter_end_time_from !== null){
				$this->addWhere("a.end_time >= " . $this->_db->Quote($filter_end_time_from));
			}
		}

		// FILTER (Range) : End Time
		if($filter_end_time_to = $this->getState('filter.end_time_to'))
		{
			if ($filter_end_time_to !== null){
				$this->addWhere("a.end_time <= " . $this->_db->Quote($filter_end_time_to));
			}
		}

		// FILTER : Company
		if($filter_service_company = $this->getState('filter.service_company'))
		{
			$this->addJoin("`#__guideman_services` AS _service_ ON _service_.id = a.service", 'LEFT');
			if ($filter_service_company > 0){
				$this->addWhere("_service_.company = " . (int)$filter_service_company);
			}
		}

		// FILTER : Service Provider
		if($filter_service_provider = $this->getState('filter.service_provider'))
		{
			if ($filter_service_provider > 0){
				$this->addWhere("a.service_provider = " . (int)$filter_service_provider);
			}
		}

		// FILTER : Guide
		if($filter_guide = $this->getState('filter.guide'))
		{
			if ($filter_guide > 0){
				$this->addWhere("a.guide = " . (int)$filter_guide);
			}
		}

		// FILTER : Transport Comp.
		if($filter_transport = $this->getState('filter.transport'))
		{
			if ($filter_transport > 0){
				$this->addWhere("a.transport = " . (int)$filter_transport);
			}
		}

		// FILTER : Driver
		if($filter_driver = $this->getState('filter.driver'))
		{
			if ($filter_driver > 0){
				$this->addWhere("a.driver = " . (int)$filter_driver);
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
		$orderCol = $this->getState('list.ordering', 'job_id');
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
if (!class_exists('GuideadmModelJobitems')){ class GuideadmModelJobitems extends GuideadmCkModelJobitems{} }


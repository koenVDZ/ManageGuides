<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
* Guideman List Model
*
* @package	Guideman
* @subpackage	Classes
*/
class GuidemanCkModelJobitems extends GuidemanClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'jobview';

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
				'a.type', 'type',
				'a.item_status', 'item_status',
				'a.published', 'published',
				'_job_id_company_id_nationality_.iso_2', 'job_id.company_id.nationality.iso_2',
				'_job_id_company_id_.name', 'job_id.company_id.name',
				'a.start_date', 'start_date',
				'a.start_time', 'start_time',
				'a.end_date', 'end_date',
				'a.end_time', 'end_time',
				'_service_.service_name', 'service.service_name',
				'a.pax', 'pax',
				'a.service_provider_status', 'service_provider_status',
				'_service_provider_nationality_.iso_2', 'service_provider.nationality.iso_2',
				'_service_provider_.name', 'service_provider.name',
				'a.guide_status', 'guide_status',
				'_guide_.name', 'guide.name',
				'_guide_.surname', 'guide.surname',
				'a.guide', 'guide',
				'_guide_.alias', 'guide.alias',
				'a.transport_status', 'transport_status',
				'_transport_.name', 'transport.name',
				'_driver_nationality_.iso_2', 'driver.nationality.iso_2',
				'_driver_.name', 'driver.name',
				'_driver_.surname', 'driver.surname',
				'_driver_.alias', 'driver.alias',
				'a.driver', 'driver',
				'_job_id_.status', 'job_id.status',
				'a.id', '',
				'a.remark', 'remark',
				'a.job_id', 'job_id',
				'a.total_debet', 'total_debet',
				'a.total_credit', 'total_credit',
				'a.optional', 'optional',
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'item_status' => 'varchar',
			'job_id' => 'cmd',
			'job_id_company_id' => 'cmd',
			'job_id_operator_name' => 'cmd',
			'transport' => 'cmd',
			'driver' => 'cmd',
			'guide' => 'cmd',
			'start_date' => 'date:d-m-Y'
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
		$id	.= ':'.$this->getState('filter.item_status');
		$id	.= ':'.$this->getState('filter.job_id');
		$id	.= ':'.$this->getState('filter.job_id_company_id');
		$id	.= ':'.$this->getState('filter.job_id_operator_name');
		$id	.= ':'.$this->getState('filter.transport');
		$id	.= ':'.$this->getState('filter.driver');
		$id	.= ':'.$this->getState('filter.guide');
		$id	.= ':'.$this->getState('filter.start_date');
		$id	.= ':'.$this->getState('filter.published');
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
				$orderField = 'a.job_id';
				$orderDir = 'ASC';
				break;
		}

		$this->orm(array(
			'select' => array(
				'job_id' => 'title',
				"{job_id}" => 'text',
			),

			'search' => array(

				'plugin' => array(
					'on' => array(
						'{job_id}' => $method,
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
		$item->section = JText::_('GUIDEMAN') . ' - ' . JText::_('GUIDEMAN_VIEW_JOB_ITEMS_ITEM');
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
		$query->from('#__guideman_jobitems AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'driver',
					'driver.alias',
					'driver.name',
					'driver.nationality',
					'driver.nationality.iso_2',
					'driver.surname',
					'end_date',
					'end_time',
					'guide',
					'guide.alias',
					'guide.name',
					'guide.nationality',
					'guide.nationality.iso_2',
					'guide.surname',
					'guide_status',
					'item_status',
					'job_id',
					'job_id.company_id',
					'job_id.company_id.name',
					'job_id.company_id.nationality',
					'job_id.company_id.nationality.iso_2',
					'job_id.status',
					'optional',
					'ordering',
					'pax',
					'remark',
					'service',
					'service.costs',
					'service.costs.currency',
					'service.costs.currency.symbol',
					'service.duration',
					'service.remunaration',
					'service.remunaration.currency',
					'service.remunaration.currency.symbol',
					'service.service_name',
					'service_provider',
					'service_provider.name',
					'service_provider.nationality',
					'service_provider.nationality.iso_2',
					'service_provider_status',
					'start_date',
					'start_time',
					'total_credit',
					'total_debet',
					'transport',
					'transport.name',
					'transport.nationality',
					'transport.nationality.iso_2',
					'transport_status',
					'type'
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

		// FILTER : Service Status
		if($filter_item_status = $this->getState('filter.item_status'))
		{
			if ($filter_item_status !== null){
				$this->addWhere("a.item_status = " . $this->_db->Quote($filter_item_status));
			}
		}

		// FILTER : Service Order
		if($filter_job_id = $this->getState('filter.job_id'))
		{
			if ($filter_job_id > 0){
				$this->addWhere("a.job_id = " . (int)$filter_job_id);
			}
		}

		// FILTER : Company
		if($filter_job_id_company_id = $this->getState('filter.job_id_company_id'))
		{
			$this->addJoin("`#__guideman_jobs` AS _job_id_ ON _job_id_.id = a.job_id", 'LEFT');
			if ($filter_job_id_company_id > 0){
				$this->addWhere("_job_id_.company_id = " . (int)$filter_job_id_company_id);
			}
		}

		// FILTER : Operator
		if($filter_job_id_operator_name = $this->getState('filter.job_id_operator_name'))
		{
			$this->addJoin("`#__guideman_jobs` AS _job_id_ ON _job_id_.id = a.job_id", 'LEFT');
			if ($filter_job_id_operator_name > 0){
				$this->addWhere("_job_id_.operator_name = " . (int)$filter_job_id_operator_name);
			}
		}

		// FILTER : Transport Company
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

		// FILTER : Guide
		if($filter_guide = $this->getState('filter.guide'))
		{
			if ($filter_guide > 0){
				$this->addWhere("a.guide = " . (int)$filter_guide);
			}
		}

		// FILTER : Start Date
		if($filter_start_date = $this->getState('filter.start_date'))
		{
			if ($filter_start_date !== null){
				$this->addWhere("a.start_date = " . $this->_db->Quote($filter_start_date));
			}
		}

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
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanModelJobitems')){ class GuidemanModelJobitems extends GuidemanCkModelJobitems{} }


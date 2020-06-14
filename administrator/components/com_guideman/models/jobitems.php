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
	public $itemDefaultLayout = '';

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
			'published' => 'varchar',
			'limit' => 'cmd'
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
		return $jinput->get('layout', '', 'STRING');
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

		$id	.= ':'.$this->getState('limit');
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


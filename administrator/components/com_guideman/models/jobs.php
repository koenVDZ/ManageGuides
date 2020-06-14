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
	public $itemDefaultLayout = '';

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
			'published' => 'varchar',
			'limit' => 'cmd'
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
		$query->from('#__guideman_jobs AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
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


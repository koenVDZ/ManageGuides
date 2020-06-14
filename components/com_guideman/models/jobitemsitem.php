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
* Guideman Item Model
*
* @package	Guideman
* @subpackage	Classes
*/
class GuidemanCkModelJobitemsitem extends GuidemanClassModelItem
{
	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_item = 'jobitemsitem';

	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_list = 'jobitems';

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
		parent::__construct();
	}

	/**
	* Method to delete item(s).
	*
	* @access	public
	* @param	array	&$pks	Ids of the items to delete.
	*
	* @return	boolean	True on success.
	*/
	public function delete(&$pks)
	{
		if (!count( $pks ))
			return true;


		if (!parent::delete($pks))
			return false;



		return true;
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
		return $jinput->get('layout', 'jobitemsitem', 'STRING');
	}

	/**
	* Returns a Table object, always creating it.
	*
	* @access	public
	* @param	string	$type	The table type to instantiate.
	* @param	string	$prefix	A prefix for the table class name. Optional.
	* @param	array	$config	Configuration array for model. Optional.
	*
	*
	* @since	1.6
	*
	* @return	JTable	A database object
	*/
	public function getTable($type = 'jobitemsitem', $prefix = 'GuidemanTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	* Method to increment hits (check session and layout)
	*
	* @access	public
	* @param	array	$layouts	List of authorized layouts for hitting the object.
	*
	*
	* @since	11.1
	*
	* @return	boolean	Null if skipped. True when incremented. False if error.
	*/
	public function hit($layouts = null)
	{
		return parent::hit(array('jobview'));
	}

	/**
	* Method to get the data that should be injected in the form.
	*
	* @access	protected
	*
	* @return	mixed	The data for the form.
	*/
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState('com_guideman.edit.jobitemsitem.data', array());

		if (empty($data)) {
			//Default values shown in the form for new item creation
			$data = $this->getItem();

			// Prime some default values.
			if ($this->getState('jobitemsitem.id') == 0)
			{
				$jinput = JFactory::getApplication()->input;

				$data->id = 0;
				$data->job_id = $jinput->get('filter_job_id', $this->getState('filter.job_id'), 'INT');
				$data->type = $jinput->get('filter_type', $this->getState('filter.type', ''), 'STRING');
				$data->item_status = $jinput->get('filter_item_status', $this->getState('filter.item_status', ''), 'STRING');
				$data->start_date = null;
				$data->start_time = null;
				$data->end_date = null;
				$data->end_time = null;
				$data->service = $jinput->get('filter_service', $this->getState('filter.service'), 'INT');
				$data->remark = null;
				$data->service_provider = $jinput->get('filter_service_provider', $this->getState('filter.service_provider'), 'INT');
				$data->service_provider_status = $jinput->get('filter_service_provider_status', $this->getState('filter.service_provider_status', ''), 'STRING');
				$data->guide = $jinput->get('filter_guide', $this->getState('filter.guide'), 'INT');
				$data->guide_status = $jinput->get('filter_guide_status', $this->getState('filter.guide_status', ''), 'STRING');
				$data->optional = 0;
				$data->transport = $jinput->get('filter_transport', $this->getState('filter.transport'), 'INT');
				$data->transport_status = $jinput->get('filter_transport_status', $this->getState('filter.transport_status', ''), 'STRING');
				$data->driver = $jinput->get('filter_driver', $this->getState('filter.driver'), 'INT');
				$data->pax = null;
				$data->total_debet = null;
				$data->total_credit = null;
				$data->creation_date = null;
				$data->created_by = $jinput->get('filter_created_by', $this->getState('filter.created_by'), 'INT');
				$data->modification_date = null;
				$data->modified_by = $jinput->get('filter_modified_by', $this->getState('filter.modified_by'), 'INT');
				$data->ordering = null;
				$data->published = 1;
				$data->my_joomla_access = $jinput->get('filter_my_joomla_access', $this->getState('filter.my_joomla_access'), 'INT');
				$data->my_joomla_user = $jinput->get('filter_my_joomla_user', $this->getState('filter.my_joomla_user'), 'INT');

			}
		}
		return $data;
	}

	/**
	* Method to auto-populate the model state.
	* 
	* This method should only be called once per instantiation and is designed to
	* be called on the first call to the getState() method unless the model
	* configuration flag to ignore the request is set.
	* 
	* Note. Calling getState in this method will result in recursion.
	*
	* @access	protected
	*
	*
	* @since	11.1
	*
	* @return	void
	*/
	protected function populateState()
	{
		$app = JFactory::getApplication();
		$session = JFactory::getSession();
		$acl = GuidemanHelper::getActions();



		parent::populateState();

		//Only show the published items
		if (!$acl->get('core.admin') && !$acl->get('core.edit.state'))
			$this->setState('filter.published', 1);
	}

	/**
	* Preparation of the item query.
	*
	* @access	protected
	* @param	object	&$query	returns a filled query object.
	* @param	integer	$pk	The primary id key of the jobitemsitem
	*
	* @return	void
	*/
	protected function prepareQuery(&$query, $pk)
	{
		//FROM : Main table
		$query->from('#__guideman_jobitems AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.jobitemsitem':

				$this->orm->select(array(
					'driver',
					'driver.alias',
					'end_date',
					'end_time',
					'guide',
					'guide.alias',
					'guide_status',
					'item_status',
					'job_id',
					'job_id.client_id',
					'job_id.client_id.alias',
					'job_id.client_id.name',
					'job_id.client_id.surname',
					'job_id.end_date',
					'job_id.file_name',
					'job_id.file_number',
					'job_id.pax',
					'job_id.start_date',
					'job_id.status',
					'optional',
					'pax',
					'service',
					'service.company',
					'service.company.name',
					'service.service_name',
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

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.jobview':

				$this->orm->select(array(
					'driver',
					'driver.type',
					'end_date',
					'end_time',
					'guide',
					'guide.alias',
					'guide.name',
					'guide.surname',
					'guide_status',
					'item_status',
					'job_id',
					'job_id.client_id',
					'job_id.client_id.alias',
					'job_id.client_id.name',
					'job_id.client_id.nationality',
					'job_id.client_id.nationality.iso_2',
					'job_id.client_id.surname',
					'job_id.company_id',
					'job_id.company_id.alias',
					'job_id.company_id.name',
					'job_id.company_id.nationality',
					'job_id.company_id.nationality.iso_2',
					'job_id.end_date',
					'job_id.file_number',
					'job_id.guide_status',
					'job_id.main_guide',
					'job_id.main_guide.alias',
					'job_id.main_guide.name',
					'job_id.main_guide.nationality',
					'job_id.main_guide.nationality.iso_2',
					'job_id.main_guide.surname',
					'job_id.operator_name',
					'job_id.operator_name.alias',
					'job_id.operator_name.name',
					'job_id.operator_name.nationality',
					'job_id.operator_name.nationality.iso_2',
					'job_id.operator_name.surname',
					'job_id.pax',
					'job_id.requested_language',
					'job_id.requested_language.flag',
					'job_id.requested_language.name',
					'job_id.second_language_option',
					'job_id.second_language_option.flag',
					'job_id.second_language_option.name',
					'job_id.start_date',
					'job_id.status',
					'job_id.trip_leader',
					'job_id.trip_leader.alias',
					'job_id.trip_leader.name',
					'job_id.trip_leader.nationality',
					'job_id.trip_leader.nationality.iso_2',
					'job_id.trip_leader.surname',
					'pax',
					'remark',
					'service',
					'service.service_name',
					'service_provider',
					'service_provider.name',
					'start_date',
					'start_time',
					'total_credit',
					'total_debet',
					'transport',
					'transport.name',
					'transport_status',
					'type'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.hotel':

				$this->orm->select(array(
					'end_date',
					'end_time',
					'item_status',
					'job_id',
					'job_id.end_date',
					'job_id.file_number',
					'job_id.start_date',
					'job_id.status',
					'pax',
					'remark',
					'service_provider',
					'service_provider.name',
					'service_provider_status',
					'start_date',
					'start_time',
					'total_credit',
					'total_debet',
					'type'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.restaurant':

				$this->orm->select(array(
					'end_time',
					'guide',
					'guide.alias',
					'item_status',
					'job_id',
					'job_id.client_id',
					'job_id.client_id.alias',
					'job_id.client_id.name',
					'job_id.client_id.surname',
					'job_id.end_date',
					'job_id.file_name',
					'job_id.file_number',
					'job_id.pax',
					'job_id.start_date',
					'job_id.status',
					'pax',
					'remark',
					'service_provider',
					'service_provider.name',
					'service_provider_status',
					'start_date',
					'start_time',
					'total_credit',
					'total_debet',
					'type'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.attraction':

				$this->orm->select(array(
					'end_date',
					'end_time',
					'item_status',
					'job_id',
					'job_id.client_id',
					'job_id.client_id.alias',
					'job_id.client_id.name',
					'job_id.client_id.surname',
					'job_id.end_date',
					'job_id.file_name',
					'job_id.file_number',
					'job_id.pax',
					'job_id.start_date',
					'job_id.status',
					'pax',
					'remark',
					'service_provider',
					'service_provider.name',
					'service_provider_status',
					'start_date',
					'start_time',
					'total_credit',
					'total_debet',
					'type'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'all':
				//SELECT : raw complete query without joins
				$this->addSelect('a.*');

				// Disable the pagination
				$this->setState('list.limit', null);
				$this->setState('list.start', null);

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;
		}

		$this->orm->select(array(
			'created_by',
			'published'
		));

		$this->orm->access('a', array(
			'publish' => 'published',
			'author' => 'created_by'
		));

		// ORDERING
		$orderCol = $this->getState('list.ordering');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->addOrder($orderCol . ' ' . $orderDir);



		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}

	/**
	* Prepare and sanitise the table prior to saving.
	*
	* @access	protected
	* @param	JTable	$table	A JTable object.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	protected function prepareTable($table)
	{
		$date = JFactory::getDate();


		if (empty($table->id))
		{
			//Creation date
			if (empty($table->creation_date))
				$table->creation_date =  JFactory::getDate()->toSql();

			//Defines automatically the author of this element
			$table->created_by = JFactory::getUser()->get('id');

			// Set ordering to the last item if not set
			$conditions = $this->getReorderConditions($table);
			$conditions = (count($conditions)?implode(" AND ", $conditions):'');
			$table->ordering = $table->getNextOrder($conditions);
		}
		else
		{
			//Defines automatically the editor of this element
			$table->modified_by = JFactory::getUser()->get('id');

			//Modification date
			$table->modification_date = JFactory::getDate()->toSql();
		}

	}

	/**
	* Save an item.
	*
	* @access	public
	* @param	array	$data	The post values.
	*
	* @return	boolean	True on success.
	*/
	public function save($data)
	{
		//Convert from a non-SQL formated date (start_date)
		$data['start_date'] = GuidemanHelperDates::getSqlDate($data['start_date'], array('d-m-Y'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (start_time)
		$data['start_time'] = GuidemanHelperDates::getSqlDate($data['start_time'], array('H:i'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (end_date)
		$data['end_date'] = GuidemanHelperDates::getSqlDate($data['end_date'], array('d-m-Y'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (end_time)
		$data['end_time'] = GuidemanHelperDates::getSqlDate($data['end_time'], array('H:i'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (creation_date)
		$data['creation_date'] = GuidemanHelperDates::getSqlDate($data['creation_date'], array('Y-m-d'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (modification_date)
		$data['modification_date'] = GuidemanHelperDates::getSqlDate($data['modification_date'], array('Y-m-d'), true, 'USER_UTC');
		//Some security checks
		$acl = GuidemanHelper::getActions();

		//Secure the author key if not allowed to change
		if (isset($data['created_by']) && !$acl->get('core.edit'))
			unset($data['created_by']);

		//Secure the published tag if not allowed to change
		if (isset($data['published']) && !$acl->get('core.edit.state'))
			unset($data['published']);

		if (parent::save($data)) {
			return true;
		}
		return false;


	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanModelJobitemsitem')){ class GuidemanModelJobitemsitem extends GuidemanCkModelJobitemsitem{} }


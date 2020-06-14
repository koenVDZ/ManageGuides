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
* Guideadm Item Model
*
* @package	Guideadm
* @subpackage	Classes
*/
class GuideadmCkModelJobsitem extends GuideadmClassModelItem
{
	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_item = 'jobsitem';

	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_list = 'jobs';

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
		return $jinput->get('layout', 'job', 'STRING');
	}

	/**
	* A public method to get a set of ordering conditions.
	*
	* @access	public
	* @param	object	$table	A record object.
	*
	*
	* @since	1.6
	*
	* @return	mixed	An array of conditions or a string to add to add to ordering queries.
	*/
	public function getReorderConditions($table)
	{
		$conditions = array('`company_id` = '.(int) $table->company_id);
		return $conditions;
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
	public function getTable($type = 'jobsitem', $prefix = 'GuideadmTable', $config = array())
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
		return parent::hit(array());
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
		$data = JFactory::getApplication()->getUserState('com_guideadm.edit.jobsitem.data', array());

		if (empty($data)) {
			//Default values shown in the form for new item creation
			$data = $this->getItem();

			// Prime some default values.
			if ($this->getState('jobsitem.id') == 0)
			{
				$jinput = JFactory::getApplication()->input;

				$data->id = 0;
				$data->file_number = null;
				$data->file_name = null;
				$data->status = $jinput->get('filter_status', $this->getState('filter.status', ''), 'STRING');
				$data->company_id = $jinput->get('filter_company_id', $this->getState('filter.company_id'), 'INT');
				$data->client_id = $jinput->get('filter_client_id', $this->getState('filter.client_id'), 'INT');
				$data->client_reference = null;
				$data->requested_language = $jinput->get('filter_requested_language', $this->getState('filter.requested_language'), 'INT');
				$data->second_language_option = $jinput->get('filter_second_language_option', $this->getState('filter.second_language_option'), 'INT');
				$data->operator_name = $jinput->get('filter_operator_name', $this->getState('filter.operator_name'), 'INT');
				$data->main_guide = $jinput->get('filter_main_guide', $this->getState('filter.main_guide'), 'INT');
				$data->coordination = 0;
				$data->guide_status = $jinput->get('filter_guide_status', $this->getState('filter.guide_status', ''), 'STRING');
				$data->trip_leader = $jinput->get('filter_trip_leader', $this->getState('filter.trip_leader'), 'INT');
				$data->remunerations = $jinput->get('filter_remunerations', $this->getState('filter.remunerations'), 'INT');
				$data->invoicing = $jinput->get('filter_invoicing', $this->getState('filter.invoicing'), 'INT');
				$data->pax = 1;
				$data->start_date = null;
				$data->end_date = null;
				$data->total_debet = null;
				$data->total_credit = null;
				$data->creation_date = null;
				$data->created_by = $jinput->get('filter_created_by', $this->getState('filter.created_by'), 'INT');
				$data->modification_date = null;
				$data->modified_by = $jinput->get('filter_modified_by', $this->getState('filter.modified_by'), 'INT');
				$data->my_joomla_user = $jinput->get('filter_my_joomla_user', $this->getState('filter.my_joomla_user'), 'INT');
				$data->my_joomla_access = $jinput->get('filter_my_joomla_access', $this->getState('filter.my_joomla_access'), 'INT');
				$data->ordering = null;
				$data->published = 1;

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
		$acl = GuideadmHelper::getActions();



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
	* @param	integer	$pk	The primary id key of the jobsitem
	*
	* @return	void
	*/
	protected function prepareQuery(&$query, $pk)
	{
		//FROM : Main table
		$query->from('#__guideman_jobs AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.job':

				$this->orm->select(array(
					'client_id',
					'client_id.name',
					'client_reference',
					'company_id',
					'company_id.name',
					'coordination',
					'created_by',
					'created_by.name',
					'created_by.username',
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
					'modified_by.username',
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
			'company_id',
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
		$data['start_date'] = GuideadmHelperDates::getSqlDate($data['start_date'], array('d-m-Y'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (end_date)
		$data['end_date'] = GuideadmHelperDates::getSqlDate($data['end_date'], array('d-m-Y'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (creation_date)
		$data['creation_date'] = GuideadmHelperDates::getSqlDate($data['creation_date'], array('Y-m-d'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (modification_date)
		$data['modification_date'] = GuideadmHelperDates::getSqlDate($data['modification_date'], array('Y-m-d'), true, 'USER_UTC');
		//Some security checks
		$acl = GuideadmHelper::getActions();

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
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmModelJobsitem')){ class GuideadmModelJobsitem extends GuideadmCkModelJobsitem{} }


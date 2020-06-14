<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Prices
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
class GuidemanCkModelPrice extends GuidemanClassModelItem
{
	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_item = 'price';

	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_list = 'prices';

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
		return $jinput->get('layout', '', 'STRING');
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
		$conditions = array('`company` = '.(int) $table->company);
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
	public function getTable($type = 'price', $prefix = 'GuidemanTable', $config = array())
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
		$data = JFactory::getApplication()->getUserState('com_guideman.edit.price.data', array());

		if (empty($data)) {
			//Default values shown in the form for new item creation
			$data = $this->getItem();

			// Prime some default values.
			if ($this->getState('price.id') == 0)
			{
				$jinput = JFactory::getApplication()->input;

				$data->id = 0;
				$data->grouper = 0;
				$data->name = null;
				$data->company = $jinput->get('filter_company', $this->getState('filter.company'), 'INT');
				$data->currency = $jinput->get('filter_currency', $this->getState('filter.currency'), 'INT');
				$data->hourly_rate = $jinput->get('filter_hourly_rate', $this->getState('filter.hourly_rate', ''), 'STRING');
				$data->min_time = null;
				$data->from_date = null;
				$data->until_date = null;
				$data->remuneration = 0;
				$data->remark = null;
				$data->pax_01 = null;
				$data->pax_02 = null;
				$data->pax_03 = null;
				$data->pax_04 = null;
				$data->pax_05 = null;
				$data->pax_06 = null;
				$data->pax_07 = null;
				$data->pax_08 = null;
				$data->pax_09 = null;
				$data->pax_10 = null;
				$data->pax_11 = null;
				$data->pax_12 = null;
				$data->pax_13 = null;
				$data->pax_14 = null;
				$data->pax_15 = null;
				$data->pax_16 = null;
				$data->pax_17 = null;
				$data->pax_18 = null;
				$data->pax_19 = null;
				$data->pax_20 = null;
				$data->pax_21 = null;
				$data->coordination_in = 0;
				$data->coordination_fee = null;
				$data->optional = 0;
				$data->extra_hour_day = null;
				$data->extra_hour_night = null;
				$data->night_shift = null;
				$data->created_by = $jinput->get('filter_created_by', $this->getState('filter.created_by'), 'INT');
				$data->creation_date = null;
				$data->modified_by = $jinput->get('filter_modified_by', $this->getState('filter.modified_by'), 'INT');
				$data->modification_date = null;
				$data->ordering = null;
				$data->published = 1;
				$data->access = $jinput->get('filter_access', $this->getState('filter.access'), 'INT');

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
	* @param	integer	$pk	The primary id key of the price
	*
	* @return	void
	*/
	protected function prepareQuery(&$query, $pk)
	{
		//FROM : Main table
		$query->from('#__guideman_prices AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{


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
			'access',
			'company',
			'created_by',
			'published'
		));

		$this->orm->access('a', array(
			'access' => 'access',
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
			//Defines automatically the author of this element
			$table->created_by = JFactory::getUser()->get('id');

			//Creation date
			if (empty($table->creation_date))
				$table->creation_date =  JFactory::getDate()->toSql();

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
		//Convert from a non-SQL formated date (min_time)
		$data['min_time'] = GuidemanHelperDates::getSqlDate($data['min_time'], array('H:i'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (from_date)
		$data['from_date'] = GuidemanHelperDates::getSqlDate($data['from_date'], array('d-m-Y'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (until_date)
		$data['until_date'] = GuidemanHelperDates::getSqlDate($data['until_date'], array('d-m-Y'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (night_shift)
		$data['night_shift'] = GuidemanHelperDates::getSqlDate($data['night_shift'], array('H:i'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (creation_date)
		$data['creation_date'] = GuidemanHelperDates::getSqlDate($data['creation_date'], array('Y-m-d H:i'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (modification_date)
		$data['modification_date'] = GuidemanHelperDates::getSqlDate($data['modification_date'], array('Y-m-d H:i'), true, 'USER_UTC');
		//Some security checks
		$acl = GuidemanHelper::getActions();

		//Secure the author key if not allowed to change
		if (isset($data['created_by']) && !$acl->get('core.edit'))
			unset($data['created_by']);

		//Secure the published tag if not allowed to change
		if (isset($data['published']) && !$acl->get('core.edit.state'))
			unset($data['published']);

		//Secure the access key if not allowed to change
		if (isset($data['access']) && !$acl->get('core.edit'))
			unset($data['access']);

		if (parent::save($data)) {
			return true;
		}
		return false;


	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanModelPrice')){ class GuidemanModelPrice extends GuidemanCkModelPrice{} }


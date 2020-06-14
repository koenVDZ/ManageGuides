<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
* Guideman Item Model
*
* @package	Guideman
* @subpackage	Classes
*/
class GuidemanCkModelAddressesitem extends GuidemanClassModelItem
{
	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_item = 'addressesitem';

	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_list = 'addresses';

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
		return $jinput->get('layout', 'usradressfly', 'STRING');
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
		$conditions = array('`user_id` = '.(int) $table->user_id);
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
	public function getTable($type = 'addressesitem', $prefix = 'GuidemanTable', $config = array())
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
		return parent::hit(array('usradressfly'));
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
		$data = JFactory::getApplication()->getUserState('com_guideman.edit.addressesitem.data', array());

		if (empty($data)) {
			//Default values shown in the form for new item creation
			$data = $this->getItem();

			// Prime some default values.
			if ($this->getState('addressesitem.id') == 0)
			{
				$jinput = JFactory::getApplication()->input;

				$data->id = 0;
				$data->catid = $jinput->get('filter_catid', $this->getState('filter.catid'), 'INT');
				$data->user_id = $jinput->get('filter_user_id', $this->getState('filter.user_id'), 'INT');
				$data->default_address = 0;
				$data->address_label = $jinput->get('filter_address_label', $this->getState('filter.address_label'), 'INT');
				$data->country_id = $jinput->get('filter_country_id', $this->getState('filter.country_id'), 'INT');
				$data->state_id = $jinput->get('filter_state_id', $this->getState('filter.state_id'), 'INT');
				$data->address = null;
				$data->suburb = null;
				$data->zipcode = null;
				$data->city = null;
				$data->creation_date = null;
				$data->created_by = $jinput->get('filter_created_by', $this->getState('filter.created_by'), 'INT');
				$data->modification_date = null;
				$data->modified_by = $jinput->get('filter_modified_by', $this->getState('filter.modified_by'), 'INT');
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
	* @param	integer	$pk	The primary id key of the addressesitem
	*
	* @return	void
	*/
	protected function prepareQuery(&$query, $pk)
	{
		//FROM : Main table
		$query->from('#__guideman_addresses AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.usraddress':

				$this->orm->select(array(
					'address',
					'address_label',
					'address_label.type',
					'city',
					'default_address',
					'state_id',
					'state_id.country_id',
					'state_id.country_id.country_name',
					'state_id.state',
					'suburb',
					'user_id',
					'user_id.alias',
					'zipcode'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.usradressfly':

				$this->orm->select(array(
					'address',
					'address_label',
					'address_label.type',
					'city',
					'country_id',
					'country_id.country_name',
					'default_address',
					'state_id',
					'state_id.state',
					'suburb',
					'user_id',
					'user_id.alias',
					'user_id.name',
					'zipcode'
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
			'published',
			'user_id'
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
			//Modification date
			$table->modification_date = JFactory::getDate()->toSql();

			//Defines automatically the editor of this element
			$table->modified_by = JFactory::getUser()->get('id');
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
if (!class_exists('GuidemanModelAddressesitem')){ class GuidemanModelAddressesitem extends GuidemanCkModelAddressesitem{} }

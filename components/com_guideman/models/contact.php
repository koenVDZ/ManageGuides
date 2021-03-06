<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
* Guideman Item Model
*
* @package	Guideman
* @subpackage	Classes
*/
class GuidemanCkModelContact extends GuidemanClassModelItem
{
	/**
	* List of all fields files indexes
	*
	* @var array
	*/
	protected $fileFields = array('image');

	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_item = 'contact';

	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_list = 'contacts';

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

		//Integrity : delete the files associated to this deleted item
		if (!$this->deleteFiles($pks, array(
												'image' => 'delete'
											))){
			JError::raiseWarning( 1303, JText::_("GUIDEMAN_ALERT_ERROR_ON_DELETE_FILES") );
			return false;
		}

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
		return $jinput->get('layout', 'contact', 'STRING');
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
	public function getTable($type = 'contact', $prefix = 'GuidemanTable', $config = array())
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
		return parent::hit(array('contactall', 'contactinfo'));
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
		$data = JFactory::getApplication()->getUserState('com_guideman.edit.contact.data', array());

		if (empty($data)) {
			//Default values shown in the form for new item creation
			$data = $this->getItem();

			// Prime some default values.
			if ($this->getState('contact.id') == 0)
			{
				$jinput = JFactory::getApplication()->input;

				$data->id = 0;
				$data->type = null;
				$data->catid = $jinput->get('filter_catid', $this->getState('filter.catid'), 'INT');
				$data->user_id = null;
				$data->name = null;
				$data->surname = null;
				$data->alias = null;
				$data->company_id = $jinput->get('filter_company_id', $this->getState('filter.company_id'), 'INT');
				$data->business_type = $jinput->get('filter_business_type', $this->getState('filter.business_type'), 'INT');
				$data->con_position = null;
				$data->gender = $jinput->get('filter_gender', $this->getState('filter.gender', ''), 'STRING');
				$data->driverguide = null;
				$data->image = null;
				$data->email = null;
				$data->birthdate = null;
				$data->nationality = $jinput->get('filter_nationality', $this->getState('filter.nationality'), 'INT');
				$data->country_id = $jinput->get('filter_country_id', $this->getState('filter.country_id'), 'INT');
				$data->state_id = $jinput->get('filter_state_id', $this->getState('filter.state_id'), 'INT');
				$data->ce_details_id = null;
				$data->progress = null;
				$data->visits_id = $jinput->get('filter_visits_id', $this->getState('filter.visits_id'), 'INT');
				$data->creation_date = null;
				$data->created_by = $jinput->get('filter_created_by', $this->getState('filter.created_by'), 'INT');
				$data->modification_date = null;
				$data->modified_by = $jinput->get('filter_modified_by', $this->getState('filter.modified_by'), 'INT');
				$data->ordering = null;
				$data->hits = null;
				$data->published = 1;
				$data->my_joomla_access = $jinput->get('filter_my_joomla_access', $this->getState('filter.my_joomla_access'), 'INT');
				$data->my_joomla_user = $jinput->get('filter_my_joomla_user', $this->getState('filter.my_joomla_user'), 'INT');
				$data->settings = null;

			}
		}
		return $data;
	}

	/**
	* Prepare some additional derivated objects.
	*
	* @access	public
	* @param	object	&$item	The object to populate.
	*
	*
	* @since	Cook 2.0
	*
	* @return	void
	*/
	public function populateObjects(&$item)
	{
		if (!empty($item->settings) && is_string($item->settings))
		{
			$registry = new JRegistry;
			$registry->loadString($item->settings);
			$item->settings = $registry->toObject();
		}
	
		parent::populateObjects($item);
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
	* @param	integer	$pk	The primary id key of the contact
	*
	* @return	void
	*/
	protected function prepareQuery(&$query, $pk)
	{
		//FROM : Main table
		$query->from('#__guideman_contacts AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.contact':

				$this->orm->select(array(
					'birthdate',
					'catid',
					'catid.MGcat',
					'company_id',
					'company_id.name',
					'con_position',
					'driverguide',
					'gender',
					'image',
					'name',
					'nationality',
					'nationality.country_name',
					'settings',
					'state_id',
					'state_id.country_id',
					'state_id.country_id.country_name',
					'state_id.state'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.company':

				$this->orm->select(array(
					'birthdate',
					'business_type',
					'business_type.country_id',
					'business_type.country_id.country_name',
					'business_type.type_name',
					'catid',
					'catid.MGcat',
					'company_id',
					'company_id.name',
					'image',
					'name',
					'nationality',
					'nationality.country_name',
					'settings',
					'state_id',
					'state_id.country_id',
					'state_id.country_id.country_name',
					'state_id.state',
					'surname'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.contactall':

				$this->orm->select(array(
					'alias',
					'birthdate',
					'catid',
					'catid.MGcat',
					'company_id',
					'company_id.alias',
					'company_id.catid',
					'company_id.catid.MGcat',
					'company_id.country_id',
					'company_id.country_id.country_name',
					'company_id.country_id.iso_2',
					'company_id.email',
					'company_id.image',
					'company_id.name',
					'company_id.nationality',
					'company_id.nationality.iso_2',
					'company_id.state_id',
					'company_id.state_id.state',
					'company_id.surname',
					'country_id',
					'country_id.country_name',
					'country_id.iso_2',
					'driverguide',
					'email',
					'gender',
					'image',
					'name',
					'nationality',
					'nationality.iso_2',
					'state_id',
					'state_id.state',
					'type'
				));

				$this->orm->relation('addresslabels', array(
					'select' => 'type'
				));

				$this->orm->relation('addresses', array(
					'select' => 'address,suburb,zipcode,city'
				));

				$this->orm->relation('countries_user_id', array(
					'select' => 'iso_2,country_name,iso_2,calling_code'
				));

				$this->orm->relation('states', array(
					'select' => 'state'
				));

				$this->orm->relation('phones', array(
					'select' => 'default_phone,number'
				));

				$this->orm->relation('phonelabels', array(
					'select' => 'type'
				));

				$this->orm->relation('operators', array(
					'select' => 'type,country_id,operator'
				));

				$this->orm->relation('sociallabels', array(
					'select' => 'logo,type,link'
				));

				$this->orm->relation('social', array(
					'select' => 'name'
				));

				$this->orm->relation('vehicles', array(
					'select' => 'vehicle_type,model,color,pax,number_plate,year_of_build,fuel,car_insurance,insurance_for_third_parties'
				));

				$this->orm->relation('brands', array(
					'select' => 'name'
				));

				$this->orm->relation('doclabels', array(
					'select' => 'doc_type_name,doc_type_name'
				));

				$this->orm->relation('documents', array(
					'select' => 'number,emission_date,expiration_date'
				));

				$this->orm->relation('contacts', array(
					'select' => 'name,name'
				));

				$this->orm->relation('accounts', array(
					'select' => 'account_type,agency,account,swift,iban'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.contactinfo':

				$this->orm->select(array(
					'alias',
					'birthdate',
					'business_type',
					'business_type.type_name',
					'catid',
					'catid.MGcat',
					'company_id',
					'company_id.name',
					'con_position',
					'country_id',
					'country_id.country_name',
					'country_id.iso_2',
					'driverguide',
					'email',
					'gender',
					'image',
					'name',
					'nationality',
					'nationality.country_name',
					'nationality.iso_2',
					'state_id',
					'state_id.state',
					'surname',
					'type',
					'user_id'
				));

				$this->orm->relation('addresses', array(
					'select' => 'default_address,address,suburb,zipcode,city'
				));

				$this->orm->relation('addresslabels', array(
					'select' => 'type'
				));

				$this->orm->relation('countries_user_id', array(
					'select' => 'iso_2,country_name,iso_2,calling_code'
				));

				$this->orm->relation('states', array(
					'select' => 'state'
				));

				$this->orm->relation('phones', array(
					'select' => 'default_phone,number'
				));

				$this->orm->relation('phonelabels', array(
					'select' => 'type'
				));

				$this->orm->relation('operators', array(
					'select' => 'country_id,operator'
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
			// Set ordering to the last item if not set
			$conditions = $this->getReorderConditions($table);
			$conditions = (count($conditions)?implode(" AND ", $conditions):'');
			$table->ordering = $table->getNextOrder($conditions);

			//Creation date
			if (empty($table->creation_date))
				$table->creation_date =  JFactory::getDate()->toSql();

			//Defines automatically the author of this element
			$table->created_by = JFactory::getUser()->get('id');
		}
		else
		{
			//Defines automatically the editor of this element
			$table->modified_by = JFactory::getUser()->get('id');

			//Modification date
			$table->modification_date = JFactory::getDate()->toSql();
		}
		//Alias
		if (empty($table->alias))
			$table->alias = JApplication::stringURLSafe($table->name);
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
		//Convert from a non-SQL formated date (birthdate)
		$data['birthdate'] = GuidemanHelperDates::getSqlDate($data['birthdate'], array('d-m-Y'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (creation_date)
		$data['creation_date'] = GuidemanHelperDates::getSqlDate($data['creation_date'], array('Y-m-d'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (modification_date)
		$data['modification_date'] = GuidemanHelperDates::getSqlDate($data['modification_date'], array('Y-m-d'), true, 'USER_UTC');

		if (isset($data['settings']) && is_array($data['settings']))
		{
			$registry = new JRegistry;
			$registry->loadArray($data['settings']);
			$data['settings'] = (string) $registry;
		}

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
if (!class_exists('GuidemanModelContact')){ class GuidemanModelContact extends GuidemanCkModelContact{} }


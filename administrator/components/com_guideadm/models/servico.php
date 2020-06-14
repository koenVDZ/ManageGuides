<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Servicos
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
class GuideadmCkModelServico extends GuideadmClassModelItem
{
	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_item = 'servico';

	/**
	* View list alias
	*
	* @var string
	*/
	protected $view_list = 'servicos';

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
		return $jinput->get('layout', 'servico', 'STRING');
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
	public function getTable($type = 'servico', $prefix = 'GuideadmTable', $config = array())
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
		$data = JFactory::getApplication()->getUserState('com_guideadm.edit.servico.data', array());

		if (empty($data)) {
			//Default values shown in the form for new item creation
			$data = $this->getItem();

			// Prime some default values.
			if ($this->getState('servico.id') == 0)
			{
				$jinput = JFactory::getApplication()->input;

				$data->id = 0;
				$data->internal_service_id = null;
				$data->service_name = null;
				$data->private_tour = null;
				$data->entrance_fees = null;
				$data->duration = null;
				$data->company = null;
				$data->meals = null;
				$data->description = null;
				$data->country = $jinput->get('filter_country', $this->getState('filter.country'), 'INT');
				$data->state = $jinput->get('filter_state', $this->getState('filter.state'), 'INT');
				$data->kid_friendly = null;
				$data->kid_comment = null;
				$data->disabled_friendly = null;
				$data->disabled_comment = null;
				$data->activity_level = null;
				$data->activity_comment = null;
				$data->min_pax = null;
				$data->max_pax = null;
				$data->visits = null;
				$data->remunaration = null;
				$data->costs = null;
				$data->policy = $jinput->get('filter_policy', $this->getState('filter.policy'), 'INT');
				$data->image_01 = null;
				$data->image_02 = null;
				$data->image_03 = null;
				$data->image_04 = null;
				$data->image_05 = null;
				$data->created_by = null;
				$data->creation_date = null;
				$data->modified_by = null;
				$data->modification_date = null;
				$data->hits = null;
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
	* @param	integer	$pk	The primary id key of the servico
	*
	* @return	void
	*/
	protected function prepareQuery(&$query, $pk)
	{
		//FROM : Main table
		$query->from('#__guideman_servicos AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.servico':

				$this->orm->select(array(
					'activity_comment',
					'activity_level',
					'company',
					'costs',
					'country',
					'country.country_name',
					'creation_date',
					'description',
					'disabled_comment',
					'disabled_friendly',
					'duration',
					'entrance_fees',
					'hits',
					'image_01',
					'image_02',
					'image_03',
					'image_04',
					'image_05',
					'internal_service_id',
					'kid_comment',
					'kid_friendly',
					'max_pax',
					'meals',
					'min_pax',
					'modification_date',
					'modified_by',
					'ordering',
					'policy',
					'policy.name',
					'private_tour',
					'remunaration',
					'service_name',
					'state',
					'state.state',
					'visits'
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
		//Convert from a non-SQL formated date (creation_date)
		$data['creation_date'] = GuideadmHelperDates::getSqlDate($data['creation_date'], array('Y-m-d H:i'), true, 'USER_UTC');

		//Convert from a non-SQL formated date (modification_date)
		$data['modification_date'] = GuideadmHelperDates::getSqlDate($data['modification_date'], array('Y-m-d H:i'), true, 'USER_UTC');
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
if (!class_exists('GuideadmModelServico')){ class GuideadmModelServico extends GuideadmCkModelServico{} }


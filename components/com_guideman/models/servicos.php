<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
* Guideman List Model
*
* @package	Guideman
* @subpackage	Classes
*/
class GuidemanCkModelServicos extends GuidemanClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'servico';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'servico';

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
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'country' => 'cmd',
			'state' => 'cmd',
			'policy' => 'cmd',
			'creation_date_from' => 'varchar',
			'creation_date_to' => 'varchar',
			'modification_date_from' => 'varchar',
			'modification_date_to' => 'varchar'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('country', // name
			'countries', // foreignModelClass
			'country', // localKey
			'id' // foreignKey
		);

		$this->hasOne('state', // name
			'states', // foreignModelClass
			'state', // localKey
			'id' // foreignKey
		);

		$this->hasOne('policy', // name
			'policies', // foreignModelClass
			'policy', // localKey
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
		$id	.= ':'.$this->getState('search.search');
		$id	.= ':'.$this->getState('filter.published');
		$id	.= ':'.$this->getState('filter.country');
		$id	.= ':'.$this->getState('filter.state');
		$id	.= ':'.$this->getState('filter.policy');
		$id	.= ':'.$this->getState('filter.creation_date');
		$id	.= ':'.$this->getState('filter.modification_date');
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

			// Popular first
			case 'popular':
				$orderField = 'a.hits';
				$orderDir = 'DESC';
				break;

			//Alphabetic, ascending
			case 'alpha':
			default:
				$orderField = 'a.internal_service_id';
				$orderDir = 'ASC';
				break;
		}

		$this->orm(array(
			'select' => array(
				'internal_service_id' => 'title',
				"{internal_service_id} {service_name} {duration} {meals} {activity_level} {image_01} {image_02} {image_03} {image_04} {image_05}" => 'text',
			),

			'search' => array(

				'plugin' => array(
					'on' => array(
						'{internal_service_id} {service_name} {duration} {meals} {activity_level} {image_01} {image_02} {image_03} {image_04} {image_05}' => $method,
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
		$item->section = JText::_('GUIDEMAN') . ' - ' . JText::_('GUIDEMAN_VIEW_SERVICO');
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
		$query->from('#__guideman_servicos AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

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
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'internal_service_id'
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

		// SEARCH : Internal service id + Service name + Duration + Meals + Activity level + Image 01 + Image 02 + Image 03 + Image 04 + Image 05
		$this->orm->search('search', array(
			'on' => array(
				'internal_service_id' => 'like',
				'service_name' => 'like',
				'duration' => 'like',
				'meals' => 'like',
				'activity_level' => 'like',
				'image_01' => 'like',
				'image_02' => 'like',
				'image_03' => 'like',
				'image_04' => 'like',
				'image_05' => 'like'
			)
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

		// FILTER : Country > Country Name
		if($filter_country = $this->getState('filter.country'))
		{
			if ($filter_country > 0){
				$this->addWhere("a.country = " . (int)$filter_country);
			}
		}

		// FILTER : State > State
		if($filter_state = $this->getState('filter.state'))
		{
			if ($filter_state > 0){
				$this->addWhere("a.state = " . (int)$filter_state);
			}
		}

		// FILTER : Policy > Name
		if($filter_policy = $this->getState('filter.policy'))
		{
			if ($filter_policy > 0){
				$this->addWhere("a.policy = " . (int)$filter_policy);
			}
		}

		// FILTER (Range) : Creation date
		if($filter_creation_date_from = $this->getState('filter.creation_date_from'))
		{
			if ($filter_creation_date_from !== null){
				$this->addWhere("a.creation_date >= " . $this->_db->Quote($filter_creation_date_from));
			}
		}

		// FILTER (Range) : Creation date
		if($filter_creation_date_to = $this->getState('filter.creation_date_to'))
		{
			if ($filter_creation_date_to !== null){
				$this->addWhere("a.creation_date <= " . $this->_db->Quote($filter_creation_date_to));
			}
		}

		// FILTER (Range) : Modification date
		if($filter_modification_date_from = $this->getState('filter.modification_date_from'))
		{
			if ($filter_modification_date_from !== null){
				$this->addWhere("a.modification_date >= " . $this->_db->Quote($filter_modification_date_from));
			}
		}

		// FILTER (Range) : Modification date
		if($filter_modification_date_to = $this->getState('filter.modification_date_to'))
		{
			if ($filter_modification_date_to !== null){
				$this->addWhere("a.modification_date <= " . $this->_db->Quote($filter_modification_date_to));
			}
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'internal_service_id');
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
if (!class_exists('GuidemanModelServicos')){ class GuidemanModelServicos extends GuidemanCkModelServicos{} }


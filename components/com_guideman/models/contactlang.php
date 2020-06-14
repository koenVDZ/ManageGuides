<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	ContactLang
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
class GuidemanCkModelContactlang extends GuidemanClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'contactlangitem';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'contactlangitem';

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
				'_language_.flag', 'language.flag',
				'_language_.name', 'language.name',
				'a.prof_level', 'prof_level',
				'a.published', 'published',
				'a.id', '',
				'_user_id_nationality_.iso_2', 'user_id.nationality.iso_2',
				'_user_id_.name', 'user_id.name',
				'_user_id_.alias', 'user_id.alias',
				'a.user_id', 'user_id',
				'_user_id_.driverguide', 'user_id.driverguide',
				'_user_id_.gender', 'user_id.gender',
				'_user_id_country_id_.country_name', 'user_id.country_id.country_name',
				'_user_id_state_id_.abbreviation', 'user_id.state_id.abbreviation',
				'_user_id_state_id_.state', 'user_id.state_id.state',
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'language' => 'cmd',
			'created_by' => 'cmd',
			'user_id_country_id' => 'cmd',
			'prof_level' => 'varchar',
			'user_id_driverguide' => 'cmd',
			'user_id_state_id' => 'cmd',
			'user_id_state_id_country_id' => 'cmd'
				));


		parent::__construct($config);

		$this->hasOne('user_id', // name
			'contacts', // foreignModelClass
			'user_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('language', // name
			'languages', // foreignModelClass
			'language', // localKey
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
		$id	.= ':'.$this->getState('filter.published');
		$id	.= ':'.$this->getState('filter.language');
		$id	.= ':'.$this->getState('filter.created_by');
		$id	.= ':'.$this->getState('filter.user_id_country_id');
		$id	.= ':'.$this->getState('filter.prof_level');
		$id	.= ':'.$this->getState('filter.user_id_driverguide');
		$id	.= ':'.$this->getState('filter.user_id_state_id');
		$id	.= ':'.$this->getState('filter.user_id_state_id_country_id');
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
				$orderField = 'a.user_id';
				$orderDir = 'ASC';
				break;
		}

		$this->orm(array(
			'select' => array(
				'user_id' => 'title',
				"{user_id}" => 'text',
			),

			'search' => array(

				'plugin' => array(
					'on' => array(
						'{user_id}' => $method,
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
		$item->section = JText::_('GUIDEMAN') . ' - ' . JText::_('GUIDEMAN_VIEW_CONTACTLANG_ITEM');
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
		$query->from('#__guideman_contactlang AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'language',
					'language.flag',
					'language.name',
					'ordering',
					'prof_level',
					'user_id',
					'user_id.name'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'user_id.name' => 'ASC'
				));
				break;

			case 'layout.usrguidesearch':

				$this->orm->select(array(
					'language',
					'language.flag',
					'language.name',
					'ordering',
					'prof_level',
					'user_id',
					'user_id.alias',
					'user_id.ce_details_id',
					'user_id.country_id',
					'user_id.country_id.country_name',
					'user_id.country_id.iso_2',
					'user_id.driverguide',
					'user_id.gender',
					'user_id.image',
					'user_id.name',
					'user_id.nationality',
					'user_id.nationality.iso_2',
					'user_id.state_id',
					'user_id.state_id.abbreviation',
					'user_id.state_id.state'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'user_id.name' => 'ASC'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'user_id'
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

		// FILTER : Language
		if($filter_language = $this->getState('filter.language'))
		{
			if ($filter_language > 0){
				$this->addWhere("a.language = " . (int)$filter_language);
			}
		}

		// FILTER : Created By
		if($filter_created_by = $this->getState('filter.created_by'))
		{
			if ($filter_created_by == 'auto'){
				$this->addWhere('a.created_by = ' . (int)JFactory::getUser()->get('id'));
			}
			else 
			if ($filter_created_by > 0){
				$this->addWhere("a.created_by = " . (int)$filter_created_by);
			}
		}

		// FILTER : Country ONLY
		if($filter_user_id_country_id = $this->getState('filter.user_id_country_id'))
		{
			$this->addJoin("`#__guideman_contacts` AS _user_id_ ON _user_id_.id = a.user_id", 'LEFT');
			if ($filter_user_id_country_id > 0){
				$this->addWhere("_user_id_.country_id = " . (int)$filter_user_id_country_id);
			}
		}

		// FILTER : Proficiency Level
		if($filter_prof_level = $this->getState('filter.prof_level'))
		{
			if ($filter_prof_level !== null){
				$this->addWhere("a.prof_level = " . $this->_db->Quote($filter_prof_level));
			}
		}

		// FILTER : Driver/Guide
		$filter_user_id_driverguide = $this->getState('filter.user_id_driverguide');

			$this->addJoin("`#__guideman_contacts` AS _user_id_ ON _user_id_.id = a.user_id", 'LEFT');
		if ($filter_user_id_driverguide !== null){
			$this->addWhere("_user_id_.driverguide = " . (int)$filter_user_id_driverguide);
		}

		// FILTER : State (Province)
		if($filter_user_id_state_id = $this->getState('filter.user_id_state_id'))
		{
			$this->addJoin("`#__guideman_contacts` AS _user_id_ ON _user_id_.id = a.user_id", 'LEFT');
			if ($filter_user_id_state_id > 0){
				$this->addWhere("_user_id_.state_id = " . (int)$filter_user_id_state_id);
			}
		}

		// FILTER : State (Province)
		if($filter_user_id_state_id_country_id = $this->getState('filter.user_id_state_id_country_id'))
		{
			$this->addJoin("`#__guideman_contacts` AS _user_id_ ON _user_id_.id = a.user_id", 'LEFT');
			$this->addJoin("`#__guideman_states` AS _user_id_state_id_ ON _user_id_state_id_.id = _user_id_.state_id", 'LEFT');
			if ($filter_user_id_state_id_country_id > 0){
				$this->addWhere("_user_id_state_id_.country_id = " . (int)$filter_user_id_state_id_country_id);
			}
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'user_id');
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
if (!class_exists('GuidemanModelContactlang')){ class GuidemanModelContactlang extends GuidemanCkModelContactlang{} }


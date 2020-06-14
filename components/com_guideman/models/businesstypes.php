<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	BusinessTypes
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
class GuidemanCkModelBusinesstypes extends GuidemanClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'usrbusinesstype';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'businesstype';

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
				'_country_id_.iso_2', 'country_id.iso_2',
				'_country_id_.country_name', 'country_id.country_name',
				'a.type_code', 'type_code',
				'_country_id_language_.image', 'country_id.language.image',
				'_language_.lang_code', 'language.lang_code',
				'_created_by_.name', 'created_by.name',
				'a.creation_date', 'creation_date',
				'_modified_by_.name', 'modified_by.name',
				'a.modification_date', 'modification_date',
				'a.published', 'published',
				'a.id', '',
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'country_id' => 'cmd'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('country_id', // name
			'countries', // foreignModelClass
			'country_id', // localKey
			'id' // foreignKey
		);

		$this->hasOne('language', // name
			'lang', // foreignModelClass
			'language', // localKey
			'id' // foreignKey
		);

		$this->hasOne('modified_by', // name
			'.users', // foreignModelClass
			'modified_by', // localKey
			'id' // foreignKey
		);

		$this->hasOne('created_by', // name
			'.users', // foreignModelClass
			'created_by', // localKey
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
		$id	.= ':'.$this->getState('filter.country_id');
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
				$orderField = 'a.country_id';
				$orderDir = 'ASC';
				break;
		}

		$this->orm(array(
			'select' => array(
				'country_id' => 'title',
				"{country_id} {type_code} {type_name}" => 'text',
			),

			'search' => array(

				'plugin' => array(
					'on' => array(
						'{country_id} {type_code} {type_name}' => $method,
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
		$item->section = JText::_('GUIDEMAN') . ' - ' . JText::_('GUIDEMAN_VIEW_BUSINESSTYPE');
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
		$query->from('#__guideman_businesstypes AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'country_id',
					'country_id.country_name',
					'country_id.iso_2',
					'country_id.language',
					'country_id.language.image',
					'country_id.language.title',
					'created_by',
					'created_by.name',
					'creation_date',
					'information',
					'language',
					'language.lang_code',
					'modification_date',
					'modified_by',
					'modified_by.name',
					'ordering',
					'type_code',
					'type_name'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'country_id.language.title' => 'ASC',
					'country_id.country_name' => 'ASC'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'country_id'
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

		// SEARCH : Type Code + Type Name
		$this->orm->search('search', array(
			'on' => array(
				'type_code' => 'like',
				'type_name' => 'like'
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

		// FILTER : Country
		if($filter_country_id = $this->getState('filter.country_id'))
		{
			if ($filter_country_id > 0){
				$this->addWhere("a.country_id = " . (int)$filter_country_id);
			}
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'country_id');
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
if (!class_exists('GuidemanModelBusinesstypes')){ class GuidemanModelBusinesstypes extends GuidemanCkModelBusinesstypes{} }


<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Doc Labels
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
* Guideadm List Model
*
* @package	Guideadm
* @subpackage	Classes
*/
class GuideadmCkModelDoclabels extends GuideadmClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'doclabel';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'doclabelsitem';

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
				'a.doc_type_name', 'doc_type_name',
				'a.doc_type_long', 'doc_type_long',
				'_country_id_.country_name', 'country_id.country_name',
				'_language_.title', 'language.title',
				'ordering', 'a.ordering',

			);
		}

		//Define the filterable fields
		$this->set('filter_vars', array(
			'published' => 'cmd',
			'sortTable' => 'cmd',
			'directionTable' => 'cmd',
			'limit' => 'cmd',
			'country_id' => 'cmd',
			'language' => 'cmd',
			'creation_date_from' => 'varchar',
			'creation_date_to' => 'varchar',
			'created_by' => 'cmd',
			'modification_date_from' => 'varchar',
			'modification_date_to' => 'varchar',
			'modified_by' => 'cmd'
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
		$id	.= ':'.$this->getState('search.search');
		$id	.= ':'.$this->getState('filter.published');
		$id	.= ':'.$this->getState('filter.country_id');
		$id	.= ':'.$this->getState('filter.language');
		$id	.= ':'.$this->getState('filter.creation_date');
		$id	.= ':'.$this->getState('filter.created_by');
		$id	.= ':'.$this->getState('filter.modification_date');
		$id	.= ':'.$this->getState('filter.modified_by');
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
		$query->from('#__guideman_doclabels AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'country_id',
					'country_id.country_name',
					'country_id.iso_2',
					'created_by',
					'created_by.name',
					'creation_date',
					'doc_type_long',
					'doc_type_name',
					'language',
					'language.image',
					'language.title',
					'modification_date',
					'modified_by',
					'modified_by.name',
					'ordering'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'country_id.country_name' => 'ASC'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'doc_type_name'
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

		// SEARCH : Doc Type Name + Doc Type Long
		$this->orm->search('search', array(
			'on' => array(
				'doc_type_name' => 'like',
				'doc_type_long' => 'like'
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

		// FILTER : Language
		if($filter_language = $this->getState('filter.language'))
		{
			if ($filter_language > 0){
				$this->addWhere("a.language = " . (int)$filter_language);
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

		// FILTER : Modified By
		if($filter_modified_by = $this->getState('filter.modified_by'))
		{
			if ($filter_modified_by == 'auto'){
				$this->addWhere('a.modified_by = ' . (int)JFactory::getUser()->get('id'));
			}
			else 
			if ($filter_modified_by > 0){
				$this->addWhere("a.modified_by = " . (int)$filter_modified_by);
			}
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'doc_type_name');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmModelDoclabels')){ class GuideadmModelDoclabels extends GuideadmCkModelDoclabels{} }


<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	Lang
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
class GuideadmCkModelLang extends GuideadmClassModelList
{
	/**
	* Default item layout.
	*
	* @var array
	*/
	public $itemDefaultLayout = 'langitem';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'langitem';

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
			'access' => 'cmd'
				));

		//Define the searchable fields
		$this->set('search_vars', array(
			'search' => 'string'
				));


		parent::__construct($config);

		$this->hasOne('access', // name
			'.viewlevels', // foreignModelClass
			'access', // localKey
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
		$id	.= ':'.$this->getState('filter.access');
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
		$query->from('#__guideman_lang AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'access',
					'access.title',
					'description',
					'image',
					'lang_code',
					'metadesc',
					'metakey',
					'ordering',
					'sef',
					'sitename',
					'title',
					'title_native'
				));
				break;

			case 'layout.modal':

				$this->orm->select(array(
					'title'
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
			'access',
			'published'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'access' => 'access',
			'publish' => 'published'
		));

		// SEARCH : Lang Code + Title + Native Title + SEF + Image + Description + Site Name
		$this->orm->search('search', array(
			'on' => array(
				'lang_code' => 'like',
				'title' => 'like',
				'title_native' => 'like',
				'sef' => 'like',
				'image' => 'like',
				'description' => 'like',
				'sitename' => 'like'
			)
		));

		//WHERE - FILTER : Publish state
		$published = $this->getState('filter.published');
		if (is_numeric($published))
			$query->where('a.published = ' . (int) $published);
		elseif (!$published)
			$query->where('(a.published = 0 OR a.published = 1 OR a.published IS NULL)');

		// FILTER : Access > Title
		if($filter_access = $this->getState('filter.access'))
		{
			if ($filter_access > 0){
				$this->addWhere("a.access = " . (int)$filter_access);
			}
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'title');
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
if (!class_exists('GuideadmModelLang')){ class GuideadmModelLang extends GuideadmCkModelLang{} }


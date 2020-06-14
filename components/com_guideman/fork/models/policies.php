<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Policies
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
class GuidemanModelPolicies extends GuidemanCkModelPolicies
{
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
		// KOEN - The missing link 04/04/17
		$acl = GuidemanHelper::getActions();

		//FROM : Main table
		$query->from('#__guideman_policies AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'alias',
					'catid',
					'catid.MGcat',
					'company_id',
					'company_id.alias',
					'company_id.name',
					'company_id.nationality',
					'company_id.nationality.iso_2',
					'language',
					'language.image',
					'language.lang_code',
					'language.title',
					'name',
					'ordering',
					'percent_1',
					'percent_2',
					'percent_3',
					'time_1',
					'time_2',
					'time_3'
				));

				// KOEN 30/03/17
				$this->addWhere('a.created_by = ' . (int)JFactory::getUser()->get('id'));
				// KOEN 30/03/17

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'language.title' => 'ASC'
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

		// FILTER : Language
		if($filter_language = $this->getState('filter.language'))
		{
			if ($filter_language > 0){
				$this->addWhere("a.language = " . (int)$filter_language);
			}
		}

		// SEARCH : Name + Alias
		$this->orm->search('search', array(
			'on' => array(
				'name' => 'like',
				'alias' => 'like'
			)
		));

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'name');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}
}




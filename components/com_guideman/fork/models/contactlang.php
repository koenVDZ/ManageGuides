<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.1.4
* @package		GuideMan
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
class GuidemanModelContactlang extends GuidemanCkModelContactlang
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
				// KOEN 30/03/2017
				$this->addWhere('a.created_by = ' . (int)JFactory::getUser()->get('id'));
				// KOEN 30/03/2017
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




<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Services
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
class GuidemanModelServices extends GuidemanCkModelServices
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
		$query->from('#__guideman_services AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'activity_level',
					'company',
					'company.name',
					'company.nationality',
					'company.nationality.iso_2',
					'costs',
					'costs.name',
					'country',
					'country.country_name',
					'country.iso_2',
					'disabled_friendly',
					'duration',
					'entrance_fees',
					'internal_service_id',
					'kid_friendly',
					'max_pax',
					'min_pax',
					'ordering',
					'private_tour',
					'remunaration',
					'remunaration.from_date',
					'remunaration.grouper',
					'remunaration.hourly_rate',
					'remunaration.min_time',
					'remunaration.name',
					'remunaration.pax_01',
					'remunaration.pax_02',
					'remunaration.remark',
					'remunaration.remuneration',
					'remunaration.until_date',
					'service_name',
					'state',
					'state.flag',
					'state.state'
				));
				// KOEN 30/03/17
				$this->addWhere('a.created_by = ' . (int)JFactory::getUser()->get('id'));
				// KOEN 30/03/17

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
			'company',
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

		// FILTER : Company
		if($filter_company = $this->getState('filter.company'))
		{
			if ($filter_company > 0){
				$this->addWhere("a.company = " . (int)$filter_company);
			}
		}

		// SEARCH : Service Name
		$this->orm->search('search', array(
			'on' => array(
				'service_name' => 'like'
			)
		));

		// FILTER : Private
		$filter_private_tour = $this->getState('filter.private_tour');

		if ($filter_private_tour !== null){
			$this->addWhere("a.private_tour = " . (int)$filter_private_tour);
		}

		// FILTER : Entrance Fees
		$filter_entrance_fees = $this->getState('filter.entrance_fees');

		if ($filter_entrance_fees !== null){
			$this->addWhere("a.entrance_fees = " . (int)$filter_entrance_fees);
		}

		// FILTER : Kid Friendly
		$filter_kid_friendly = $this->getState('filter.kid_friendly');

		if ($filter_kid_friendly !== null){
			$this->addWhere("a.kid_friendly = " . (int)$filter_kid_friendly);
		}

		// FILTER : Disabled Friendly
		$filter_disabled_friendly = $this->getState('filter.disabled_friendly');

		if ($filter_disabled_friendly !== null){
			$this->addWhere("a.disabled_friendly = " . (int)$filter_disabled_friendly);
		}

		// FILTER : Activity level
		if($filter_activity_level = $this->getState('filter.activity_level'))
		{
			if ($filter_activity_level !== null){
				$this->addWhere("a.activity_level = " . $this->_db->Quote($filter_activity_level));
			}
		}

		// FILTER : State
		if($filter_state = $this->getState('filter.state'))
		{
			if ($filter_state > 0){
				$this->addWhere("a.state = " . (int)$filter_state);
			}
		}

		// FILTER : State
		if($filter_state_country_id = $this->getState('filter.state_country_id'))
		{
			$this->addJoin("`#__guideman_states` AS _state_ ON _state_.id = a.state", 'LEFT');
			if ($filter_state_country_id > 0){
				$this->addWhere("_state_.country_id = " . (int)$filter_state_country_id);
			}
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'company');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}
}




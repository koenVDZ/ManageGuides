<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.6
* @package		GuideManV2
* @subpackage	Prices
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
class GuidemanModelPrices extends GuidemanCkModelPrices
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
		$query->from('#__guideman_prices AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.usrremun':

				$this->orm->select(array(
					'company',
					'company.name',
					'company.nationality',
					'company.nationality.iso_2',
					'coordination_fee',
					'coordination_in',
					'currency',
					'currency.symbol',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'min_time',
					'name',
					'night_shift',
					'ordering',
					'remark',
					'remuneration',
					'until_date'
				));
				// KOEN 30/03/17
				$this->addWhere("(a.created_by = " . (int)JFactory::getUser()->get('id') ." OR a.created_by = 747) AND (a.remuneration = 1)");
				// KOEN 30/03/17
				break;

			case 'layout.default':

				$this->orm->select(array(
					'company',
					'company.name',
					'company.nationality',
					'company.nationality.iso_2',
					'coordination_fee',
					'currency',
					'currency.symbol',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'name',
					'optional',
					'ordering',
					'remark',
					'remuneration',
					'until_date'
				));
				break;

			case 'layout.useremunbygrouper':

				$this->orm->select(array(
					'company',
					'company.name',
					'coordination_fee',
					'coordination_in',
					'currency',
					'currency.currency_id',
					'currency.symbol',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'min_time',
					'name',
					'night_shift',
					'optional',
					'ordering',
					'pax_01',
					'pax_02',
					'pax_03',
					'pax_04',
					'pax_05',
					'pax_06',
					'pax_07',
					'pax_08',
					'pax_09',
					'pax_10',
					'pax_11',
					'pax_12',
					'pax_13',
					'pax_14',
					'pax_15',
					'pax_16',
					'pax_17',
					'pax_18',
					'pax_19',
					'pax_20',
					'pax_21',
					'remark',
					'remuneration',
					'until_date'
				));
				// KOEN 30/03/17
				$this->addWhere("(a.created_by = " . (int)JFactory::getUser()->get('id') ." OR a.created_by = 747) AND (a.remuneration = 1)");
				// KOEN 30/03/17
				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'grouper' => 'ASC'
				));
				break;

			case 'layout.usrpricesbygrouper':

				$this->orm->select(array(
					'company',
					'company.name',
					'coordination_fee',
					'coordination_in',
					'currency',
					'currency.currency_id',
					'currency.symbol',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'min_time',
					'name',
					'night_shift',
					'optional',
					'ordering',
					'pax_01',
					'pax_02',
					'pax_03',
					'pax_04',
					'pax_05',
					'pax_06',
					'pax_07',
					'pax_08',
					'pax_09',
					'pax_10',
					'pax_11',
					'pax_12',
					'pax_13',
					'pax_14',
					'pax_15',
					'pax_16',
					'pax_17',
					'pax_18',
					'pax_19',
					'pax_20',
					'pax_21',
					'remark',
					'remuneration',
					'until_date'
				));
				// KOEN 30/03/17
				$this->addWhere("(a.created_by = " . (int)JFactory::getUser()->get('id') ." OR a.created_by = 747) AND (a.remuneration = 0)");
				// KOEN 30/03/17
				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'grouper' => 'ASC'
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
			'company',
			'created_by',
			'published'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'access' => 'access',
			'publish' => 'published',
			'author' => 'created_by'
		));

		// SEARCH : Name + Grouper
		$this->orm->search('search', array(
			'on' => array(
				'name' => 'like',
				'grouper' => 'like'
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

		// FILTER : From Date
		if($filter_from_date = $this->getState('filter.from_date'))
		{
			if ($filter_from_date !== null){
				$this->addWhere("a.from_date = " . $this->_db->Quote($filter_from_date));
			}
		}

		// FILTER : Until Date
		if($filter_until_date = $this->getState('filter.until_date'))
		{
			if ($filter_until_date !== null){
				$this->addWhere("a.until_date = " . $this->_db->Quote($filter_until_date));
			}
		}

		// FILTER (Range) : PAX 01
		if($filter_pax_01_from = $this->getState('filter.pax_01_from'))
		{
			if ($filter_pax_01_from !== null){
				$this->addWhere("a.pax_01 >= " . (float)$filter_pax_01_from);
			}
		}

		// FILTER (Range) : PAX 01
		if($filter_pax_01_to = $this->getState('filter.pax_01_to'))
		{
			if ($filter_pax_01_to !== null){
				$this->addWhere("a.pax_01 <= " . (float)$filter_pax_01_to);
			}
		}

		// FILTER : Currency
		if($filter_currency = $this->getState('filter.currency'))
		{
			if ($filter_currency > 0){
				$this->addWhere("a.currency = " . (int)$filter_currency);
			}
		}

		// FILTER (Range) : Min Time
		if($filter_min_time_from = $this->getState('filter.min_time_from'))
		{
			if ($filter_min_time_from !== null){
				$this->addWhere("a.min_time >= " . $this->_db->Quote($filter_min_time_from));
			}
		}

		// FILTER (Range) : Min Time
		if($filter_min_time_to = $this->getState('filter.min_time_to'))
		{
			if ($filter_min_time_to !== null){
				$this->addWhere("a.min_time <= " . $this->_db->Quote($filter_min_time_to));
			}
		}

		// FILTER (Range) : Night Shift
		if($filter_night_shift_from = $this->getState('filter.night_shift_from'))
		{
			if ($filter_night_shift_from !== null){
				$this->addWhere("a.night_shift >= " . $this->_db->Quote($filter_night_shift_from));
			}
		}

		// FILTER (Range) : Night Shift
		if($filter_night_shift_to = $this->getState('filter.night_shift_to'))
		{
			if ($filter_night_shift_to !== null){
				$this->addWhere("a.night_shift <= " . $this->_db->Quote($filter_night_shift_to));
			}
		}

		// SEARCH : Name + Grouper
		$this->orm->search('search', array(
			'on' => array(
				'name' => 'like',
				'grouper' => 'like'
			)
		));

		// FILTER : Compamy
		if($filter_company = $this->getState('filter.company'))
		{
			if ($filter_company > 0){
				$this->addWhere("a.company = " . (int)$filter_company);
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

		// FILTER : Access > Title
		if($filter_access = $this->getState('filter.access'))
		{
			if ($filter_access > 0){
				$this->addWhere("a.access = " . (int)$filter_access);
			}
		}

		// SEARCH : Name
		$this->orm->search('search_1', array(
			'on' => array(
				'name' => 'like'
			)
		));

		// SEARCH : Name
		$this->orm->search('search_2', array(
			'on' => array(
				'name' => 'like'
			)
		));

		// SEARCH : Name
		$this->orm->search('search_3', array(
			'on' => array(
				'name' => 'like'
			)
		));

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'company');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}
}




<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Jobs
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
class GuidemanModelJobs extends GuidemanCkModelJobs
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
		$query->from('#__guideman_jobs AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'client_id',
					'client_id.name',
					'client_id.nationality',
					'client_id.nationality.iso_2',
					'client_id.surname',
					'company_id',
					'company_id.name',
					'company_id.nationality',
					'company_id.nationality.iso_2',
					'company_id.surname',
					'coordination',
					'end_date',
					'file_number',
					'guide_status',
					'invoicing',
					'invoicing.name',
					'main_guide',
					'main_guide.alias',
					'main_guide.name',
					'main_guide.nationality',
					'main_guide.nationality.iso_2',
					'main_guide.surname',
					'operator_name',
					'operator_name.alias',
					'operator_name.name',
					'operator_name.nationality',
					'operator_name.nationality.iso_2',
					'operator_name.surname',
					'ordering',
					'pax',
					'remunerations',
					'remunerations.name',
					'requested_language',
					'requested_language.flag',
					'requested_language.name',
					'second_language_option',
					'second_language_option.flag',
					'second_language_option.name',
					'start_date',
					'status',
					'total_credit',
					'total_debet',
					'trip_leader',
					'trip_leader.alias',
					'trip_leader.name',
					'trip_leader.surname'
				));
				//WHERE @koen
				$JoomlaUser = JFactory::getUser();
				$this->addWhere("a.created_by = " . $JoomlaUser->id . " OR a.main_guide = " . $JoomlaUser->id . " OR a.client_id = " . $JoomlaUser->id . " OR a.operator_name = " . $JoomlaUser->id . " OR a.trip_leader = " . $JoomlaUser->id . " OR a.company_id = " . $JoomlaUser->id);
				// KOEN 30/03/17
//				$this->addWhere('a.created_by = ' . (int)JFactory::getUser()->get('id'));
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
			'company_id',
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
		if($filter_company_id = $this->getState('filter.company_id'))
		{
			if ($filter_company_id > 0){
				$this->addWhere("a.company_id = " . (int)$filter_company_id);
			}
		}

		// FILTER : Client
		if($filter_client_id = $this->getState('filter.client_id'))
		{
			if ($filter_client_id > 0){
				$this->addWhere("a.client_id = " . (int)$filter_client_id);
			}
		}

		// FILTER : Req. Lang.
		if($filter_requested_language = $this->getState('filter.requested_language'))
		{
			if ($filter_requested_language > 0){
				$this->addWhere("a.requested_language = " . (int)$filter_requested_language);
			}
		}

		// FILTER : Back. Lang.
		if($filter_second_language_option = $this->getState('filter.second_language_option'))
		{
			if ($filter_second_language_option > 0){
				$this->addWhere("a.second_language_option = " . (int)$filter_second_language_option);
			}
		}

		// FILTER : Operator
		if($filter_operator_name = $this->getState('filter.operator_name'))
		{
			if ($filter_operator_name > 0){
				$this->addWhere("a.operator_name = " . (int)$filter_operator_name);
			}
		}

		// FILTER : Main Guide
		if($filter_main_guide = $this->getState('filter.main_guide'))
		{
			if ($filter_main_guide > 0){
				$this->addWhere("a.main_guide = " . (int)$filter_main_guide);
			}
		}

		// FILTER : Trip Leader
		if($filter_trip_leader = $this->getState('filter.trip_leader'))
		{
			if ($filter_trip_leader > 0){
				$this->addWhere("a.trip_leader = " . (int)$filter_trip_leader);
			}
		}

		// FILTER : Remuneration
		if($filter_remunerations_company = $this->getState('filter.remunerations_company'))
		{
			$this->addJoin("`#__guideman_prices` AS _remunerations_ ON _remunerations_.id = a.remunerations", 'LEFT');
			if ($filter_remunerations_company > 0){
				$this->addWhere("_remunerations_.company = " . (int)$filter_remunerations_company);
			}
		}

		// FILTER : Pricing
		if($filter_invoicing_company = $this->getState('filter.invoicing_company'))
		{
			$this->addJoin("`#__guideman_prices` AS _invoicing_ ON _invoicing_.id = a.invoicing", 'LEFT');
			if ($filter_invoicing_company > 0){
				$this->addWhere("_invoicing_.company = " . (int)$filter_invoicing_company);
			}
		}

		// FILTER : Start Date
		if($filter_start_date = $this->getState('filter.start_date'))
		{
			if ($filter_start_date !== null){
				$this->addWhere("a.start_date = " . $this->_db->Quote($filter_start_date));
			}
		}

		// FILTER : End Date
		if($filter_end_date = $this->getState('filter.end_date'))
		{
			if ($filter_end_date !== null){
				$this->addWhere("a.end_date = " . $this->_db->Quote($filter_end_date));
			}
		}

		// FILTER : Creation date
		if($filter_creation_date = $this->getState('filter.creation_date'))
		{
			if ($filter_creation_date !== null){
				$this->addWhere("a.creation_date = " . $this->_db->Quote($filter_creation_date));
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

		// FILTER : Modification date
		if($filter_modification_date = $this->getState('filter.modification_date'))
		{
			if ($filter_modification_date !== null){
				$this->addWhere("a.modification_date = " . $this->_db->Quote($filter_modification_date));
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

		// FILTER : My Joomla user > Name
		if($filter_my_joomla_user = $this->getState('filter.my_joomla_user'))
		{
			if ($filter_my_joomla_user == 'auto'){
				$this->addWhere('a.my_joomla_user = ' . (int)JFactory::getUser()->get('id'));
			}
			else 
			if ($filter_my_joomla_user > 0){
				$this->addWhere("a.my_joomla_user = " . (int)$filter_my_joomla_user);
			}
		}

		// FILTER : My Joomla access > Title
		if($filter_my_joomla_access = $this->getState('filter.my_joomla_access'))
		{
			if ($filter_my_joomla_access > 0){
				$this->addWhere("a.my_joomla_access = " . (int)$filter_my_joomla_access);
			}
		}

		// SEARCH : File Number + File Name + Client Reference
		$this->orm->search('search', array(
			'on' => array(
				'file_number' => 'like',
				'file_name' => 'like',
				'client_reference' => 'like'
			)
		));

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'file_name');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}
}




<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Vehicles
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
class GuidemanModelVehicles extends GuidemanCkModelVehicles
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
		$query->from('#__guideman_vehicles AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':


				$this->orm->select(array(
					'brand_id',
					'brand_id.name',
					'car_insurance',
					'color',
					'fuel',
					'insurance_for_third_parties',
					'model',
					'number_plate',
					'ordering',
					'pax',
					'user_id',
					'user_id.name',
					'vehicle_type',
					'year_of_build'
				));

				// KOEN 30/03/17
				$this->addWhere('a.created_by = ' . (int)JFactory::getUser()->get('id'));
				// KOEN 30/03/17

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

		// FILTER : Contact
		if($filter_user_id = $this->getState('filter.user_id'))
		{
			if ($filter_user_id > 0){
				$this->addWhere("a.user_id = " . (int)$filter_user_id);
			}
		}

		// FILTER : Make
		if($filter_brand_id = $this->getState('filter.brand_id'))
		{
			if ($filter_brand_id > 0){
				$this->addWhere("a.brand_id = " . (int)$filter_brand_id);
			}
		}

		// FILTER : Year of build
		if($filter_year_of_build = $this->getState('filter.year_of_build'))
		{
			if ($filter_year_of_build !== null){
				$this->addWhere("a.year_of_build = " . $this->_db->Quote($filter_year_of_build));
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

		// SEARCH : Model + Number plate
		$this->orm->search('search', array(
			'on' => array(
				'model' => 'like',
				'number_plate' => 'like'
			)
		));

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'vehicle_type');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}
}




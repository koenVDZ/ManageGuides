<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Contacts
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
class GuidemanModelContacts extends GuidemanCkModelContacts
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
		$query->from('#__guideman_contacts AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'alias',
					'catid',
					'catid.MGcat',
					'country_id',
					'country_id.country_name',
					'country_id.iso_2',
					'hits',
					'image',
					'name',
					'nationality',
					'nationality.iso_2',
					'ordering',
					'state_id',
					'state_id.state',
					'surname',
					'type'
				));
				// KOEN 30/03/17
				$this->addWhere('a.type = 0');
				$this->addWhere('a.created_by = ' . (int)JFactory::getUser()->get('id'));
				// KOEN 30/03/17
				break;

			case 'layout.companies':

				$this->orm->select(array(
					'catid',
					'catid.MGcat',
					'country_id',
					'country_id.country_name',
					'country_id.iso_2',
					'image',
					'name',
					'nationality',
					'nationality.iso_2',
					'ordering',
					'state_id',
					'state_id.state',
					'surname'
				));
				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'catid.MGcat' => 'ASC'
				));
				// KOEN 30/03/17
				$this->addWhere('a.type = 1');
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
			'created_by',
			'published'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'publish' => 'published',
			'author' => 'created_by'
		));

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

		// FILTER : Record Type
		$filter_type = $this->getState('filter.type');

		if ($filter_type !== null){
			$this->addWhere("a.type = " . (int)$filter_type);
		}

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'name');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}
}




<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.1.4
* @package		GuideMan
* @subpackage	Addresses
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
class GuidemanModelAddresses extends GuidemanCkModelAddresses
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
		$query->from('#__guideman_addresses AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':


				$this->orm->select(array(
					'address',
					'address_label',
					'address_label.type',
					'catid',
					'catid.MGcat',
					'city',
					'country_id',
					'country_id.country_name',
					'country_id.iso_2',
					'default_address',
					'ordering',
					'state_id',
					'state_id.abbreviation',
					'state_id.state',
					'suburb',
					'user_id',
					'user_id.alias',
					'user_id.name',
					'user_id.nationality',
					'user_id.nationality.iso_2',
					'user_id.surname',
					'user_id.type',
					'zipcode'
				));

				// PRIORITARY ORDER for grouping the list
				$this->orm->groupOrder(array(
					'user_id.name' => 'ASC'
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
			'created_by',
			'published',
			'user_id'
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

		// FILTER : Address Type
		if($filter_address_label = $this->getState('filter.address_label'))
		{
			if ($filter_address_label > 0){
				$this->addWhere("a.address_label = " . (int)$filter_address_label);
			}
		}

		// SEARCH : Address + Suburb + ZipCode + City
		$this->orm->search('search', array(
			'on' => array(
				'address' => 'like',
				'suburb' => 'like',
				'zipcode' => 'like',
				'city' => 'like'
			)
		));

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'user_id');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}

}




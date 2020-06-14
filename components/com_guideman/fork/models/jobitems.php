<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Job Items
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
class GuidemanModelJobitems extends GuidemanCkModelJobitems
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
		$query->from('#__guideman_jobitems AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.default':

				$this->orm->select(array(
					'driver',
					'driver.alias',
					'driver.name',
					'driver.nationality',
					'driver.nationality.iso_2',
					'driver.surname',
					'end_date',
					'end_time',
					'guide',
					'guide.alias',
					'guide.name',
					'guide.nationality',
					'guide.nationality.iso_2',
					'guide.surname',
					'guide_status',
					'item_status',
					'job_id',
					'job_id.company_id',
					'job_id.company_id.name',
					'job_id.company_id.nationality',
					'job_id.company_id.nationality.iso_2',
					'job_id.status',
					'optional',
					'ordering',
					'pax',
					'remark',
					'service',
					'service.costs',
					'service.costs.currency',
					'service.costs.currency.symbol',
					'service.duration',
					'service.remunaration',
					'service.remunaration.currency',
					'service.remunaration.currency.symbol',
					'service.service_name',
					'service_provider',
					'service_provider.name',
					'service_provider.nationality',
					'service_provider.nationality.iso_2',
					'service_provider_status',
					'start_date',
					'start_time',
					'total_credit',
					'total_debet',
					'transport',
					'transport.name',
					'transport.nationality',
					'transport.nationality.iso_2',
					'transport_status',
					'type'
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
			'published'
		));

		// ACCESS : Restricts accesses over the local table
		$this->orm->access('a', array(
			'publish' => 'published',
			'author' => 'created_by'
		));

		// FILTER : Service Status
		if($filter_item_status = $this->getState('filter.item_status'))
		{
			if ($filter_item_status !== null){
				$this->addWhere("a.item_status = " . $this->_db->Quote($filter_item_status));
			}
		}

		// FILTER : Service Order
		if($filter_job_id = $this->getState('filter.job_id'))
		{
			if ($filter_job_id > 0){
				$this->addWhere("a.job_id = " . (int)$filter_job_id);
			}
		}

		// FILTER : Company
		if($filter_job_id_company_id = $this->getState('filter.job_id_company_id'))
		{
			$this->addJoin("`#__guideman_jobs` AS _job_id_ ON _job_id_.id = a.job_id", 'LEFT');
			if ($filter_job_id_company_id > 0){
				$this->addWhere("_job_id_.company_id = " . (int)$filter_job_id_company_id);
			}
		}

		// FILTER : Operator
		if($filter_job_id_operator_name = $this->getState('filter.job_id_operator_name'))
		{
			$this->addJoin("`#__guideman_jobs` AS _job_id_ ON _job_id_.id = a.job_id", 'LEFT');
			if ($filter_job_id_operator_name > 0){
				$this->addWhere("_job_id_.operator_name = " . (int)$filter_job_id_operator_name);
			}
		}

		// FILTER : Transport Company
		if($filter_transport = $this->getState('filter.transport'))
		{
			if ($filter_transport > 0){
				$this->addWhere("a.transport = " . (int)$filter_transport);
			}
		}

		// FILTER : Driver
		if($filter_driver = $this->getState('filter.driver'))
		{
			if ($filter_driver > 0){
				$this->addWhere("a.driver = " . (int)$filter_driver);
			}
		}

		// FILTER : Guide
		if($filter_guide = $this->getState('filter.guide'))
		{
			if ($filter_guide > 0){
				$this->addWhere("a.guide = " . (int)$filter_guide);
			}
		}

		// FILTER : Start Date
		if($filter_start_date = $this->getState('filter.start_date'))
		{
			if ($filter_start_date !== null){
				$this->addWhere("a.start_date = " . $this->_db->Quote($filter_start_date));
			}
		}

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

		// ORDERING
		$orderCol = $this->getState('list.ordering', 'job_id');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->orm->order(array($orderCol => $orderDir));


		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}
}




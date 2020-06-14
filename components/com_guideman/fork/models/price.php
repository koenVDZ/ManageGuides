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
* Guideman Item Model
*
* @package	Guideman
* @subpackage	Classes
*/
class GuidemanModelPrice extends GuidemanCkModelPrice
{
	/**
	* Preparation of the item query.
	*
	* @access	protected
	* @param	object	&$query	returns a filled query object.
	* @param	integer	$pk	The primary id key of the price
	*
	* @return	void
	*/
	protected function prepareQuery(&$query, $pk)
	{
		//FROM : Main table
		$query->from('#__guideman_prices AS a');

		// Primary Key is always required
		$this->addSelect('a.id');


		switch($this->getState('context', 'all'))
		{
			case 'layout.remuneration':

				$this->orm->select(array(
					'company',
					'company.name',
					'coordination_fee',
					'coordination_in',
					'currency',
					'currency.title',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'min_time',
					'name',
					'night_shift',
					'optional',
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
					'until_date'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.price':

				$this->orm->select(array(
					'company',
					'company.name',
					'coordination_fee',
					'currency',
					'currency.title',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'name',
					'optional',
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
					'until_date'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.pricecopy':

				$this->orm->select(array(
					'access',
					'access.title',
					'company',
					'company.name',
					'coordination_fee',
					'coordination_in',
					'created_by',
					'created_by.name',
					'creation_date',
					'currency',
					'currency.title',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'min_time',
					'modification_date',
					'modified_by',
					'modified_by.name',
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
					'until_date'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'layout.remunerationcopy':

				$this->orm->select(array(
					'access',
					'access.title',
					'company',
					'company.name',
					'coordination_fee',
					'coordination_in',
					'created_by',
					'created_by.name',
					'creation_date',
					'currency',
					'currency.title',
					'extra_hour_day',
					'extra_hour_night',
					'from_date',
					'grouper',
					'hourly_rate',
					'min_time',
					'modification_date',
					'modified_by',
					'modified_by.name',
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
					'until_date'
				));

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;

			case 'all':
				//SELECT : raw complete query without joins
				$this->addSelect('a.*');

				// Disable the pagination
				$this->setState('list.limit', null);
				$this->setState('list.start', null);

				// Item search : Based on Primary Key
				$query->where('a.id = ' . (int) $pk);
				break;
		}

		$this->orm->select(array(
			'access',
			'company',
			'created_by',
			'published'
		));

		$this->orm->access('a', array(
			'access' => 'access',
			'publish' => 'published',
			'author' => 'created_by'
		));

		// ORDERING
		$orderCol = $this->getState('list.ordering');
		$orderDir = $this->getState('list.direction', 'ASC');

		if ($orderCol)
			$this->addOrder($orderCol . ' ' . $orderDir);



		// Apply all SQL directives to the query
		$this->applySqlStates($query);
	}
}
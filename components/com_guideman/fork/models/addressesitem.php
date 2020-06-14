<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.0
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
* Guideman Item Model
*
* @package	Guideman
* @subpackage	Classes
*/
class GuidemanModelAddressesitem extends GuidemanCkModelAddressesitem
{
	/**
	* Prepare and sanitise the table prior to saving.
	*
	* @access	protected
	* @param	JTable	$table	A JTable object.
	*
	*
	* @since	1.6
	*
	* @return	void
	*/
	protected function prepareTable($table)
	{
		$date = JFactory::getDate();
		if (empty($table->id))
		{
			//Creation date
			if (empty($table->creation_date))
				$table->creation_date =  JFactory::getDate()->toSql();

			//Defines automatically the author of this element
			$table->created_by = JFactory::getUser()->get('id');

			// Set ordering to the last item if not set
			$conditions = $this->getReorderConditions($table);
			$conditions = (count($conditions)?implode(" AND ", $conditions):'');
			$table->ordering = $table->getNextOrder($conditions);
			// MG_KOEN 27/09/2016 Lookup CatID !!! before update
			$contactarray = GuidemanHelperFilehelp::GetContact($table->user_id);
			$table->catid = $contactarray['catid'];
			$table->published = 1;
			if ($table->default_address)
			{
				// MG_KOEN 10/04/2016 Lookup country_id & State Name !!! before update
				if (!$contactarray['ce_details_id']) {
					// Get CE_contact ID
					$dbo = JFactory::getDBO();
					$dbo->setQuery('SELECT id FROM #__ce_details WHERE user_id = '. $table->user_id);
					$contactarray['ce_details_id'] = $dbo->loadResult();
				}
				if (($table->state_id != "" ) AND ($contactarray['ce_details_id'])) {
					$statearray = GuidemanHelperFilehelp::Getstate($table->state_id);
					$table->country_id = $statearray['country_id'];
					//Look for Countryname in GM_COUNTRIES
					$countryarray = GuidemanHelperFilehelp::GetCountry($table->country_id);
					$db = JFactory::getDbo();
					$query = $db->getQuery(true);
					$fields = array(
							$db->quoteName('address') . ' = \'' . $table->address . '\'',
							$db->quoteName('suburb') . ' = \'' . $table->suburb . '\'',
							$db->quoteName('state') . ' = \'' . $statearray['state'] . '\'',
							$db->quoteName('country') . ' = \'' . $countryarray['country_name'] . '\'',
							$db->quoteName('postcode') . ' = \'' . $table->zipcode . '\'',
							$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
							$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
						);
					// Fields to update.
					$conditions = $db->quoteName('id') . ' =  ' . $contactarray['ce_details_id'];
					$query->update($db->quoteName('#__ce_details'))->set($fields)->where($conditions);
					$db->setQuery($query);
					$result = $db->execute();
				}
			}
		}
		else
		{
			//Modification date
			$table->modification_date = JFactory::getDate()->toSql();

			//Defines automatically the editor of this element
			$table->modified_by = JFactory::getUser()->get('id');
			if ($table->default_address)
			{
				// MG_KOEN 10/04/2016 Lookup country_id & State Name !!! before update
				if ($table->state_id != "" ) {
					$statearray = GuidemanHelperFilehelp::Getstate($table->state_id);
					$table->country_id = $statearray['country_id'];
					//Look for Countryname in GM_COUNTRIES
					$countryarray = GuidemanHelperFilehelp::GetCountry($table->country_id);
				}
				// MG_KOEN 27/09/2016 Lookup CatID !!! before update
				$contactarray = GuidemanHelperFilehelp::GetContact($table->user_id);
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);
				$fields = array(
						$db->quoteName('address') . ' = \'' . $table->address . '\'',
						$db->quoteName('suburb') . ' = \'' . $table->suburb . '\'',
						$db->quoteName('state') . ' = \'' . $statearray['state'] . '\'',
						$db->quoteName('country') . ' = \'' . $countryarray['country_name'] . '\'',
						$db->quoteName('postcode') . ' = \'' . $table->zipcode . '\'',
						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
					);
				// Fields to update.
				$conditions = $db->quoteName('id') . ' =  ' . $contactarray['ce_details_id'];
				$query->update($db->quoteName('#__ce_details'))->set($fields)->where($conditions);
				$db->setQuery($query);
				$result = $db->execute();
			}
		}
		// MG_KOEN 08/12/16 Lookup country_id & State Name !!! before update
		if ($table->state_id != "" ) {
			$statearray = GuidemanHelperFilehelp::Getstate($table->state_id);
			$table->country_id = $statearray['country_id'];
		}
		/* KOEN 08/12/16 - Publish the newly chosen Language */
		if ($table->country_id != "") {
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$fields = array(
				$db->quoteName('published') . ' = \'' . 1 . '\'',
				);
			$conditions = $db->quoteName('id') . ' = \'' . $table->country_id . '\'';
			$query->update($db->quoteName('#__guideman_countries'))->set($fields)->where($conditions);
			$db->setQuery($query);
			$result = $db->execute();
		}
		/* KOEN 08/12/16 - Publish the newly chosen Language */
	}
}
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Phones
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
class GuidemanModelPhonesitem extends GuidemanCkModelPhonesitem
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
			//Defines automatically the author of this element
			$table->created_by = JFactory::getUser()->get('id');

			//Creation date
			if (empty($table->creation_date))
				$table->creation_date =  JFactory::getDate()->toSql();

			// Set ordering to the last item if not set
			$conditions = $this->getReorderConditions($table);
			$conditions = (count($conditions)?implode(" AND ", $conditions):'');
			$table->ordering = $table->getNextOrder($conditions);
			// MG_KOEN 26/02/2016 Get CatID
			$contactarray = GuidemanHelperFilehelp::GetContact($table->user_id);
			$table->catid = $contactarray['catid'];
			if ($table->default_phone)
			{
				//Look for CE_DETAILS_ID in GM_CONTACTS
				$fax_label = array(2,6,15,30,31,32,33,34,43);
				$tel_label = array(1,5,14,21,22,35,36,37,38);
				$gsm_label = array(3,4,16,23,24,42);
				$countryarray = GuidemanHelperFilehelp::GetCountry($table->cdc);
				$fullnumber = $countryarray ['calling_code'] . $table->number;
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);
				$changes_made = false;
				if (in_array($table->label, $tel_label)) {
					$fields = array(
							$db->quoteName('telephone') . ' = \'' . $fullnumber . '\'',
							$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
							$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
						);
					$changes_made = true;
				}
				if (in_array($table->label, $fax_label)) {
					$fields = array(
							$db->quoteName('fax') . ' = \'' . $fullnumber . '\'',
							$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
							$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
						);
					$changes_made = true;
				}
				if (in_array($table->label, $gsm_label)) {
					$fields = array(
							$db->quoteName('mobile') . ' = \'' . $fullnumber . '\'',
							$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
							$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
						);
					$changes_made = true;
				}
				// Fields to update.
				if ($changes_made) {
					$conditions = $db->quoteName('id') . ' = \'' . $contactarray['ce_details_id'] .'\'';
					$query->update($db->quoteName('#__ce_details'))->set($fields)->where($conditions);
					$db->setQuery($query);
					$result = $db->execute();
				}
			}
		}
		else
		{
			if ($table->default_phone)
			{
				// echo "</br> default phone? " . $table->default_phone;
				//Look for CE_DETAILS_ID in GM_CONTACTS
				$contactarray = GuidemanHelperFilehelp::GetContact($table->user_id);
				$fax_label = array(2,6,15,30,31,32,33,34);
				$tel_label = array(1,5,14,21,22,35,36,37);
				$gsm_label = array(3,4,16,23,24);
				$countryarray = GuidemanHelperFilehelp::GetCountry($table->cdc);
				$fullnumber = $countryarray ['calling_code'] . $table->number;
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);
				$changes_made = false;
				if (in_array($table->label, $tel_label)) {
					// Fields to update.
					$fields = array(
							$db->quoteName('telephone') . ' = \'' . $fullnumber . '\'',
							$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
							$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
						);
					$changes_made = true;
				}
				if (in_array($table->label, $fax_label)) {
					// Fields to update.
					$fields = array(
							$db->quoteName('fax') . ' = \'' . $fullnumber . '\'',
							$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
							$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
						);
					$changes_made = true;
				}
				if (in_array($table->label, $gsm_label)) {
					// Fields to update.
					$fields = array(
							$db->quoteName('mobile') . ' = \'' . $fullnumber . '\'',
							$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
							$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
						);
					$changes_made = true;
				}
				if ($changes_made) {
					$conditions = $db->quoteName('id') . ' = \'' . $contactarray['ce_details_id'] .'\'';
					$query->update($db->quoteName('#__ce_details'))->set($fields)->where($conditions);
					$db->setQuery($query);
					$result = $db->execute();
				}
			}
			//Defines automatically the editor of this element
			$table->modified_by = JFactory::getUser()->get('id');

			//Modification date
			$table->modification_date = JFactory::getDate()->toSql();
		}

	}
}




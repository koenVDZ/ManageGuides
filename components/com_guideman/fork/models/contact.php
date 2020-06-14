<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.0
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
* Guideman Item Model
*
* @package	Guideman
* @subpackage	Classes
*/
class GuidemanModelContact extends GuidemanCkModelContact
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

		// MG_KOEN 10/04/2016 Lookup country_id & State Name !!! before update
		if ($table->state_id != "" ) {
			$statearray = GuidemanHelperFilehelp::Getstate($table->state_id);
			$table->country_id = $statearray['country_id'];
			//Look for Countryname in GM_COUNTRIES
			$countryarray = GuidemanHelperFilehelp::GetCountry($table->country_id);
		}
		if (empty($table->id))
		{
			// Set ordering to the last item if not set
			$conditions = $this->getReorderConditions($table);
			$conditions = (count($conditions)?implode(" AND ", $conditions):'');
			$table->ordering = $table->getNextOrder($conditions);

			//Creation date
			if (empty($table->creation_date))
				$table->creation_date =  JFactory::getDate()->toSql();

			//Defines automatically the author of this element
			$table->created_by = JFactory::getUser()->get('id');
			// If new now it should be a company; contacts should b defined through the user\mg_registration plugin
			if ($table->surname == '') {
				$table->surname = $table->name;
			}
			$table->type = 1;
			$table->gender = 0;
			$table->con_position = 'Corporate';
			$table->published = 1;
			// CE_DETAILS Fields to to create in new record
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);
				//Columns.
				$columns = array('name', 'alias', 'department', 'con_position', 'email_to', 'published', 'catid', 'access', 'birthdate', 'language', 'created', 'created_by');
				// insert values.
				$values = array('\''. $table->name .'\'', '\''. str_replace(" ", "-", strtolower($table->surname)) .'\'' , '\''. $table->surname .'\'' , '\'Corporate\'' , '\'' . $table->email .'\'' , 1, $table->catid, 1, '\'' . $table->birthdate .'\'' , '\'*\'' , '\'' . $date =& JFactory::getDate() . '\'', JFactory::getUser()->get('id') );
				// Prepare the insert query.
				$query
				 	->insert($db->quoteName('#__ce_details'))
				 	->columns($db->quoteName($columns))
				 	->values(implode(',', $values));
				// Set the query using our newly populated query object and execute it.
				$db->setQuery($query);
				$db->execute();
				$table->ce_details_id = $db->insertid();
		}
		else
		{
			//Defines automatically the editor of this element
			$table->modified_by = JFactory::getUser()->get('id');

			//Modification date
			$table->modification_date = JFactory::getDate()->toSql();
			// MG_KOEN 24/02/16 Update CE_DETAILS
			$table->published = 1;
			// Type USER.
			if ($table->type == 0)
			{
				if ($table->ce_details_id != "") {
					// CE_DETAILS Fields to update.
					$db = JFactory::getDbo();
					$query = $db->getQuery(true);
					$fields = array(
						$db->quoteName('name') . ' = \'' . $table->name . '\'',
						$db->quoteName('alias') . ' = \'' . $table->alias . '\'',
						$db->quoteName('department') . ' = \'' . $table->surname . '\'',
						$db->quoteName('con_position') . ' = "Corporate"',
//					$db->quoteName('state') . ' = \'' . $statearray['state'] .'\'',
//					$db->quoteName('country') . ' = \'' . $countryarray['country_name'] .'\'',
//					$db->quoteName('image') . ' = images/guideman/contacts/' . $table->image . '\'',
//					$db->quoteName('email_to') . ' = \'' . $table->email .'\'',
						$db->quoteName('catid') . ' = \'' . $table->catid .'\'',
						$db->quoteName('access') . ' = 1',
						$db->quoteName('birthdate') . ' = \'' . $table->birthdate .'\'',
						$db->quoteName('language') . ' = "*"',
						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
						);
					$conditions = $db->quoteName('id') . ' = \'' . $table->ce_details_id . '\'';
					$query->update($db->quoteName('#__ce_details'))->set($fields)->where($conditions);
					$db->setQuery($query);
					$result = $db->execute();
				}
				if ($table->user_id != "" ) {
					// KUNENA_USERS Fields to update.
					$db = JFactory::getDbo();
					$query = $db->getQuery(true);
					$fields = array(
						$db->quoteName('signature') . ' = \'' . $table->name . '\'',
						$db->quoteName('gender') . ' = \'' . $table->gender . '\'',
						$db->quoteName('birthdate') . ' = \'' . $table->birthdate .'\''
						);
					$conditions = $db->quoteName('userid') . ' = \'' . $table->user_id . '\'';
					$query->update($db->quoteName('#__kunena_users'))->set($fields)->where($conditions);
					$db->setQuery($query);
					$result = $db->execute();
				}
			}
			if ($table->type == 1)
			{
				if ($table->ce_details_id != "") {
					// CE_DETAILS Fields to update.
					$db = JFactory::getDbo();
					$query = $db->getQuery(true);
					$fields = array(
						$db->quoteName('name') . ' = \'' . $table->name . '\'',
						$db->quoteName('alias') . ' = \'' . $table->alias . '\'',
						$db->quoteName('department') . ' = \'' . $table->surname . '\'',
						$db->quoteName('con_position') . ' = "Corporate"',
//					$db->quoteName('image') . ' = images/guideman/contacts/' . $table->image . '\'',
//					$db->quoteName('email_to') . ' = \'' . $table->email .'\'',
						$db->quoteName('catid') . ' = \'' . $table->catid .'\'',
						$db->quoteName('access') . ' = 1',
						$db->quoteName('birthdate') . ' = \'' . $table->birthdate .'\'',
						$db->quoteName('language') . ' = "*"',
						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
						);
					$conditions = $db->quoteName('id') . ' = \'' . $table->ce_details_id . '\'';
					$query->update($db->quoteName('#__ce_details'))->set($fields)->where($conditions);
					$db->setQuery($query);
					$result = $db->execute();
				}
			}
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
		if ($table->nationality != "") {
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$fields = array(
				$db->quoteName('published') . ' = \'' . 1 . '\'',
				);
			$conditions = $db->quoteName('id') . ' = \'' . $table->nationality . '\'';
			$query->update($db->quoteName('#__guideman_countries'))->set($fields)->where($conditions);
			$db->setQuery($query);
			$result = $db->execute();
		}
		/* KOEN 08/12/16 - Publish the newly chosen Language */
		$table->published = 1;
		// Change Progress
		$table->progress = 30;
		//Alias
		if (empty($table->alias))
			$table->alias = JApplication::stringURLSafe($table->name);
	}
}
<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideMan
* @subpackage	Social
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
class GuidemanModelSocialitem extends GuidemanCkModelSocialitem
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

		$kunena = array(1,2,3,4,5,6,8,9,27,29,30,31,32,33);

		if (empty($table->id))
		{
			//Creation date
			if (empty($table->creation_date))
				$table->creation_date =  JFactory::getDate()->toSql();

			//Defines automatically the author of this element
			$table->created_by = JFactory::getUser()->get('id');
			$table->published = 1;

			// Set ordering to the last item if not set
			$conditions = $this->getReorderConditions($table);
			$conditions = (count($conditions)?implode(" AND ", $conditions):'');
			$table->ordering = $table->getNextOrder($conditions);
			//Look for CE_DETAILS_ID in GM_CONTACTS
			$contactarray = GuidemanHelperFilehelp::GetContact($table->user_id);
			$table->catid = $contactarray['catid'];
			if (($table->labelid < 7) AND ($contactarray['ce_details_id'] != ""))
			{
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);
				switch ($table->labelid) {
					case 1:
						$fields = array(
							$db->quoteName('facebook') . ' = \'' . $table->name . '\'',
	 						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
	 						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
	 					);
						break;
					case 2:
						$fields = array(
							$db->quoteName('google_plus') . ' = \'' . $table->name . '\'',
	 						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
	 						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
	 					);
						break;
					case 3:
						$fields = array(
							$db->quoteName('skype') . ' = \'' . $table->name . '\'',
	 						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
	 						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
	 					);
						break;
					case 4:
						$fields = array(
							$db->quoteName('webpage') . ' = \'' . $table->name . '\'',
	 						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
	 						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
	 					);
						break;
					case 5:
						$fields = array(
							$db->quoteName('twitter') . ' = \'' . $table->name . '\'',
	 						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
	 						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
	 					);
						break;
					case 6:
						$fields = array(
							$db->quoteName('linkedin') . ' = \'' . $table->name . '\'',
	 						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
	 						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
	 					);
						break;
					default:
						break;
				}
				$conditions = $db->quoteName('id') . ' =  ' . $contactarray['ce_details_id'];
				$query->update($db->quoteName('#__ce_details'))->set($fields)->where($conditions);
				$db->setQuery($query);
				$result = $db->execute();
			}
			if ((in_array($table->labelid, $kunena)) AND ($contactarray['user_id'] != ""))
			{
				// Case individual and phone label = telephone
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);
				switch ($table->labelid) {
					case 1:
						$fields = array(
							$db->quoteName('facebook') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 2:
						$fields = array(
							$db->quoteName('gtalk') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 3:
						$fields = array(
							$db->quoteName('skype') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 4:
						$fields = array(
							$db->quoteName('websiteurl') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 5:
						$fields = array(
							$db->quoteName('twitter') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 6:
						$fields = array(
							$db->quoteName('linkedin') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 8:
						$fields = array(
							$db->quoteName('flickr') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 9:
						$fields = array(
							$db->quoteName('delicious') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 27:
						$fields = array(
							$db->quoteName('icq') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 29:
						$fields = array(
							$db->quoteName('aim') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 30:
						$fields = array(
							$db->quoteName('yim') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 31:
						$fields = array(
							$db->quoteName('msn') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 32:
						$fields = array(
							$db->quoteName('myspace') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 33:
						$fields = array(
							$db->quoteName('digg') . ' = \'' . $table->name . '\''
	 					);
						break;
					default:
						break;
				}
				$conditions = $db->quoteName('userid') . ' = \'' . $table->user_id . '\'';
				$query->update($db->quoteName('#__kunena_users'))->set($fields)->where($conditions);
				$db->setQuery($query);
				$result = $db->execute();
			}
		}
		else
		{
			//Modification date
			$table->modification_date = JFactory::getDate()->toSql();

			//Defines automatically the editor of this element
			$table->modified_by = JFactory::getUser()->get('id');
			// MG_KOEN 22/02/2016 Update CE_DETAILS record for user
			$contactarray = GuidemanHelperFilehelp::GetContact($table->user_id);
			if (($table->labelid < 7) AND ($contactarray['ce_details_id'] != ""))
				{
				// CE_DETAILS_ID Update
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);
				switch ($table->labelid) {
					case 1:
						$fields = array(
   							$db->quoteName('facebook') . ' = \'' . $table->name . '\'',
    						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
    						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
    					);
						break;
					case 2:
						$fields = array(
   							$db->quoteName('google_plus') . ' = \'' . $table->name . '\'',
    						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
    						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
    					);
						break;
					case 3:
						$fields = array(
   							$db->quoteName('skype') . ' = \'' . $table->name . '\'',
    						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
    						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
    					);
						break;
					case 4:
						$fields = array(
   							$db->quoteName('webpage') . ' = \'' . $table->name . '\'',
    						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
    						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
    					);
						break;
					case 5:
						$fields = array(
   							$db->quoteName('twitter') . ' = \'' . $table->name . '\'',
    						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
    						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
    					);
						break;
					case 6:
						$fields = array(
   							$db->quoteName('linkedin') . ' = \'' . $table->name . '\'',
    						$db->quoteName('modified') . ' = \'' . $date =& JFactory::getDate() .'\'',
    						$db->quoteName('modified_by') . ' = \'' . JFactory::getUser()->get('id') .'\''
    					);
						break;
					default:
						break;
					}
					$conditions = $db->quoteName('id') . ' =  ' . $contactarray['ce_details_id'];
					$query->update($db->quoteName('#__ce_details'))->set($fields)->where($conditions);
					$db->setQuery($query);
					$result = $db->execute();
				}
			// KUNENEA PROFILE UPDATE
			if ((in_array($table->labelid, $kunena)) AND ($contactarray['user_id'] != ""))
			{
				// Case individual and phone label = telephone
				$db = JFactory::getDbo();
				$query = $db->getQuery(true);
				switch ($table->labelid) {
					case 1:
						$fields = array(
							$db->quoteName('facebook') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 2:
						$fields = array(
							$db->quoteName('gtalk') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 3:
						$fields = array(
							$db->quoteName('skype') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 4:
						$fields = array(
							$db->quoteName('websiteurl') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 5:
						$fields = array(
							$db->quoteName('twitter') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 6:
						$fields = array(
							$db->quoteName('linkedin') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 8:
						$fields = array(
							$db->quoteName('flickr') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 9:
						$fields = array(
							$db->quoteName('delicious') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 27:
						$fields = array(
							$db->quoteName('icq') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 29:
						$fields = array(
							$db->quoteName('aim') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 30:
						$fields = array(
							$db->quoteName('yim') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 31:
						$fields = array(
							$db->quoteName('msn') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 32:
						$fields = array(
							$db->quoteName('myspace') . ' = \'' . $table->name . '\''
	 					);
						break;
					case 33:
						$fields = array(
							$db->quoteName('digg') . ' = \'' . $table->name . '\''
	 					);
						break;
					default:
						break;
				}
				$conditions = $db->quoteName('userid') . ' = \'' . $table->user_id . '\'';
				$query->update($db->quoteName('#__kunena_users'))->set($fields)->where($conditions);
				$db->setQuery($query);
				$result = $db->execute();
			}
		}
	}
}




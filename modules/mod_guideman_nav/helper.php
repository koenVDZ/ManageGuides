<?php
/**
 * @package     ManageGuides
 * @subpackage  mod_guideman_nav
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
class ModGuidemanNavHelper
{
/**
* Retrieves the User Contact Information
*
* @param   array  $params An object containing the module parameters
*
* @access public
*/
static function loadContact($param) {
// Lookup Profile Database
	$db = JFactory::getDbo();
	$query = $db->getQuery(true);
	$query->select('*');
//	$query->select($db->quoteName(array('id','catid','user_id','name','surname','alias','image','progress')));
	$query->from($db->quoteName('#__guideman_contacts'));
	$query->where($db->quoteName('user_id')." = ".$param);
	$db->setQuery($query);
	$row = $db->loadAssoc();
	return $row;
	}
}

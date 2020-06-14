<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	BusinessTypes
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
* Guideadm Table class
*
* @package	Guideadm
* @subpackage	Businesstype
*/
class GuideadmCkTableBusinesstype extends GuideadmClassTable
{
	/**
	* Constructor
	*
	* @access	public
	* @param	object	&$db	Database connector object
	* @param	string	$tbl	Table name
	* @param	string	$key	Primary key
	*
	* @return	void
	*/
	public function __construct(&$db, $tbl = '#__guideman_businesstypes', $key = 'id')
	{
		parent::__construct($tbl, $key, $db);
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmTableBusinesstype')){ class GuideadmTableBusinesstype extends GuideadmCkTableBusinesstype{} }


<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	GuideAdmV2
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
* Guideadm  Controller
*
* @package	Guideadm
* @subpackage	
*/
class GuideadmCkClassController extends CkJController
{
	/**
	* Call the parent display function. Trick for forking overrides.
	*
	* @access	protected
	*
	*
	* @since	Cook 2.0
	*
	* @return	void
	*/
	protected function _parentDisplay()
	{
		//Add the fork views path (LIFO) instead of FIFO
		array_push($this->paths['view'], JPATH_GUIDEADM . '/fork/views');

		parent::display();
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmClassController')){ class GuideadmClassController extends GuideadmCkClassController{} }


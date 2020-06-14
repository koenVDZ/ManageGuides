<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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
* Guideman Businesstypes Controller
*
* @package	Guideman
* @subpackage	Businesstypes
*/
class GuidemanCkControllerBusinesstypes extends GuidemanClassControllerList
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'businesstypes';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'businesstype';

	/**
	* The URL view list variable.
	*
	* @var string
	*/
	protected $view_list = 'businesstypes';

	/**
	* Constructor
	*
	* @access	public
	* @param	array	$config	An optional associative array of configuration settings.
	*
	* @return	void
	*/
	public function __construct($config = array())
	{
		parent::__construct($config);
		$app = JFactory::getApplication();

	}

	/**
	* Return the current layout.
	*
	* @access	protected
	* @param	bool	$default	If true, return the default layout.
	*
	* @return	string	Requested layout or default layout
	*/
	protected function getLayout($default = null)
	{
		if ($default)
			return 'default';

		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', 'default', 'CMD');
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanControllerBusinesstypes')){ class GuidemanControllerBusinesstypes extends GuidemanCkControllerBusinesstypes{} }


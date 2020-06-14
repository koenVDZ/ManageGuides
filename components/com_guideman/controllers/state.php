<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	States
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
* Guideman State Controller
*
* @package	Guideman
* @subpackage	State
*/
class GuidemanCkControllerState extends GuidemanClassControllerItem
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'state';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'state';

	/**
	* The URL view list variable.
	*
	* @var string
	*/
	protected $view_list = 'states';

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
			return '';

		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', '', 'CMD');
	}

	/**
	* Function that allows child controller access to model data after the data
	* has been saved.
	*
	* @access	protected
	* @param	JModelLegacy	$model	The data model object.
	* @param	array	$validData	The validated data.
	*
	* @return	void
	*/
	protected function postSaveHook(JModelLegacy $model, $validData = array())
	{
		parent::postSaveHook($model, $validData);
		//Upload file : Flag
		self::updateFileField($model, 'flag', array(
			'extensions' => 'bmp|gif|jpg|jpeg|png'
		));
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanControllerState')){ class GuidemanControllerState extends GuidemanCkControllerState{} }


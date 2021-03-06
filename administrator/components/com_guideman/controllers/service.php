<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Services
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
* Guideman Service Controller
*
* @package	Guideman
* @subpackage	Service
*/
class GuidemanCkControllerService extends GuidemanClassControllerItem
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'service';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'service';

	/**
	* The URL view list variable.
	*
	* @var string
	*/
	protected $view_list = 'services';

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
		$this->registerTask('toggle_private_tour', 'toggle');
		$this->registerTask('toggle_entrance_fees', 'toggle');
		$this->registerTask('toggle_kid_friendly', 'toggle');
		$this->registerTask('toggle_disabled_friendly', 'toggle');
	}

	/**
	* Override method when the author allowed to delete own.
	*
	* @access	protected
	* @param	array	$data	An array of input data.
	* @param	string	$key	The name of the key for the primary key; default is id..
	*
	* @return	boolean	True on success
	*/
	protected function allowDelete($data = array(), $key = id)
	{
		return parent::allowDelete($data, $key, array(
		'key_author' => 'created_by'
		));
	}

	/**
	* Override method when the author allowed to edit own.
	*
	* @access	protected
	* @param	array	$data	An array of input data.
	* @param	string	$key	The name of the key for the primary key; default is id..
	*
	* @return	boolean	True on success
	*/
	protected function allowEdit($data = array(), $key = id)
	{
		return parent::allowEdit($data, $key, array(
		'key_author' => 'created_by'
		));
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
		//Upload file : Image 01
		self::updateFileField($model, 'image_01', array(
			'extensions' => 'gif|jpg|jpeg|png',
			'maxSize' => 2097152
		));

		//Upload file : Image 02
		self::updateFileField($model, 'image_02', array(
			'extensions' => 'gif|jpg|jpeg|png|gif|jpg|jpeg|png',
			'maxSize' => 2
		));

		//Upload file : Image 03
		self::updateFileField($model, 'image_03', array(
			'extensions' => 'gif|jpg|jpeg|png|gif|jpg|jpeg|png|gif|jpg|jpeg|png',
			'maxSize' => 2
		));

		//Upload file : Image 04
		self::updateFileField($model, 'image_04', array(
			'extensions' => 'gif|jpg|jpeg|png|gif|jpg|jpeg|png|gif|jpg|jpeg|png|gif|jpg|jpeg|png'
		));

		//Upload file : Image 05
		self::updateFileField($model, 'image_05', array(
			'extensions' => 'gif|jpg|jpeg|png|gif|jpg|jpeg|png|gif|jpg|jpeg|png|gif|jpg|jpeg|png|gif|jpg|jpeg|png'
		));
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanControllerService')){ class GuidemanControllerService extends GuidemanCkControllerService{} }


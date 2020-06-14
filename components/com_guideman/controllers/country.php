<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Countries
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
* Guideman Country Controller
*
* @package	Guideman
* @subpackage	Country
*/
class GuidemanCkControllerCountry extends GuidemanClassControllerItem
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'country';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'country';

	/**
	* The URL view list variable.
	*
	* @var string
	*/
	protected $view_list = 'countries';

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
		$this->registerTask('toggle_un_member', 'toggle');
	}

	/**
	* Method to add an element.
	*
	* @access	public
	*
	* @return	void
	*/
	public function add()
	{
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		$this->_result = $result = parent::add();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'default.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.country.usrcountrydata'
				), array(
			
				));
				break;

			case 'modal.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.country.usrcountrydata'
				), array(
			
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.country.usrcountrydata'
				));
				break;
		}
	}

	/**
	* Method to cancel an element.
	*
	* @access	public
	* @param	string	$key	The name of the primary key of the URL variable.
	*
	* @return	void
	*/
	public function cancel($key = null)
	{
		$this->_result = $result = parent::cancel();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'usrcountrydata.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.countries.default'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.countries.default'
				));
				break;
		}
	}

	/**
	* Method to delete an element.
	*
	* @access	public
	*
	* @return	void
	*/
	public function delete()
	{
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		$this->_result = $result = parent::delete();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'default.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.countries.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.countries.default'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.countries.default'
				));
				break;
		}
	}

	/**
	* Method to edit an element.
	*
	* @access	public
	* @param	string	$key	The name of the primary key of the URL variable.
	* @param	string	$urlVar	The name of the URL variable if different from the primary key (sometimes required to avoid router collisions).
	*
	* @return	void
	*/
	public function edit($key = null, $urlVar = null)
	{
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		$this->_result = $result = parent::edit();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'countriesdata.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.country.usrcountrydata'
				), array(
			
				));
				break;

			case 'default.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.country.usrcountrydata'
				), array(
			
				));
				break;

			case 'modal.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.country.usrcountrydata'
				), array(
			
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.country.usrcountrydata'
				));
				break;
		}
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
		if ($default === 'edit')
			return 'usrcountrydata';

		if ($default)
			return 'usrcountrydata';

		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', 'usrcountrydata', 'CMD');
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

	/**
	* Method to save an element.
	*
	* @access	public
	* @param	string	$key	The name of the primary key of the URL variable.
	* @param	string	$urlVar	The name of the URL variable if different from the primary key (sometimes required to avoid router collisions).
	*
	* @return	void
	*/
	public function save($key = null, $urlVar = null)
	{
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		//Check the ACLs
		$model = $this->getModel();
		$item = $model->getItem();
		$result = false;
		if ($model->canEdit($item, true))
		{
			$result = parent::save();
			//Get the model through postSaveHook()
			if ($this->model)
			{
				$model = $this->model;
				$item = $model->getItem();	
			}
		}
		else
			JError::raiseWarning( 403, JText::sprintf('ACL_UNAUTORIZED_TASK', JText::_('GUIDEMAN_JTOOLBAR_SAVE')) );

		$this->_result = $result;

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'usrcountrydata.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.countries.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'usrcountrydata.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.country.usrcountrydata'
				), array(
					'cid[]' => null
				));
				break;

			case 'usrcountrydata.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.country.usrcountrydata'
				), array(
					'cid[]' => $model->getState('country.id')
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.countries.default'
				));
				break;
		}
	}

	/**
	* Method to toggle a field value.
	*
	* @access	public
	*
	* @return	void
	*/
	public function toggle()
	{
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		$this->_result = $result = $this->_toggle(array(
			'toggle_un_member' => 'un_member'
		));
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'default.toggle':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.countries.default'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'stay'
				));
				break;
		}
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanControllerCountry')){ class GuidemanControllerCountry extends GuidemanCkControllerCountry{} }


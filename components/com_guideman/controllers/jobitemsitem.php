<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Job Items
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
* Guideman Jobitemsitem Controller
*
* @package	Guideman
* @subpackage	Jobitemsitem
*/
class GuidemanCkControllerJobitemsitem extends GuidemanClassControllerItem
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'jobitemsitem';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'jobitemsitem';

	/**
	* The URL view list variable.
	*
	* @var string
	*/
	protected $view_list = 'jobitems';

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
		$this->registerTask('toggle_optional', 'toggle');
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
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
			
				));
				break;

			case 'modal.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
			
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				));
				break;
		}
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
			case 'jobitemsitem.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'jobview.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'hotel.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'restaurant.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'attraction.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
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
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'jobitemsitem.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'hotel.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'restaurant.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'attraction.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
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
			case 'default.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
			
				));
				break;

			case 'modal.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
			
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
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
			return 'jobitemsitem';

		if ($default)
			return 'jobitemsitem';

		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', 'jobitemsitem', 'CMD');
	}

	/**
	* Method to custom an element.
	*
	* @access	public
	*
	* @return	void
	*/
	public function guide_confirmed()
	{
		// TODO : Write your custom code here





		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'default.guide_confirmed':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
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
			case 'jobitemsitem.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'jobitemsitem.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
					'cid[]' => null
				));
				break;

			case 'jobitemsitem.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
					'cid[]' => $model->getState('jobitemsitem.id')
				));
				break;

			case 'jobview.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'hotel.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'hotel.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
					'cid[]' => null
				));
				break;

			case 'hotel.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
					'cid[]' => $model->getState('jobitemsitem.id')
				));
				break;

			case 'restaurant.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'restaurant.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
					'cid[]' => null
				));
				break;

			case 'restaurant.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
					'cid[]' => $model->getState('jobitemsitem.id')
				));
				break;

			case 'attraction.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'attraction.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
					'cid[]' => null
				));
				break;

			case 'attraction.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
					'cid[]' => $model->getState('jobitemsitem.id')
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
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
			'toggle_optional' => 'optional'
		));
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'default.toggle':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
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
if (!class_exists('GuidemanControllerJobitemsitem')){ class GuidemanControllerJobitemsitem extends GuidemanCkControllerJobitemsitem{} }


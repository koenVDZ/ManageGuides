<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
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
* Guideadm Socialitem Controller
*
* @package	Guideadm
* @subpackage	Socialitem
*/
class GuideadmCkControllerSocialitem extends GuideadmClassControllerItem
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'socialitem';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'socialitem';

	/**
	* The URL view list variable.
	*
	* @var string
	*/
	protected $view_list = 'social';

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
					'com_guideadm.socialitem.socialitem'
				), array(
			
				));
				break;

			case 'modal.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.socialitem.socialitem'
				), array(
			
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.socialitem.socialitem'
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
			case 'socialitem.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.social.default'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.social.default'
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
					'com_guideadm.social.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.social.default'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.social.default'
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
					'com_guideadm.socialitem.socialitem'
				), array(
			
				));
				break;

			case 'modal.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.socialitem.socialitem'
				), array(
			
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.socialitem.socialitem'
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
			return 'socialitem';

		if ($default)
			return 'socialitem';

		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', 'socialitem', 'CMD');
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
			JError::raiseWarning( 403, JText::sprintf('ACL_UNAUTORIZED_TASK', JText::_('GUIDEADM_JTOOLBAR_SAVE')) );

		$this->_result = $result;

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'socialitem.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.social.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'socialitem.apply':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.socialitem.socialitem'
				), array(
					'cid[]' => $model->getState('socialitem.id')
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideadm.social.default'
				));
				break;
		}
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuideadmControllerSocialitem')){ class GuideadmControllerSocialitem extends GuideadmCkControllerSocialitem{} }


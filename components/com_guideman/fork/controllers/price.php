<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.6
* @package		GuideManV2
* @subpackage	Prices
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
* Guideman Price Controller
*
* @package	Guideman
* @subpackage	Price
*/
class GuidemanControllerPrice extends GuidemanCkControllerPrice
{
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
			case 'usrremun.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.remuneration'
				), array(

				));
				break;

			case 'default.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.remuneration'
				), array(

				));
				break;

			case 'useremunbygrouper.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.remuneration'
				), array(

				));
				break;

			case 'usrpricesbygrouper.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.price'
				), array(

				));
				break;

			case 'modal.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.remuneration'
				), array(

				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.price'
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
			case 'remuneration.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.useremunbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'price.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.usrpricesbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'pricecopy.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.usrpricesbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'remunerationcopy.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.useremunbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.default'
				));
				break;
		}
	}

	/**
	* Method to custom an element.
	*
	* @access	public
	*
	* @return	void
	*/
	public function custom($key = null, $urlVar = null)
	{
		// TODO : Write your custom code here
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		$this->_result = $result = parent::edit();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'remuneration.custom':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.remunerationcopy'
				), array(
					'cid[]' => null
				));
				break;

			case 'price.custom':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.pricecopy'
				), array(
					'cid[]' => null
				));
				break;

			case 'useremunbygrouper.custom':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.remunerationcopy'
				), array(
					'cid[]' => null
				));
				break;

			case 'usrpricesbygrouper.custom':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.pricecopy'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.custom':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.pricecopy'
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
			case 'usrremun.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.userpricesbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'default.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.userpricesbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'remuneration.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.userpricesbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'price.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.userpricesbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'useremunbygrouper.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.userpricesbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'usrpricesbygrouper.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.userpricesbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.default'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.default'
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
			case 'usrremun.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.remuneration'
				), array(

				));
				break;

			case 'default.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.remuneration'
				), array(

				));
				break;

			case 'useremunbygrouper.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.remuneration'
				), array(

				));
				break;

			case 'usrpricesbygrouper.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.price'
				), array(

				));
				break;

			case 'modal.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.remuneration'
				), array(

				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.price'
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
			return 'remuneration';

		if ($default)
			return 'price';

		$jinput = JFactory::getApplication()->input;
		return $jinput->get('layout', 'price', 'CMD');
	}

	/**
	* Method to new_period an element.
	*
	* @access	public
	*
	* @return	void
	*/
	public function new_period($key = null, $urlVar = null)
	{
		// TODO : Write your custom code here
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		$this->_result = $result = parent::edit();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'usrremun.new_period':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.remunerationcopy'
				), array(

				));
				break;

			case 'default.new_period':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.pricecopy'
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
	* Method to custom an element.
	*
	* @access	public
	*
	* @return	void
	*/
	public function newvalidityperiod($key = null, $urlVar = null)
	{
	// TODO : Write your custom code here
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		$this->_result = $result = parent::edit();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'default.newvalidityperiod':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.default'
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
			case 'remuneration.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.useremunbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'remuneration.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.useremunbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'remuneration.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.useremunbygrouper'
				), array(
					'cid[]' => $model->getState('price.id')
				));
				break;

			case 'price.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.usrpricesbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'price.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.usrpricesbygrouper'
				), array(
					'cid[]' => null
				));
				break;

			case 'price.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.usrpricesbygrouper'
				), array(
					'cid[]' => $model->getState('price.id')
				));
				break;

			case 'pricecopy.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.usrpricesbygrouper'
				), array(
					'cid[]' => $model->getState('price.id')
				));
				break;

			case 'remunerationcopy.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.price.useremunbygrouper'
				), array(
					'cid[]' => $model->getState('price.id')
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.usrpricesbygrouper'
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
			'toggle_remuneration' => 'remuneration',
			'toggle_coordination_in' => 'coordination_in'
		));
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'usrremun.toggle':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'usrremun.toggle':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'default.toggle':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'usrpricesbygrouper.toggle':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'usrpricesbygrouper.toggle':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.prices.default'
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

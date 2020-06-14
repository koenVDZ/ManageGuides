<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.0
* @package		GuideMan
* @subpackage	Contacts
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
* Guideman Contact Controller
*
* @package	Guideman
* @subpackage	Contact
*/
class GuidemanControllerContact extends GuidemanCkControllerContact
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
			case 'companies.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contact.company'
				), array(
			
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contact.contact'
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
			case 'contact.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contacts.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'company.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contacts.companies'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contacts.default'
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
			case 'company.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contacts.companies'
				), array(
					'cid[]' => null
				));
				break;

			case 'companies.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contacts.companies'
				), array(
					'cid[]' => null
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contacts.default'
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
					'com_guideman.contact.contact'
				), array(
			
				));
				break;

			case 'companies.edit':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contact.company'
				), array(
			
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contact.contact'
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
			case 'contact.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contacts.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'company.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contacts.companies'
				), array(
					'cid[]' => null
				));
				break;

			case 'company.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contact.company'
				), array(
					'cid[]' => null
				));
				break;

			case 'company.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contact.company'
				), array(
					'cid[]' => $model->getState('contact.id')
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contacts.default'
				));
				break;
		}
	}

}



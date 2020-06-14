<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.2   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.7.0
* @package		GuideMan
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
class GuidemanControllerJobitemsitem extends GuidemanCkControllerJobitemsitem
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
    $item = $model->getItem();
		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'hotel.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.hotel'
        ), array(
          'filter_job_id' => $item->job_id
				));
				break;

      case 'restaurant.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.restaurant'
        ), array(
          'filter_job_id' => $item->job_id
				));
				break;

      case 'attraction.add':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.attraction'
        ), array(
          'filter_job_id' => $item->job_id
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
        ), array(
          'filter_job_id' => $item->job_id
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

    $item = $model->getItem();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'jobitemsitem.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'jobview.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
          'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'hotel.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
          'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'restaurant.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
          'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'attraction.cancel':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
          'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
        ), array(
          'cid[]' => null,
          'filter_job_id' => $item->job_id
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
    $item = $model->getItem();
		//Define the redirections
		if (($this->getLayout() .'.'. $this->getTask()) == 'default.edit') {
      switch($item->type) {
        case "0":
          $this->applyRedirection($result, array(
            'stay',
            'com_guideman.jobitemsitem.jobitemsitem'
          ), array(

          ));
          break;
        case "1":
          $this->applyRedirection($result, array(
            'stay',
            'com_guideman.jobitemsitem.hotel'
          ), array(

          ));
          break;
        case "2":
          $this->applyRedirection($result, array(
            'stay',
            'com_guideman.jobitemsitem.restaurant'
          ), array(

          ));
          break;
        case "3":
          $this->applyRedirection($result, array(
            'stay',
            'com_guideman.jobitemsitem.attraction'
          ), array(

          ));
          break;
        default:
          $this->applyRedirection($result, array(
            'stay',
            'com_guideman.jobitemsitem.jobitemsitem'
          ), array(

          ));
          break;
        };
    }
		else {
			$this->applyRedirection($result, array(
				'stay',
				'com_guideman.jobitemsitem.jobitemsitem'
			));
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
    $item = $model->getItem();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'default.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
        ), array(
          'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'jobitemsitem.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
        ), array(
          'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'hotel.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
        ), array(
          'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'restaurant.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
        ), array(
          'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'attraction.delete':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
        ), array(
          'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
        ), array(
          'filter_job_id' => $item->job_id
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
					'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'jobitemsitem.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
					'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'jobitemsitem.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.jobitemsitem'
				), array(
					'cid[]' => $model->getState('jobitemsitem.id'),
          'filter_job_id' => $item->job_id
				));
				break;

			case 'jobview.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'hotel.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'hotel.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.hotel'
				), array(
					'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'hotel.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.hotel'
				), array(
					'cid[]' => $model->getState('jobitemsitem.id'),
          'filter_job_id' => $item->job_id
				));
				break;

			case 'restaurant.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'restaurant.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.restaurant'
				), array(
					'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'restaurant.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.restaurant'
				), array(
					'cid[]' => $model->getState('jobitemsitem.id'),
          'filter_job_id' => $item->job_id
				));
				break;

			case 'attraction.save':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'attraction.save2new':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.attraction'
				), array(
					'cid[]' => null,
          'filter_job_id' => $item->job_id
				));
				break;

			case 'attraction.save2copy':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitemsitem.restaurant'
				), array(
					'cid[]' => $model->getState('jobitemsitem.id'),
          'filter_job_id' => $item->job_id
				));
				break;

			default:
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
        ), array(
          'filter_job_id' => $item->job_id
				));
				break;
		}
	}

}

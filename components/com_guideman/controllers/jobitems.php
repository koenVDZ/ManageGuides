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
* Guideman Jobitems Controller
*
* @package	Guideman
* @subpackage	Jobitems
*/
class GuidemanCkControllerJobitems extends GuidemanClassControllerList
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'jobitems';

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

	/**
	* Method to publish an element.
	*
	* @access	public
	*
	* @return	void
	*/
	public function publish()
	{
		JSession::checkToken() or JSession::checkToken('get') or jexit(JText::_('JINVALID_TOKEN'));
		$this->_result = $result = parent::publish();
		$model = $this->getModel();

		//Define the redirections
		switch($this->getLayout() .'.'. $this->getTask())
		{
			case 'default.unpublish':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'default.publish':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'default.trash':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'default.archive':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'jobitemsitem.trash':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'jobitemsitem.archive':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'hotel.trash':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'hotel.archive':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'restaurant.trash':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'restaurant.archive':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'attraction.trash':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'attraction.archive':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.unpublish':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.publish':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.trash':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.jobitems.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.archive':
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
if (!class_exists('GuidemanControllerJobitems')){ class GuidemanControllerJobitems extends GuidemanCkControllerJobitems{} }


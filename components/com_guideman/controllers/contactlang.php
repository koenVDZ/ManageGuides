<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	ContactLang
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
* Guideman Contactlang Controller
*
* @package	Guideman
* @subpackage	Contactlang
*/
class GuidemanCkControllerContactlang extends GuidemanClassControllerList
{
	/**
	* The context for storing internal data, e.g. record.
	*
	* @var string
	*/
	protected $context = 'contactlang';

	/**
	* The URL view item variable.
	*
	* @var string
	*/
	protected $view_item = 'contactlangitem';

	/**
	* The URL view list variable.
	*
	* @var string
	*/
	protected $view_list = 'contactlang';

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
			case 'default.publish':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'default.unpublish':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'default.trash':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'default.archive':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'contactlangitem.publish':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'contactlangitem.unpublish':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'contactlangitem.trash':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'contactlangitem.archive':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.publish':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.unpublish':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.trash':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
				), array(
					'cid[]' => null
				));
				break;

			case 'modal.archive':
				$this->applyRedirection($result, array(
					'stay',
					'com_guideman.contactlang.default'
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
if (!class_exists('GuidemanControllerContactlang')){ class GuidemanControllerContactlang extends GuidemanCkControllerContactlang{} }


<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
* @subpackage	Users
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

if (!class_exists('GuideadmClassFormField'))
	require_once(JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR. 'components' .DIRECTORY_SEPARATOR. 'com_guideadm' .DIRECTORY_SEPARATOR. 'helpers' .DIRECTORY_SEPARATOR. 'loader.php');


/**
* Form field for Guideadm.
*
* @package	Guideadm
* @subpackage	Form
*/
class GuideadmCkJFormFieldModal_Thirduser extends GuideadmClassFormFieldModal
{
	/**
	* Default label for the picker.
	*
	* @var string
	*/
	protected $_nullLabel = 'GUIDEADM_DATA_PICKER_SELECT_USER';

	/**
	* Option in URL
	*
	* @var string
	*/
	protected $_option = 'com_guideadm';

	/**
	* Modal Title
	*
	* @var string
	*/
	protected $_title;

	/**
	* View in URL
	*
	* @var string
	*/
	protected $_view = "thirdusers";

	/**
	* Field type
	*
	* @var string
	*/
	protected $type = 'modal_thirduser';

	/**
	* Method to get the field input markup.
	*
	* @access	protected
	*
	*
	* @since	11.1
	*
	* @return	string	The field input markup.
	*/
	protected function getInput()
	{
		if ($this->value == 'auto')
			$this->_title = JText::_('GUIDEADM_AUTO');
		else
		{
			$db	= JFactory::getDBO();
			$db->setQuery(
				'SELECT `name`' .
				' FROM #__users' .
				' WHERE id = '.(int) $this->value
			);
			$this->_title = $db->loadResult();
	
			if ($error = $db->getErrorMsg()) {
				JError::raiseWarning(500, $error);
			}
		}

		return parent::getInput();
	}

	/**
	* Method to extend the buttons in the picker.
	*
	* @access	protected
	*
	*
	* @since	Cook 2.5.8
	*
	* @return	array	An array of tasks
	*/
	protected function getTasks()
	{
		$labelAuto = JText::_('GUIDEADM_AUTO');
		$scriptAuto = "document.id('" . $this->id . "_id').value = 'auto';";
		$scriptAuto .= "document.id('" . $this->id . "_name').value = '" . htmlspecialchars($labelAuto, ENT_QUOTES, 'UTF-8') . "';";
		
		return array(
			'auto' => array(
				'label' => 'GUIDEADM_AUTO',
				'icon' => 'user',
				'jsCommand' => $scriptAuto,
				'description' => 'GUIDEADM_AUTOSELECT_CURRENT_USER'
			)

		);
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormFieldModal_Thirduser')){ class JFormFieldModal_Thirduser extends GuideadmCkJFormFieldModal_Thirduser{} }

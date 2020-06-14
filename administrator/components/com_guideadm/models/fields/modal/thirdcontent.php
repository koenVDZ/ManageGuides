<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.8.6
* @package		GuideAdm
* @subpackage	Contents
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
class GuideadmCkJFormFieldModal_Thirdcontent extends GuideadmClassFormFieldModal
{
	/**
	* Default label for the picker.
	*
	* @var string
	*/
	protected $_nullLabel = 'GUIDEADM_DATA_PICKER_SELECT_CONTENT';

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
	protected $_view = "thirdcontents";

	/**
	* Field type
	*
	* @var string
	*/
	protected $type = 'modal_thirdcontent';

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
		$db	= JFactory::getDBO();
		$db->setQuery(
			'SELECT `title`' .
			' FROM #__contents' .
			' WHERE id = '.(int) $this->value
		);
		$this->_title = $db->loadResult();

		if ($error = $db->getErrorMsg()) {
			JError::raiseWarning(500, $error);
		}


		return parent::getInput();
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormFieldModal_Thirdcontent')){ class JFormFieldModal_Thirdcontent extends GuideadmCkJFormFieldModal_Thirdcontent{} }

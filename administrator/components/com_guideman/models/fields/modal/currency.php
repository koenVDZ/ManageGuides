<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.0.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.0.1
* @package		GuideMan
* @subpackage	Currencies
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

if (!class_exists('GuidemanClassFormField'))
	require_once(JPATH_ADMINISTRATOR . DIRECTORY_SEPARATOR. 'components' .DIRECTORY_SEPARATOR. 'com_guideman' .DIRECTORY_SEPARATOR. 'helpers' .DIRECTORY_SEPARATOR. 'loader.php');


/**
* Form field for Guideman.
*
* @package	Guideman
* @subpackage	Form
*/
class GuidemanCkJFormFieldModal_Currency extends GuidemanClassFormFieldModal
{
	/**
	* Default label for the picker.
	*
	* @var string
	*/
	protected $_nullLabel = 'GUIDEMAN_DATA_PICKER_SELECT_CURRENCY';

	/**
	* Option in URL
	*
	* @var string
	*/
	protected $_option = 'com_guideman';

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
	protected $_view = "currencies";

	/**
	* Field type
	*
	* @var string
	*/
	protected $type = 'modal_currency';

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
			'SELECT `currency_id`' .
			' FROM #__guideman_currencies' .
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
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormFieldModal_Currency')){ class JFormFieldModal_Currency extends GuidemanCkJFormFieldModal_Currency{} }

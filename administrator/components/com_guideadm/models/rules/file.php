<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
* @package		GuideAdmV2
* @subpackage	GuideAdmV2
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
* Form validator rule for Guideadm.
*
* @package	Guideadm
* @subpackage	Form
*/
class GuideadmCkFormRuleFile extends GuideadmClassFormRule
{
	/**
	* Indicates that this class contains special methods (ie: get()).
	*
	* @var boolean
	*/
	public $extended = true;

	/**
	* Unique name for this rule.
	*
	* @var string
	*/
	protected $handler = 'file';

	/**
	* Use this function to customize your own javascript rule.
	* $this->regex must be null if you want to customize here.
	*
	* @access	public
	* @param	JFormField	$field	The form field object.
	*
	* @return	string	A JSON string representing the javascript rules validation.
	*/
	public function getJsonRule($field)
	{
		$regex = '';
		$allowedExtensionsText = '*.*';
		if ($allowedExtensions = $field->getAttribute('allowedExtensions'))
		{
			$allowedExtensionsText = preg_replace("/\|/", "<br/>", $allowedExtensions);
			//Remove eventual '*.'
			$allowedExtensions = preg_replace("/\*\./", "", $allowedExtensions);

			$regex = '\.(' . $allowedExtensions . ')$';
		}

		$values = array(
			"#regex" => 'new RegExp("' . $regex . '", \'i\')'
		);

		if ($msgIncorrect = $field->getAttribute('msg-incorrect'))
			$values["alertText"] = LI_PREFIX . JText::_($msgIncorrect);
		else
			$values["alertText"] = LI_PREFIX . JText::sprintf('GUIDEADM_ERROR_ALLOWED_FILES', $allowedExtensionsText);

		$json = GuideadmHelperHtmlValidator::jsonFromArray($values);
		return "{" . LN . $json . LN . "}";
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormRuleFile')){ class JFormRuleFile extends GuideadmCkFormRuleFile{} }


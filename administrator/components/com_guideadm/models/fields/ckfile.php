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

if (!class_exists('GuideadmHelper'))
	require_once(JPATH_ADMINISTRATOR . '/components/com_guideadm/helpers/loader.php');


/**
* Form field for Guideadm.
*
* @package	Guideadm
* @subpackage	Form
*/
class GuideadmCkFormFieldCkfile extends GuideadmClassFormField
{
	/**
	* The form field type.
	*
	* @var string
	*/
	public $type = 'ckfile';

	/**
	* Method to get the field input markup.
	*
	* @access	public
	*
	*
	* @since	11.1
	*
	* @return	string	The field input markup.
	*/
	public function getInput()
	{

		$this->input = JDom::_('html.form.input.file', array_merge(array(
				'dataKey' => $this->getOption('name'),
				'domClass' => $this->getOption('class'),
				'domId' => $this->id,
				'domName' => $this->name,
				'actions' => $this->getOption('actions'),
				'dataValue' => $this->value,
				'formControl' => $this->formControl,
				'height' => $this->getOption('height'),
				'indirect' => $this->getOption('indirect', null, 'bool'),
				'prefix' => $this->getOption('prefix'),
				'responsive' => $this->getOption('responsive'),
				'root' => $this->getOption('root'),
				'ruleInstance' => $this->getOption('ruleInstance'),
				'suffix' => $this->getOption('suffix'),
				'title' => $this->getOption('title'),
				'view' => $this->getOption('view'),
				'width' => $this->getOption('width')
			), $this->jdomOptions));

		return parent::getInput();
	}


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormFieldCkfile')){ class JFormFieldCkfile extends GuideadmCkFormFieldCkfile{} }


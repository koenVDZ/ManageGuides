<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	GuideManV2
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

if (!class_exists('GuidemanHelper'))
	require_once(JPATH_ADMINISTRATOR . '/components/com_guideman/helpers/loader.php');


/**
* Form field for Guideman.
*
* @package	Guideman
* @subpackage	Form
*/
class GuidemanCkFormFieldCkcalendar extends GuidemanClassFormField
{
	/**
	* The form field type.
	*
	* @var string
	*/
	public $type = 'ckcalendar';

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

		$this->input = JDom::_('html.form.input.calendar', array_merge(array(
				'dataKey' => $this->getOption('name'),
				'domClass' => $this->getOption('class'),
				'domId' => $this->id,
				'domName' => $this->name,
				'dataValue' => $this->value,
				'dateFormat' => $this->getOption('format'),
				'filter' => $this->getOption('filter'),
				'placeholder' => $this->getOption('placeholder'),
				'prefix' => $this->getOption('prefix'),
				'responsive' => $this->getOption('responsive'),
				'size' => $this->getOption('size'),
				'submitEventName' => ($this->getOption('submit') == 'true'?'onchange':null),
				'suffix' => $this->getOption('suffix'),
				'timezone' => $this->getOption('filter')
			), $this->jdomOptions));

		return parent::getInput();
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormFieldCkcalendar')){ class JFormFieldCkcalendar extends GuidemanCkFormFieldCkcalendar{} }


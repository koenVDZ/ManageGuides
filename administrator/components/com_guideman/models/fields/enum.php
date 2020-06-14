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

JFormHelper::loadFieldClass('groupedlist');

/**
* Form field for Guideman.
*
* @package	Guideman
* @subpackage	Form
*/
class GuidemanCkFormFieldEnum extends JFormFieldGroupedList
{
	/**
	* Items cache.
	*
	* @var string
	*/
	protected static $_items;

	/**
	* Extension name.
	*
	* @var string
	*/
	protected static $extension = 'guideman';

	/**
	* The form field type.
	*
	* @var string
	*/
	public $type = 'enum';

	/**
	* Method to get the groups for the grouped list.
	*
	* @access	protected
	*
	* @return	array	The grouped options.
	*/
	protected function getGroups()
	{
		$listKey = $this->getAttribute('listKey', $this->listKey);
		if (!$listKey)
			$listKey = 'value';

		$labelKey = $this->getAttribute('labelKey', $this->labelKey);
		if (!$labelKey)
			$labelKey = 'text';

		$items = $this->getItems();

		$groups = array();

		// Add the placeholder
		$nullLabel = $this->getAttribute('nullLabel');
		if ($nullLabel)
			$groups[null][''] = JText::_($nullLabel);


		if (!empty($items))
		foreach($items as $item)
		{
			// Convert to object
			$item = JArrayHelper::toObject($item);

			if (isset($item->$listKey) && isset($item->$labelKey))
				$groups[null][$item->$listKey] = $item->$labelKey;
		}

		reset($groups);
		return $groups;
	}

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
		self::$_items = null;

		$submit = $this->getAttribute('submit');
		if (in_array($submit, array(true, 'true')))
		{
			$this->onchange = 'this.form.submit();';
		}

		return parent::getInput();
	}

	/**
	* Method to get the items from a model.
	*
	* @access	protected
	*
	* @return	array	The items list.
	*/
	protected function getItems()
	{
		if (!self::$_items)
		{
			$enumName = $this->getAttribute('enum');
			self::$_items = GuidemanHelperEnum::_($enumName);
		}

		return self::$_items;
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormFieldEnum')){ class JFormFieldEnum extends GuidemanCkFormFieldEnum{} }


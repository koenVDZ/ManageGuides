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



/**
* Form validator rule for Guideman.
*
* @package	Guideman
* @subpackage	Form
*/
class GuidemanCkFormRuleDecimal2 extends GuidemanClassFormRule
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
	protected $handler = 'decimal2';

	/**
	* The regular expression to use in testing a form field value.
	*
	* @var string
	*/
	protected $regex = '^\d{0,8}(.\d{0,2})?$';


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormRuleDecimal2')){ class JFormRuleDecimal2 extends GuidemanCkFormRuleDecimal2{} }


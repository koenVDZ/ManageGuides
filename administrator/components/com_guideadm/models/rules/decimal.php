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
class GuideadmCkFormRuleDecimal extends GuideadmClassFormRule
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
	protected $handler = 'decimal';

	/**
	* The regular expression to use in testing a form field value.
	*
	* @var string
	*/
	protected $regex = '^-?\d*\.?\d*$';


}

// Load the fork
GuideadmHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('JFormRuleDecimal')){ class JFormRuleDecimal extends GuideadmCkFormRuleDecimal{} }


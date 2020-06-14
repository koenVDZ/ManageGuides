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


// Some usefull constants
if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);
if(!defined('BR')) define("BR", "<br />");
if(!defined('LN')) define("LN", "\n");

// Main component aliases
if (!defined('COM_GUIDEADM')) define('COM_GUIDEADM', 'com_guideadm');
if (!defined('GUIDEADM_CLASS')) define('GUIDEADM_CLASS', 'Guideadm');

// Component paths constants
if (!defined('JPATH_ADMIN_GUIDEADM')) define('JPATH_ADMIN_GUIDEADM', JPATH_ADMINISTRATOR . '/components/' . COM_GUIDEADM);
if (!defined('JPATH_SITE_GUIDEADM')) define('JPATH_SITE_GUIDEADM', JPATH_SITE . '/components/' . COM_GUIDEADM);

$app = JFactory::getApplication();

// This constant is used for replacing JPATH_COMPONENT, in order to share code between components.
if (!defined('JPATH_GUIDEADM')) define('JPATH_GUIDEADM', ($app->isSite()?JPATH_SITE_GUIDEADM:JPATH_ADMIN_GUIDEADM));

// Load the component Dependencies
require_once(dirname(__FILE__) . '/helper.php');


jimport('joomla.version');
$version = new JVersion();

if (version_compare($version->RELEASE, '3.0', '<'))
	throw new JException('Joomla! 3.x is required.');

// Proxy alias class : CONTROLLER
if (!class_exists('CkJController')){ 	jimport('legacy.controller.legacy'); 	class CkJController extends JControllerLegacy{}}

// Proxy alias class : MODEL
if (!class_exists('CkJModel')){			jimport('legacy.model.legacy');			class CkJModel extends JModelLegacy{}}

// Proxy alias class : VIEW
if (!class_exists('CkJView')){	if (!class_exists('JViewLegacy', false))	jimport('legacy.view.legacy'); class CkJView extends JViewLegacy{}}

require_once(dirname(__FILE__) . '/../classes/loader.php');

GuideadmClassLoader::setup(false, false);
GuideadmClassLoader::discover('Guideadm', JPATH_ADMIN_GUIDEADM, false, true);

// Some helpers
GuideadmClassLoader::register('JToolBarHelper', JPATH_ADMINISTRATOR ."/includes/toolbar.php", true);

CkJController::addModelPath(JPATH_GUIDEADM . '/models', 'GuideadmModel');

//Instance JDom
if (!isset($app->dom))
{
	jimport('jdom.dom');
	if (!class_exists('JDom'))
		jexit('JDom plugin is required');

	JDom::getInstance();	
}


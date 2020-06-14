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


// Some usefull constants
if(!defined('DS')) define('DS',DIRECTORY_SEPARATOR);
if(!defined('BR')) define("BR", "<br />");
if(!defined('LN')) define("LN", "\n");

// Main component aliases
if (!defined('COM_GUIDEMAN')) define('COM_GUIDEMAN', 'com_guideman');
if (!defined('GUIDEMAN_CLASS')) define('GUIDEMAN_CLASS', 'Guideman');

// Component paths constants
if (!defined('JPATH_ADMIN_GUIDEMAN')) define('JPATH_ADMIN_GUIDEMAN', JPATH_ADMINISTRATOR . '/components/' . COM_GUIDEMAN);
if (!defined('JPATH_SITE_GUIDEMAN')) define('JPATH_SITE_GUIDEMAN', JPATH_SITE . '/components/' . COM_GUIDEMAN);

$app = JFactory::getApplication();

// This constant is used for replacing JPATH_COMPONENT, in order to share code between components.
if (!defined('JPATH_GUIDEMAN')) define('JPATH_GUIDEMAN', ($app->isSite()?JPATH_SITE_GUIDEMAN:JPATH_ADMIN_GUIDEMAN));

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

GuidemanClassLoader::setup(false, false);
GuidemanClassLoader::discover('Guideman', JPATH_ADMIN_GUIDEMAN, false, true);

// Some helpers
GuidemanClassLoader::register('JToolBarHelper', JPATH_ADMINISTRATOR ."/includes/toolbar.php", true);

CkJController::addModelPath(JPATH_GUIDEMAN . '/models', 'GuidemanModel');

//Instance JDom
if (!isset($app->dom))
{
	jimport('jdom.dom');
	if (!class_exists('JDom'))
		jexit('JDom plugin is required');

	JDom::getInstance();	
}


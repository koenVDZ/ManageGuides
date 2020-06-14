<?php
/**
 * @package     ManageGuides
 * @subpackage  mod_navigate_profile
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
require_once dirname(__FILE__) . '/helper.php';

require JModuleHelper::getLayoutPath('mod_navigate_profile');

// If you want to integrate with another component, you might want to load the language files
$lang = JFactory::getLanguage();
$lang->load('com_guideman');
$lang_tag = $lang->getTag();

<?php
/*************************************************************************************
* @version		1.6.9
* @package		GuideMan
* @subpackage	GuideMan
* @copyright	ManageGuides.com
* @author			Koenraad Vandezande - www.manageguides.com - koen@rioguides.com
* @license		GNU
**************************************************************************************/

// no direct access
defined('_JEXEC') or die('Restricted access');

/**
* Helper Static Class
*
* @package	Guideman
* @subpackage	Filehelp
*/
class GuidemanCkHelperFilehelp
{

	// ______________________________________________________________________________
	//	GetPrices - Look up the Contact details in __guideman_prices
	//		$id = key to read_exif_data
	//		$prices_array = Associative array of the Job record
	// ______________________________________________________________________________
	static function GetPrices($id)
	{
		if ($id) {
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('*');
			$query->from($db->quoteName('#__guideman_prices'));
			$query->where($db->quoteName('id')." = ".$id);
			$db->setQuery($query);
			$prices_array = $db->loadAssoc();
		} else {
			$prices_array = array('id' => '');
		}
		return $prices_array;
	}

	// ______________________________________________________________________________
	//	GetService - Look up the Contact details in __guideman_services
	//		$id = key to read_exif_data
	//		$service_array = Associative array of the Job record
	// ______________________________________________________________________________
	static function GetService($id)
	{
		if ($id) {
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('*');
			$query->from($db->quoteName('#__guideman_services'));
			$query->where($db->quoteName('id')." = ".$id);
			$db->setQuery($query);
			$service_array = $db->loadAssoc();
		} else {
			$service_array = array('id' => '');
		}
		return $service_array;
	}

	// ______________________________________________________________________________
	//	GetJob - Look up the Contact details in __guideman_jobs
	//		$id = key to read_exif_data
	//		$jobs_array = Associative array of the Job record
	// ______________________________________________________________________________
	static function GetJob($id)
	{
		if ($id) {
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('*');
			$query->from($db->quoteName('#__guideman_jobs'));
			$query->where($db->quoteName('id')." = ".$id);
			$db->setQuery($query);
			$jobs_array = $db->loadAssoc();
		} else {
			$jobs_array = array('id' => '');
		}
		return $jobs_array;
	}

	// ______________________________________________________________________________
	//	GetContact - Look up the Contact details in Guideman_Contacts
	//		$id = key to read_exif_data
	//		$contact_array = Associative array of the Country record
	// ______________________________________________________________________________
	static function GetContact($id)
	{
		if ($id) {
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('*');
			$query->from($db->quoteName('#__guideman_contacts'));
			$query->where($db->quoteName('id')." = ".$id);
			$db->setQuery($query);
			$contact = $db->loadAssoc();
		} else {
			$contact = array('id' => '' , 'name' => '', 'surname' => '', 'alias' => '', 'nationality' => '');
		}
		return $contact;
	}

	// ______________________________________________________________________________
	//	GetState - Look up the State details in __guideman_states
	//		$id = key to read_exif_data
	//		$state_array = Associative array of the State record
	// ______________________________________________________________________________
	static function GetState($id)
	{
		if ($id) {
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('*');
			$query->from($db->quoteName('#__guideman_states'));
			$query->where($db->quoteName('id')." = ".$id);
			$db->setQuery($query);
			$state_array = $db->loadAssoc();
		} else {
			$state_array = array('id' => '');
		}
		return $state_array;
	}

	// ______________________________________________________________________________
	//	GetCountry - Look up the Country details in Guideman_Country
	//		$id = key to read_exif_data
	//		$country_array = Associative array of the Country record
	// ______________________________________________________________________________
	static function GetCountry($id)
	{
		if ($id) {
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('*');
			$query->from($db->quoteName('#__guideman_countries'));
			$query->where($db->quoteName('id')." = ".$id);
			$db->setQuery($query);
			$country_array = $db->loadAssoc();
		} else {
			$country_array = array('id' => '' , 'iso_2' => '', 'country_name' => '', 'long_name' => '', 'flag' => '', 'iso_3' => '', 'un_member' => '', 'numeric_code' => '', 'calling_code' => '', 'cctld' => '', 'population' => '', 'total_area' => '', 'land_area' => '', 'water_area' => '', 'language' => '', 'ordering' => '', 'published' => '');
		}
		return $country_array;
	}

	// ______________________________________________________________________________
	//	GetLanguage - Look up the Contact details in __guideman_languages
	//		$id = key to read_exif_data
	//		$language = Associative array of the Country record
	// ______________________________________________________________________________
	static function GetLanguage($id)
	{
		if ($id) {
			$db = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('*');
			$query->from($db->quoteName('#__guideman_languages'));
			$query->where($db->quoteName('id')." = ".$id);
			$db->setQuery($query);
			$language_array = $db->loadAssoc();
		} else {
			$language_array = array('id' => '' , 'name' => 'Not Defined', 'short_name' => '', 'flag' => '', 'language' => '', 'published' => '', 'ordering' => '');
		}
		return $language_array;
	}

	// ______________________________________________________________________________
	//	GetFlag - Look up the iso_2 value in Countries
	//		$id = key to contact file
	//		$flag = iso-2 code lowercase
	// ______________________________________________________________________________
	static function GetFlag($id)
	{
		if ($id) {
			$cont = GuidemanHelperFilehelp::GetContact($id);
			$nat = GuidemanHelperFilehelp::GetCountry($cont['nationality']);
			$flag = strtolower($nat['iso_2']);

		} else {
			$flag = '';
		}
		return $flag;
	}

	// ______________________________________________________________________________
	//	Check Users Preferred Language
	//		$LangSelect = Key for language file
	// ______________________________________________________________________________
	static function GetUserLang()
	{
		switch (JFactory::getUser()->getparam('language', 'the default')) {
			case "en-GB":
				$LangSelect = (int) 1;
				break;
			case "fr-FR":
				$LangSelect = (int) 3;
				break;
			case "nl-NL":
				$LangSelect = (int) 2;
				break;
			case "pt-BR":
				$LangSelect = (int) 4;
				break;
			case "es-ES":
				$LangSelect = (int) 5;
				break;
			default:
				$LangSelect = (int) 0;
				break;
		}
		return $LangSelect;
	}
	// ______________________________________________________________________________
	//	Decide Background color for lists depending on STATE
	//		$LangSelect = Key for language file
	// ______________________________________________________________________________
	static function GetBackGroundColor($PublishState)
	{
		$StateColorArray = array( "status" => "", "button" => "");
		switch ($PublishState) {
		case 0:
			$StateColorArray = array( "status" => "error", "button" => "danger");
			break;
		case 1:
			$StateColorArray = array( "status" => "success", "button" => "success");
			break;
		case -1:
			$StateColorArray = array( "status" => "warning", "button" => "warning");
			break;
		case -2:
			$StateColorArray = array( "status" => "info", "button" => "info");
			break;
		default:
			$StateColorArray = array( "status" => "", "button" => "");
		}
	return $StateColorArray;
	}
}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanHelperFilehelp')){ class GuidemanHelperFilehelp extends GuidemanCkHelperFilehelp{} }

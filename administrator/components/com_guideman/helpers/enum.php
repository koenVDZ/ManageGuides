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
* Enumerations Helper. Create the static lists.
*
* @package	Guideman
*/
class GuidemanCkHelperEnum
{
	/**
	* Stores the lists in cache for optimization.
	*
	* @var array
	*/
	protected static $_cache = array();

	/**
	* Instanced name.
	*
	* @var string
	*/
	protected $enumName;

	/**
	* Instanced list.
	*
	* @var array
	*/
	public $list = array();

	/**
	* Instanced optional options.
	*
	* @var array
	*/
	protected $options = array();

	/**
	* Entry function to load a list.
	*
	* @access	public static
	* @param	string	$enumName	Name of the enumeration : [triad]_[field]
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	public static function _($enumName, $options = array())
	{
		$enumeration = self::getInstance($enumName);

		// Enumeration not found
		if (!$enumeration)
			return array();

		return $enumeration->getList($options);
	}

	/**
	* Construct the list : accounts_account_type
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___accounts_account_type($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_ACCOUNTS_ACCOUNT_TYPE_CHECKING_ACCOUNT'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_ACCOUNTS_ACCOUNT_TYPE_SAVINGS_ACCOUNT'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_ACCOUNTS_ACCOUNT_TYPE_MONEY_MARKET_ACCOUNT'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_ACCOUNTS_ACCOUNT_TYPE_CERTIFICATS_OF_DEPOSIT_CDS'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_ACCOUNTS_ACCOUNT_TYPE_NOFRILLS_ACCOUNT'
			)
		);
	}

	/**
	* Construct the list : contactlang_prof_level
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___contactlang_prof_level($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_CONTACTLANG_PROF_LEVEL_NO_PROFICIENCY'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_CONTACTLANG_PROF_LEVEL_ELEMENTARY_PROFICIENCY'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_CONTACTLANG_PROF_LEVEL_LIMITED_WORKING_PROFICIENCY'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_CONTACTLANG_PROF_LEVEL_PROFESSIONAL_WORKING_PROFICIENCY'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_CONTACTLANG_PROF_LEVEL_FULL_PROFESSIONAL_PROFICIENCY'
			),
			array(
				'value' => '5',
				'text' => 'GUIDEMAN_ENUM_CONTACTLANG_PROF_LEVEL_NATIVE_OR_BILINGUAL_PROFICIENCY'
			)
		);
	}

	/**
	* Construct the list : contacts_gender
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___contacts_gender($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_CONTACTS_GENDER_GENDERLESS'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_CONTACTS_GENDER_MALE'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_CONTACTS_GENDER_FEMALE'
			)
		);
	}

	/**
	* Construct the list : countries_continent
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___countries_continent($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_COUNTRIES_CONTINENT_AFRICA'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_COUNTRIES_CONTINENT_ANTARCTICA'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_COUNTRIES_CONTINENT_ASIA'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_COUNTRIES_CONTINENT_EUROPA'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_COUNTRIES_CONTINENT_NORTH_AMERICA'
			),
			array(
				'value' => '5',
				'text' => 'GUIDEMAN_ENUM_COUNTRIES_CONTINENT_OCEANIA'
			),
			array(
				'value' => '6',
				'text' => 'GUIDEMAN_ENUM_COUNTRIES_CONTINENT_SOUTH_AMERICA'
			)
		);
	}

	/**
	* Construct the list : jobitems_guide_status
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___jobitems_guide_status($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_GUIDE_STATUS_UNSOLICITED'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_GUIDE_STATUS_REQUESTED'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_GUIDE_STATUS_CONFIRMED'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_GUIDE_STATUS_DENIED'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_GUIDE_STATUS_CANCELED'
			)
		);
	}

	/**
	* Construct the list : jobitems_item_status
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___jobitems_item_status($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_ITEM_STATUS_PROPOSAL'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_ITEM_STATUS_CONFIRMED'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_ITEM_STATUS_CANCELED'
			)
		);
	}

	/**
	* Construct the list : jobitems_service_provider_status
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___jobitems_service_provider_status($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_SERVICE_PROVIDER_STATUS_UNSOLICITED'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_SERVICE_PROVIDER_STATUS_REQUESTED'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_SERVICE_PROVIDER_STATUS_CONFIRMED'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_SERVICE_PROVIDER_STATUS_DENIED'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_SERVICE_PROVIDER_STATUS_CANCELED'
			)
		);
	}

	/**
	* Construct the list : jobitems_transport_status
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___jobitems_transport_status($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TRANSPORT_STATUS_UNSOLICITED'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TRANSPORT_STATUS_REQUESTED'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TRANSPORT_STATUS_CONFIRMED'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TRANSPORT_STATUS_DENIED'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TRANSPORT_STATUS_CANCELED'
			)
		);
	}

	/**
	* Construct the list : jobitems_type
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___jobitems_type($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TYPE_SERVICE'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TYPE_ACCOMODATIONS'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TYPE_RESTAURANT'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TYPE_ATTRACTION'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TYPE_FLIGHT'
			),
			array(
				'value' => '5',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TYPE_CRUISE_SHIP'
			),
			array(
				'value' => '6',
				'text' => 'GUIDEMAN_ENUM_JOBITEMS_TYPE_TRAIN'
			)
		);
	}

	/**
	* Construct the list : jobs_guide_status
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___jobs_guide_status($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_JOBS_GUIDE_STATUS_UNSOLICITED'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_JOBS_GUIDE_STATUS_REQUESTED'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_JOBS_GUIDE_STATUS_CONFIRMED'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_JOBS_GUIDE_STATUS_DENIED'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_JOBS_GUIDE_STATUS_CANCELED'
			)
		);
	}

	/**
	* Construct the list : jobs_status
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___jobs_status($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_JOBS_STATUS_PROPOSAL'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_JOBS_STATUS_CONFIRMED'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_JOBS_STATUS_CANCELED'
			)
		);
	}

	/**
	* Construct the list : operators_type
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___operators_type($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_OPERATORS_TYPE_FIX'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_OPERATORS_TYPE_MOBILE'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_OPERATORS_TYPE_MOBILE_VIRTUAL_NETWORK_OPERATOR'
			)
		);
	}

	/**
	* Construct the list : prices_hourly_rate
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___prices_hourly_rate($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_PRICES_HOURLY_RATE_PAX_BASED'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_PRICES_HOURLY_RATE_HOURLY_RATE'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_PRICES_HOURLY_RATE_DAY_RATE'
			)
		);
	}

	/**
	* Construct the list : services_activity_level
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___services_activity_level($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_SERVICES_ACTIVITY_LEVEL_EASY'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_SERVICES_ACTIVITY_LEVEL_MODERATLY_EASY'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_SERVICES_ACTIVITY_LEVEL_MODERATE'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_SERVICES_ACTIVITY_LEVEL_MODERATLY_CHALLENGING'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_SERVICES_ACTIVITY_LEVEL_CHALLENGING'
			)
		);
	}

	/**
	* Construct the list : services_duration
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___services_duration($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0000'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0015'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0030'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0045'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0100'
			),
			array(
				'value' => '5',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0115'
			),
			array(
				'value' => '6',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0130'
			),
			array(
				'value' => '7',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0145'
			),
			array(
				'value' => '8',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0200'
			),
			array(
				'value' => '9',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0215'
			),
			array(
				'value' => '10',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0230'
			),
			array(
				'value' => '11',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0245'
			),
			array(
				'value' => '12',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0300'
			),
			array(
				'value' => '13',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0315'
			),
			array(
				'value' => '14',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0330'
			),
			array(
				'value' => '15',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0345'
			),
			array(
				'value' => '16',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0400'
			),
			array(
				'value' => '17',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0415'
			),
			array(
				'value' => '18',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0430'
			),
			array(
				'value' => '19',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0445'
			),
			array(
				'value' => '20',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0500'
			),
			array(
				'value' => '21',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0515'
			),
			array(
				'value' => '22',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0530'
			),
			array(
				'value' => '23',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0545'
			),
			array(
				'value' => '24',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0600'
			),
			array(
				'value' => '25',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0615'
			),
			array(
				'value' => '26',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0630'
			),
			array(
				'value' => '27',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0645'
			),
			array(
				'value' => '28',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0700'
			),
			array(
				'value' => '29',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0715'
			),
			array(
				'value' => '30',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0730'
			),
			array(
				'value' => '31',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0745'
			),
			array(
				'value' => '32',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0800'
			),
			array(
				'value' => '33',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0815'
			),
			array(
				'value' => '34',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0830'
			),
			array(
				'value' => '35',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0845'
			),
			array(
				'value' => '36',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0900'
			),
			array(
				'value' => '37',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0915'
			),
			array(
				'value' => '38',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0930'
			),
			array(
				'value' => '39',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_0945'
			),
			array(
				'value' => '40',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1000'
			),
			array(
				'value' => '41',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1015'
			),
			array(
				'value' => '42',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1030'
			),
			array(
				'value' => '43',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1045'
			),
			array(
				'value' => '44',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1100'
			),
			array(
				'value' => '45',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1115'
			),
			array(
				'value' => '46',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1130'
			),
			array(
				'value' => '47',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1145'
			),
			array(
				'value' => '48',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1200'
			),
			array(
				'value' => '49',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1215'
			),
			array(
				'value' => '50',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1230'
			),
			array(
				'value' => '51',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1245'
			),
			array(
				'value' => '52',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1300'
			),
			array(
				'value' => '53',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1315'
			),
			array(
				'value' => '54',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1330'
			),
			array(
				'value' => '55',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1345'
			),
			array(
				'value' => '56',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1400'
			),
			array(
				'value' => '57',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1415'
			),
			array(
				'value' => '58',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1430'
			),
			array(
				'value' => '59',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1445'
			),
			array(
				'value' => '60',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1500'
			),
			array(
				'value' => '61',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1515'
			),
			array(
				'value' => '62',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1530'
			),
			array(
				'value' => '63',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1545'
			),
			array(
				'value' => '64',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1600'
			),
			array(
				'value' => '65',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1615'
			),
			array(
				'value' => '66',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1630'
			),
			array(
				'value' => '67',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1645'
			),
			array(
				'value' => '68',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1700'
			),
			array(
				'value' => '69',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1715'
			),
			array(
				'value' => '70',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1730'
			),
			array(
				'value' => '71',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1745'
			),
			array(
				'value' => '72',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1800'
			),
			array(
				'value' => '73',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1815'
			),
			array(
				'value' => '74',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1830'
			),
			array(
				'value' => '75',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1845'
			),
			array(
				'value' => '76',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1900'
			),
			array(
				'value' => '77',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1915'
			),
			array(
				'value' => '78',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1930'
			),
			array(
				'value' => '79',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_1945'
			),
			array(
				'value' => '80',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2000'
			),
			array(
				'value' => '81',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2015'
			),
			array(
				'value' => '82',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2030'
			),
			array(
				'value' => '83',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2045'
			),
			array(
				'value' => '84',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2100'
			),
			array(
				'value' => '85',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2115'
			),
			array(
				'value' => '86',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2130'
			),
			array(
				'value' => '87',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2145'
			),
			array(
				'value' => '88',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2200'
			),
			array(
				'value' => '89',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2215'
			),
			array(
				'value' => '90',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2230'
			),
			array(
				'value' => '91',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2245'
			),
			array(
				'value' => '92',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2300'
			),
			array(
				'value' => '93',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2315'
			),
			array(
				'value' => '94',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2330'
			),
			array(
				'value' => '95',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2345'
			),
			array(
				'value' => '96',
				'text' => 'GUIDEMAN_ENUM_SERVICES_DURATION_2400'
			)
		);
	}

	/**
	* Construct the list : services_meals
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___services_meals($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_SERVICES_MEALS_NO_MEALS_INCLUDED'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_SERVICES_MEALS_BREAKFAST_INCL'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_SERVICES_MEALS_LUNCH_INCL'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_SERVICES_MEALS_DINNER_INCL'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_SERVICES_MEALS_BREAKFAST_LUNCH_INCL'
			),
			array(
				'value' => '5',
				'text' => 'GUIDEMAN_ENUM_SERVICES_MEALS_BREAKFAST_DINNER_INCL'
			),
			array(
				'value' => '6',
				'text' => 'GUIDEMAN_ENUM_SERVICES_MEALS_LUNCH_DINNER_INCL'
			)
		);
	}

	/**
	* Construct the list : vehicles_fuel
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___vehicles_fuel($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_FUEL_GASOLINE'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_FUEL_DIESEL'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_FUEL_NATURAL_GAS'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_FUEL_ETHANOL'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_FUEL_FLEX'
			),
			array(
				'value' => '5',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_FUEL_ELECTRICAL'
			),
			array(
				'value' => '6',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_FUEL_BIO_DIESEL'
			)
		);
	}

	/**
	* Construct the list : vehicles_vehicle_type
	*
	* @access	protected
	* @param	array	$options	Optional config array for developer custom.
	*
	* @return	array	Associative array containing the list. Indexes are doubled (array index + value field).
	*/
	protected function ___vehicles_vehicle_type($options = array())
	{
		return array(
			array(
				'value' => '0',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_VEHICLE_TYPE_COMPACT_CAR'
			),
			array(
				'value' => '1',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_VEHICLE_TYPE_MIDSIZE_CAR'
			),
			array(
				'value' => '2',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_VEHICLE_TYPE_FULLSIZE_CAR'
			),
			array(
				'value' => '3',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_VEHICLE_TYPE_CONVERTIBLE'
			),
			array(
				'value' => '4',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_VEHICLE_TYPE_MINI_VAN'
			),
			array(
				'value' => '5',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_VEHICLE_TYPE_SUV'
			),
			array(
				'value' => '6',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_VEHICLE_TYPE_PICK_UP'
			),
			array(
				'value' => '7',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_VEHICLE_TYPE_VAN'
			),
			array(
				'value' => '8',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_VEHICLE_TYPE_MICRO_BUS'
			),
			array(
				'value' => '9',
				'text' => 'GUIDEMAN_ENUM_VEHICLES_VEHICLE_TYPE_BUS'
			)
		);
	}

	/**
	* Enumeration constructor.
	*
	* @access	public
	* @param	string	$enumName	Name of the enumeration
	*
	* @return	void
	*/
	public function __construct($enumName)
	{
		$this->enumName = $enumName;
	}

	/**
	* Get an enumeration instance.
	*
	* @access	public static
	* @param	string	$enumName	Name of the enumeration
	*
	* @return	object	Enumeration instance (GuidemanHelperEnum)
	*/
	public static function getInstance($enumName)
	{
		if (empty($enumName))
			return null;

		if (isset(static::$_cache[$enumName]))
			return static::$_cache[$enumName];

		$enumeration = new GuidemanHelperEnum($enumName);

		static::$_cache[$enumName] = $enumeration;

		return $enumeration;
	}

	/**
	* Get an enumeration item (from enumeration instance).
	*
	* @access	public
	* @param	string	$value	Index value
	*
	* @return	array	Enumeration item
	*/
	public function getItem($value)
	{
		if (!isset($this->list[$value]))
			return null;

		return $this->list[$value];
	}

	/**
	* Load the list and return it.
	*
	* @access	protected
	* @param	array	$options	Optional configuration. (Advanced custom, not used in native)
	*
	* @return	array	Associative enumeration list.
	*/
	protected function getList($options = array())
	{
		$enumName = '___' . $this->enumName;

		if (!method_exists($this, $enumName))
			return null;

		$this->list = $this->$enumName($options);

		$this->translate();

		return $this->list;
	}

	/**
	* Get an item text (from enumeration instance).
	*
	* @access	public
	* @param	string	$value	Index value
	*
	* @return	string	Item text
	*/
	public function getText($value)
	{
		if (!$item = $this->getItem($value))
			return '';

		return $item['text'];
	}

	/**
	* Get the item of an enumeration.
	*
	* @access	public static
	* @param	string	$enumName	Name of the enumeration
	* @param	string	$value	Value index of the list.
	*
	* @return	array	Found item.
	*/
	public static function item($enumName, $value)
	{
		$enumeration = self::getInstance($enumName);

		// Enumeration not found
		if (!$enumeration)
			return null;

		// Load the enumeration
		$enumeration->getList();

		return $enumeration->getItem($value);
	}

	/**
	* Get the text value of an enumeration.
	*
	* @access	public static
	* @param	string	$enumName	Name of the enumeration
	* @param	string	$value	Value index of the list.
	*
	* @return	string	Translated text value of the found item.
	*/
	public static function text($enumName, $value)
	{
		$enumeration = self::getInstance($enumName);

		// Enumeration not found
		if (!$enumeration)
			return '';

		// Load the enumeration
		$enumeration->getList();

		return $enumeration->getText($value);
	}

	/**
	* Translate the list.
	*
	* @access	protected
	* @param	string	$source	Text field.
	* @param	string	$target	Translated Text field.
	*
	* @return	void
	*/
	protected function translate($source = 'text', $target = 'text')
	{
		if (empty($this->list))
			return;

		// Translate the texts
		foreach ($this->list as $value => $item)
			$this->list[$value][$target] = JText::_($item[$source]);
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanHelperEnum')){ class GuidemanHelperEnum extends GuidemanCkHelperEnum{} }


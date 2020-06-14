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

if (file_exists(JPATH_ADMIN_GUIDEMAN .DS. "helpers" .DS. "filehelp.php"))
	include_once(JPATH_ADMIN_GUIDEMAN .DS. "helpers" .DS. "filehelp.php");
/**
* Helper Static Class
*
* @package	Guideman
* @subpackage	Calchelp
*/
class GuidemanCkHelperCalchelp
{

	// ______________________________________________________________________________
	//	GetPaxReference - Look up the price reference per pax
	//		$remun_array = Asscociative array of prices record
	//		$pax = the number of PAX for his service
	//		RETURN:
	//		$remun = String with the price reference for x PAX
	// ______________________________________________________________________________
	static function GetPaxReference($remun_array,$pax)
	{
		switch ($pax) {
			case '1': $remun = $remun_array ['pax_01']; break;
			case '2': $remun = $remun_array ['pax_02']; break;
			case '3': $remun = $remun_array ['pax_03']; break;
			case '4': $remun = $remun_array ['pax_04']; break;
			case '5': $remun = $remun_array ['pax_05']; break;
			case '6': $remun = $remun_array ['pax_06']; break;
			case '7': $remun = $remun_array ['pax_07']; break;
			case '8': $remun = $remun_array ['pax_08']; break;
			case '9': $remun = $remun_array ['pax_09']; break;
			case '10': $remun = $remun_array ['pax_10']; break;
			case '11': $remun = $remun_array ['pax_11']; break;
			case '12': $remun = $remun_array ['pax_12']; break;
			case '13': $remun = $remun_array ['pax_13']; break;
			case '14': $remun = $remun_array ['pax_14']; break;
			case '15': $remun = $remun_array ['pax_15']; break;
			case '16': $remun = $remun_array ['pax_16']; break;
			case '17': $remun = $remun_array ['pax_17']; break;
			case '18': $remun = $remun_array ['pax_18']; break;
			case '19': $remun = $remun_array ['pax_19']; break;
			case '20': $remun = $remun_array ['pax_20']; break;
			default: $remun = $remun_array ['pax_21']; break;
		}
	return $remun;
	}

	// ______________________________________________________________________________
	//	GetWorkedTime - Look up the price reference per pax
	//		$startdate 	= Start Date of Service
	//		$starttime 	= Start Time of Service
	//		$enddate 		= End Date of Service
	//		$endtime 		= End Time of Service
	//		RETURN:
	//		$worked_array = Associative array with TT(Total time) time, HH, MM, DD
	// ______________________________________________________________________________
	static function GetWorkedTime($startdate,$starttime,$enddate,$endtime)
	{
		$startunix = GuidemanHelperDates::timeFromFormat($startdate . ' ' . $starttime, 'Y-m-d H:i:s');
		$stopunix = GuidemanHelperDates::timeFromFormat($enddate . ' ' . $endtime, 'Y-m-d H:i:s');
		$worked_array ['TT'] = $stopunix - $startunix; //echo "</br> StopUNIX & StartUNIX:"; var_dump ($stopunix); echo " & "; var_dump ($startunix);
		$worked_array ['TT'] = round($worked_array ['TT'] / 60,0); //echo "</br> Worked seconds:"; var_dump ($work_time);
		$worked_array ['HH'] = floor($worked_array ['TT'] / 60);
		$worked_array ['MM']  = ($worked_array ['TT'] - ($worked_array ['HH'] * 60));
		$day1 = GuidemanHelperDates::explodeDate($startdate, 'Y-m-d');
		$day2 = GuidemanHelperDates::explodeDate($enddate, 'Y-m-d');
		//echo "</br>DAY1 ARRAY:"; var_dump ($day1);echo "</br>DAY2 ARRAY:"; var_dump ($day2);
		if ($day2 ['day'] > $day1 ['day'] ) {
			$worked_array ['DD'] = 1;
		} else {
			$worked_array ['DD'] = 0;
		}
		//	echo "</br>WORKED_ARRAY:"; var_dump ($worked_array);
		return $worked_array;
	}

	// ______________________________________________________________________________
	//	GetDurationTime - Look up the price reference per pax
	//		$duration 	= Duration of service in slices of 15 minutes.
	//		RETURN:
	//		$duration_array = Associative array with TT(Total time) time, HH, MM
	// ______________________________________________________________________________
	static function GetDurationTime($duration)
	{
		$duration_array ['TT'] = $duration * 15; //echo "</br> Normal service time: "; var_dump ($durationtime_array['TT']);
		$duration_array ['HH'] = floor($duration_array ['TT'] / 60);
		$duration_array ['MM'] = ($duration_array ['TT'] - ($duration_array ['HH'] * 60));
		return $duration_array;
	}

	// ______________________________________________________________________________
	//	GetOverTime - Look up the price reference per pax
	//		$workedtime 		= Total Overtime in MM
	//		$durationtime 	= Total Duration of service in MM
	//		RETURN:
	//		$overtimearray = Associative array with TT(Total time) time, HH, MM
	// ______________________________________________________________________________
	static function GetOverTime($workedtime,$durationtime)
	{
		$overtimearray = array('TT' => 0,'HH' => 0,'MM' => 0 );
		if ($workedtime >= $durationtime) {
			$overtimearray ['TT'] = ($workedtime - $durationtime);
			$overtimearray ['HH'] = floor(($workedtime - $durationtime)/60);
			$overtimearray ['MM'] = ($overtimearray ['TT'] - ($overtimearray ['HH'] *60));
		}
		return $overtimearray;
	}

	// ______________________________________________________________________________
	//	GetNightShift - Look up the price reference per pax
	//		$endtime 			= End Time Service
	//		$nightshift 	= Start Time Night Shift
	//		$DD			 	= Going over midnight
	//		RETURN:
	//		$nightshiftarray = 	ETT End Time Total in MM
	//												EHH End Time in HH
	//												EMM End Time in MM
	//												NTT Night Time Total in MM
	//												NHH Night Time in HH
	//												NMM Night Time in MM
	// ______________________________________________________________________________
	static function GetNightShift($endtime,$nightshift,$DD)
	{
		$nightshiftarray = array('ETT' => 0,'EHH' => 0,'EMM' => 0,'NTT' => 0,'NHH' => 0,'NMM' => 0 );
		$time_array = GuidemanHelperDates::explodeDate($endtime, 'H:i:s');
		$nightshiftarray ['ETT'] = (($time_array ['hour'] * 60) + $time_array ['minute']);
		$nightshiftarray ['EHH'] = $time_array ['hour'];
		$nightshiftarray ['EMM'] = $time_array ['minute'];
		$time_array = GuidemanHelperDates::explodeDate($nightshift, 'H:i:s');
		$nightshiftarray ['NTT']= (($time_array ['hour'] * 60) + $time_array ['minute']);
		$nightshiftarray ['NHH'] = $time_array ['hour'];
		$nightshiftarray ['NMM'] = $time_array ['minute'];
		if ($DD == 1) {
			$nightshiftarray ['ETT'] += 1440;
		}
		return $nightshiftarray;
	}

	// ______________________________________________________________________________
	//	GetSplitShift - Calculate the number of hours in day and night shift
	//		$nightshiftarray 	= Night Shift Associative Array
	//		$overtimearray 		= Over Time Associtive array
	//		RETURN:
	//		$splitshiftarray = 	pay_ot_d_hh Pay Overtime Day Rate HH
	//												pay_ot_d_mm Pay Overtime Day Rate MM
	//												pay_ot_n_hh Pay Overtime Night Rate HH
	//												pay_ot_n_mm Pay Overtime Night Rate MM
	// ______________________________________________________________________________
	static function GetSplitShift($nightshiftarray,$overtimearray)
	{
		$splitshiftarray = array('pay_ot_d_hh' => 0,'pay_ot_d_mm' => 0,'pay_ot_n_hh' => 0,'pay_ot_n_mm' => 0);

		if ($nightshiftarray ['ETT'] <= $nightshiftarray ['NTT']) {            // case end time of job <= beginning of night shift >>>> Entire shift is Day Shift
			// Remun = base Renum + hours * extra hour + extra mins (if +30 mins) * extra hour
			$splitshiftarray ['pay_ot_d_hh'] = $overtimearray ['HH'];
			$splitshiftarray ['pay_ot_d_mm'] = $overtimearray ['MM'];
			$splitshiftarray ['pay_ot_n_hh'] = 0;
			$splitshiftarray ['pay_ot_n_mm'] = 0;
		}
		else {
			// calculate night minutes and hours.
			$night_TT = $nightshiftarray ['ETT'] - $nightshiftarray ['NTT']; 	// in minutes
			$night_HH = floor($night_TT / 60); 																//in hours
			$night_MM = $night_TT - ($night_HH * 60); 												//in hours
			// case more night time than overtime.
			if ($night_TT >= $overtimearray['TT']) {
				$splitshiftarray ['pay_ot_d_hh'] = 0;
				$splitshiftarray ['pay_ot_d_mm'] = 0;
				$splitshiftarray ['pay_ot_n_hh'] = $overtimearray ['HH'];
				$splitshiftarray ['pay_ot_n_mm'] = $overtimearray ['MM'];
			}
			else {
				$night_ot_TT = $overtimearray['TT'] - $night_TT;
				$night_ot_HH = floor($night_ot_TT / 60);
				$night_ot_MM = $night_ot_TT - ($night_ot_HH * 60);
				if ($night_ot_MM <= 30) {
					$night_MM += $night_ot_MM;
				}
				$splitshiftarray ['pay_ot_d_hh'] = $night_ot_HH;
				$splitshiftarray ['pay_ot_d_mm'] = $night_ot_MM;
				$splitshiftarray ['pay_ot_n_hh'] = $night_HH;
				$splitshiftarray ['pay_ot_n_mm'] = $night_MM;
			}
		}
		return $splitshiftarray;
	}

	// ______________________________________________________________________________
	//	GetPaxReference - Look up the price reference per pax
	//		$service 			= Service Record ID
	//		$pax 					= #PAX
	//		$start_date 	= Start Date of Service
	//		$start_time 	= Start Time of Service
	//		$end_date 		= End Date of Service
	//		$end_time 		= End Time of Service
	//		$job_id 			= Job ID
	//		RETURN:
	//		$remuneration = float with the amount
	// ______________________________________________________________________________
	static function GetRemuneration($service,$pax,$start_date,$start_time,$end_date,$end_time,$job_id)
	{
		// _________________________________________________________________________
    // Calculation prices.
    // Enable $bugsy for debugging
    // _________________________________________________________________________
    // 1. Check if service is available
    // _________________________________________________________________________
    $bugsy = false;
		$remuneration = 0;
    if ($service) {
        $service_array = GuidemanHelperFilehelp::GetService($service);
        if ($bugsy) {echo "</br><strong>SERVICE ARRAY: </strong>"; var_dump ($service_array);echo "</br>";}
		    // _________________________________________________________________________
		    // 2. lookup Remunaration record
		    // _________________________________________________________________________
        if ($service_array ['remunaration'] != "0") {
          $remuneration_array = GuidemanHelperFilehelp::GetPrices($service_array ['remunaration']);
          if ($bugsy) {echo "</br><strong>PRICES ARRAY REMUNERATION: </strong>";var_dump ($remuneration_array);}
			    // _________________________________________________________________________
			    // 3. Check on calculation methodokup
			    //    Day baseed, Hourly based, or Pax Based.
          // _________________________________________________________________________
					switch ($remuneration_array['hourly_rate']) {
						case '0':	// PAX Based
							if ($pax) {
								if ($bugsy) {echo "</br><strong>Entering Pax Based Switch!!!</strong>";}
	              $remuneration = GuidemanHelperCalchelp::GetPaxReference($remuneration_array,$pax);
								if ($bugsy) {echo "</br> Base Remuneration: "; var_dump ($remuneration);}
			          // _________________________________________________________________________
			          // 4. Calculate Over Time (if no day rate)
			          // _________________________________________________________________________
								$workedtime_array = GuidemanHelperCalchelp::GetWorkedTime($start_date,$start_time,$end_date,$end_time);		//  first calculate the number of worked hours.
			          if ($bugsy) {echo "</br>Actual worked time: "; var_dump ($workedtime_array);}
								$durationtime_array = GuidemanHelperCalchelp::GetDurationTime($service_array ['duration']);								//  second calculate the number of hours the service is supposed to last.
			          if ($bugsy) {echo "</br>Actual duration of service: "; var_dump ($durationtime_array);}
								$overtime_array = GuidemanHelperCalchelp::GetOverTime($workedtime_array ['TT'],$durationtime_array['TT']);
			          if ($bugsy) {echo "</br> Overtime Total : "; var_dump ($overtime_array);}
			          // ____________________________________________________________________________________
			          // 5. Calculate Night Shift part & Check for split pay. (OvetTime part Day Part Night).
			          // ____________________________________________________________________________________
			          if ($remuneration_array ['night_shift']) {              																									// Case night shitf time in record.
									$nightshift_array = GuidemanHelperCalchelp::GetNightShift($end_time,$remuneration_array ['night_shift'],$workedtime_array ['DD']);
			            if ($bugsy) {echo "</br> Night Shift: ";var_dump ($nightshift_array);}
									$split_shift_array = GuidemanHelperCalchelp::GetSplitShift($nightshift_array,$overtime_array);
								}
			          else { 																			           																										// case no Night Shift Time in record.
									$split_shift_array = array('pay_ot_d_hh' => 0,'pay_ot_d_mm' => 0,'pay_ot_n_hh' => 0,'pay_ot_n_mm' => 0);
			            $remuneration = $remuneration + (($overtime_array['HH'] * $remuneration_array ['extra_hour_day']) + ((round(($overtime_array['MM'] / 60),0)) * $remuneration_array ['extra_hour_day']));
									if ($bugsy) {echo "</br>Remuneration (No Night Shift)= ".$remuneration." + (". $overtime_array['HH'] ." * ". $remuneration_array ['extra_hour_day'].") + (".(round(($overtime_array['MM'] / 60),0))." * ". $remuneration_array ['extra_hour_day'] .")";}
			          }
								if ($bugsy) {echo "</br> Split Shift array: ";var_dump ($split_shift_array);}
								if (($split_shift_array ['pay_ot_d_mm'] > 30) && ($split_shift_array ['pay_ot_n_mm'] > 29)) {
									$split_shift_array ['pay_ot_n_mm'] -= (60 - $split_shift_array ['pay_ot_d_mm']);
								} elseif (($split_shift_array ['pay_ot_d_mm'] > 29) && ($split_shift_array ['pay_ot_n_mm'] > 30)) {
									$split_shift_array ['pay_ot_d_mm'] -= (60 - $split_shift_array ['pay_ot_n_mm']);
								}
								$remuneration += (($split_shift_array ['pay_ot_d_hh'] * $remuneration_array ['extra_hour_day']) + ((round(($split_shift_array ['pay_ot_d_mm'] /60),0)) * $remuneration_array ['extra_hour_day']));
								$remuneration += (($split_shift_array ['pay_ot_n_hh'] * $remuneration_array ['extra_hour_night']) + ((round(($split_shift_array ['pay_ot_n_mm'] /60),0)) * $remuneration_array ['extra_hour_night']));
								if ($bugsy) {echo "</br>Remuneration (Split Array Day)= ". $split_shift_array ['pay_ot_d_hh'].' * '. $remuneration_array ['extra_hour_day'].") + (".round(($split_shift_array ['pay_ot_d_mm'] /60),0).' * '.$remuneration_array ['extra_hour_day'].")";}
								if ($bugsy) {echo "</br>Remuneration (Split Array Night)= ". $split_shift_array ['pay_ot_n_hh'].' * '. $remuneration_array ['extra_hour_night'].") + (".round(($split_shift_array ['pay_ot_n_mm'] /60),0).' * '.$remuneration_array ['extra_hour_night'].")";}
							}
							break;
						case '1':	// Hourly Based
							if ($bugsy) {echo "</br><strong>Entering Hourly Based Switch!!!</strong>";}
		          // _________________________________________________________________________
		          // 4. Calculate Over Time (if no day rate)
		          // _________________________________________________________________________
							$workedtime_array = GuidemanHelperCalchelp::GetWorkedTime($start_date,$start_time,$end_date,$end_time);		//  first calculate the number of worked hours.
		          if ($bugsy) {echo "</br>Actual worked time: "; var_dump ($workedtime_array);}
							$durationtime_array = GuidemanHelperCalchelp::GetDurationTime($service_array ['duration']);								//  second calculate the number of hours the service is supposed to last.
		          if ($bugsy) {echo "</br>Actual duration of service: "; var_dump ($durationtime_array);}
							$remuneration = (($durationtime_array ['HH'] * $remuneration_array ['pax_01']) + ((floor(($durationtime_array ['HH'] + 30) / 60)* $remuneration_array ['pax_01'])));
							if ($bugsy) {echo "Remuneration (Hourly Based): (".$durationtime_array ['HH'].' * '.$remuneration_array ['pax_01'].") + (".floor(($durationtime_array ['HH'] + 30) / 60)." * ".$remuneration_array ['pax_01'].")";}
							if ($bugsy) {echo "</br> Base Remuneration: "; var_dump ($remuneration);}
							$overtime_array = GuidemanHelperCalchelp::GetOverTime($workedtime_array ['TT'],$durationtime_array['TT']);
		          if ($bugsy) {echo "</br> Overtime Total : "; var_dump ($overtime_array);}
		          // ____________________________________________________________________________________
		          // 5. Calculate Night Shift part & Check for split pay. (OvetTime part Day Part Night).
		          // ____________________________________________________________________________________
		          if ($remuneration_array ['night_shift']) {              																									// Case night shitf time in record.
								$nightshift_array = GuidemanHelperCalchelp::GetNightShift($end_time,$remuneration_array ['night_shift'],$workedtime_array['DD']);
		            if ($bugsy) {echo "</br> Night Shift: ";var_dump ($nightshift_array);}
								$split_shift_array = GuidemanHelperCalchelp::GetSplitShift($nightshift_array,$overtime_array);
							}
		          else { 																			           																										// case no Night Shift Time in record.
								$split_shift_array = array('pay_ot_d_hh' => 0,'pay_ot_d_mm' => 0,'pay_ot_n_hh' => 0,'pay_ot_n_mm' => 0);
		            $remuneration = $remuneration + (($overtime_array['HH'] * $remuneration_array ['extra_hour_day']) + ((round(($overtime_array['MM'] / 60),0)) * $remuneration_array ['extra_hour_day']));
								if ($bugsy) {echo "</br>Remuneration (No Night Shift)= ".$remuneration." + (". $overtime_array['HH'] ." * ". $remuneration_array ['extra_hour_day'].") + (".(round(($overtime_array['MM'] / 60),0))." * ". $remuneration_array ['extra_hour_day'] .")";}
		          }
							if ($bugsy) {echo "</br> Split Shift array: ";var_dump ($split_shift_array);}
							if (($split_shift_array ['pay_ot_d_mm'] > 30) && ($split_shift_array ['pay_ot_n_mm'] > 29)) {
								$split_shift_array ['pay_ot_n_mm'] -= (60 - $split_shift_array ['pay_ot_d_mm']);
							} elseif (($split_shift_array ['pay_ot_d_mm'] > 29) && ($split_shift_array ['pay_ot_n_mm'] > 30)) {
								$split_shift_array ['pay_ot_d_mm'] -= (60 - $split_shift_array ['pay_ot_n_mm']);
							}
							$remuneration += (($split_shift_array ['pay_ot_d_hh'] * $remuneration_array ['extra_hour_day']) + ((round(($split_shift_array ['pay_ot_d_mm'] /60),0)) * $remuneration_array ['extra_hour_day']));
							$remuneration += (($split_shift_array ['pay_ot_n_hh'] * $remuneration_array ['extra_hour_night']) + ((round(($split_shift_array ['pay_ot_n_mm'] /60),0)) * $remuneration_array ['extra_hour_night']));
							if ($bugsy) {echo "</br>Remuneration (Split Array Day)= ". $split_shift_array ['pay_ot_d_hh'].' * '. $remuneration_array ['extra_hour_day'].") + (".round(($split_shift_array ['pay_ot_d_mm'] /60),0).' * '.$remuneration_array ['extra_hour_day'].")";}
							if ($bugsy) {echo "</br>Remuneration (Split Array Night)= ". $split_shift_array ['pay_ot_n_hh'].' * '. $remuneration_array ['extra_hour_night'].") + (".round(($split_shift_array ['pay_ot_n_mm'] /60),0).' * '.$remuneration_array ['extra_hour_night'].")";}
							break;
						case '2':	// Day Based
							if ($bugsy) {echo "</br><strong>Entering Day Based Switch!!!</strong>";}
							$remuneration = $remuneration_array ['pax_01'];
							if ($bugsy) {echo "</br> Base Remuneration: "; var_dump ($remuneration);}
							break;
						default:
							if ($bugsy) {echo "</br><strong>No hourly rate has been defined in the record!!!</strong>";}
							break;
					}
					// ____________________________________________________________________________________
					// 5. Check if there is a coordination fee to add to the service.
					// ____________________________________________________________________________________
          if ($job_id) {
            // Get Job Record
            $job_array = GuidemanHelperFilehelp::GetJob($job_id);
						if ($bugsy) {echo "</br><strong>JOB ARRAY: </strong>"; var_dump ($job_array);echo "</br>";}
            if ($job_array ['coordination']) {
              if (($remuneration_array ['coordination_in'] == '0')  &&  !($remuneration_array['hourly_rate']) == '2' ) {
                // calc in price per hour
                if ($bugsy) {echo "</br> Remunaration (Overtime Not %) : $remuneration + (( " . $workedtime_array ['HH']  . " * " . $remuneration_array ['coordination_fee'] . ") + (" . floor(($workedtime_array ['MM'] + 30) / 60) . " * "  . $remuneration_array ['coordination_fee'] . ") ";}
                $remuneration = $remuneration + ($workedtime_array ['HH'] * $remuneration_array ['coordination_fee']) +((floor(($workedtime_array ['MM'] + 30) / 60)) * $remuneration_array ['coordination_fee']);
              }
              else {
                // calc remuneration in %
                if ($bugsy) {echo "</br> Remunaration (Overtime In %) : $remuneration + ( $remuneration * $remuneration_array ['coordination_fee'] ) / 100";}
                $remuneration = $remuneration + ($remuneration * $remuneration_array ['coordination_fee']) /100;
              }
            }
					}
        }
      }
	return $remuneration;
	}

	// ___________________________________________________________________________
	//	GetPaxReference - Look up the price reference per pax
	//		$service 			= Service Record ID
	//		$pax 					= #PAX
	//		$start_date 	= Start Date of Service
	//		$start_time 	= Start Time of Service
	//		$end_date 		= End Date of Service
	//		$end_time 		= End Time of Service
	//		$job_id 			= Job ID
	//		RETURN:
	//		$remuneration = float with the amount
	// ___________________________________________________________________________

	static function GetIncome($service,$pax,$jobid)
	{
		// _________________________________________________________________________
		// Calculation prices.
		// Enable $bugsy for debugging
		// _________________________________________________________________________
		// 1. Check if service is available
		// _________________________________________________________________________
		$bugsy = false;
		$income = 0;
    if ($service) {
        $service_array = GuidemanHelperFilehelp::GetService($service);
        if ($bugsy) {echo "</br><strong>SERVICE ARRAY: </strong>"; var_dump ($service_array);echo "</br>";}
				// _________________________________________________________________________
		    // 2. lookup Prices record
		    // _________________________________________________________________________
        if ($service_array ['costs'] != "0") {
          $costs_array = GuidemanHelperFilehelp::GetPrices($service_array ['costs']);
          if ($bugsy) {echo "</br><strong>PRICES ARRAY REMUNERATION: </strong>";var_dump ($costs_array);}		}
					// _________________________________________________________________________
			    // 3. Check on calculation methodokup
			    //    Day baseed, Hourly based, or Pax Based.
          // _________________________________________________________________________
					if ($pax) {
            $income = (GuidemanHelperCalchelp::GetPaxReference($costs_array,$pax) * $pax);
						if ($bugsy) {echo "</br> Base Remuneration: "; var_dump ($income);}
					}
				}
	return $income;
	}


}

// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanHelperCalchelp')){ class GuidemanHelperCalchelp extends GuidemanCkHelperCalchelp{} }

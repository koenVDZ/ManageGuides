<?php
/*************************************************************************************
* @version		1.6.9
* @package		GuideMan
* @subpackage	GuideMan
* @copyright	ManageGuides.com
* @author			Koenraad Vandezande - www.manageguides.com - koen@manageguides.com
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
class GuidemanCkHelperPermutations
{
	// ______________________________________________________________________________
	//	Create the checkboxes with FontAwesome 5.x.x
	// ______________________________________________________________________________
	static function AddCheckBox($BoxValue)
	{
		$FinalHtml = "";
		switch ($BoxValue) {
		case 0:
			$FinalHtml = "<span style='font-size: 1em; color: Tomato;'><i class='fal fa-square'></i></span>";
			break;
		case 1:
			$FinalHtml = "<span class='fa-stack' style='font-size: 1em; color: #00ad52;'><i class='fal fa-square fa-stack-1x'></i><i class='fas fa-check fa-stack-1x' style='color:Tomato'></i></span>";
			break;
		default:
			$FinalHtml = "<span class='fa-stack' style='font-size: 1em; color: #00ad52;'><i class='fal fa-square fa-stack-1x'></i><i class='fas fa-check fa-stack-1x' style='color:Tomato'></i></span>";
		}
	return $FinalHtml;
	}
	// ______________________________________________________________________________
	//	Put he right FA figure for PUBLICATION
	// ______________________________________________________________________________
	static function StateIcon($Pub)
	{
		$FinalHtml = "<td style='text-align:center' width='1%'>";
		switch ($Pub) {
		case 1:
			$FinalHtml .= "<span style='font-size: 1em; color: #00ad52;'><i class='fal fa-eye fa-2x'></i></span>";
			break;
		case 2:
			$FinalHtml .= "<span style='font-size: 1em; color: black;'><i class='fal fa-archive fa-2x'></i></span>";
			break;
		case -2:
			$FinalHtml .= "<span style='font-size: 1em; color: Yellow;'><i class='fal fa-trash-alt fa-2x'></i></span>";
			break;
		default:
			$FinalHtml .= "<span style='font-size: 1em; color: Tomato;'><i class='fal fa-eye-slash fa-2x'></i></span>";
		}
	$FinalHtml .="</td>";
	return $FinalHtml;
	}
	// ______________________________________________________________________________
	//	Replace ICOMOON icon by FontAwesome
	//	MENU
	// ______________________________________________________________________________
	static function IcomoonMenu($html)
	{
	$FinalHtml = "";
	$FinalHtml = str_replace("icon-menu icomoon", "fal fa-ellipsis-v-alt fa-fw fa-2x", $html);
	return $FinalHtml;
	}
	// ______________________________________________________________________________
	//	Replace ICOMOON icon by FontAwesome
	//	for Pictures Dropdown list.
	// ______________________________________________________________________________
	static function IcomoonPic($FinalHtml)
	{
	$FinalHtml = str_replace("icon-folder-open icomoon", "fal fa-folder-open fa-fw fa-pull-left", $FinalHtml);
	$FinalHtml = str_replace("icon-cancel icomoon", "fal fa-ban fa-fw fa-pull-left", $FinalHtml);
	$FinalHtml = str_replace("icon-out icomoon", "fal fa-step-backward fa-fw fa-pull-left", $FinalHtml);
	$FinalHtml = str_replace("icon-pictures icomoon", "fal fa-image fa-fw fa-pull-left", $FinalHtml);
	$FinalHtml = str_replace("icon-trash icomoon", "fal fa-trash-alt fa-fw fa-pull-left", $FinalHtml);
	$FinalHtml = str_replace("icon-remove icomoon", "fal fa-eraser fa-fw fa-pull-left", $FinalHtml);
	$FinalHtml = str_replace("margin-left:1em;float:right;", "", $FinalHtml);
	return $FinalHtml;
	}
	// ______________________________________________________________________________
	//	Replace ICOMOON icon by FontAwesome
	//	for Toolbar.
	// ______________________________________________________________________________
	static function IcomoonToolbar($FinalHtml)
	{
	$FinalHtml = str_replace("icon-save icomoon", "fal fa-save fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-save-new icomoon", "fal fa-save fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-save-copy icomoon", "fal fa-copy fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-cancel icomoon", "fal fa-ban fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-new icomoon", "fal fa-plus-circle fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-edit icomoon", "fal fa-edit fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-publish icomoon", "fal fa-eye fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-unpublish icomoon", "fal fa-eye-slash fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-trash icomoon", "fal fa-trash-alt fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-delete icomoon", "fal fa-eraser fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-archive icomoon", "fal fa-archive fa-fw", $FinalHtml);
	$FinalHtml = str_replace("icon-cog icomoon", "fal fa-cogs fa-fw", $FinalHtml);
	$FinalHtml = str_replace("margin-left:1em;float:right;", "", $FinalHtml);
	return $FinalHtml;
	}
	// ______________________________________________________________________________
	//	Decide Background color for lists depending on STATE
	//		$LangSelect = Key for language file
	// ______________________________________________________________________________
	static function StateBackgroundColor($first,$second,$third)
	{
		$FinalHtml = "";
		switch ($first) {
		case 1:
			$FinalHtml .= "<tr class='table-success row";
			break;
		case 2:
			$FinalHtml .= "<tr class='table-warning row";
			break;
		case -2:
			$FinalHtml .= "<tr class='table-dark row";
			break;
		default:
			$FinalHtml .= "<tr class='table-danger row";
		}
	 $FinalHtml .= $second . "' sortable-group-id='" . $third . "'>";
	return $FinalHtml;
	}
}
// Load the fork
GuidemanHelper::loadFork(__FILE__);

// Fallback if no fork has been found
if (!class_exists('GuidemanHelperPermutations')){ class GuidemanHelperPermutations extends GuidemanCkHelperPermutations{} }

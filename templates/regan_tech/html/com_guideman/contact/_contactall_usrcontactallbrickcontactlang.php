<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V2.8     |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		1.2.4
* @package		GuideMan
* @subpackage	Contacts
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
$col = 1;
if (isset($this->item->languages))
foreach($this->item->languages as $rel):
	$row [$col][1] = $rel->flag;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->languages))
foreach($this->item->languages as $rel):
	$row [$col][2] = $rel->name;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->contactlang))
foreach($this->item->contactlang as $rel):
	$row [$col][3] = $rel->prof_level;
	$col++;
endforeach;
var_dump ($row);
?>
<fieldset class="fieldsfly fly-horizontal">

<div class="panel panel-primary">
 	<div id="accordion-heading">
 	  	<!-- Default panel contents -->
		<div class="panel-heading"><h3>&#160<i class="fa fa-language"></i>&#160<?php echo JText::_('GUIDEMAN_FIELDSET_LANGUAGES') ?>&#160&#160&#160<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo"><i class="fa fa-plus-circle"></i></h3></div></a>	</div>
	<div id="collapseTwo" class="accordion-body collapse">
		<div class="accordion-inner">
			  <!-- Table -->
		 <table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_LANGUAGE" )." (" . JText::_( "GUIDEMAN_FIELD_PROFICIENCY" ) .")"; ?></th>
					</tr>
				</thead><tbody>
			<?php
			$out = "";
			$rij = 1;
			foreach($row as $key => $element){
				$out .= "<tr>";
				foreach($element as $subkey => $subelement)
				{
					switch ($subkey) {
						case 1:
							$out .= "<td>";
							$out .= '<span class="flag-icon flag-icon-' . $subelement . '"></span>';
							break;
						case 2:
							$out .= " ". "$subelement" . " (";
							break;
						case 3:
							switch ($subelement) {
								case 0:
									$out .= '<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>'.')';
									break;
								case 1:
									$out .= '<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>'.')';
									break;
								case 2:
									$out .= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>'.')';
									break;
								case 3:
									$out .= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>'.')';
									break;
								case 4:
									$out .= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>'.')';
									break;
								case 5:
									$out .= '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>'.')';
									break;
							$out .="</td>";
							}
					}
				}
				$out .= "</tr>";
				$rij++;
			}
			$out .= "</tbody>";
			echo $out;
			?>
			</table>
		</div>
	</div>
</div>
</fieldset>

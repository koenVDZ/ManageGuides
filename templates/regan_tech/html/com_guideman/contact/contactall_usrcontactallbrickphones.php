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
if (isset($this->item->phones))
foreach($this->item->phones as $rel):
	$row [$col][1] = $rel->default_phone;
	$col++;
endforeach;
if (isset($this->item->phonelabels))
$col = 1;
foreach($this->item->phonelabels as $rel):
	$row [$col][2] = $rel->type;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->countries))
foreach($this->item->countries as $rel):
	$row [$col][3] = $rel->iso_2;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->countries))
foreach($this->item->countries as $rel):
	$row [$col][4] = $rel->calling_code;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->phones))
foreach($this->item->phones as $rel):
	$row [$col][5] = $rel->number;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->operators))
foreach($this->item->operators as $rel):
	$row [$col][6] = $rel->type;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->operators))
foreach($this->item->operators as $rel):
	$row [$col][7] = $rel->country_id;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->operators))
foreach($this->item->operators as $rel):
	$row [$col][8] = $rel->operator;
	$col++;
endforeach;

//print_r($row);die;
?>
<fieldset class="fieldsfly fly-horizontal">

<div class="panel panel-primary">
  	<div id="accordion-heading">
		<!-- Default panel contents -->
		<div class="panel-heading"><h3>&#160<i class="fas fa-phone"></i>&#160<?php echo JText::_('GUIDEMAN_FIELDSET_COMMUNICATION') ?>&#160&#160&#160<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree"><i class="fal fa-plus-circle"></i></h3></div></a></div>
	<div id="collapseThree" class="accordion-body collapse">
		<div class="accordion-inner">
			  <!-- Table -->
		 <table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th width='15%'><center><?php echo JText::_( "GUIDEMAN_FIELD_DEFAULT_PHONE" ); ?></center></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_TYPE" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_NUMBER" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_OPERATORS" ); ?></th>
					</tr>
				</thead>
			<?php
			$out = "<tbody>";
			$rij = 1;
			foreach($row as $key => $element){
				$out .= "<tr>";
				foreach($element as $subkey => $subelement)
				{
					switch ($subkey)
					{
						case 1:
							if ($subelement) {
								$out .= "<td width='15%'><center><i class='fal fa-check-square' style='color:green'></i></center></td>";
							} else{
								$out .= "<td width='15%'><center><i class='fal fa-square' style='color:red'></i></center></td>";
							}
							break;
						case 2:
							$out .= "<td>$subelement</td>";
							break;
						case 3:
							$out .=	'<td><span class="flag-icon flag-icon-' . strtolower($subelement) . '"></span>&nbsp';
							break;
						case 4:
							$out .= '<span class="label label-default">' . $subelement . '</span>&nbsp';
							break;
						case 5:
							$out .= "$subelement</td>";
							break;
						case 6:
							// Field not in use
							break;
						case 7:
						// Field not in use
							break;
						case 8:
							$out .= "<td>$subelement</td>";
							break;
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

<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
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


if (isset($this->item->addresslabels))
$col = 1;
foreach($this->item->addresslabels as $rel):
	$row [$col][1] = $rel->type;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->addresses))
foreach($this->item->addresses as $rel):
	$row [$col][2] = $rel->address;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->addresses))
foreach($this->item->addresses as $rel):
	$row [$col][3] = $rel->suburb;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->addresses))
foreach($this->item->addresses as $rel):
	$row [$col][4] = $rel->zipcode;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->addresses))
foreach($this->item->addresses as $rel):
	$row [$col][5] = $rel->city;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->countries_user_id))
foreach($this->item->countries_user_id as $rel):
	$row [$col][6] = strtolower($rel->iso_2);
	$col++;
endforeach;
$col = 1;
if (isset($this->item->countries_user_id))
foreach($this->item->countries_user_id as $rel):
	$row [$col][7] = $rel->country_name;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->states))
foreach($this->item->states as $rel):
	$row [$col][8] = $rel->state;
	$col++;
endforeach;
?>
<fieldset class="fieldsfly fly-horizontal">

<div class="panel panel-primary" >
<!-- Table -->
 <table class="table table-condensed table-hover">
	<thead>
		<tr>
			<th><?php echo JText::_( "GUIDEMAN_FIELD_ADDRESS_LABELS" ); ?></th>
			<th><?php echo JText::_( "GUIDEMAN_FIELD_ADDRESSES" ); ?></th>
			<th><?php echo JText::_( "GUIDEMAN_FIELD_SUBURB" ); ?></th>
			<th><?php echo JText::_( "GUIDEMAN_FIELD_ZIP" ); ?></th>
			<th><?php echo JText::_( "GUIDEMAN_FIELD_CITY" ); ?></th>
			<th><?php echo JText::_( "GUIDEMAN_FIELD_COUNTRIES" ); ?></th>
			<th><?php echo JText::_( "GUIDEMAN_FIELD_STATES" ); ?></th>
		</tr>
	</thead>
	<tbody>
	<?php
	$out = "";
	$rij = 1;
	foreach($row as $key => $element){
		if (count($row[$key]) > 4) {
			$out .= "<tr>";
			foreach($element as $subkey => $subelement)
			{
					switch ($subkey) {
						case 1:
							$out .= "<td>$subelement</td>";
							break;
						case 2:
							$out .= "<td>$subelement</td>";
							break;
						case 3:
							$out .= "<td>$subelement</td>";
							break;
						case 4:
							$out .= "<td>$subelement</td>";
							break;
						case 5:
							$out .= "<td>$subelement</td>";
							break;
						case 6:
							$out .= "<td>";
							$out .= '<span class="flag-icon flag-icon-' . $subelement . '"></span>';
							break;
						case 7:
							$out .= " " . "$subelement</td>";
							break;
						case 8:
							$out .= "<td>$subelement</td>";
							break;
				}
			}
			$out .= "</tr>";
		}
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

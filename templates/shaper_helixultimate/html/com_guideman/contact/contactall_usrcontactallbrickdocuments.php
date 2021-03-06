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

if (isset($this->item->doclabels))
$col = 1;
foreach($this->item->doclabels as $rel):
	$row [$col][1] = $rel->doc_type_name;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->documents))
foreach($this->item->documents as $rel):
	$row [$col][2] = $rel->number;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->documents))
foreach($this->item->documents as $rel):
	$row [$col][3] = $rel->emission_date;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->documents))
foreach($this->item->documents as $rel):
	$row [$col][4] = $rel->expiration_date;
	$col++;
endforeach;
//print_r($row);die;
?>
<fieldset class="fieldsfly fly-horizontal">
	<!-- Table -->
	 <table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th><?php echo JText::_( "GUIDEMAN_FIELD_DOCUMENT_TYPE" ); ?></th>
				<th><?php echo JText::_( "GUIDEMAN_FIELD_NUMBER" ); ?></th>
				<th><?php echo JText::_( "GUIDEMAN_FIELD_EMISSION_DATE" ); ?></th>
				<th><?php echo JText::_( "GUIDEMAN_FIELD_EXPIRATION_DATE" ); ?></th>
			</tr>
		</thead>
	<?php
	$out = "<tbody>";
	$rij = 1;
	foreach($row as $key => $element){
		$out .= "<tr>";
		foreach($element as $subkey => $subelement)
		{
			$out .= "<td>$subelement</td>";
		}
		$out .= "</tr>";
		$rij++;
	}
	$out .= "</tbody>";
	echo $out;
	?>
	</table>
</fieldset>

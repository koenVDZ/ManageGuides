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

$col = 1;
if (isset($this->item->contacts))
foreach($this->item->contacts as $rel):
	$row [$col][1] = $rel->name;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->accounts))
foreach($this->item->accounts as $rel):
	$row [$col][2] = $rel->account_type;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->accounts))
foreach($this->item->accounts as $rel):
	$row [$col][3] = $rel->agency;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->accounts))
foreach($this->item->accounts as $rel):
	$row [$col][4] = $rel->account;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->accounts))
foreach($this->item->accounts as $rel):
	$row [$col][5] = $rel->swift;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->accounts))
foreach($this->item->accounts as $rel):
	$row [$col][6] = $rel->iban;
	$col++;
endforeach;
//print_r($row);die;
?>
<fieldset class="fieldsfly fly-horizontal">
	<!-- Table -->
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				<th><?php echo JText::_( "GUIDEMAN_FIELD_BANK_NAME" ); ?></th>
				<th><?php echo JText::_( "GUIDEMAN_FIELD_ACCOUNT_TYPE" ); ?></th>
				<th><?php echo JText::_( "GUIDEMAN_FIELD_AGENCY" ); ?></th>
				<th><?php echo JText::_( "GUIDEMAN_FIELD_ACCOUNT" ); ?></th>
				<th><?php echo JText::_( "GUIDEMAN_FIELD_SWIFT" ); ?></th>
				<th><?php echo JText::_( "GUIDEMAN_FIELD_IBAN" ); ?></th>
			</tr>
		</thead>
		<?php
		$out = "<tbody>";
		$rij = 1;
		foreach($row as $key => $element){
			$out .= "<tr>";
			foreach($element as $subkey => $subelement)
			{
				if ($subkey == 2) {
					$out .= "<td>";
					switch ($subelement) {
						case 0:
							$out .= 'Checking Account';
							break;
						case 1:
							$out .= 'Savings Account';
							break;
						case 2:
							$out .= 'Money Market Account';
							break;
						case 3:
							$out .= 'Certificats of deposit (CDs)';
							break;
						case 4:
							$out .= 'No-frills Account';
							break;
					$out .= "</td>";
					}
				}
				else  $out .= "<td>$subelement</td>";
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
</fieldset>

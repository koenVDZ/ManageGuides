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

<div class="panel panel-primary">
	<div id="accordion-heading">
	  	<!-- Default panel contents -->
		<div class="panel-heading"><h3>&#160<i class="fas fa-university"></i>&#160<?php echo JText::_('GUIDEMAN_FIELDSET_BANK_INFORMATION') ?>&#160&#160&#160<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven"><i class="fal fa-plus-circle"></i></h3></div></a>
	</div>
		<div id="collapseSeven" class="accordion-body collapse">
			<div class="accordion-inner">
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
</div>
</fieldset>

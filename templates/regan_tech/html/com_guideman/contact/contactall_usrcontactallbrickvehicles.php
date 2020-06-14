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

if (isset($this->item->vehicles))
	$col = 1;
	foreach($this->item->vehicles as $rel):
		$row [$col][1] = $rel->vehicle_type;
		$col++;
	endforeach;
if (isset($this->item->brands))
	$col = 1;
	foreach($this->item->brands as $rel):
		$row [$col][2] = $rel->name;
		$col++;
	endforeach;
if (isset($this->item->vehicles))
	$col = 1;
	foreach($this->item->vehicles as $rel):
		$row [$col][3] = $rel->model;
		$col++;
	endforeach;
if (isset($this->item->vehicles))
	$col = 1;
	foreach($this->item->vehicles as $rel):
		$row [$col][4] = $rel->color;
		$col++;
	endforeach;
if (isset($this->item->vehicles))
	$col = 1;
	foreach($this->item->vehicles as $rel):
		$row [$col][5] = $rel->pax;
		$col++;
	endforeach;
if (isset($this->item->vehicles))
	$col = 1;
	foreach($this->item->vehicles as $rel):
		$row [$col][6] = $rel->number_plate;
		$col++;
	endforeach;
if (isset($this->item->vehicles))
	$col = 1;
	foreach($this->item->vehicles as $rel):
		$row [$col][7] = $rel->year_of_build;
		$col++;
	endforeach;
if (isset($this->item->vehicles))
	$col = 1;
	foreach($this->item->vehicles as $rel):
		$row [$col][8] = $rel->fuel;
		$col++;
	endforeach;
if (isset($this->item->vehicles))
	$col = 1;
	foreach($this->item->vehicles as $rel):
		$row [$col][9] = $rel->car_insurance;
		$col++;
	endforeach;
if (isset($this->item->vehicles))
	$col = 1;
	foreach($this->item->vehicles as $rel):
		$row [$col][10] = $rel->insurance_for_third_parties;
		$col++;
	endforeach;?>
<fieldset class="fieldsfly fly-horizontal">

<div class="panel panel-primary">
  	<div id="accordion-heading">
		<!-- Default panel contents -->
		<div class="panel-heading"><h3>&#160<i class="fas fa-car"></i>&#160<?php echo JText::_('GUIDEMAN_FIELDSET_VEHICLES') ?>&#160&#160&#160<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive"><i class="fal fa-plus-circle"></i></h3></div></a></div>
	<div id="collapseFive" class="accordion-body collapse">
	<div class="accordion-inner">
		<!-- Table -->
		 <table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_VEHICLE_TYPE" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_MAKE" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_MODEL" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_COLOR" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_PAX" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_LICENSE_PLATE" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_YEAR_OF_BUILD" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_FUEL" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_INSURANCE" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_INSURANCE3" ); ?></th>
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
							$out .= "<td>";
							switch ($subelement) {
								case 0:
									$out .= 'Compact Car';
									break;
								case 1:
									$out .= 'Mid-size Car';
									break;
								case 2:
									$out .= 'Full-size Car';
									break;
								case 3:
									$out .= 'Convertible';
									break;
								case 4:
									$out .= 'Mini Van';
									break;
								case 5:
									$out .= 'SUV';
									break;
								case 6:
									$out .= 'Pick Up';
									break;
								case 7:
									$out .= 'Van';
									break;
								case 8:
									$out .= 'Micro Bus';
									break;
								case 9:
									$out .= 'Bus';
									break;
							$out .= "</td>";
							}
							break;
						case 2:
							$out .= "<td>$subelement</td>";
							break;
						case 3:
							$out .= "<td>$subelement</td>";
							break;
						case 4:
							$out .= '<td><span class="fly-color" style="width:20px;height:20px;background:#';
							$out .= $subelement;
							$out .= ';display:inline-block;"></td>';
							break;
						case 5:
							$out .= "<td>$subelement</td>";
							break;
						case 6:
							$out .= "<td>$subelement</td>";
							break;
						case 7:
							$out .= "<td>";
							$out .= substr($subelement, 0,4);
							$out .= "</td>";
							break;
						case 8:
							$out .= "<td>";
							switch ($subelement) {
								case "0":
									$out .= JText::_( "GUIDEMAN_ENUM_VEHICLES_FUEL_GASOLINE" );
									break;
								case "1":
									$out .= JText::_( "GUIDEMAN_ENUM_VEHICLES_FUEL_DIESEL" );
									break;
								case "2":
									$out .= JText::_( "GUIDEMAN_ENUM_VEHICLES_FUEL_NATURAL_GAS" );
									break;
								case "3":
									$out .= JText::_( "GUIDEMAN_ENUM_VEHICLES_FUEL_ETHANOL" );
									break;
								case "4":
									$out .= JText::_( "GUIDEMAN_ENUM_VEHICLES_FUEL_FLEX" );
									break;
								case "5":
									$out .= JText::_( "GUIDEMAN_ENUM_VEHICLES_FUEL_ELECTRICAL" );
									break;
								case "6":
									$out .= JText::_( "GUIDEMAN_ENUM_VEHICLES_FUEL_BIO_DIESEL" );
									break;
							$out .= "</td>";
							}
							break;
						case 9:
							if ($subelement == 0) {
								$out .= '<td><i class="fal fa-square"></i></td>';
							}
							else {
								$out .= '<td><i class="fal fa-check-square" style="color:green"></i></td>';
							}
							break;
						case 10:
							if ($subelement == 0) {
								$out .= '<td><i class="fal fa-square" style="color:red"></i></td>';
							}
							else {
								$out .= '<td><i class="fal fa-check-square"></i></td>';
							}
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

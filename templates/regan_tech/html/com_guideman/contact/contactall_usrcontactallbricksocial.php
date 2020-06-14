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

if (isset($this->item->sociallabels))
$col = 1;
foreach($this->item->sociallabels as $rel):
	$row [$col][1] = $rel->logo;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->sociallabels))
foreach($this->item->sociallabels as $rel):
	$row [$col][2] = $rel->type;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->sociallabels))
foreach($this->item->sociallabels as $rel):
	$row [$col][3] = $rel->link;
	$col++;
endforeach;
$col = 1;
if (isset($this->item->social))
foreach($this->item->social as $rel):
	$row [$col][4] = $rel->name;
	$col++;
endforeach;
//print_r($row);die;
?>
<fieldset class="fieldsfly fly-horizontal">

<div class="panel panel-primary">
	<div id="accordion-heading">
		<!-- Default panel contents -->
		<div class="panel-heading"><h3>&#160<i class="fas fa-user"></i>&#160<?php echo JText::_('GUIDEMAN_FIELDSET_SOCIAL_NETWORKING') ?>&#160&#160&#160<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour"><i class="fal fa-plus-circle"></i></h3></div></a></div>
	<div id="collapseFour" class="accordion-body collapse">
		<div class="accordion-inner">
			<!-- Table -->
		 <table class="table table-condensed table-hover">
				<thead>
					<tr>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_LOGO" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_SOCIAL_NETWORK" ); ?></th>
						<th><?php echo JText::_( "GUIDEMAN_FIELD_SOCIAL_NETWORK_ID" ); ?></th>
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
							if ($subelement == "none") {
								$out .= "<td></td>";
							} else {
								$out .= "<td>$subelement</td>";
							}
							break;
						case 2:
							$out .= "<td>$subelement</td>";
							break;
						case 3:
							// unused.
							break;
						case 4:
							if ($row [$key][3] == "none") {
								$out .= "<td>$subelement</td>";
							} else {
								$out .= '<td><a href="';
								$out .= $row [$key][3];
								$out .= $subelement;
								$out .= '"/ title="';
								$out .= $row [$key][2];
								$out .= '" target="_blank" rel="nofollow">';
								$out .= $subelement;
								$out .= '</a>';
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

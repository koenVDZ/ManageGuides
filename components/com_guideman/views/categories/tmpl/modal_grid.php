<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	Categories
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


JHtml::addIncludePath(JPATH_ADMIN_GUIDEMAN.'/helpers/html');
JHtml::_('behavior.tooltip');
//JHtml::_('behavior.multiselect');

$model		= $this->model;
$user		= JFactory::getUser();
$userId		= $user->get('id');
$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$saveOrder	= $listOrder == 'a.ordering' && $listDirn != 'desc';
?>

<div class="grid_wrapper">
	<table  class='table' id='grid-categories'>
		<thead>
			<tr>
				<th>
					<?php echo JText::_("GUIDEMAN_FIELD_MGCATEGORY"); ?>
				</th>

				<th width="10px">

				</th>
			</tr>
		</thead>
	
		<tbody>
			<?php
		//Get the name of the field to populate on return
		$modalObject = JFactory::getApplication()->input->get('object', null, 'cmd');

		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];
			?>


			<?php
			//Pickable rows
			//Receive the callback function
			$input = JFactory::getApplication()->input;
			$function	= $input->get('function', 'jSelectItem');
			//Prepare the params to send to the callback
			$pickValue = $row->id;
			$pickLabel = $this->escape(addslashes($row->MGcat));
			$jsPick = "if (window.parent) window.parent.$function('$pickValue', '$pickLabel', '$modalObject');"


			?>

			<tr class="<?php echo "row$k"; ?> pickable-row"
				style="cursor:pointer"
				onclick="<?php echo $jsPick; ?>">

				<td>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'MGcat',
						'dataObject' => $row
					));?>
				</td>

				<td width="10px">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => 'id',
						'dataObject' => $row
					));?>
				</td>

			</tr>
			<?php
			$k = 1 - $k;

		endfor;
		?>
		</tbody>
	</table>
</div>
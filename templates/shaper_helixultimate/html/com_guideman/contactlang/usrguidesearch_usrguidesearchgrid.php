<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.9   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.7
* @package		GuideManV2
* @subpackage	ContactLang
* @copyright	ManageGuides.com
* @author		Koenraad Vandezande - www.manageguides.com - koen@rioguides.com
* @license		GNU
*
*             .oooO  Oooo.
*             (   )  (   )
* -------------\ (----) /----------------------------------------------------------- +
*               \_)  (_/
*/

// no direct access// no direct access
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
JDom::_('framework.sortablelist', array(
	'domId' => 'grid-contactlang',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'contactlang',
	'proceedSaveOrderButton' => true,
));
?>

<div class="row">
	<table class='table table-sm' id='grid-contactlang'>
		<thead>
			<tr>
				<th style="text-align:center" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_PIC"); ?>
					</br>
				</th>

				<th style="text-align:center" width="5%">
					<?php echo JText::_("GUIDEMAN_FIELD_DG"); ?>
				</th>

				<th style="text-align:left" width="20%">
					<?php echo JText::_("GUIDEMAN_FIELD_GENDER"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_LANGUAGE"); ?>
				</th>

				<th style="text-align:left" width="40%">
					<?php echo JText::_("GUIDEMAN_FIELD_NAME") . ' / ' . JText::_("GUIDEMAN_FIELD_ALIAS") . ' / ' .  JText::_("GUIDEMAN_FIELD_ID"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_PROFICIENCY"); ?>
				</th>

				<th style="text-align:left" width="18%">
					<?php echo JText::_("GUIDEMAN_FIELD_COUNTRY"); ?>
					</br>
					<?php echo JText::_("GUIDEMAN_FIELD_STATE"); ?>
				</th>


				<th style="text-align:left" width="12%">
					<?php echo JText::_("GUIDEMAN_FIELD_ACTION"); ?>
				</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			?>
			<?php
			//Group results on : User ID > Name
			if (!isset($group_user_id) || ($row->user_id != $group_user_id)):?>
			<tr>
				<th colspan="6" class='grid-group grid-group-1'>
					<span>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => '_user_id_name',
							'dataObject' => $row
						));?>
					</span>
				</th>
			</tr>
			<tr  bgcolor="#FAFACD" class="<?php echo "row$k"; ?>">
				<td style="text-align:center" width="5%">
					<?php echo JDom::_('html.fly.file', array(
						'altKey' => 'created_by',
						'attrs' => array('center','crop','fit','format:jpeg'),
						'dataKey' => '_user_id_image',
						'dataObject' => $row,
						'height' => 40,
						'indirect' => false,
						'root' => '[DIR_CONTACTS_IMAGE]',
						'titleKey' => 'user_id',
						'tooltip' => true,
						'width' => 40
					));?>
				</td>

				<td style="text-align:center" width="5%">
					<?php if (JDom::_('html.fly', array('dataKey' => '_user_id_driverguide','dataObject' => $row)) === '0') :?>
						<span class="fa-stack fa-2x fa-fw">
						  <i class="fal fa-car fa-stack-1x" style="color:green"></i>
						  <i class="fas fa-ban fa-stack-2x" style="color:red"></i>
						</span>
					<?php else : ?>
						<i style="color:green" class="fal fa-car fa-2x"></i>
					<?php endif; ?>
				</td>

				<td style="text-align:left" width="20%">
					<?php echo JDom::_('html.fly.enum', array(
						'dataKey' => '_user_id_gender',
						'dataObject' => $row,
						'labelKey' => 'text',
						'list' => GuidemanHelperEnum::_('contacts_gender'),
						'listKey' => 'value'
					));?>
				</td>

				<td style="text-align:left" width="40%">
					<?php if (JDom::_('html.fly', array('dataKey' => '_user_id_nationality_iso_2','dataObject' => $row))) : ?>
						<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_user_id_nationality_iso_2','dataObject' => $row)));?>"></span>
					<?php endif; ?>
					<span><?php echo JDom::_('html.fly', array('dataKey' => '_user_id_name','dataObject' => $row));?></span>
					</br>
					<span class="badge badge-dark"><?php echo JDom::_('html.fly', array('dataKey' => '_user_id_alias','dataObject' => $row));?></span>
					<span class="badge badge-pill badge-danger"><?php echo JDom::_('html.fly', array('dataKey' => 'user_id','dataObject' => $row));?></span>
				</td>

				<td style="text-align:left" width="18%">
					<span class="flag-icon flag-icon-<?php echo strtolower(JDom::_('html.fly', array('dataKey' => '_user_id_country_id_iso_2','dataObject' => $row)));?>"></span>
					<?php echo JDom::_('html.fly', array('dataKey' => '_user_id_country_id_country_name','dataObject' => $row));?>
					<?php if (JDom::_('html.fly', array('dataKey' => '_user_id_state_id_abbreviation','dataObject' => $row))) echo ', ' . JDom::_('html.fly', array('dataKey' => '_user_id_state_id_abbreviation','dataObject' => $row));?>
					</br>
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_user_id_state_id_state',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left" width="12%">
					<?php $gebruikersID = JDom::_('html.fly', array('dataKey' => 'user_id','dataObject' => $row));
					$ce_details_ID = JDom::_('html.fly', array('dataKey' => '_user_id_ce_details_id','dataObject' => $row));?>
					<div class="btn-group">
					  <a class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo JText::_("GUIDEMAN_FIELD_ACTION"); ?>
							<span class="caret"></span>
					  </a>
					  <ul class="dropdown-menu">
							<a class="dropdown-item"  href="index.php?option=com_guideman&view=contact&layout=contactall&cid=<?php echo JDom::_('html.fly', array('dataKey' => 'user_id','dataObject' => $row)) ?>"><i class="fal fa-eye fa-fw"></i><?php echo JText::_("GUIDEMAN_FIELD_VIEW"); ?></a>
							<?php if (JDom::_('html.fly', array('dataKey' => '_user_id_ce_details_id','dataObject' => $row))) : ?>
								<a class="dropdown-item"  href="index.php?option=com_contactenhanced&view=contact&id=<?php echo JDom::_('html.fly', array('dataKey' => '_user_id_ce_details_id','dataObject' => $row)) ?>"><i class="fal fa-envelope fa-fw"></i><?php echo JText::_("GUIDEMAN_FIELD_MAIL"); ?></a>
							<?php endif; ?>
						</ul>
					</div>
				</td>
			</tr>
			<?php
			$group_user_id = $row->user_id;
			$k = 0;
			endif; ?>
			<tr class="<?php echo "row$k"; ?>">
				<td width="5%"></td>
				<td width="5%"></td>

				<td style="text-align:left" width="15%">
					<span class="flag-icon flag-icon-<?php echo JDom::_('html.fly', array('dataKey' => '_language_flag','dataObject' => $row));?> "></span>
					<?php echo JDom::_('html.fly', array('dataKey' => '_language_name','dataObject' => $row));?>
				</td>

				<td style="text-align:left"  width="35%">
					<?php
						$proficiency_level  = JDom::_('html.fly', array('dataKey' => 'prof_level','dataObject' => $row));
//						var_dump($row); die;
						$out = '<span class="label label-warning">';
						switch($proficiency_level){
							case "0":
								$out .= '<i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
								break;
							case "1":
								$out .= '<i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
								break;
							case "2":
								$out .= '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
								break;
							case "3":
								$out .= '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
								break;
							case "4":
								$out .= '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>';
								break;
							case "5":
								$out .= '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>';
								break;
							default:
								break;
						}
//						echo $proficiency_level;
						echo $out . '</span>';
					?>
					<?php echo JDom::_('html.fly.enum', array('dataKey' => 'prof_level','dataObject' => $row,'labelKey' => 'text','list' => GuidemanHelper::enumList('contactlang', 'prof_level'),'listKey' => 'value'));?>
				</td>
				<td width="15%"></td>
				<td width="10%"></td>
				<td width="15%"></td>
			<?php
			$k = 1 - $k;
		endfor;
		?>
		</tbody>
	</table>
</div>

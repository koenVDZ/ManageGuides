<?php
/**                               ______________________________________________
*                          o O   |                                              |
*                 (((((  o      <    Generated with Cook Self Service  V3.1.4   |
*                ( o o )         |______________________________________________|
* --------oOOO-----(_)-----OOOo---------------------------------- www.j-cook.pro --- +
* @version		2.2.1
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
	'domId' => 'grid-social',
	'listOrder' => $listOrder,
	'listDirn' => $listDirn,
	'formId' => 'adminForm',
	'ctrl' => 'social',
	'proceedSaveOrderButton' => true,
));
?>

<div class="clearfix"></div>
<div class="row-fluid">
	<table class='table table-sm' id='grid-social'>
		<thead>
			<tr>
				<?php if ($model->canSelect()): ?>
				<th>
					<?php echo JDom::_('html.form.input.checkbox', array(
						'dataKey' => 'checkall-toggle',
						'title' => JText::_('JGLOBAL_CHECK_ALL'),
						'selectors' => array(
							'onclick' => 'Joomla.checkAll(this);'
						)
					)); ?>
				</th>
				<?php endif; ?>

				<?php if ($model->canEditState()): ?>
				<th class="center hidden-xs" style="text-align:center" width="1%">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_HEADING_ORDERING", 'a.ordering', $listDirn, $listOrder ); ?>
				</th>
				<?php endif; ?>

				<th style="text-align:center" width="50px">
					<?php echo JText::_("GUIDEMAN_FIELD_LOGO"); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_LABEL", '_labelid_.type', $listDirn, $listOrder ); ?>
				</th>

				<th style="text-align:left">
					<?php echo JHTML::_('grid.sort',  "GUIDEMAN_FIELD_NAME", 'a.name', $listDirn, $listOrder ); ?>
				</th>

			</tr>
		</thead>
		<tbody>
		<?php
		$k = 0;
		for ($i=0, $n=count( $this->items ); $i < $n; $i++):
			$row = $this->items[$i];

			// KOEN 02/04/17
			if ($model->canEditState()) {
				$StateColorArray = GuidemanHelperFilehelp::GetBackGroundColor(JDom::_('html.fly', array('ctrl' => 'contacts','dataKey' => 'published','dataObject' => $row,'num' => $i)));
			}
			else {
				$StateColorArray = array( "status" => "", "button" => "");
			}
			?>
			<?php
			//Group results on : User ID > Name
			if (!isset($group_user_id) || ($row->user_id != $group_user_id)):?>
			<tr>
				<th colspan="5" class='grid-group grid-group-1'>
					<span>
						<?php echo JDom::_('html.fly', array(
							'dataKey' => '_user_id_name',
							'dataObject' => $row
						));?>
					</span>
				</th>
			</tr>
			<?php
			$group_user_id = $row->user_id;
			$k = 0;
			endif;
			// KOEN 02/04/17

			if (!$StateColorArray ['status'] ) : ?>
				<tr class="<?php echo "row$k"; ?>">
			<?php else : ?>
				<tr class="<?php echo $StateColorArray ['status'] . ' ' . "row$k"; ?>">
			<?php endif;
			// KOEN 02/04/17 ?>
				<?php if ($model->canSelect()): ?>
				<td>
					<?php if ($row->params->get('access-edit') || $row->params->get('tag-checkedout')): ?>
						<?php echo JDom::_('html.grid.checkedout', array(
													'dataObject' => $row,
													'num' => $i
														));
						?>
					<?php endif; ?>
				</td>
				<?php endif; ?>

				<?php if ($model->canEditState()): ?>
				<td class="center hidden-xs" style="text-align:center" width="1%">
					<?php echo GuidemanHelperPermutations::IcomoonMenu(JDom::_('html.grid.ordering', array('aclAccess' => 'core.edit.state','dataKey' => 'ordering','dataObject' => $row,'enabled' => $saveOrder)));?>
				</td>
				<?php endif; ?>

				<td style="text-align:center" width="50px">
					<?php echo JDom::_('html.fly.file', array(
						'attrs' => array('crop'),
						'dataKey' => '_labelid_logo',
						'dataObject' => $row,
						'height' => 'auto',
						'indirect' => false,
						'root' => '[DIR_SOCIALLABELS_LOGO]',
						'width' => 'auto'
					));?>
				</td>

				<td style="text-align:left">
					<?php echo JDom::_('html.fly', array(
						'dataKey' => '_labelid_type',
						'dataObject' => $row
					));?>
				</td>

				<td style="text-align:left">
					<?php
						$labelid = intval($row->labelid);
						switch ($labelid) {
							case 1:
								?>
									<a href="https://facebook.com/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Facebook" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 2:
								?>
									<a href="https://plus.google.com/u/0/+<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Google+" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 3:
								?>
									<a href="skype:<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>?call" title"Call using Skype" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 4:
								?>
									<a href="http://<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Website" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 5:
								?>
									<a href="http://twitter.com/#!/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Twitter" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 6:
								?>
									<a href="https://linkedin.com/in/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Linkedin" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 7:
								?>
									<a href="http://youtube.com/user/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"YouTube" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 8:
								?>
									<a href="https://www.flickr.com/people/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Flickr" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 11:
								?>
									<a href="https://vimeo.com/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Vimeo" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 12:
								?>
									<a href="https://www.tumblr.com/blog/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Tumblr" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 14:
								?>
									<a href="https://www.instagram.com/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>/" title"Instagram" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 15:
								?>
									<a href="https://plus.google.com/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Blogger" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 16:
								?>
									<a href="https://foursquare.com/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Foursquare" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 17:
								?>
									<a href="http://<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>.yelp.com" title"Yelp" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 20:
								?>
									<a href="mailto:<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>?subject=ManageGuides" title"eMail" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 21:
								?>
									<a href="https://www.pinterest.com/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>"/ title"Pinterest" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 22:
								?>
									<a href="mailto:<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>?subject=ManageGuides" title"eMail" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 24:
								?>
									<a href="http://www.viadeo.com/en/profile/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Viadeo" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							case 34:
								?>
									<a href="https://telegram.me/<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>" title"Telegram" target="_blank" rel="nofollow"><?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?></a>
								<?php
								break;
							default:
							?>
								<?php echo JDom::_('html.fly', array('dataKey' => 'name','dataObject' => $row));?>
							<?php
							break;
						}
					?>
				</td>

			</tr>
			<?php
			$k = 1 - $k;
		endfor;
		?>
		</tbody>
	</table>
</div>

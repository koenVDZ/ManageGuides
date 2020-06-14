<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_navigate_profile
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
$lang = JFactory::getLanguage();
$lang_tag = $lang->getTag();
// echo "taal: " . $lang_tag;
?>
<?php switch ($lang_tag) {
	case "en-GB":?>
	<form id="mod-navigate_profile" action="<?php echo JRoute::_($route); ?>" method="get" class="form-search">
		<span class="visible-desktop">
			<body bgcolor="FFFFFF">
				<div class="well">
					<div class="row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<div class="span1">
									<center>
										<a href="index.php/account"><em class="fa fa-user fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_ACCOUNT'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/companies"><em class="fa fa-building fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_COMPANIES'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/addresses"><em class="fa fa-home fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_ADDRESSES'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/phones"><em class="fa fa-phone fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_PHONES'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/documents"><em class="fa fa-file-text-o fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_DOCUMENTS'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/languages"><em class="fa fa-language fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_LANGUAGES'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/social"><em class="fa fa-users fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_NETWORKING'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/vehicles"><em class="fa fa-car fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_VEHICLES'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/bank-accounts"><em class="fa fa-university fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_BANKS'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/linked-accounts"><em class="fa fa-users fa-2x fa-border"></em></a>
										<h6>Linked Accounts</h6>
									</center>
								</div>
								<div class="span1">
									<center>
											<em class="fa fa-facebook fa-2x fa-border"></em>
										<h6>Facebook Settings</h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/membership-information"><em class="fa fa-shopping-cart fa-2x fa-border"></em></a>
										<h6>Membership Information</h6>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</body>
			</form>
		</span>
		<span class="hidden-desktop">
			<body bgcolor="FFFFFF">
				<div class="well">
					<div class="row-fluid">
						<div class="span12">
							<center>
								<a href="index.php/account"><em class="fa fa-user fa-border"></em></a>
								<a href="index.php/companies"><em class="fa fa-building fa-border"></em></a>
								<a href="index.php/addresses"><em class="fa fa-home fa-border"></em></a>
								<a href="index.php/phones"><em class="fa fa-phone fa-border"></em></a>
								<a href="index.php/documents"><em class="fa fa-file-text-o fa-border"></em></a>
								<a href="index.php/languages"><em class="fa fa-language fa-border"></em></a>
								<a href="index.php/social"><em class="fa fa-users fa-border"></em></a>
								<a href="index.php/vehicles"><em class="fa fa-car fa-border"></em></a>
								<a href="index.php/bank-accounts"><em class="fa fa-university fa-border"></em></a>
								<a href="index.php/linked-accounts"><em class="fa fa-users fa-border"></em></a>
								<em class="fa fa-facebook fa-border"></em>
								<a href="index.php/membership-information"><em class="fa fa-shopping-cart fa-border"></em></a>
							</center>
						</div>
					</div>
				</div>
			</body>
			</form>
		</span>
<?php break;
case "nl-NL": ?>
		<form id="mod-navigate_profile" action="<?php echo JRoute::_($route); ?>" method="get" class="form-search">
			<span class="visible-desktop">
				<body bgcolor="FFFFFF">
					<div class="well">
						<div class="row-fluid">
							<div class="span12">
								<div class="row-fluid">
									<div class="span1">
										<center>
											<a href="index.php/nl/account-nl"><em class="fa fa-user fa-2x fa-border"></em></a>
											<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_ACCOUNT'); ?></h6>
										</center>
									</div>
									<div class="span1">
										<center>
											<a href="index.php/nl/companies-nl"><em class="fa fa-building fa-2x fa-border"></em></a>
											<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_COMPANIES'); ?></h6>
										</center>
									</div>
									<div class="span1">
										<center>
											<a href="index.php/nl/addresses-nl"><em class="fa fa-home fa-2x fa-border"></em></a>
											<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_ADDRESSES'); ?></h6>
										</center>
									</div>
									<div class="span1">
										<center>
											<a href="index.php/nl/phones-nl"><em class="fa fa-phone fa-2x fa-border"></em></a>
											<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_PHONES'); ?></h6>
										</center>
									</div>
									<div class="span1">
										<center>
											<a href="index.php/nl/documents-nl"><em class="fa fa-file-text-o fa-2x fa-border"></em></a>
											<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_DOCUMENTS'); ?></h6>
										</center>
									</div>
									<div class="span1">
										<center>
											<a href="index.php/nl/languages-nl"><em class="fa fa-language fa-2x fa-border"></em></a>
											<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_LANGUAGES'); ?></h6>
										</center>
									</div>
									<div class="span1">
										<center>
											<a href="index.php/nl/social-nl"><em class="fa fa-users fa-2x fa-border"></em></a>
											<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_NETWORKING'); ?></h6>
										</center>
									</div>
									<div class="span1">
										<center>
											<a href="index.php/nl/vehicles-nl"><em class="fa fa-car fa-2x fa-border"></em></a>
											<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_VEHICLES'); ?></h6>
										</center>
									</div>
									<div class="span1">
										<center>
											<a href="index.php/nl/bank-accounts-nl"><em class="fa fa-university fa-2x fa-border"></em></a>
											<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_BANKS'); ?></h6>
										</center>
									</div>
									<div class="span1">
										<center>
											<a href="index.php/nl/linked-accounts-nl"><em class="fa fa-users fa-2x fa-border"></em></a>
											<h6>Linked Accounts</h6>
										</center>
									</div>
									<div class="span1">
										<center>
												<em class="fa fa-facebook fa-2x fa-border"></em>
											<h6>Facebook Settings</h6>
										</center>
									</div>
									<div class="span1">
										<center>
											<a href="index.php/nl/membership-information-nl"><em class="fa fa-shopping-cart fa-2x fa-border"></em></a>
											<h6>Membership Information</h6>
										</center>
									</div>
								</div>
							</div>
						</div>
					</div>
				</body>
				</form>
			</span>
			<span class="hidden-desktop">
				<body bgcolor="FFFFFF">
					<div class="well">
						<div class="row-fluid">
							<div class="span12">
								<div class="row-fluid">
									<div class="span1">
										<center>
											<a href="index.php/nl/account-nl"><em class="fa fa-user fa-border"></em></a>
											<a href="index.php/nl/companies-nl"><em class="fa fa-building fa-border"></em></a>
											<a href="index.php/nl/addresses-nl"><em class="fa fa-home fa-border"></em></a>
											<a href="index.php/nl/phones-nl"><em class="fa fa-phone fa-border"></em></a>
											<a href="index.php/nl/documents-nl"><em class="fa fa-file-text-o fa-border"></em></a>
											<a href="index.php/nl/languages-nl"><em class="fa fa-language fa-border"></em></a>
											<a href="index.php/nl/social-nl"><em class="fa fa-users fa-border"></em></a>
											<a href="index.php/nl/vehicles-nl"><em class="fa fa-car fa-border"></em></a>
											<a href="index.php/nl/bank-accounts-nl"><em class="fa fa-university fa-border"></em></a>
											<a href="index.php/nl/linked-accounts-nl"><em class="fa fa-users fa-border"></em></a>
											<em class="fa fa-facebook fa-border"></em>
											<a href="index.php/nl/membership-information-nl"><em class="fa fa-shopping-cart fa-border"></em></a>
										</center>
									</div>
								</div>
							</div>
						</div>
					</div>
				</body>
			</form>
		</span>
	<?php break;
	case "fr-FR": ?>
	<form id="mod-navigate_profile" action="<?php echo JRoute::_($route); ?>" method="get" class="form-search">
	<span class="visible-desktop">
		<body bgcolor="FFFFFF">
			<div class="well">
				<div class="row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<div class="span1">
								<center>
									<a href="index.php/fr/account-fr"><em class="fa fa-user fa-2x fa-border"></em></a>
									<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_ACCOUNT'); ?></h6>
								</center>
							</div>
							<div class="span1">
								<center>
									<a href="index.php/fr/companies-fr"><em class="fa fa-building fa-2x fa-border"></em></a>
									<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_COMPANIES'); ?></h6>
								</center>
							</div>
							<div class="span1">
								<center>
									<a href="index.php/fr/addresses-fr"><em class="fa fa-home fa-2x fa-border"></em></a>
									<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_ADDRESSES'); ?></h6>
								</center>
							</div>
							<div class="span1">
								<center>
									<a href="index.php/fr/phones-fr"><em class="fa fa-phone fa-2x fa-border"></em></a>
									<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_PHONES'); ?></h6>
								</center>
							</div>
							<div class="span1">
								<center>
									<a href="index.php/fr/documents-fr"><em class="fa fa-file-text-o fa-2x fa-border"></em></a>
									<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_DOCUMENTS'); ?></h6>
								</center>
							</div>
							<div class="span1">
								<center>
									<a href="index.php/fr/languages-fr"><em class="fa fa-language fa-2x fa-border"></em></a>
									<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_LANGUAGES'); ?></h6>
								</center>
							</div>
							<div class="span1">
								<center>
									<a href="index.php/fr/social-fr"><em class="fa fa-users fa-2x fa-border"></em></a>
									<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_NETWORKING'); ?></h6>
								</center>
							</div>
							<div class="span1">
								<center>
									<a href="index.php/fr/vehicles-fr"><em class="fa fa-car fa-2x fa-border"></em></a>
									<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_VEHICLES'); ?></h6>
								</center>
							</div>
							<div class="span1">
								<center>
									<a href="index.php/fr/bank-accounts-fr"><em class="fa fa-university fa-2x fa-border"></em></a>
									<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_BANKS'); ?></h6>
								</center>
							</div>
							<div class="span1">
								<center>
									<a href="index.php/fr/linked-accounts-fr"><em class="fa fa-users fa-2x fa-border"></em></a>
									<h6>Linked Accounts</h6>
								</center>
							</div>
							<div class="span1">
								<center>
										<em class="fa fa-facebook fa-2x fa-border"></em>
									<h6>Facebook Settings</h6>
								</center>
							</div>
							<div class="span1">
								<center>
									<a href="index.php/fr/membership-information-fr"><em class="fa fa-shopping-cart fa-2x fa-border"></em></a>
									<h6>Membership Information</h6>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
		</form>
	</span>
	<span class="hidden-desktop">
		<body bgcolor="FFFFFF">
			<div class="well">
				<div class="row-fluid">
					<div class="span12">
						<div class="row-fluid">
							<div class="span1">
								<center>
									<a href="index.php/fr/account-fr"><em class="fa fa-user fa-border"></em></a>
									<a href="index.php/fr/companies-fr"><em class="fa fa-building fa-border"></em></a>
									<a href="index.php/fr/addresses-fr"><em class="fa fa-home fa-border"></em></a>
									<a href="index.php/fr/phones-fr"><em class="fa fa-phone fa-border"></em></a>
									<a href="index.php/fr/documents-fr"><em class="fa fa-file-text-o fa-border"></em></a>
									<a href="index.php/fr/languages-fr"><em class="fa fa-language fa-border"></em></a>
									<a href="index.php/fr/social-fr"><em class="fa fa-users fa-border"></em></a>
									<a href="index.php/fr/vehicles-fr"><em class="fa fa-car fa-border"></em></a>
									<a href="index.php/fr/bank-accounts-fr"><em class="fa fa-university fa-border"></em></a>
									<a href="index.php/fr/linked-accounts-fr"><em class="fa fa-users fa-border"></em></a>
										<em class="fa fa-facebook fa-border"></em>
									<a href="index.php/fr/membership-information-fr"><em class="fa fa-shopping-cart fa-border"></em></a>
								</center>
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
		</form>
	</span>
	<?php break;
	case "pt-BR": ?>
		<form id="mod-navigate_profile" action="<?php echo JRoute::_($route); ?>" method="get" class="form-search">
			<span class="visible-desktop">
			<body bgcolor="FFFFFF">
				<div class="well">
					<div class="row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<div class="span1">
									<center>
										<a href="index.php/pt/account-br"><em class="fa fa-user fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_ACCOUNT'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/pt/companies-br"><em class="fa fa-building fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_COMPANIES'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/pt/addresses-br"><em class="fa fa-home fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_ADDRESSES'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/pt/phones-br"><em class="fa fa-phone fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_PHONES'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/pt/documents-br"><em class="fa fa-file-text-o fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_DOCUMENTS'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/pt/languages-br"><em class="fa fa-language fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_LANGUAGES'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/pt/social-br"><em class="fa fa-users fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_NETWORKING'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/pt/vehicles-br"><em class="fa fa-car fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_VEHICLES'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/pt/bank-accounts-br"><em class="fa fa-university fa-2x fa-border"></em></a>
										<h6><?php echo ' ' . JText::_('TPL_MG_EDIT_PROFILE_BANKS'); ?></h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/pt/linked-accounts-br"><em class="fa fa-users fa-2x fa-border"></em></a>
										<h6>Linked Accounts</h6>
									</center>
								</div>
								<div class="span1">
									<center>
											<em class="fa fa-facebook fa-2x fa-border"></em>
										<h6>Facebook Settings</h6>
									</center>
								</div>
								<div class="span1">
									<center>
										<a href="index.php/pt/membership-information-br"><em class="fa fa-shopping-cart fa-2x fa-border"></em></a>
										<h6>Membership Information</h6>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</body>
			</form>
		</span>
		<span class="hidden-desktop">
			<body bgcolor="FFFFFF">
				<div class="well">
					<div class="row-fluid">
						<div class="span12">
							<div class="row-fluid">
								<div class="span1">
									<center>
										<a href="index.php/pt/account-br"><em class="fa fa-user fa-border"></em></a>
										<a href="index.php/pt/companies-br"><em class="fa fa-building fa-border"></em></a>
										<a href="index.php/pt/addresses-br"><em class="fa fa-home fa-border"></em></a>
										<a href="index.php/pt/phones-br"><em class="fa fa-phone fa-border"></em></a>
										<a href="index.php/pt/documents-br"><em class="fa fa-file-text-o fa-border"></em></a>
										<a href="index.php/pt/languages-br"><em class="fa fa-language fa-border"></em></a>
										<a href="index.php/pt/social-br"><em class="fa fa-users fa-border"></em></a>
										<a href="index.php/pt/vehicles-br"><em class="fa fa-car fa-border"></em></a>
										<a href="index.php/pt/bank-accounts-br"><em class="fa fa-university fa-border"></em></a>
										<a href="index.php/pt/linked-accounts-br"><em class="fa fa-users fa-border"></em></a>
											<em class="fa fa-facebook fa-border"></em>
										<a href="index.php/pt/membership-information-br"><em class="fa fa-shopping-cart fa-border"></em></a>
									</center>
								</div>
							</div>
						</div>
					</div>
				</div>
			</body>
			</form>
		</span>
<?php break;} ?>

<?php
require_once('vertex/cms_core_functions.php');
s5_restricted_access_call();
/*
-----------------------------------------
Regan Tech - Shape 5 Club Design
-----------------------------------------
Site:      shape5.com
Email:     contact@shape5.com
@license:  Copyrighted Commercial Software
@copyright (C) 2016 Shape 5 LLC

*/
/*	_____________________________
			Added by Koen
		______________________________ */
		switch ($lang->getTag()) {
  		case "en-GB":
  			$url_override = "index.php/register-uk";
  			break;
  		case "fr-FR":
  			$url_override = "register-fr";
  			break;
  		case "nl-NL":
  			$url_override = "register-nl";
  			break;
  		case "pt-BR":
  			$url_override = "register-pt";
  			break;
  		case "es-ES":
  			$url_override = "register-es";
  			break;
  		default:
  			$url_override = "";
  			break;
  	}
?>
<!DOCTYPE HTML>
<html <?php s5_language_call(); ?>>
<head>
<script src="https://kit.fontawesome.com/fe289ad137.js"></script>
<?php s5_head_call(); ?>
<?php
require_once("vertex/parameters.php");
require_once("vertex/general_functions.php");
require_once("vertex/module_calcs.php");
if ($s5_scrolltotop  == "yes") {
$s5_scrolltotop = "override";
}
require_once("vertex/includes/vertex_includes_header.php");
?>

<?php if(($s5_fonts_highlight1 != "Arial") && ($s5_fonts_highlight1 != "Helvetica") && ($s5_fonts_highlight1 != "Sans-Serif")) { ?>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=<?php echo str_replace(" ","%20",$s5_fonts_highlight1); if ($s5_fonts_highlight1_style != "") { echo ":".$s5_fonts_highlight1_style; } ?>" />
<?php } ?>
<link rel="stylesheet" href="<?php echo JUri::root(true); ?>/media/jui/css/flag-icon/css/flag-icon.min.css">

<style type="text/css">
.highlight_font, #subMenusContainer, h1, h2, h3, h4, h5, #s5_nav, #subMenusContainer, .btn, .button, button, .readon, p.readmore a, a.k2ReadMore, .userItemReadMore, div.catItemCommentsLink, .userItemCommentsLink, a.readmore-link, a.comments-link, div.itemCommentsForm form input, .large_title, .large_title_sub, ul.s5_masonry_articles li a, .s5_masonry_articletitle, .tabs_above .s5_tab_show_slide_button_inactive, .tabs_above .s5_tab_show_slide_button_active, .tab_product_bottom, #s5_accordion_menu h3, #subMenusContainer, #snipcart-header, .snipcart-btn, #snipcart-main-container #snipcart-actions a.snipcart-finalize, #snipcart-main-container #snipcart-actions a.snipcart-next, #snipcart-main-container #snipcart-actions .snipcart-btn, #snipcart-main-container #snipcart-actions a.snipcart-previous, #snipcart-header #snipcart-title, #snipcart-main-container #snipcart-cartitems-continue-top, #snipcart-main-container #snipcart-apply-discount button {
font-family: <?php echo $s5_fonts_highlight1; ?> !important;
}

body, .inputbox {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;}

<?php if ($s5_background_image_url != "") { ?>
#s5_body_inner_wrap {
background:url(<?php if(strrpos($s5_background_image_url,"/") <= 0) {echo $LiveSiteUrl; echo "images/";} echo $s5_background_image_url; ?>) no-repeat top center;
}
<?php } ?>

#s5_search_wrap:hover, .btn-link, a, .highlight1_color, .s5_icon_search_close:hover, .stats_icon, .module_round_box_outer ul li a:hover {
color:#<?php echo $s5_highlightcolor1; ?>;
}

.S5_submenu_item:hover a, .S5_grouped_child_item .S5_submenu_item:hover a, .s5_masonry_articletitle a:hover, .bottom_info_email, #s5_bottom_menu_wrap a:hover, .tab_product_button .button:hover, ul.menu li.current a, ul.s5_am_innermenu a:hover {
color:#<?php echo $s5_highlightcolor1; ?> !important;
}

.highlight2_color, #s5_nav li.mainMenuParentBtnFocused a, #s5_nav li.mainMenuParentBtn a:hover, #s5_nav li.active a, ul.s5_masonry_articles li.s5_masonry_active a, .checkmark_list i, .tabs_above .s5_tab_show_slide_button_active, .tab_product_price {
color:#<?php echo $s5_highlightcolor2; ?> !important;
}

/* #s5_pos_custom_2, .button, .s5_ls_readmore, .dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover > a, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-list > .active > a, .nav-list > .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover, .btn-group.open .btn-primary.dropdown-toggle, .btn-primary, .item-page .dropdown-menu li > a:hover, .blog .dropdown-menu li > a:hover, .item .dropdown-menu li > a:hover, .btn, .pagenav a, .ac-container label:hover, .ac-container2 label:hover, p.readmore a:hover, #s5_login:hover, #s5_register:hover, .tab_product_button, .product_overview_highlight_icon1, #s5_accordion_menu h3:hover, .module_round_box.gray #s5_accordion_menu h3:hover, .module_round_box.highlight1 {
background:#<?php echo $s5_highlightcolor1; ?> !important;
} */

.btn, .button, button, .readon, p.readmore a, a.k2ReadMore, .userItemReadMore, div.catItemCommentsLink, .userItemCommentsLink, a.readmore-link, a.comments-link, div.itemCommentsForm form input {
background:#<?php echo $s5_highlightcolor1; ?>;
}

.readon:hover, p.readmore:hover a, .readon:hover, .button:hover, button:hover, #s5_accordion_menu h3.s5_am_open, .module_round_box.gray #s5_accordion_menu h3.s5_am_open, .pagenav a:hover, .s5_tab_show_slide_button_active, .s5_masoncat, .product_overview_highlight_icon2, .module_round_box.highlight2, #snipcart-cartcontent-next:hover, #snipcart-main-container a.snipcart-finalize:hover, #snipcart-main-container a.snipcart-mainaction:hover, #snipcart-main-container a.snipcart-next:hover, .snipcart-btn:hover, .snipcart-total-items:hover {
background:#<?php echo $s5_highlightcolor2; ?> !important;
color:#<?php echo $s5_highlightcolor1; ?> !important;
}

#s5_masondisplay_container .item:nth-child(7) .s5_masonwrapinner, #s5_masondisplay_container .item:nth-child(14) .s5_masonwrapinner, #s5_masondisplay_container .item:nth-child(21) .s5_masonwrapinner {
background:#<?php echo $s5_highlightcolor1; ?> !important;
}

#snipcart-main-container a.snipcart-finalize, #snipcart-main-container a.snipcart-mainaction, #snipcart-main-container a.snipcart-next {background:#<?php echo $s5_highlightcolor1; ?> !important; color:#ffffff !important;border:none !important;}

.snipcart-total-items {background-color:#<?php echo $s5_highlightcolor1; ?>}

<?php if ($s5_pos_custom_5 == "published") { ?>
#s5_bottom_row3_area1 {
padding-top:175px;
}
#s5_bottom_row2_area1 {
padding-bottom:150px;
}

@media screen and (max-width: 1100px){
#s5_bottom_row3_area1 {
padding-top:90px;
}
#s5_bottom_row2_area1 {
padding-bottom:65px;
padding-top:95px;
}
}
<?php } ?>

<?php if ($s5_uppercase == "yes") { ?>
.uppercase, button, .button, .readon, .readmore a, .pagenav a, .btn, #s5_nav li, .ul_stats h3, #s5_login, #s5_register, .split_title .s5_mod_h3, ul.s5_masonry_articles li, .s5_masoncat, .tabs_above .s5_tab_show_slide_button_inactive, .tabs_above .s5_tab_show_slide_button_active, .module_round_box.uppercase_title .s5_mod_h3, .bottom_info_text {
text-transform:uppercase;
}
<?php } ?>

<?php if ($s5_hide_subarrows == "yes") { ?>
.mainParentBtn a, #s5_nav li.mainParentBtn:hover a, #s5_nav li.mainMenuParentBtnFocused.mainParentBtn a {
background:none !important;
}
#s5_nav li.mainParentBtn .s5_level1_span2 a {
padding:0px;
}
<?php } ?>


<?php if ($s5_pos_right == "published" || $s5_pos_right_inset == "published" || $s5_pos_right_top == "published" || $s5_pos_right_bottom == "published") { ?>
#s5_center_column_wrap_inner {
padding-right:5%;
}
@media screen and (max-width: 1100px){
#s5_center_column_wrap_inner {
padding-right:2.5%;
}
}
<?php } ?>

<?php if ($s5_pos_left == "published" || $s5_pos_left_inset == "published" || $s5_pos_left_top == "published" || $s5_pos_left_bottom == "published") { ?>
#s5_center_column_wrap_inner {
padding-left:5%;
}
@media screen and (max-width: 1100px){
#s5_center_column_wrap_inner {
padding-left:2.5%;
}
}
<?php } ?>

<?php if ($s5_pos_custom_2 == "published" && $s5_pos_custom_3 == "published") { ?>
.s5_custom_23_width {
width:50%;
}
<?php } ?>

<?php if ($s5_pos_top_row1_1 == "unpublished" && $s5_pos_top_row1_2 == "unpublished" && $s5_pos_top_row1_3 == "unpublished" && $s5_pos_top_row1_4 == "unpublished" && $s5_pos_top_row1_5 == "unpublished" && $s5_pos_top_row1_6 == "unpublished" && $s5_pos_top_row2_1 == "unpublished" && $s5_pos_top_row2_2 == "unpublished" && $s5_pos_top_row2_3 == "unpublished" && $s5_pos_top_row2_4 == "unpublished" && $s5_pos_top_row2_5 == "unpublished" && $s5_pos_top_row2_6 == "unpublished" && $s5_pos_top_row3_1 == "unpublished" && $s5_pos_top_row3_2 == "unpublished" && $s5_pos_top_row3_3 == "unpublished" && $s5_pos_top_row3_4 == "unpublished" && $s5_pos_top_row3_5 == "unpublished" && $s5_pos_top_row3_6 == "unpublished") { ?>
#s5_bread_login_font_wrap {
background:#FAFAFA;
}
#s5_center_area1 {
padding-top:80px;
}
@media screen and (max-width: 970px){
#s5_center_area1 {
padding-top:40px;
}
}
<?php } ?>

<?php if ($browser == "ie7" || $browser == "ie8" || $browser == "ie9") { ?>
.s5_lr_tab_inner {writing-mode: bt-rl;filter: flipV flipH;}
<?php } ?>

<?php if($s5_thirdparty == "enabled") { ?>
/* k2 stuff */
div.itemHeader h2.itemTitle, div.catItemHeader h3.catItemTitle, h3.userItemTitle a, #comments-form p, #comments-report-form p, #comments-form span, #comments-form .counter, #comments .comment-author, #comments .author-homepage,
#comments-form p, #comments-form #comments-form-buttons, #comments-form #comments-form-error, #comments-form #comments-form-captcha-holder {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;}
<?php } ?>
.s5_wrap{width:<?php echo $s5_body_width; echo $s5_fixed_fluid ?>;}
</style>
</head>

<body id="s5_body">

<div id="s5_scrolltotop"></div>

<!-- Top Vertex Calls -->
<?php require_once("vertex/includes/vertex_includes_top.php"); ?>

<!-- Body Padding Div Used For Responsive Spacing -->
<div id="s5_body_padding">
<div id="s5_body_inner_wrap">


	<!-- Header -->
		<header id="s5_header_area1"<?php if ($s5_pos_custom_1 == "published") { ?> class="s5_header_custom1"<?php } ?>>
		<div id="s5_header_area2">
		<div id="s5_header_area_inner" class="s5_wrap">
			<div id="s5_header_wrap">
					<div id="s5_menu_wrap">
						<div id="s5_menu_inner">
							<?php if($s5_logo_type != "none") { ?>
								<div id="s5_logo_wrap" class="s5_logo s5_logo_<?php echo $s5_logo_type; ?>">
									<?php if ($s5_logo_type == "css") { ?>
										<img alt="logo" src="<?php echo $s5_directory_path ?>/images/s5_logo.png" onclick="window.document.location.href='<?php echo $LiveSiteUrl; ?>'" />
									<?php } ?>
									<?php if ($s5_logo_type == "image") {
										if(strrpos($s5_logo_image_file,"ttp://") > 0) { ?>
											<img alt="logo" src="<?php echo $s5_logo_image_file; ?>" onclick="window.document.location.href='<?php echo $LiveSiteUrl ?>'" />
										<?php } else { ?>
											<img alt="logo" src="<?php echo $LiveSiteUrl; echo $s5_logo_image_file; ?>" onclick="window.document.location.href='<?php echo $LiveSiteUrl ?>'" />
										<?php } ?>
									<?php } ?>
									<?php if ($s5_pos_logo == "published" && $s5_logo_type == "module") { ?>
										<div id="s5_logo_text_wrap">
											<?php s5_module_call('logo','notitle'); ?>
											<div style="clear:both;"></div>
										</div>
									<?php } ?>
									<?php if ($s5_logo_type == "text") { ?>
										<div id="s5_logo_text_wrap">
											<?php echo $s5_logo_text; ?>
											<div style="clear:both;"></div>
										</div>
									<?php } ?>
									<div style="clear:both;"></div>
								</div>
							<?php } ?>
							<?php if ($s5_show_menu == "show") { ?>
							<nav>
								<?php include("vertex/s5flex_menu/default.php"); ?>
							</nav>
							<?php } ?>
							<?php if ($s5_pos_cart == "published" || $s5_pos_search == "published") { ?>
							<div id="s5_cart_search_wrap">
								<?php if ($s5_pos_search == "published") { ?>
									<div onclick="s5_search_open()" id="s5_search_wrap" class="ion-search"></div>
									<div id="s5_search_overlay" class="s5_search_close">
										<div class="ion-close s5_icon_search_close" onclick="s5_search_close()"></div>
										<div class="s5_wrap">
											<div id="s5_search_pos_wrap">
											<?php s5_module_call('search','round_box'); ?>
											</div>
										</div>
									</div>
								<?php } ?>
								<?php if ($s5_pos_cart == "published") { ?>
									<div id="s5_pos_cart">
									<div id="s5_pos_cart_inner">
										<?php s5_module_call('cart','no_title'); ?>
										<div style="clear:both; height:0px"></div>
									</div>
									</div>
								<?php } ?>
								<div style="clear:both; height:0px"></div>
								</div>
							<?php } ?>
							<div style="clear:both; height:0px"></div>
						</div>
					</div>
				<div style="clear:both; height:0px"></div>
			</div>
		</div>
		</div>
		</header>
	<!-- End Header -->

	<?php if ($s5_pos_custom_1 == "published") { ?>
		<div id="s5_pos_custom_1">
		<div id="s5_pos_custom_1_inner" class="s5_wrap">
			<?php s5_module_call('custom_1','no_title'); ?>
			<div style="clear:both; height:0px"></div>
		</div>
		</div>
	<?php } ?>


	<div class="s5_wrap" id="s5_content_body_wrap">

	<?php if ($s5_pos_custom_2 == "published" || $s5_pos_custom_3 == "published") { ?>
		<div id="s5_custom_23_wrap">
			<?php if ($s5_pos_custom_2 == "published") { ?>
				<div id="s5_pos_custom_2" class="s5_custom_23_width">
				<div id="s5_pos_custom_2_inner">
					<?php s5_module_call('custom_2','no_title'); ?>
					<div style="clear:both; height:0px"></div>
				</div>
				</div>
			<?php } ?>

			<?php if ($s5_pos_custom_3 == "published") { ?>
				<div id="s5_pos_custom_3" class="s5_custom_23_width">
				<div id="s5_pos_custom_3_inner">
					<?php s5_module_call('custom_3','no_title'); ?>
					<div style="clear:both; height:0px"></div>
				</div>
				</div>
			<?php } ?>
			<div style="clear:both; height:0px"></div>
		</div>
	<?php } ?>

	<?php if ($s5_login != "" || $s5_register != "" || $s5_font_resizer == "yes" || $s5_pos_breadcrumb == "published") { ?>

		<div id="s5_bread_login_font_wrap">

			<?php if($s5_font_resizer == "yes") { ?>
				<div id="fontControls"></div>
			<?php } ?>

			<?php if (($s5_login != "") || ($s5_register != "")) { ?>
				<div id="s5_loginreg">
					<div id="s5_logregtm">
						<?php if (($s5_register != "" && $s5_pos_register == "published") || ($s5_register != "" && $s5_register_url != "")) { ?>
							<?php if ($s5_user_id) { } else {?>
								<div class= "register_btn" id="s5_register">
									<a href = "<?php echo $url_override; ?>">
									<?php echo $s5_register ;?>
								</a>
								</div>
							<?php } ?>
						<?php } ?>
						<?php if (($s5_login != "" && $s5_pos_login == "published") || ($s5_login != "" && $s5_login_url != "")) { ?>
							<div id="s5_login" class="s5box_login">
								<?php if ($s5_user_id) { echo $s5_loginout; } else { echo $s5_login; } ?>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } ?>

			<?php if ($s5_pos_breadcrumb == "published") { ?>
				<div id="s5_breadcrumb_wrap">
					<?php s5_module_call('breadcrumb','notitle'); ?>
				</div>
				<div style="clear:both;"></div>
			<?php } ?>

			<div style="clear:both; height:0px"></div>
		</div>

	<?php } ?>

	<!-- Top Row1 -->
		<?php if ($s5_pos_top_row1_1 == "published" || $s5_pos_top_row1_2 == "published" || $s5_pos_top_row1_3 == "published" || $s5_pos_top_row1_4 == "published" || $s5_pos_top_row1_5 == "published" || $s5_pos_top_row1_6 == "published") { ?>
			<section id="s5_top_row1_area1"<?php if ($s5_top_row1_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_top_row1_area1_background_color == "FFFFFF" && $s5_top_row1_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_top_row1_area2"<?php if ($s5_top_row1_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_top_row1_area2_background_color == "FFFFFF" && $s5_top_row1_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_top_row1_area_inner">

				<div id="s5_top_row1_wrap">
				<div id="s5_top_row1">
				<div id="s5_top_row1_inner">

					<?php if ($s5_pos_top_row1_1 == "published") { ?>
						<div id="s5_pos_top_row1_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_1_width ?>%">
							<?php s5_module_call('top_row1_1','round_box'); ?>
						</div>
					<?php } ?>

					<?php if ($s5_pos_top_row1_2 == "published") { ?>
						<div id="s5_pos_top_row1_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_2_width ?>%">
							<?php s5_module_call('top_row1_2','round_box'); ?>
						</div>
					<?php } ?>

					<?php if ($s5_pos_top_row1_3 == "published") { ?>
						<div id="s5_pos_top_row1_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_3_width ?>%">
							<?php s5_module_call('top_row1_3','round_box'); ?>
						</div>
					<?php } ?>

					<?php if ($s5_pos_top_row1_4 == "published") { ?>
						<div id="s5_pos_top_row1_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_4_width ?>%">
							<?php s5_module_call('top_row1_4','round_box'); ?>
						</div>
					<?php } ?>

					<?php if ($s5_pos_top_row1_5 == "published") { ?>
						<div id="s5_pos_top_row1_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_5_width ?>%">
							<?php s5_module_call('top_row1_5','round_box'); ?>
						</div>
					<?php } ?>

					<?php if ($s5_pos_top_row1_6 == "published") { ?>
						<div id="s5_pos_top_row1_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_6_width ?>%">
							<?php s5_module_call('top_row1_6','round_box'); ?>
						</div>
					<?php } ?>

					<div style="clear:both; height:0px"></div>

				</div>
				</div>
				</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Top Row1 -->



	<!-- Top Row2 -->
		<?php if ($s5_pos_top_row2_1 == "published" || $s5_pos_top_row2_2 == "published" || $s5_pos_top_row2_3 == "published" || $s5_pos_top_row2_4 == "published" || $s5_pos_top_row2_5 == "published" || $s5_pos_top_row2_6 == "published") { ?>
		<section id="s5_top_row2_area1"<?php if ($s5_top_row2_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_top_row2_area1_background_color == "FFFFFF" && $s5_top_row2_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_top_row2_area2"<?php if ($s5_top_row2_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_top_row2_area2_background_color == "FFFFFF" && $s5_top_row2_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_top_row2_area_inner">

			<div id="s5_top_row2_wrap">
			<div id="s5_top_row2">
			<div id="s5_top_row2_inner">

				<?php if ($s5_pos_top_row2_1 == "published") { ?>
					<div id="s5_pos_top_row2_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_1_width ?>%">
						<?php s5_module_call('top_row2_1','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_top_row2_2 == "published") { ?>
					<div id="s5_pos_top_row2_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_2_width ?>%">
						<?php s5_module_call('top_row2_2','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_top_row2_3 == "published") { ?>
					<div id="s5_pos_top_row2_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_3_width ?>%">
						<?php s5_module_call('top_row2_3','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_top_row2_4 == "published") { ?>
					<div id="s5_pos_top_row2_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_4_width ?>%">
						<?php s5_module_call('top_row2_4','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_top_row2_5 == "published") { ?>
					<div id="s5_pos_top_row2_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_5_width ?>%">
						<?php s5_module_call('top_row2_5','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_top_row2_6 == "published") { ?>
					<div id="s5_pos_top_row2_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_6_width ?>%">
						<?php s5_module_call('top_row2_6','round_box'); ?>
					</div>
				<?php } ?>

				<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Top Row2 -->



	<!-- Top Row3 -->
		<?php if ($s5_pos_top_row3_1 == "published" || $s5_pos_top_row3_2 == "published" || $s5_pos_top_row3_3 == "published" || $s5_pos_top_row3_4 == "published" || $s5_pos_top_row3_5 == "published" || $s5_pos_top_row3_6 == "published") { ?>
		<section id="s5_top_row3_area1"<?php if ($s5_top_row3_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_top_row3_area1_background_color == "FFFFFF" && $s5_top_row3_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_top_row3_area2"<?php if ($s5_top_row3_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_top_row3_area2_background_color == "FFFFFF" && $s5_top_row3_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_top_row3_area_inner">

			<div id="s5_top_row3_wrap">
			<div id="s5_top_row3">
			<div id="s5_top_row3_inner">

				<?php if ($s5_pos_top_row3_1 == "published") { ?>
					<div id="s5_pos_top_row3_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_1_width ?>%">
						<?php s5_module_call('top_row3_1','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_top_row3_2 == "published") { ?>
					<div id="s5_pos_top_row3_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_2_width ?>%">
						<?php s5_module_call('top_row3_2','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_top_row3_3 == "published") { ?>
					<div id="s5_pos_top_row3_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_3_width ?>%">
						<?php s5_module_call('top_row3_3','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_top_row3_4 == "published") { ?>
					<div id="s5_pos_top_row3_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_4_width ?>%">
						<?php s5_module_call('top_row3_4','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_top_row3_5 == "published") { ?>
					<div id="s5_pos_top_row3_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_5_width ?>%">
						<?php s5_module_call('top_row3_5','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_top_row3_6 == "published") { ?>
					<div id="s5_pos_top_row3_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_6_width ?>%">
						<?php s5_module_call('top_row3_6','round_box'); ?>
					</div>
				<?php } ?>

				<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Top Row3 -->



	<!-- Center area -->
		<?php if ($s5_show_component == "yes" || $s5_pos_left_top == "published" || $s5_pos_left == "published" || $s5_pos_left_inset == "published" || $s5_pos_left_bottom == "published" || $s5_pos_right_top == "published" || $s5_pos_right == "published" || $s5_pos_right_inset == "published" || $s5_pos_right_bottom == "published" || $s5_pos_middle_top_1 == "published" || $s5_pos_middle_top_2 == "published" || $s5_pos_middle_top_3 == "published" || $s5_pos_middle_top_4 == "published" || $s5_pos_middle_top_5 == "published" || $s5_pos_middle_top_6 == "published" || $s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published" || $s5_pos_middle_bottom_1 == "published" || $s5_pos_middle_bottom_2 == "published" || $s5_pos_middle_bottom_3 == "published" || $s5_pos_middle_bottom_4 == "published" || $s5_pos_middle_bottom_5 == "published" || $s5_pos_middle_bottom_6 == "published" || $s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published" || $s5_pos_above_columns_1 == "published" ||  $s5_pos_above_columns_2 == "published" ||  $s5_pos_above_columns_3 == "published" ||  $s5_pos_above_columns_4 == "published" ||  $s5_pos_above_columns_5 == "published" ||  $s5_pos_above_columns_6 == "published" ||  $s5_pos_below_columns_1 == "published" ||  $s5_pos_below_columns_2 == "published" ||  $s5_pos_below_columns_3 == "published" ||  $s5_pos_below_columns_4 == "published" ||  $s5_pos_below_columns_5 == "published" ||  $s5_pos_below_columns_6 == "published") { ?>
		<section id="s5_center_area1"<?php if ($s5_center_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_center_area1_background_color == "FFFFFF" && $s5_center_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_center_area2"<?php if ($s5_center_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_center_area2_background_color == "FFFFFF" && $s5_center_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_center_area_inner">

		<!-- Above Columns Wrap -->
			<?php if ($s5_pos_above_columns_1 == "published" || $s5_pos_above_columns_2 == "published" || $s5_pos_above_columns_3 == "published" || $s5_pos_above_columns_4 == "published" || $s5_pos_above_columns_5 == "published" || $s5_pos_above_columns_6 == "published") { ?>
			<section id="s5_above_columns_wrap1"<?php if ($s5_above_columns_wrap1_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_above_columns_wrap1_background_color == "FFFFFF" && $s5_above_columns_wrap1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_above_columns_wrap2"<?php if ($s5_above_columns_wrap2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_above_columns_wrap2_background_color == "FFFFFF" && $s5_above_columns_wrap2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_above_columns_inner">

				<?php if ($s5_pos_above_columns_1 == "published") { ?>
					<div id="s5_above_columns_1" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_1_width ?>%">
						<?php s5_module_call('above_columns_1','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_above_columns_2 == "published") { ?>
					<div id="s5_above_columns_2" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_2_width ?>%">
						<?php s5_module_call('above_columns_2','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_above_columns_3 == "published") { ?>
					<div id="s5_above_columns_3" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_3_width ?>%">
						<?php s5_module_call('above_columns_3','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_above_columns_4 == "published") { ?>
					<div id="s5_above_columns_4" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_4_width ?>%">
						<?php s5_module_call('above_columns_4','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_above_columns_5 == "published") { ?>
					<div id="s5_above_columns_5" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_5_width ?>%">
						<?php s5_module_call('above_columns_5','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_above_columns_6 == "published") { ?>
					<div id="s5_above_columns_6" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_6_width ?>%">
						<?php s5_module_call('above_columns_6','round_box'); ?>
					</div>
				<?php } ?>

				<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</section>
			<?php } ?>
		<!-- End Above Columns Wrap -->

			<!-- Columns wrap, contains left, right and center columns -->
			<section id="s5_columns_wrap"<?php if ($s5_columns_wrap_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_columns_wrap_background_color == "FFFFFF" && $s5_columns_wrap_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_columns_wrap_inner"<?php if ($s5_columns_wrap_inner_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_columns_wrap_inner_background_color == "FFFFFF" && $s5_columns_wrap_inner_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>

				<section id="s5_center_column_wrap">
				<div id="s5_center_column_wrap_inner" style="margin-left:<?php echo $s5_center_column_margin_left ?>px; margin-right:<?php echo $s5_center_column_margin_right ?>px;">

					<?php if ($s5_pos_middle_top_1 == "published" || $s5_pos_middle_top_2 == "published" || $s5_pos_middle_top_3 == "published" || $s5_pos_middle_top_4 == "published" || $s5_pos_middle_top_5 == "published" || $s5_pos_middle_top_6 == "published") { ?>

						<section id="s5_middle_top_wrap">

							<div id="s5_middle_top">
							<div id="s5_middle_top_inner">

								<?php if ($s5_pos_middle_top_1 == "published") { ?>
									<div id="s5_pos_middle_top_1" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_1_width ?>%">
										<?php s5_module_call('middle_top_1','round_box'); ?>
									</div>
								<?php } ?>

								<?php if ($s5_pos_middle_top_2 == "published") { ?>
									<div id="s5_pos_middle_top_2" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_2_width ?>%">
										<?php s5_module_call('middle_top_2','round_box'); ?>
									</div>
								<?php } ?>

								<?php if ($s5_pos_middle_top_3 == "published") { ?>
									<div id="s5_pos_middle_top_3" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_3_width ?>%">
										<?php s5_module_call('middle_top_3','round_box'); ?>
									</div>
								<?php } ?>

								<?php if ($s5_pos_middle_top_4 == "published") { ?>
									<div id="s5_pos_middle_top_4" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_4_width ?>%">
										<?php s5_module_call('middle_top_4','round_box'); ?>
									</div>
								<?php } ?>

								<?php if ($s5_pos_middle_top_5 == "published") { ?>
									<div id="s5_pos_middle_top_5" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_5_width ?>%">
										<?php s5_module_call('middle_top_5','round_box'); ?>
									</div>
								<?php } ?>

								<?php if ($s5_pos_middle_top_6 == "published") { ?>
									<div id="s5_pos_middle_top_6" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_6_width ?>%">
										<?php s5_module_call('middle_top_6','round_box'); ?>
									</div>
								<?php } ?>

								<div style="clear:both; height:0px"></div>

							</div>
							</div>

						</section>

					<?php } ?>

					<?php if ($s5_show_component == "yes" || $s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published" || $s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published") { ?>

						<section id="s5_component_wrap">
						<div id="s5_component_wrap_inner">

							<?php if ($s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published") { ?>

								<section id="s5_above_body_wrap">

									<div id="s5_above_body">
									<div id="s5_above_body_inner">

										<?php if ($s5_pos_above_body_1 == "published") { ?>
											<div id="s5_pos_above_body_1" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_1_width ?>%">
												<?php s5_module_call('above_body_1','round_box'); ?>
											</div>
										<?php } ?>

										<?php if ($s5_pos_above_body_2 == "published") { ?>
											<div id="s5_pos_above_body_2" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_2_width ?>%">
												<?php s5_module_call('above_body_2','round_box'); ?>
											</div>
										<?php } ?>

										<?php if ($s5_pos_above_body_3 == "published") { ?>
											<div id="s5_pos_above_body_3" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_3_width ?>%">
												<?php s5_module_call('above_body_3','round_box'); ?>
											</div>
										<?php } ?>

										<?php if ($s5_pos_above_body_4 == "published") { ?>
											<div id="s5_pos_above_body_4" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_4_width ?>%">
												<?php s5_module_call('above_body_4','round_box'); ?>
											</div>
										<?php } ?>

										<?php if ($s5_pos_above_body_5 == "published") { ?>
											<div id="s5_pos_above_body_5" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_5_width ?>%">
												<?php s5_module_call('above_body_5','round_box'); ?>
											</div>
										<?php } ?>

										<?php if ($s5_pos_above_body_6 == "published") { ?>
											<div id="s5_pos_above_body_6" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_6_width ?>%">
												<?php s5_module_call('above_body_6','round_box'); ?>
											</div>
										<?php } ?>

										<div style="clear:both; height:0px"></div>

									</div>
									</div>

								</section>

							<?php } ?>

							<?php if ($s5_show_component == "yes") { ?>
							<main>
								<?php s5_component_call(); ?>
								<div style="clear:both;height:0px"></div>
							</main>
							<?php } ?>

							<?php if ($s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published") { ?>

								<section id="s5_below_body_wrap">

									<div id="s5_below_body">
									<div id="s5_below_body_inner">

										<?php if ($s5_pos_below_body_1 == "published") { ?>
											<div id="s5_pos_below_body_1" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_1_width ?>%">
												<?php s5_module_call('below_body_1','round_box'); ?>
											</div>
										<?php } ?>

										<?php if ($s5_pos_below_body_2 == "published") { ?>
											<div id="s5_pos_below_body_2" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_2_width ?>%">
												<?php s5_module_call('below_body_2','round_box'); ?>
											</div>
										<?php } ?>

										<?php if ($s5_pos_below_body_3 == "published") { ?>
											<div id="s5_pos_below_body_3" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_3_width ?>%">
												<?php s5_module_call('below_body_3','round_box'); ?>
											</div>
										<?php } ?>

										<?php if ($s5_pos_below_body_4 == "published") { ?>
											<div id="s5_pos_below_body_4" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_4_width ?>%">
												<?php s5_module_call('below_body_4','round_box'); ?>
											</div>
										<?php } ?>

										<?php if ($s5_pos_below_body_5 == "published") { ?>
											<div id="s5_pos_below_body_5" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_5_width ?>%">
												<?php s5_module_call('below_body_5','round_box'); ?>
											</div>
										<?php } ?>

										<?php if ($s5_pos_below_body_6 == "published") { ?>
											<div id="s5_pos_below_body_6" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_6_width ?>%">
												<?php s5_module_call('below_body_6','round_box'); ?>
											</div>
										<?php } ?>

										<div style="clear:both; height:0px"></div>

									</div>
									</div>
								</section>

							<?php } ?>

						</div>
						</section>

					<?php } ?>

					<?php if ($s5_pos_middle_bottom_1 == "published" || $s5_pos_middle_bottom_2 == "published" || $s5_pos_middle_bottom_3 == "published" || $s5_pos_middle_bottom_4 == "published" || $s5_pos_middle_bottom_5 == "published" || $s5_pos_middle_bottom_6 == "published") { ?>

						<section id="s5_middle_bottom_wrap">

							<div id="s5_middle_bottom">
							<div id="s5_middle_bottom_inner">

								<?php if ($s5_pos_middle_bottom_1 == "published") { ?>
									<div id="s5_pos_middle_bottom_1" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_1_width ?>%">
										<?php s5_module_call('middle_bottom_1','round_box'); ?>
									</div>
								<?php } ?>

								<?php if ($s5_pos_middle_bottom_2 == "published") { ?>
									<div id="s5_pos_middle_bottom_2" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_2_width ?>%">
										<?php s5_module_call('middle_bottom_2','round_box'); ?>
									</div>
								<?php } ?>

								<?php if ($s5_pos_middle_bottom_3 == "published") { ?>
									<div id="s5_pos_middle_bottom_3" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_3_width ?>%">
										<?php s5_module_call('middle_bottom_3','round_box'); ?>
									</div>
								<?php } ?>

								<?php if ($s5_pos_middle_bottom_4 == "published") { ?>
									<div id="s5_pos_middle_bottom_4" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_4_width ?>%">
										<?php s5_module_call('middle_bottom_4','round_box'); ?>
									</div>
								<?php } ?>

								<?php if ($s5_pos_middle_bottom_5 == "published") { ?>
									<div id="s5_pos_middle_bottom_5" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_5_width ?>%">
										<?php s5_module_call('middle_bottom_5','round_box'); ?>
									</div>
								<?php } ?>

								<?php if ($s5_pos_middle_bottom_6 == "published") { ?>
									<div id="s5_pos_middle_bottom_6" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_6_width ?>%">
										<?php s5_module_call('middle_bottom_6','round_box'); ?>
									</div>
								<?php } ?>

								<div style="clear:both; height:0px"></div>

							</div>
							</div>

						</section>

					<?php } ?>

				</div>
				</section>
				<!-- Left column -->
				<?php if($s5_pos_left == "published" || $s5_pos_left_inset == "published" || $s5_pos_left_top == "published" || $s5_pos_left_bottom == "published") { ?>
					<aside id="s5_left_column_wrap" class="s5_float_left"<?php if ($s5_columns_fixed_fluid == "px") { ?> style="width:<?php echo $s5_left_column_width ?>px"<?php } ?>>
					<div id="s5_left_column_wrap_inner">
						<?php if($s5_pos_left_top == "published") { ?>
							<div id="s5_left_top_wrap" class="s5_float_left"<?php if ($s5_columns_fixed_fluid == "px") { ?> style="width:<?php echo $s5_left_column_width ?>px"<?php } ?>>
								<?php s5_module_call('left_top','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left == "published") { ?>
							<div id="s5_left_wrap" class="s5_float_left"<?php if ($s5_columns_fixed_fluid == "px") { ?> style="width:<?php echo $s5_left_width ?>px"<?php } ?>>
								<?php s5_module_call('left','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left_inset == "published") { ?>
							<div id="s5_left_inset_wrap" class="s5_float_left"<?php if ($s5_columns_fixed_fluid == "px") { ?> style="width:<?php echo $s5_left_inset_width ?>px"<?php } ?>>
								<?php s5_module_call('left_inset','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left_bottom == "published") { ?>
							<div id="s5_left_bottom_wrap" class="s5_float_left"<?php if ($s5_columns_fixed_fluid == "px") { ?> style="width:<?php echo $s5_left_column_width ?>px"<?php } ?>>
								<?php s5_module_call('left_bottom','round_box'); ?>
							</div>
						<?php } ?>
						<div style="clear:both;height:0px;"></div>
					</div>
					</aside>
				<?php } ?>
				<!-- End Left column -->
				<!-- Right column -->
				<?php if($s5_pos_right == "published" || $s5_pos_right_inset == "published" || $s5_pos_right_top == "published" || $s5_pos_right_bottom == "published") { ?>
					<aside id="s5_right_column_wrap" class="s5_float_left"<?php if ($s5_columns_fixed_fluid == "px") { ?> style="width:<?php echo $s5_right_column_width ?>px; margin-left:-<?php echo $s5_right_column_width + $s5_left_column_width ?>px"<?php } ?>>
					<div id="s5_right_column_wrap_inner">
						<?php if($s5_pos_right_top == "published") { ?>
							<div id="s5_right_top_wrap" class="s5_float_left"<?php if ($s5_columns_fixed_fluid == "px") { ?> style="width:<?php echo $s5_right_column_width ?>px"<?php } ?>>
								<?php s5_module_call('right_top','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right_inset == "published") { ?>
							<div id="s5_right_inset_wrap" class="s5_float_left"<?php if ($s5_columns_fixed_fluid == "px") { ?> style="width:<?php echo $s5_right_inset_width ?>px"<?php } ?>>
								<?php s5_module_call('right_inset','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right == "published") { ?>
							<div id="s5_right_wrap" class="s5_float_left"<?php if ($s5_columns_fixed_fluid == "px") { ?> style="width:<?php echo $s5_right_width ?>px"<?php } ?>>
								<?php s5_module_call('right','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right_bottom == "published") { ?>
							<div id="s5_right_bottom_wrap" class="s5_float_left"<?php if ($s5_columns_fixed_fluid == "px") { ?> style="width:<?php echo $s5_right_column_width ?>px"<?php } ?>>
								<?php s5_module_call('right_bottom','round_box'); ?>
							</div>
						<?php } ?>
						<div style="clear:both;height:0px;"></div>
					</div>
					</aside>
				<?php } ?>
				<!-- End Right column -->
				<div style="clear:both;height:0px;"></div>
			</div>
			</section>
			<!-- End columns wrap -->

		<!-- Below Columns Wrap -->
			<?php if ($s5_pos_below_columns_1 == "published" || $s5_pos_below_columns_2 == "published" || $s5_pos_below_columns_3 == "published" || $s5_pos_below_columns_4 == "published" || $s5_pos_below_columns_5 == "published" || $s5_pos_below_columns_6 == "published") { ?>
			<section id="s5_below_columns_wrap1"<?php if ($s5_below_columns_wrap1_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_below_columns_wrap1_background_color == "FFFFFF" && $s5_below_columns_wrap1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_below_columns_wrap2"<?php if ($s5_below_columns_wrap2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_below_columns_wrap2_background_color == "FFFFFF" && $s5_below_columns_wrap2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_below_columns_inner">

						<?php if ($s5_pos_below_columns_1 == "published") { ?>
							<div id="s5_below_columns_1" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_1_width ?>%">
								<?php s5_module_call('below_columns_1','round_box'); ?>
							</div>
						<?php } ?>

						<?php if ($s5_pos_below_columns_2 == "published") { ?>
							<div id="s5_below_columns_2" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_2_width ?>%">
								<?php s5_module_call('below_columns_2','round_box'); ?>
							</div>
						<?php } ?>

						<?php if ($s5_pos_below_columns_3 == "published") { ?>
							<div id="s5_below_columns_3" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_3_width ?>%">
								<?php s5_module_call('below_columns_3','round_box'); ?>
							</div>
						<?php } ?>

						<?php if ($s5_pos_below_columns_4 == "published") { ?>
							<div id="s5_below_columns_4" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_4_width ?>%">
								<?php s5_module_call('below_columns_4','round_box'); ?>
							</div>
						<?php } ?>

						<?php if ($s5_pos_below_columns_5 == "published") { ?>
							<div id="s5_below_columns_5" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_5_width ?>%">
								<?php s5_module_call('below_columns_5','round_box'); ?>
							</div>
						<?php } ?>

						<?php if ($s5_pos_below_columns_6 == "published") { ?>
							<div id="s5_below_columns_6" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_6_width ?>%">
								<?php s5_module_call('below_columns_6','round_box'); ?>
							</div>
						<?php } ?>

						<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</section>
			<?php } ?>
		<!-- End Below Columns Wrap -->


		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Center area -->


	<?php if ($s5_pos_custom_4 == "published") { ?>
		<div id="s5_pos_custom_4">
		<div id="s5_pos_custom_4_inner">
			<?php s5_module_call('custom_4','round_box'); ?>
			<div style="clear:both; height:0px"></div>
		</div>
		</div>
	<?php } ?>


	<!-- Bottom Row1 -->
		<?php if ($s5_pos_bottom_row1_1 == "published" || $s5_pos_bottom_row1_2 == "published" || $s5_pos_bottom_row1_3 == "published" || $s5_pos_bottom_row1_4 == "published" || $s5_pos_bottom_row1_5 == "published" || $s5_pos_bottom_row1_6 == "published") { ?>
			<section id="s5_bottom_row1_area1"<?php if ($s5_bottom_row1_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_bottom_row1_area1_background_color == "FFFFFF" && $s5_bottom_row1_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_bottom_row1_area2"<?php if ($s5_bottom_row1_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_bottom_row1_area2_background_color == "FFFFFF" && $s5_bottom_row1_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_bottom_row1_area_inner">

				<div id="s5_bottom_row1_wrap">
				<div id="s5_bottom_row1">
				<div id="s5_bottom_row1_inner">

					<?php if ($s5_pos_bottom_row1_1 == "published") { ?>
						<div id="s5_pos_bottom_row1_1" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_1_width ?>%">
							<?php s5_module_call('bottom_row1_1','round_box'); ?>
						</div>
					<?php } ?>

					<?php if ($s5_pos_bottom_row1_2 == "published") { ?>
						<div id="s5_pos_bottom_row1_2" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_2_width ?>%">
							<?php s5_module_call('bottom_row1_2','round_box'); ?>
						</div>
					<?php } ?>

					<?php if ($s5_pos_bottom_row1_3 == "published") { ?>
						<div id="s5_pos_bottom_row1_3" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_3_width ?>%">
							<?php s5_module_call('bottom_row1_3','round_box'); ?>
						</div>
					<?php } ?>

					<?php if ($s5_pos_bottom_row1_4 == "published") { ?>
						<div id="s5_pos_bottom_row1_4" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_4_width ?>%">
							<?php s5_module_call('bottom_row1_4','round_box'); ?>
						</div>
					<?php } ?>

					<?php if ($s5_pos_bottom_row1_5 == "published") { ?>
						<div id="s5_pos_bottom_row1_5" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_5_width ?>%">
							<?php s5_module_call('bottom_row1_5','round_box'); ?>
						</div>
					<?php } ?>

					<?php if ($s5_pos_bottom_row1_6 == "published") { ?>
						<div id="s5_pos_bottom_row1_6" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_6_width ?>%">
							<?php s5_module_call('bottom_row1_6','round_box'); ?>
						</div>
					<?php } ?>

					<div style="clear:both; height:0px"></div>

				</div>
				</div>
				</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Bottom Row1 -->


	<!-- Bottom Row2 -->
		<?php if ($s5_pos_bottom_row2_1 == "published" || $s5_pos_bottom_row2_2 == "published" || $s5_pos_bottom_row2_3 == "published" || $s5_pos_bottom_row2_4 == "published" || $s5_pos_bottom_row2_5 == "published" || $s5_pos_bottom_row2_6 == "published") { ?>
		<section id="s5_bottom_row2_area1"<?php if ($s5_bottom_row2_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_bottom_row2_area1_background_color == "FFFFFF" && $s5_bottom_row2_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_bottom_row2_area2"<?php if ($s5_bottom_row2_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_bottom_row2_area2_background_color == "FFFFFF" && $s5_bottom_row2_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_bottom_row2_area_inner">

			<div id="s5_bottom_row2_wrap">
			<div id="s5_bottom_row2">
			<div id="s5_bottom_row2_inner">
				<?php if ($s5_pos_bottom_row2_1 == "published") { ?>
					<div id="s5_pos_bottom_row2_1" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_1_width ?>%">
						<?php s5_module_call('bottom_row2_1','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_bottom_row2_2 == "published") { ?>
					<div id="s5_pos_bottom_row2_2" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_2_width ?>%">
						<?php s5_module_call('bottom_row2_2','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_bottom_row2_3 == "published") { ?>
					<div id="s5_pos_bottom_row2_3" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_3_width ?>%">
						<?php s5_module_call('bottom_row2_3','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_bottom_row2_4 == "published") { ?>
					<div id="s5_pos_bottom_row2_4" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_4_width ?>%">
						<?php s5_module_call('bottom_row2_4','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_bottom_row2_5 == "published") { ?>
					<div id="s5_pos_bottom_row2_5" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_5_width ?>%">
						<?php s5_module_call('bottom_row2_5','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_bottom_row2_6 == "published") { ?>
					<div id="s5_pos_bottom_row2_6" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_6_width ?>%">
						<?php s5_module_call('bottom_row2_6','round_box'); ?>
					</div>
				<?php } ?>

				<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Bottom Row2 -->

	<?php if ($s5_pos_custom_5 == "published") { ?>
		<div id="s5_pos_custom_5">
		<div id="s5_pos_custom_5_inner">
			<?php s5_module_call('custom_5','no_title'); ?>
			<div style="clear:both; height:0px"></div>
		</div>
		</div>
	<?php } ?>

	<!-- Bottom Row3 -->
		<?php if ($s5_pos_bottom_row3_1 == "published" || $s5_pos_bottom_row3_2 == "published" || $s5_pos_bottom_row3_3 == "published" || $s5_pos_bottom_row3_4 == "published" || $s5_pos_bottom_row3_5 == "published" || $s5_pos_bottom_row3_6 == "published") { ?>
		<section id="s5_bottom_row3_area1"<?php if ($s5_bottom_row3_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_bottom_row3_area1_background_color == "FFFFFF" && $s5_bottom_row3_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_bottom_row3_area2"<?php if ($s5_bottom_row3_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_bottom_row3_area2_background_color == "FFFFFF" && $s5_bottom_row3_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_bottom_row3_area_inner">

			<div id="s5_bottom_row3_wrap">
			<div id="s5_bottom_row3">
			<div id="s5_bottom_row3_inner">

				<?php if ($s5_pos_bottom_row3_1 == "published") { ?>
					<div id="s5_pos_bottom_row3_1" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_1_width ?>%">
						<?php s5_module_call('bottom_row3_1','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_bottom_row3_2 == "published") { ?>
					<div id="s5_pos_bottom_row3_2" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_2_width ?>%">
						<?php s5_module_call('bottom_row3_2','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_bottom_row3_3 == "published") { ?>
					<div id="s5_pos_bottom_row3_3" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_3_width ?>%">
						<?php s5_module_call('bottom_row3_3','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_bottom_row3_4 == "published") { ?>
					<div id="s5_pos_bottom_row3_4" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_4_width ?>%">
						<?php s5_module_call('bottom_row3_4','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_bottom_row3_5 == "published") { ?>
					<div id="s5_pos_bottom_row3_5" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_5_width ?>%">
						<?php s5_module_call('bottom_row3_5','round_box'); ?>
					</div>
				<?php } ?>

				<?php if ($s5_pos_bottom_row3_6 == "published") { ?>
					<div id="s5_pos_bottom_row3_6" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_6_width ?>%">
						<?php s5_module_call('bottom_row3_6','round_box'); ?>
					</div>
				<?php } ?>

				<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Bottom Row3 -->


	<!-- Footer Area -->
		<footer id="s5_footer_area1" class="s5_slidesection">
		<div id="s5_footer_area2">
		<div id="s5_footer_area_inner">

			<?php if ($s5_pos_custom_6 == "published") { ?>
				<div id="s5_pos_custom_6">
					<?php s5_module_call('custom_6','no_title'); ?>
					<div style="clear:both; height:0px"></div>
				</div>
			<?php } ?>

			<?php if($s5_pos_footer == "published") { ?>
				<div id="s5_footer_module">
					<?php s5_module_call('footer','notitle'); ?>
					<?php if($s5_pos_language == "published") { ?>
						<div id="s5_language_wrap">
							<?php require_once("vertex/language_position.php"); ?>
						</div>
					<?php } ?>
				</div>
			<?php } else { ?>
				<div id="s5_footer">
					<?php require_once("vertex/footer.php"); ?>
					<?php if($s5_pos_language == "published") { ?>
						<div id="s5_language_wrap">
							<?php require_once("vertex/language_position.php"); ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>

			<?php if($s5_pos_bottom_menu == "published") { ?>
				<div id="s5_bottom_menu_wrap">
					<?php s5_module_call('bottom_menu','notitle'); ?>
				</div>
			<?php } ?>
			<div style="clear:both; height:0px"></div>

			<?php if ($s5_scrolltotop == "override") { ?>
				<div id="s5_scroll_wrap">
					<?php require_once("vertex/page_scroll.php"); ?>
				</div>
			<?php } ?>

		</div>
		</div>
		</footer>
	<!-- End Footer Area -->


	</div>

	<?php s5_module_call('debug','round_box'); ?>

	<!-- Bottom Vertex Calls -->
	<?php require_once("vertex/includes/vertex_includes_bottom.php"); ?>

</div>
</div>
<!-- End Body Padding -->

<?php if ($s5_pos_search == "published") { ?>
<script>
function s5_search_open() {
	document.getElementById('s5_search_overlay').className = "s5_search_open";
	if (document.getElementById("s5_drop_down_container")) {
		document.getElementById("s5_drop_down_container").style.display = "none";
	}
}
function s5_search_close() {
	document.getElementById('s5_search_overlay').className = "s5_search_close";
	if (document.getElementById("s5_drop_down_container")) {
		document.getElementById("s5_drop_down_container").style.display = "block";
	}
}
</script>
<?php } ?>
<script>
function s5_tab_product_inner_height() {
	var s5_tab_product_inner_height_holder = 1;
	var s5_tab_product_inner_height1 = document.getElementById("s5_body").querySelectorAll('DIV');
	for (var s5_tab_product_inner_height1_y=0; s5_tab_product_inner_height1_y<s5_tab_product_inner_height1.length; s5_tab_product_inner_height1_y++) {
		if (s5_tab_product_inner_height1[s5_tab_product_inner_height1_y].className.indexOf("ab_product_inner") >= 0) {
			s5_tab_product_inner_height1[s5_tab_product_inner_height1_y].style.minHeight = "1px";
			if (s5_tab_product_inner_height1[s5_tab_product_inner_height1_y].offsetHeight > s5_tab_product_inner_height_holder) {
				s5_tab_product_inner_height_holder = s5_tab_product_inner_height1[s5_tab_product_inner_height1_y].offsetHeight;
			}
		}
	}
	if (document.body.offsetWidth >= 550) {
	var s5_tab_product_inner_height2 = document.getElementById("s5_body").querySelectorAll('DIV');
	for (var s5_tab_product_inner_height2_y=0; s5_tab_product_inner_height2_y<s5_tab_product_inner_height2.length; s5_tab_product_inner_height2_y++) {
		if (s5_tab_product_inner_height2[s5_tab_product_inner_height2_y].className.indexOf("ab_product_inner") >= 0) {
			s5_tab_product_inner_height2[s5_tab_product_inner_height2_y].style.minHeight = s5_tab_product_inner_height_holder + "px";
		}
	}
}
}
jQuery(document).ready( function() { s5_tab_product_inner_height(); });
jQuery(window).resize(s5_tab_product_inner_height);
</script>
<?php if ($s5_pos_custom_1 == "published") { ?>
<script>
function s5_size_tab_show() {
	var s5_size_tab_show_height_holder = 1;
	var s5_size_tab_show_height1 = document.getElementById("s5_pos_custom_1").querySelectorAll('DIV');
	for (var s5_size_tab_show_height1_y=0; s5_size_tab_show_height1_y<s5_size_tab_show_height1.length; s5_size_tab_show_height1_y++) {
		if (s5_size_tab_show_height1[s5_size_tab_show_height1_y].className.indexOf("tab_show_slide_inner") >= 0) {
			s5_size_tab_show_height1[s5_size_tab_show_height1_y].style.minHeight = "1px";
			if (s5_size_tab_show_height1[s5_size_tab_show_height1_y].offsetHeight > s5_size_tab_show_height_holder) {
				s5_size_tab_show_height_holder = s5_size_tab_show_height1[s5_size_tab_show_height1_y].offsetHeight;
			}
		}
	}
	if (document.body.offsetWidth >= 50) {
		var s5_size_tab_show_height2 = document.getElementById("s5_pos_custom_1").querySelectorAll('DIV');
		for (var s5_size_tab_show_height2_y=0; s5_size_tab_show_height2_y<s5_size_tab_show_height2.length; s5_size_tab_show_height2_y++) {
			if (s5_size_tab_show_height2[s5_size_tab_show_height2_y].className.indexOf("tab_show_slide_inner") >= 0) {
				s5_size_tab_show_height2[s5_size_tab_show_height2_y].style.minHeight = s5_size_tab_show_height_holder + "px";
			}
		}
	}
}
jQuery(document).ready( function() { s5_size_tab_show(); });
jQuery(window).resize(s5_size_tab_show);
window.setTimeout(s5_size_tab_show,500);
window.setTimeout(s5_size_tab_show,1000);
window.setTimeout(s5_size_tab_show,1500);
window.setTimeout(s5_size_tab_show,2000);
window.setTimeout(s5_size_tab_show,2500);
</script>
<?php } ?>
</body>
</html>

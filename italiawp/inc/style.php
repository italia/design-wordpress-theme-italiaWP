<?php

include_once('colors.php');

function italiawp_css_strip_whitespace($css){
	  $replace = array(
	    "#/\*.*?\*/#s" => "",
	    "#\s\s+#"      => " ",
	  );
	  $search = array_keys($replace);
	  $css = preg_replace($search, $replace, $css);

	  $replace = array(
	    ": "  => ":",
	    "; "  => ";",
	    " {"  => "{",
	    " }"  => "}",
	    ", "  => ",",
	    "{ "  => "{",
	    ";}"  => "}",
	    ",\n" => ",",
	    "\n}" => "}",
	    "} "  => "}\n",
	  );
	  $search = array_keys($replace);
	  $css = str_replace($search, $replace, $css);
          
	  return trim($css);
}

function italiawp_dymanic_styles() {
    $main_color = get_option('italiawp_main_color', '#06c');

    $color_black = "#000";
    $color_white = "#fff";
    $color_grey_10 = "#f5f5f0";
    $color_grey_15 = "#f6f9fc";
    $color_grey_20 = "#eee";
    $color_grey_30 = "#ddd";
    $color_grey_40 = "#a5abb0";
    $color_grey_50 = "#5a6772";
    $color_grey_60 = "#444e57";
    $color_grey_80 = "#30373d";
    $color_grey_90 = "#1c2024";
    $color_teal_30 = "#00c5ca";
    $color_teal_50 = "#65dcdf";
    $color_teal_70 = "#004a4d";

    $color_5 = colorChangeSL($main_color, -50, +50);
    $color_10 = colorChangeSL($main_color, -40, +40);
    $color_20 = colorChangeSL($main_color, -30, +30);
    $color_30 = colorChangeSL($main_color, -20, +20);
    $color_40 = colorChangeSL($main_color, -15, +8);
    $color_50 = $main_color;
    $color_60 = colorChangeSL($main_color, 0, -5);
    $color_70 = colorChangeSL($main_color, 0, -10);
    $color_80 = colorChangeSL($main_color, 0, -15);
    $color_90 = colorChangeSL($main_color, 0, -20);
    $color_95 = colorChangeSL($main_color, 0, -25);

    $color_compl = colorCompl($main_color);
    $color_compl_5 = colorSetSL(colorCompl($main_color), 20, 95);
    $color_compl_10 = colorSetSL(colorCompl($main_color), 30, 90);
    $color_compl_80 = colorSetSL(colorCompl($main_color), 100, 40);
    
    $color_compl_link_footer = colorSetSL($main_color, 100, 80);

    $custom_css = "
.u-color-black {
  color: {$color_black} !important;
}

.u-background-black {
  background-color: {$color_black} !important;
}

.u-color-white,
.Bullets>li:before, .Footer, .Footer-blockTitle, .Footer-subTitle, .Form-input.Form-input:focus+[role=tooltip],
.Linklist-link.Linklist-link--lev1, .Linklist-link.Linklist-link--lev1:hover, .Megamenu--default .Megamenu-item>a,
.ScrollTop, .ScrollTop-icon, .Share-reveal>a>span, .Share-revealIcon, .Share>ul>li, .Share>ul>li>a, .Spid-button,
.Footer-block li, .Footer-subBlock {
  color: {$color_white} !important;
}

.u-background-white,
.Megamenu--default .Megamenu-subnav, .Skiplinks>li>a, .Spid-menu {
  background-color: {$color_white} !important;
}

.u-color-grey-10,
.Footer-block address {
  color: {$color_grey_10} !important;
}

.u-background-grey-10,
.Spid-idp:hover {
  background-color: {$color_grey_10} !important;
}

.u-color-grey-15 {
  color: {$color_grey_15} !important;
}

.u-background-grey-15 {
  background-color: {$color_grey_15} !important;
}

.u-color-grey-20 {
  color: {$color_grey_20} !important;
}

.u-background-grey-20,
.Hero-content, .Share-reveal, .Share-revealIcon.is-open,
.Treeview--default li[aria-expanded=true] li a, .Treeview--default li[aria-expanded=true] li a:hover {
  background-color: {$color_grey_20} !important;
}

.u-color-grey-30,
.Accordion--default .Accordion-header, .Accordion--plus .Accordion-header, .Linklist, .Linklist li, .Timeline {
  color: {$color_grey_30} !important;
}

.u-background-grey-30,
.Treeview--default li[aria-expanded=true] li li a, .Treeview--default li[aria-expanded=true] li li a:hover {
  background-color: {$color_grey_30} !important;
}

.Accordion--default .Accordion-header, .Accordion--plus .Accordion-header, .Footer-block li, .Footer-links,
.Footer-subBlock, .Leads-link, .Linklist li, .u-border-top-xxs {
  border-color: {$color_grey_30} !important;
}

.u-color-grey-40,
.Megamenu--default .Megamenu-subnavGroup {
  color: {$color_grey_40} !important;
}

.u-background-grey-40 {
  background-color: {$color_grey_40} !important;
}

.u-color-grey-50,
.Megamenu--default .Megamenu-subnavGroup>li, .Share-revealText {
  color: {$color_grey_50} !important;
}

.u-background-grey-50 {
  background-color: {$color_grey_50} !important;
}

.u-color-grey-60 {
  color: {$color_grey_60} !important;
}

.u-background-grey-60 {
  background-color: {$color_grey_60} !important;
}

.u-color-grey-80,
.Megamenu--default .Megamenu-subnavGroup>li>ul>li>ul>li>a, .Megamenu--default .Megamenu-subnavGroup>li>ul>li a {
  color: {$color_grey_80} !important;
}

.u-background-grey-80,
.Form-input.Form-input:focus+[role=tooltip],
.Header-banner {
  background-color: {$color_grey_80} !important;
}

.u-color-grey-90 {
  color: {$color_grey_90} !important;
}

.u-background-grey-90 {
  background-color: {$color_grey_90} !important;
}

/* Link / buttons */

.u-color-teal-30 {
  color: {$color_teal_30} !important;
}

.u-background-teal-30 {
  background-color: {$color_teal_30} !important;
}

.u-color-teal-50 {
  color: {$color_teal_50} !important;
}

.u-background-teal-50 {
  background-color: {$color_teal_50} !important;
}

.u-color-teal-70 {
  color: {$color_teal_70} !important;
}

.u-background-teal-70 {
  background-color: {$color_teal_70} !important;
}

/* Color primary */

.u-color-5 {
  color: {$color_5} !important;
}

.u-background-5,
.Accordion--default .Accordion-header:hover, .Accordion--plus .Accordion-header:hover, .Linklist a:hover {
  background-color: {$color_5} !important;
}

.u-color-10 {
  color: {$color_10} !important;
}

.u-background-10,
.Linklist-link.Linklist-link--lev3 {
  background-color: {$color_10} !important;
}

.u-color-20 {
  color: {$color_20} !important;
}

.u-background-20,
.Linklist-link.Linklist-link--lev2, .Linklist-link.Linklist-link--lev2:hover {
  background-color: {$color_20} !important;
}

.u-color-30 {
  color: {$color_30} !important;
}

.u-background-30 {
  background-color: {$color_30} !important;
}

.u-color-40,
.Header-owner {
  color: {$color_40} !important;
}

.u-background-40,
.Megamenu--default {
  background-color: {$color_40} !important;
}

.u-color-50,
.Accordion--default .Accordion-link, .Accordion--plus .Accordion-link,
.ErrorPage-subtitle, .ErrorPage-title, .Header-language-other a,
.Linklist-link, .Linklist a, .Share-revealIcon.is-open, .Skiplinks>li>a,
.Header-socialIcons [class*=\" Icon-\"], .Header-socialIcons [class^=Icon-] {
  color: {$color_50} !important;
}

.u-background-50,
.Header-navbar,
.Bullets>li:before, .Share-revealIcon, .Share>ul>li,
.Header-searchTrigger button {
  background-color: {$color_50} !important;
}

.u-color-60,
.Header-banner {
  color: {$color_60} !important;
}

.u-background-60 {
  background-color: {$color_60} !important;
}

.u-color-70 {
  color: {$color_70} !important;
}

.u-background-70 {
  background-color: {$color_70} !important;
}

.u-color-80,
.Button--info {
  color: {$color_80} !important;
}

.u-background-80 {
  background-color: {$color_80} !important;
}

.Button--info.is-pressed, .Button--info:active {
    background-color: {$color_80} !important;
    border-color: #000 !important;
    color: #fff !important;
}

.u-color-90 {
  color: {$color_90} !important;
}

.u-background-90,
.Linklist-link.Linklist-link--lev1, .Linklist-link.Linklist-link--lev1:hover {
  background-color: {$color_90} !important;
}

.u-color-95,
.Linklist-link.Linklist-link--lev2, .Linklist-link.Linklist-link--lev2:hover,
.Linklist-link.Linklist-link--lev3, .Linklist a:hover,
.Megamenu--default .Megamenu-subnavGroup>li>a, .Treeview--default li[aria-expanded=true] li a,
.Treeview--default li[aria-expanded=true] li a:hover, .Treeview--default li[aria-expanded=true] li li a,
.Treeview--default li[aria-expanded=true] li li a:hover, #wp-calendar a,
.Footer-socialIcons [class*=Icon-], .Footer-socialIcons [class^=Icon-],
.Button--default {
  color: {$color_95} !important;
}

.u-background-95,
.ScrollTop, .mfp-bg, mfp-img {
  background-color: {$color_95} !important;
}

.u-backround-none {
  background-color: transparent !important;
}

.u-color-compl {
  color: {$color_compl} !important;
}

.u-background-compl {
  background-color: {$color_compl} !important;
}

.u-background-compl-5 {
  background-color: {$color_compl_5} !important;
}

.u-color-compl-5 {
  color: {$color_compl_5} !important;
}

.u-color-compl-10 {
  color: {$color_compl_10} !important;
}

.u-background-compl-10 {
  background-color: {$color_compl_10} !important;
}

.u-color-compl-80 {
  color: {$color_compl_80} !important;
}

.u-background-compl-80,
.u-background-compl-80 a:not(.Button--info) {
  background-color: {$color_compl_80} !important;
}

.Footer a, .CookieBar a {
  color: {$color_compl_link_footer} !important;
}

.Button--default {
    border-color: {$color_compl_link_footer} !important;
}

#wp-calendar a, .Footer-socialIcons [class*=Icon-], .Footer-socialIcons [class^=Icon-],
.Button--default {
  background-color: {$color_compl_link_footer} !important;
}";

    echo '<style>'.italiawp_css_strip_whitespace($custom_css).'</style>';
}

add_action('wp_head', 'italiawp_dymanic_styles', 99);

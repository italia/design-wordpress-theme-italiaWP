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
    
    $main_color = get_option('italiawp_main_color', '#06c');
    $main_color_HSL = hex2hsl($main_color);

    $color_5 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-50/100, $main_color_HSL[2]+50/100 ));
    $color_10 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-40/100, $main_color_HSL[2]+40/100 ));
    $color_20 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-30/100, $main_color_HSL[2]+30/100 ));
    $color_30 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-20/100, $main_color_HSL[2]+20/100 ));
    $color_40 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1]-15/100, $main_color_HSL[2]+8/100 ));
    
    $color_50 = $main_color;
    
    $color_60 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-5/100 ));
    $color_70 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-10/100 ));
    $color_80 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-15/100 ));
    $color_90 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-20/100 ));
    $color_95 = hsl2hex(array($main_color_HSL[0], $main_color_HSL[1], $main_color_HSL[2]-25/100 ));

    $color_compl = colorCompl($main_color);
    $color_compl_HSL = hex2hsl($color_compl);
    
    $color_compl_5 = hsl2hex(array($color_compl_HSL[0], (20/100), (95/100) ));
    $color_compl_10 = hsl2hex(array($color_compl_HSL[0], (30/100), (90/100) ));
    $color_compl_80 = hsl2hex(array($color_compl_HSL[0], (100/100), (40/100) ));
    $color_compl_link_footer = hsl2hex(array($color_compl_HSL[0], (100/100), (80/100) ));
    
    if(get_option('italiawp_colore_primario')) update_option('italiawp_colore_primario',$color_50);
    else add_option('italiawp_colore_primario',$color_50);
    
    if(get_option('italiawp_colore_primario_chiaro')) update_option('italiawp_colore_primario_chiaro',$color_30);
    else add_option('italiawp_colore_primario_chiaro',$color_30);
    
    if(get_option('italiawp_colore_primario_scuro')) update_option('italiawp_colore_primario_scuro',$color_95);
    else add_option('italiawp_colore_primario_scuro',$color_95);
    
    if(get_option('italiawp_colore_complementare')) update_option('italiawp_colore_complementare',$color_compl);
    else add_option('italiawp_colore_complementare',$color_compl);

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

.u-color-20,
.Footer a {
  color: {$color_20} !important;
}

.u-background-20,
.Linklist-link.Linklist-link--lev2, .Linklist-link.Linklist-link--lev2:hover,
.Footer-socialIcons [class*=Icon-], .Footer-socialIcons [class^=Icon-],
#wp-calendar a {
  background-color: {$color_20} !important;
}

.u-color-30, .has-colore-primario-chiaro-color {
  color: {$color_30} !important;
}

.u-background-30, .has-colore-primario-chiaro-background-color {
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
.Header-socialIcons [class*=\" Icon-\"], .Header-socialIcons [class^=Icon-],
.has-colore-primario-color {
  color: {$color_50} !important;
}

.u-background-50,
.Header-navbar,
.Bullets>li:before, .Share-revealIcon, .Share>ul>li,
.Header-searchTrigger button,
.has-colore-primario-background-color {
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
.Button--default, .has-colore-primario-scuro-color {
  color: {$color_95} !important;
}

.u-background-95,
.ScrollTop, .mfp-bg, mfp-img,
.Footer .Form-input:not(.is-disabled), .Footer .Form-input:not(:disabled),
.has-colore-primario-scuro-background-color {
  background-color: {$color_95} !important;
}

.u-backround-none {
  background-color: transparent !important;
}

.u-color-compl, .has-colore-complementare-color {
  color: {$color_compl} !important;
}

.u-background-compl, .has-colore-complementare-background-color {
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

.CookieBar a, .section-gallery a,
.owl-prev, .owl-next, figure figcaption > p:first-of-type {
  color: {$color_compl_link_footer} !important;
}

.Button--default {
    border-color: {$color_compl_link_footer} !important;
}

.Button--default {
  background-color: {$color_compl_link_footer} !important;
}";

    echo '<style>'.italiawp_css_strip_whitespace($custom_css).'</style>';
}

add_action('wp_head', 'italiawp_dymanic_styles', 99);

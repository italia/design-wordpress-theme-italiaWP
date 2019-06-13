<ul class="Skiplinks js-fr-bypasslinks u-hiddenPrint">
    <li><a href="#main">Vai al contenuto</a></li>
    <li><a class="js-fr-offcanvas-open" href="#menu"
           aria-controls="menu" aria-label="accedi al menu" title="accedi al menu">Vai alla navigazione del sito</a></li>
</ul>

<?php if (get_theme_mod('menu_fixed')) { ?>
<header class="Header Headroom--fixed js-Headroom u-hiddenPrint Headroom Headroom--not-bottom Headroom--not-top Headroom--unpinned" style="position: fixed; top: 0px;">
<?php }else{ ?>
<header class="Header u-hiddenPrint">    
<?php } ?>

<?php if( !( get_option('dettagli-nome-ammin-afferente')=="" && get_option('dettagli-url-accedi')=="" ) ) { ?>
    <div class="Header-banner">
        <div class="Header-owner Headroom-hideme ">

    <?php if(get_option('dettagli-nome-ammin-afferente')!="") { ?>
            <a href="<?php echo get_option('dettagli-url-ammin-afferente'); ?>"><span><?php echo get_option('dettagli-nome-ammin-afferente'); ?></span></a>
    <?php } ?>

    <?php if(get_option('dettagli-url-accedi')!="") { ?>
            <div class="Header-languages ">
                <a href="<?php echo get_option('dettagli-url-accedi'); ?>" class="Header-language u-border-none u-zindex-max u-inlineBlock">
                    <span class="">Accedi</span>
                    <span class="Icon Icon-arrow-right u-padding-left-xs"></span>
                </a>
            </div>
    <?php } ?>

        </div>
    </div>
<?php } ?>

    <div class="Header-navbar ">
        <div class="u-layout-wide Grid Grid--alignMiddle u-layoutCenter">
            <div class="Header-logo Grid-cell" aria-hidden="true">
                <a href="<?php echo esc_url(home_url('/')); ?>" tabindex="-1">
                <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    if (has_custom_logo()) {
                        $custom_logo = esc_url($custom_logo[0]);
                    } else {
                        $custom_logo = get_stylesheet_directory_uri() . '/images/stemma-default.png';
                    } ?>
                    <img class="custom-logo" alt="<?php echo bloginfo('name'); ?>" itemprop="logo" src="<?php echo $custom_logo; ?>">
                </a>
            </div>

            <div class="Header-title Grid-cell">
                <h1 class="Header-titleLink">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name');
                          $italiawp_description = get_bloginfo('description');
                          if ($italiawp_description || is_customize_preview()) : ?>
                            <br>
                            <small><?php echo $italiawp_description; ?></small>
                    <?php endif; ?>
                    </a>
                </h1>
            </div>

            <div class="Header-searchTrigger Grid-cell">
                <button aria-controls="header-search" class="js-Header-search-trigger Icon Icon-search "
                        title="attiva il form di ricerca" aria-label="attiva il form di ricerca" aria-hidden="false">
                </button>
                <button aria-controls="header-search" class="js-Header-search-trigger Icon Icon-close u-hidden "
                        title="disattiva il form di ricerca" aria-label="disattiva il form di ricerca" aria-hidden="true">
                </button>
            </div>

            <div class="Header-utils Grid-cell">
                <div class="Header-social Headroom-hideme">
                    <?php if( !( get_option('dettagli-facebook')=="" && get_option('dettagli-twitter')=="" && get_option('dettagli-youtube')=="" && get_option('dettagli-instagram')=="" ) ): ?>

                    <p>Seguici su</p>
                    <ul class="Header-socialIcons">
                    <?php if(get_option('dettagli-facebook')!=""): ?>
                        <li><a target="_blank" title="Facebook" href="<?php echo get_option('dettagli-facebook'); ?>"><span class="Icon-facebook"></span><span class="u-hiddenVisually">Facebook</span></a></li>
                    <?php endif; ?>
                    <?php if(get_option('dettagli-twitter')!=""): ?>
                        <li><a target="_blank" title="Twitter" href="<?php echo get_option('dettagli-twitter'); ?>"><span class="Icon-twitter"></span><span class="u-hiddenVisually">Twitter</span></a></li>
                    <?php endif; ?>
                    <?php if(get_option('dettagli-youtube')!=""): ?>
                        <li><a target="_blank" title="YouTube" href="<?php echo get_option('dettagli-youtube'); ?>"><span class="Icon-youtube"></span><span class="u-hiddenVisually">Youtube</span></a></li>
                    <?php endif; ?>
                    <?php if(get_option('dettagli-instagram')!=""): ?>
                        <li><a target="_blank" title="Instagram" href="<?php echo get_option('dettagli-instagram'); ?>"><span class="Icon-instagram"></span><span class="u-hiddenVisually">Instagram</span></a></li>
                    <?php endif; ?>
                    </ul>

                    <?php endif; ?>
                </div>

            <?php get_search_form(); ?>

            </div>

            <div class="Header-toggle Grid-cell">
                <a class="Hamburger-toggleContainer js-fr-offcanvas-open u-nojsDisplayInlineBlock u-lg-hidden u-md-hidden" href="#menu"
                   aria-controls="menu" aria-label="accedi al menu" title="accedi al menu">
                    <span class="Hamburger-toggle" role="presentation"></span>
                    <span class="Header-toggleText" role="presentation">Menu</span>
                </a>
            </div>

        </div>
    </div>

    <div class="Headroom-hideme u-textCenter u-hidden u-sm-hidden u-md-block u-lg-block">
        <nav class="Megamenu Megamenu--default js-megamenu " data-rel=".Offcanvas .Treeview"></nav>
    </div>

</header>

<section class="Offcanvas Offcanvas--right Offcanvas--modal js-fr-offcanvas u-jsVisibilityHidden u-nojsDisplayNone u-hiddenPrint" id="menu">
    <h2 class="u-hiddenVisually">Menu Principale</h2>
    <div class="Offcanvas-content u-background-white">
        <div class="Offcanvas-toggleContainer u-background-70 u-jsHidden">
            <a class="Hamburger-toggleContainer u-block u-color-white u-padding-bottom-xxl u-padding-left-s u-padding-top-xxl js-fr-offcanvas-close"
               aria-controls="menu" aria-label="esci dalla navigazione" title="esci dalla navigazione" href="#">
                <span class="Hamburger-toggle is-active" aria-hidden="true"></span>
            </a>
        </div>
        <nav id="site-navigation" class="main-navigation">
            <?php   if(has_nav_menu('menu-principale')) {
                $menu = array(
                    'theme_location' => 'menu-principale',
                    'menu_id' => 'primary-menu',
                    'menu_class' => 'Linklist Linklist--padded Treeview Treeview--default js-Treeview u-text-r-xs'
                );
                echo strip_tags(wp_nav_menu($menu));
            } ?>
        </nav>
    </div>
</section>
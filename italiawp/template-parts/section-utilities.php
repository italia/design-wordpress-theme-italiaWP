<?php
/*
 * ### SEZIONE UTILITA' ###
 * Bisogna creare dei menu personalizzati e metterli nella location per menu "menu-utilita"
 *
 */
?>

<div class="u-background-white u-color-black u-text-xxl"><!--u-padding-r-top u-padding-r-bottom-->
    <div class="u-layout-wide u-layoutCenter u-layout-r-withGutter" id="utilita">
        <section class="u-padding-r-top u-padding-r-bottom">
            <h2 class="u-text-h3 u-layout-centerLeft">Utilità</h2>
            
            <?php
                $menu = wp_nav_menu(array (
                    'echo' => FALSE,
                    'theme_location' => 'menu-utilita',
                    'fallback_cb' => '__return_false'
                ));
            
                if ( has_nav_menu('menu-utilita') && !empty($menu) ) {
                    wp_nav_menu(array(
                        'container'      => 'ul',
                        'theme_location' => 'menu-utilita',
                        'menu_class' => 'Grid Grid--withGutter'
                    ));
                }
             ?>
        </section>
    </div>
</div>
<?php
/*
 * ### SEZIONE LINK PERSONALIZZATI ###
 * Bisogna creare 3 menu personalizzati e metterli nelle seguenti location per menu:
 * "menu-links-1", "menu-links-2", "menu-links-3"
 * utilizzano i loro NOMI come titoli dei 3 menu
 *
 */
?>

<div class="u-layout-wide u-layoutCenter u-text-r-xl u-layout-r-withGutter u-padding-r-top section">
    <div class="Grid Grid--equalHeight Grid--withGutterM">

        <div class="Grid-cell u-sizeFull u-sm-size1of2 u-md-size1of3 u-lg-size1of3 u-margin-r-bottom">
            <?php if(has_nav_menu('menu-links-1')) { ?>
            <div class="u-sizeFull u-text-r-s u-color-70">
                <?php $menu_name = get_term(get_nav_menu_locations()['menu-links-1'], 'nav_menu')->name; ?>
                <h3 class="u-border-bottom-m">
                    <a href="#" class="u-block u-text-h3 u-textClean u-color-60"><?php echo $menu_name; ?></a></h3>
                
                    <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'menu-links-1',
                            'container'      => 'ul',
                            'menu_class' => 'Linklist Prose u-text-r-xs'
                        ));
                     ?>
            </div>
            <?php } ?>
        </div>

        <div class="Grid-cell u-sizeFull u-sm-size1of2 u-md-size1of3 u-lg-size1of3 u-margin-r-bottom">
            <?php if(has_nav_menu('menu-links-2')) { ?>
            <div class="u-sizeFull u-text-r-s u-color-compl-80">
                <?php $menu_name = get_term(get_nav_menu_locations()['menu-links-2'], 'nav_menu')->name; ?>
                <h3 class="u-border-bottom-m">
                    <a href="#" class="u-block u-text-h3 u-textClean u-color-compl-80"><?php echo $menu_name; ?></a></h3>
                
                    <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'menu-links-2',
                            'container'      => 'ul',
                            'menu_class' => 'menu-links-2 Linklist Prose u-text-r-xs',
                            'link_before'     => '<span class="u-text-r-xs u-color-compl-80">',
                            'link_after'      => '</span>'
                        ));
                     ?>
            </div>
            <?php } ?>
        </div>

        <div class="Grid-cell u-sizeFull u-sm-size1of2 u-md-size1of3 u-lg-size1of3 u-margin-r-bottom">
            <?php if(has_nav_menu('menu-links-3')) { ?>
            <div class="u-sizeFull u-text-r-s u-color-70">
                <?php $menu_name = get_term(get_nav_menu_locations()['menu-links-3'], 'nav_menu')->name; ?>
                <h3 class="u-border-bottom-m">
                    <a href="#" class="u-block u-text-h3 u-textClean u-color-60"><?php echo $menu_name; ?></a></h3>
                
                    <?php
                        wp_nav_menu(array(
                            'theme_location'  => 'menu-links-3',
                            'container'      => 'ul',
                            'menu_class' => 'Linklist Prose u-text-r-xs'
                        ));
                     ?>
            </div>
            <?php } ?>
        </div>

    </div>
    
    <div class="Forward Forward--floating u-color-70" aria-hidden="true">
        <span class="Icon Icon-expand"></span>
    </div>
    
</div>

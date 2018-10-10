<?php
/*
 * ### SEZIONE BOX SERVIZI ###
 * Bisogna creare 3 menu personalizzati e metterli nelle seguenti location per menu:
 * "box-servizi-1", "box-servizi-2", "box-servizi-3"
 *
 */
?>

<div class="u-layout-wide u-layoutCenter u-text-r-xl u-layout-r-withGutter u-padding-r-top section">
    
    <div class="Grid Grid--withGutter">
        <div class="Grid-cell u-sizeFull u-padding-r-top u-padding-r-bottom">
            <h2 class="u-text-h2"><a class="u-color-black u-textClean u-text-h2" href="">Servizi</a></h2>
        </div>
        
        <?php   if(has_nav_menu('box-servizi-1')) {
                    $menu = array(
                        'theme_location'  => 'box-servizi-1',
                        'container'       => 'div',
                        'container_class' => 'box-servizi Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3',
                        'menu_class'      => '',
                        'echo'            => false,
                        'link_before'     => '<div class="Entrypoint-item u-sizeFill u-background-teal-70">',
                        'link_after'      => '</div>'
                    );
                    echo strip_tags(wp_nav_menu($menu),"<div><a>");
                } ?>

        <?php   if(has_nav_menu('box-servizi-2')) {
                    $menu = array(
                        'theme_location'  => 'box-servizi-2',
                        'container'       => 'div',
                        'container_class' => 'box-servizi Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3',
                        'menu_class'      => '',
                        'echo'            => false,
                        'link_before'     => '<div class="Entrypoint-item u-sizeFill u-background-teal-70">',
                        'link_after'      => '</div>'
                    );
                    echo strip_tags(wp_nav_menu($menu),"<div><a>");
                } ?>
        
        <?php   if(has_nav_menu('box-servizi-3')) {
                    $menu = array(
                        'theme_location'  => 'box-servizi-3',
                        'container'       => 'div',
                        'container_class' => 'box-servizi Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3',
                        'menu_class'      => '',
                        'echo'            => false,
                        'link_before'     => '<div class="Entrypoint-item u-sizeFill u-background-teal-70">',
                        'link_after'      => '</div>'
                    );
                    echo strip_tags(wp_nav_menu($menu),"<div><a>");
                } ?>
    </div>
    
    <div class="Grid Grid--withGutter u-padding-top-xl">
        <?php   if(has_nav_menu('box-servizi-4')) {
                    $menu = array(
                        'theme_location'  => 'box-servizi-4',
                        'container'       => 'div',
                        'container_class' => 'box-servizi Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3',
                        'menu_class'      => '',
                        'echo'            => false,
                        'link_before'     => '<div class="Entrypoint-item u-sizeFill u-background-grey-40">',
                        'link_after'      => '</div>'
                    );
                    echo strip_tags(wp_nav_menu($menu),"<div><a>");
                } ?>

        <?php   if(has_nav_menu('box-servizi-5')) {
                    $menu = array(
                        'theme_location'  => 'box-servizi-5',
                        'container'       => 'div',
                        'container_class' => 'box-servizi Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3',
                        'menu_class'      => '',
                        'echo'            => false,
                        'link_before'     => '<div class="Entrypoint-item u-sizeFill u-background-grey-40">',
                        'link_after'      => '</div>'
                    );
                    echo strip_tags(wp_nav_menu($menu),"<div><a>");
                } ?>
        
        <?php   if(has_nav_menu('box-servizi-6')) {
                    $menu = array(
                        'theme_location'  => 'box-servizi-6',
                        'container'       => 'div',
                        'container_class' => 'box-servizi Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3',
                        'menu_class'      => '',
                        'echo'            => false,
                        'link_before'     => '<div class="Entrypoint-item u-sizeFill u-background-grey-40">',
                        'link_after'      => '</div>'
                    );
                    echo strip_tags(wp_nav_menu($menu),"<div><a>");
                } ?>
    </div>
    
    <div class="Grid Grid--withGutter u-padding-top-xl">
        <?php   if(has_nav_menu('box-servizi-7')) {
                    $menu = array(
                        'theme_location'  => 'box-servizi-7',
                        'container'       => 'div',
                        'container_class' => 'box-servizi Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3',
                        'menu_class'      => '',
                        'echo'            => false,
                        'link_before'     => '<div class="Entrypoint-item u-sizeFill u-background-50">',
                        'link_after'      => '</div>'
                    );
                    echo strip_tags(wp_nav_menu($menu),"<div><a>");
                } ?>

        <?php   if(has_nav_menu('box-servizi-8')) {
                    $menu = array(
                        'theme_location'  => 'box-servizi-8',
                        'container'       => 'div',
                        'container_class' => 'box-servizi Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3',
                        'menu_class'      => '',
                        'echo'            => false,
                        'link_before'     => '<div class="Entrypoint-item u-sizeFill u-background-50">',
                        'link_after'      => '</div>'
                    );
                    echo strip_tags(wp_nav_menu($menu),"<div><a>");
                } ?>
        
        <?php   if(has_nav_menu('box-servizi-9')) {
                    $menu = array(
                        'theme_location'  => 'box-servizi-9',
                        'container'       => 'div',
                        'container_class' => 'box-servizi Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3',
                        'menu_class'      => '',
                        'echo'            => false,
                        'link_before'     => '<div class="Entrypoint-item u-sizeFill u-background-50">',
                        'link_after'      => '</div>'
                    );
                    echo strip_tags(wp_nav_menu($menu),"<div><a>");
                } ?>
    </div>

    <div class="Forward Forward--floating u-margin-top-s u-color-70" aria-hidden="true">
        <span class="Icon Icon-expand"></span>
    </div>

</div>

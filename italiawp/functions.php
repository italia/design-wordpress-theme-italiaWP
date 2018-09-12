<?php

add_action('wp_enqueue_scripts', 'italiawp_adjustments_css');
function italiawp_adjustments_css() {
    wp_enqueue_style('italiawp_adjustments_css', get_template_directory_uri() . '/inc/adjustments.css');
}

add_theme_support('post-thumbnails');
add_image_size('post-thumbnails',512,512,array('center','center'));
add_image_size('news-image',400,220,array('center','center'));

add_theme_support('custom-logo',array(
    'height'      => 512,
    'width'       => 512,
    'flex-width'  => true,
    'flex-height' => true,
));

register_nav_menus( array(
    'menu-principale' => 'Menu Principale',
    'menu-utilita' => 'Menu Utilità',
    'box-servizi-1' => 'Box Servizi 1',
    'box-servizi-2' => 'Box Servizi 2',
    'box-servizi-3' => 'Box Servizi 3',
    'box-servizi-4' => 'Box Servizi 4',
    'box-servizi-5' => 'Box Servizi 5',
    'box-servizi-6' => 'Box Servizi 6',
    'box-servizi-7' => 'Box Servizi 7',
    'box-servizi-8' => 'Box Servizi 8',
    'box-servizi-9' => 'Box Servizi 9',
    'menu-links-1' => 'Menu Links 1',
    'menu-links-2' => 'Menu Links 2',
    'menu-links-3' => 'Menu Links 3'
) );

function italiawp_custom_classes_menu_utilita( $classes, $item, $args ) {
    if ( 'menu-utilita' === $args->theme_location ) {
        $classes = "";
        $classes[] = 'Grid-cell u-sizeFull u-sm-size1of2 u-md-size1of4 u-lg-size1of4';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'italiawp_custom_classes_menu_utilita', 10, 3 );

function italiawp_custom_login_logo() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    echo '<style type="text/css">';
    echo '.login h1 a { background-image:url('.esc_url($logo[0]).') !important; }';
    echo '</style>';
}
add_action('login_head', 'italiawp_custom_login_logo');

function italiawp_widgets_init() {
    register_sidebar( array(
        'name'          => 'Footer Colonne',
        'id'            => 'footer-colonne',
        'description'   => 'Colonne del Footer',
        'before_widget' => '<div id="%1$s" class="Footer-block Grid-cell u-sm-size1of2 u-md-size1of4 u-lg-size1of4 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="Footer-blockTitle">',
        'after_title'   => '</h2>'
    ));
}
add_action( 'widgets_init', 'italiawp_widgets_init' );

function italiawp_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'italiawp_custom_header_args', array(
        'default-image'          => get_template_directory_uri() . '/images/2000x500.png',
        'default-text-color'     => '000000',
        'header-text'            => false,
        'width'                  => 2000,
        'height'                 => 500,
        'flex-height'            => true,
        'uploads'                => true
    )));
}
add_action( 'after_setup_theme', 'italiawp_custom_header_setup' );

register_default_headers(array(
    '2000x500' => array(
        'url' => get_template_directory_uri() . '/images/2000x500.png',
        'thumbnail_url' => get_template_directory_uri() . '/images/2000x500.png',
        'description' => 'Default header'
    )
));

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/style.php';
require get_template_directory() . '/inc/gallery.php';
require get_template_directory() . '/inc/details.php';

function italiawp_create_breadcrumbs() {

    $home = 'Home';
    $before = '<li class="Breadcrumb-item">';
    $after = '</li>';

    if (!is_home() && !is_front_page()) {
        echo '<div class="u-layout-wide u-layoutCenter u-layout-withGutter u-padding-r-bottom u-padding-r-top">';
        echo '<nav aria-label="sei qui:" role="navigation"><ul class="Breadcrumb">';

        global $post;
        $homeLink = get_bloginfo('url');
        echo '<li class="Breadcrumb-item"><a class="Breadcrumb-link u-color-50" href="' . $homeLink . '">' . $home . '</a></li>';

        if (is_category()) {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0)
                echo(get_category_parents($parentCat, TRUE, ' '));
            echo $before . single_cat_title('', false) . $after;
        } elseif (is_day()) {
            echo '<li class="Breadcrumb-item"><a class="Breadcrumb-link u-color-50" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            echo '<li class="Breadcrumb-item"><a class="Breadcrumb-link u-color-50" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li>';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<li class="Breadcrumb-item"><a class="Breadcrumb-link u-color-50" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li class="Breadcrumb-item"><a class="Breadcrumb-link u-color-50" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>';
                echo $before . get_the_title() . $after;
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                echo '<li class="Breadcrumb-item"><a class="Breadcrumb-link u-color-50" href="' . get_term_link($cat->cat_ID, false) . '">' . $cat->cat_name . '</a></li>';
                echo $before . get_the_title() . $after;
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ');
            echo '<li class="Breadcrumb-item"><a class="Breadcrumb-link u-color-50" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
            echo $before . get_the_title() . $after;
        } elseif (is_page() && !$post->post_parent) {
            echo $before . get_the_title() . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li class="Breadcrumb-item"><a class="Breadcrumb-link u-color-50" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb)
                echo $crumb . ' ';
            echo $before . get_the_title() . $after;
        } elseif (is_search()) {
            echo $before . get_search_query() . $after;
        } elseif (is_tag()) {
            echo $before . single_tag_title('', false) . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Errore 404' . $after;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo '<li class="Breadcrumb-item"> (';
            echo 'Pagina' . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
                echo ') </li>';
        }

        echo '</div></ul></nav>';
    }
}

add_filter('the_excerpt', function ($excerpt) {
    return substr(strip_shortcodes($excerpt), 0, strpos(strip_shortcodes($excerpt), '.') + 1);
});

add_filter('get_the_excerpt', function ($excerpt) {
    return substr(strip_shortcodes($excerpt), 0, strpos(strip_shortcodes($excerpt), '.') + 1);
});

<?php

function italiawp_customize_register($wp_customize) {
    
/* Sezione "Sezioni Homepage" nel customizer */
    $wp_customize->add_section('site_settings', array(
        'title' => 'Sito & Homepage',
        'priority' => 1,
    ));
    
/* Menu Fixed */
    $wp_customize->add_setting('menu_fixed', array(
        'default' => true, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp_sanitize_checkbox'
    ));
    $wp_customize->add_control('menu_fixed', array(
        'label' => 'Menu Fixed',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'menu_fixed'
    ));
    
/* Settings e i controls per le sezioni */
/* Hero */
    $wp_customize->add_setting('active_section_hero', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_hero', array(
        'label' => 'Hero',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_hero'
    ));

/* Servizi */    
    $wp_customize->add_setting('active_section_services', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_services', array(
        'label' => 'Servizi',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_services'
    ));

/* Link rapidi */
    $wp_customize->add_setting('active_section_links', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_links', array(
        'label' => 'Links rapidi',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_links'
    ));
    
/* Ultimo articolo */
    $wp_customize->add_setting('active_section_last_one_news', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_last_one_news', array(
        'label' => 'Ultimo articolo',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_last_one_news'
    ));

/* Ultimi articoli */
    $wp_customize->add_setting('active_section_last_news', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_last_news', array(
        'label' => 'Ultimi articoli',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_last_news'
    ));
    
/* Utilità */
    $wp_customize->add_setting('active_section_utilities', array(
        'default' => false, 'capability' => 'edit_theme_options', 'sanitize_callback' => 'italiawp_sanitize_checkbox'
    ));
    $wp_customize->add_control('active_section_utilities', array(
        'label' => 'Utilità',
        'type' => 'checkbox', 'section' => 'site_settings', 'settings' => 'active_section_utilities'
    ));
    
/* Colore Principale */
    $wp_customize->add_setting('italiawp_main_color', array(
        'default' => '#06c',
        'type' => 'option', 
        'capability' => 'edit_theme_options'
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'italiawp_main_color', array(
                'label' => 'Colore principale', 
                'section' => 'colors',
                'settings' => 'italiawp_main_color'
            )
    ));
    
}
add_action('customize_register', 'italiawp_customize_register');

function italiawp_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
<?php
    if(is_front_page()):
        if (get_theme_mod('active_section_hero'))
            get_template_part('template-parts/section-hero');
        if (get_theme_mod('active_section_services'))
            get_template_part('template-parts/section-services');
        if (get_theme_mod('active_section_links'))
            get_template_part('template-parts/section-links');
        if (get_theme_mod('active_section_last_one_news'))
            get_template_part('template-parts/section-last-one-news');
        if (get_theme_mod('active_section_last_news'))
            get_template_part('template-parts/section-last-news');
        if (get_theme_mod('active_section_galleries')):
            if (get_theme_mod('disactive_gallerie_carousel')):
                get_template_part('template-parts/section-gallery');
            else:
                get_template_part('template-parts/section-gallery-carousel');
            endif;
        endif;
    endif; ?>

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
    endif; 
    
    if( get_the_content() != "" ) { ?>

<div class="u-background-white u-color-black u-text-xxl section">
    <div class="u-layout-wide u-layoutCenter u-layout-r-withGutter section Content">
        <section class="u-padding-r-top u-padding-r-bottom">
            <section class="Grid Grid--withGutter">
                <div class="Grid-cell">
                    <?php the_content(); ?>
                </div>
            </section>
        </section>
    </div>
    
    <?php if (is_front_page()): ?>
    <div class="Forward Forward--floating u-color-70" aria-hidden="true">
        <span class="Icon Icon-expand"></span>
    </div>
    <?php endif; ?>
    
</div>

<?php } ?>

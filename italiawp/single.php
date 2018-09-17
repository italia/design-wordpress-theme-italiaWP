<?php

get_header();

if(is_attachment()) {
    get_template_part( 'template-parts/attachment-loop' );
}else{
    get_template_part( 'template-parts/single-loop' );
}

get_template_part( 'template-parts/section-single-last-news' );

get_sidebar();
get_footer();

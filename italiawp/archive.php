<?php

get_header();

if(is_post_type_archive()) {
    get_template_part( 'template-parts/archive-gallerie-loop' );
}else{
    get_template_part( 'template-parts/archive-loop' );
}

get_sidebar();
get_footer();

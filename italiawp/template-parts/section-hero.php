<?php
/*
 * ### SEZIONE HERO ###
 * Prende l'ultimo articolo in evidenza (sticky)
 *
 */
?>

<style>
    .Hero {
        background-image: url('<?php echo esc_url( get_header_image() ); ?>') !important;
    }
</style>

<?php

$args = array(
    'posts_per_page' => 1,
    'post__in'  => get_option( 'sticky_posts' ),
    'ignore_sticky_posts' => 1
);
$the_query = new WP_Query( $args );

if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
        $category = get_the_category(); $first_category = $category[0]; ?>

<section>
    <div class="Hero site-header">
        <div class="Hero-content">
            <p class="u-padding-r-bottom u-padding-r-top u-text-r-xs">
                <a href="<?php echo get_category_link($first_category); ?>" class="u-textClean u-color-60 u-text-h4"><span class="Dot u-background-60"></span><?php echo $first_category->name; ?></a>
            </p>
            <h2 class="u-text-h2"><a href="<?php the_permalink(); ?>" class="u-color-95 u-textClean"><?php the_title(); ?></a></h2>
            <p class="u-padding-r-bottom u-padding-r-top u-text-p u-margin-r-bottom"><?php echo(get_the_excerpt()); ?></p>
            <a href="#news" class="js-scrollTo u-linkClean Button Button--info u-text-r-xs">Vai alle notizie
                <span class="u-padding-r-left Icon Icon-expand"></span></a>
        </div>
        <a href="#servizi" class="Forward Forward--absolute js-scrollTo" aria-hidden="true">
            <span class="Icon Icon-expand"></span>
        </a>
    </div>
</section>

<?php
    
    endwhile;  endif;
    wp_reset_postdata();
    
 ?>
<?php
/*
 * ### LOOP RICERCA ###
 *
 */
?>

<div class="u-background-grey-20 u-text-r-xxl u-padding-r-top u-padding-r-bottom">
    <div class="u-layout-wide u-layoutCenter u-layout-r-withGutter">
        <div class="u-layout-centerContent u-background-grey-20 u-padding-r-bottom">
            <section class="u-layout-wide">

<?php
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $total_post = wp_count_posts();
    $published_post = $total_post->publish;
    $total_pages = ceil( $published_post / $posts_per_page ); ?>
    
                <h2 class="u-padding-r-bottom u-padding-r-top u-text-r-l">Risultati per: "<?php echo get_search_query(); ?>"<br>
                    <?php if($wp_query->max_num_pages != 0) { ?>
                    <small>Pagina <?php echo $paged; ?> di <?php echo $wp_query->max_num_pages; ?></small>
                    <?php } ?>
                </h2>
                <div class="Grid Grid--withGutter">

<?php

    if (have_posts()) :
    while (have_posts()) : the_post();
    
    $category = get_the_category(); $first_category = $category[0];
    $datapost = get_the_date('j F Y', '', ''); ?>

                    <div class="Grid-cell u-md-size2of4 u-lg-size2of4">
                        <div class="u-color-grey-30 u-border-top-xxs u-padding-right-xxl u-padding-r-all">
                            <p class="u-padding-r-bottom">
                                <span class="Dot u-background-70"></span>
                                <?php
                                if (!empty($category)) {
                                    $i = 0;
                                    foreach ($category as $cat) {
                                        if($i) echo ' - ';
                                        $i++;
                                        echo '<a class="u-textClean u-textWeight-700 u-text-r-xs u-color-50" href="' . esc_url(get_category_link($cat->term_id)) . '" title="' . esc_html($cat->name) . '">' . esc_html($cat->name) . '</a>';
                                    }
                                } ?>
                                <span class="u-text-r-xxs u-textSecondary u-textWeight-400 u-lineHeight-xl u-cf"><?php echo $datapost; ?></span>
                            </p>
                            <h3 class="u-padding-r-top u-padding-r-bottom">
                                <a class="u-text-h4 u-textClean u-color-black" href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>
                            <p class="u-lineHeight-l u-text-r-xs u-textSecondary u-padding-r-right">
                                <?php echo(get_the_excerpt()); ?>
                            </p>
                        </div>
                    </div>

<?php endwhile;
      else : include('error.php');
      endif; ?>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include_once('pagination.php');
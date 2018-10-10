<?php
/*
 * ### SEZIONE ULTIME NOTIZIE per l'articolo ###
 * Mostra gli ultimi 4 articoli caricati.
 * E' posizionata sotto il contenuto di un articolo.
 *
 */
?>

<div class="u-background-grey-20 u-text-r-xxl u-padding-r-top u-padding-r-bottom section">
    <div class="u-layout-wide u-layoutCenter u-layout-r-withGutter">
        <div class="u-layout-centerContent u-background-grey-20 u-padding-r-bottom">
            <section class="u-layout-wide">

                <h2 class="u-padding-r-bottom u-padding-r-top u-text-r-l">
                    <a class="u-color-50 u-textClean u-text-h3 " href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Ultimi articoli</a>
                </h2>

                <div class="Grid Grid--withGutterM">
            
<?php
$args = array(
    'posts_per_page' => 4,
    'post__not_in' => get_option( 'sticky_posts' )
);

$the_query = new WP_Query($args);
if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

        $category = get_the_category(); $first_category = $category[0];
        $datapost = get_the_date('j F Y', '', ''); ?>

                    <div class="Grid-cell u-md-size1of4 u-lg-size1of4">
                        <div class="u-color-grey-30 u-border-top-xxs u-padding-right-xxl u-padding-r-all">
                            <p class="u-padding-r-bottom">
                                <span class="Dot u-background-70"></span>
                                <a class="u-textClean u-textWeight-700 u-text-r-xs u-color-50" href="<?php echo get_category_link($first_category); ?>"><?php echo $first_category->name; ?></a>
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
            
<?php
    
    endwhile;  endif;
    wp_reset_postdata();
    
    ?>

                </div>

            </section>
        </div>
    </div>
</div>

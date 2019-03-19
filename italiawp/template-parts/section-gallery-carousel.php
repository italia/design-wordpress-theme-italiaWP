<?php
/*
 * ### SEZIONE GALLERIE ###
 * Create tramite un Custom Type Post
 *
 */
?>

<div class="u-layout-centerContent u-background-grey-60 u-padding-r-top section">

    <section class="u-padding-r-all">
        <div class="u-layout-medium u-layoutCenter">

            <div class="Grid">
                <h2 id="carousel-heading" class="Grid-cell u-text-h2 u-color-white u-layout-centerLeft">Gallerie fotografiche</h2>
                <div class="owl-nav Grid-cell u-layout-centerRight"></div>
            </div>

            <div class="owl-carousel owl-theme" role="region" id="carousel-1">
                
<?php
$args = array(
    'posts_per_page' => -1,
    'post_type' => 'gallerie'
);

$i=1;

$the_query = new WP_Query($args);
if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

        $img_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'news-image');
        if ($img_url != "") {
            $img_url = $img_url[0];
        } else {
            $img_url = get_bloginfo('template_url') . "/images/400x220.png";
        }

        $category = get_the_category(); $first_category = $category[0];
        $datapost = get_the_date('j F Y', '', ''); ?>

                <div class="Carousel-item">
                    <div class="u-color-grey-30">
                        <figure>
                            <a href="<?php the_permalink(); ?>" aria-labelledby="desc-<?php echo $i; ?>" class="u-block u-padding-all-xxs">
                                <img src="<?php print $img_url; ?>" class="u-sizeFull" alt="<?php the_title(); ?>" />
                            </a>
                            <figcaption class="u-padding-r-top">
                                <p class="u-color-teal-50 u-text-r-xxs u-textWeight-700 u-padding-bottom-s">Foto</p>
                                <p class="u-color-white u-text-r-xxs u-margin-bottom-s"><?php echo $datapost; ?></p>
                                <div class="Grid">
                                    <span class="Grid-cell u-sizeFit Icon-camera u-color-white u-floatLeft u-text-r-l" aria-hidden="true"></span>
                                    <h3 id="desc-<?php echo $i; ?>" class="Grid-cell u-sizeFill u-padding-left-s u-lineHeight-l u-color-white u-text-r-xs u-textWeight-700">
                                        <?php the_title(); ?>
                                    </h3>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                
<?php
    $i++;

    endwhile;  endif;
    wp_reset_postdata();
    
    ?>

            </div>
            <p class="u-padding-r-top u-text-r-xl">
                <a href="<?php echo get_post_type_archive_link('gallerie'); ?>" class="u-layout-centerLeft u-padding-r-top u-text-h4 u-textWeight-700 u-color-teal-50">Vedi tutte le gallerie</a>
            </p>
        </div>
    </section>
    
    <div class="Forward Forward--floating" aria-hidden="true">
        <span class="Icon Icon-expand u-color-grey-40"></span>
    </div>
    
</div>

<?php
/*
 * ### SEZIONE GALLERIE ###
 * Create tramite un Custom Type Post
 *
 */
?>

<div class="u-layout-centerContent u-background-grey-20 u-padding-r-top">
    
    <section class="u-layout-wide u-layout-r-withGutter u-text-r-s u-padding-r-top u-padding-r-bottom">
        
        <div class="u-layout-centerLeft">
            <h2 class="u-text-r-l">Gallerie fotografiche</h2>
        </div>
        
        <div class="Grid Grid--withGutterM u-padding-r-top u-text-r-xxl">
            
<?php
$args = array(
    'posts_per_page' => 3,
    'post_type' => 'gallerie'
);

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

            <div class="Grid-cell usizefull u-md-size1of3 u-lg-size1of3 u-text-r-m u-margin-r-bottom u-layout-matchHeight">
                <section class="u-nbfc u-borderShadow-xxs u-borderRadius-m u-color-grey-30 u-background-white">
                    <figure class="u-background-grey-60 u-padding-all-s">
                        <a href="<?php the_permalink(); ?>" class="u-borderFocus u-block u-padding-all-xxs">
                            <img src="<?php print $img_url; ?>" class="u-sizeFull" alt="<?php the_title(); ?>">
                        </a>
                        <figcaption class="u-padding-r-top">
                            <span class="Icon Icon-camera u-color-white u-floatRight u-text-r-l" aria-hidden="true"></span>
                            <p class="u-color-teal-50 u-text-r-xxs u-textWeight-700 u-padding-bottom-xs">Foto</p>
                            <p class="u-color-white u-text-r-xxs"><?php echo $datapost; ?></p>
                        </figcaption>
                    </figure>
                    <div class="u-text-r-l u-padding-r-all u-layout-prose">
                        <h3 class="u-text-h4 u-margin-r-bottom">
                            <a class="u-textClean u-color-black u-textWeight-400 u-text-r-m" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                    </div>
                </section>
            </div>
            
<?php
    
    endwhile;  endif;
    wp_reset_postdata();
    
    ?>

        </div>
        
        <p class="u-textCenter u-text-md-right u-text-lg-right u-margin-r-top">
            <a href="<?php echo get_post_type_archive_link('gallerie'); ?>" class="u-color-50 u-textClean u-text-h4">
                tutte le gallerie <span class="Icon Icon-chevron-right"></span></a>
        </p>
        
    </section>
    
    <a href="#utilita" class="Forward Forward--floating js-scrollTo" aria-hidden="true">
        <span class="Icon Icon-expand u-color-grey-40"></span>
    </a>
    
</div>

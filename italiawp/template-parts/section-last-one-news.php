<?php
/*
 * ### SEZIONE ULTIMA NOTIZIA ###
 * Mostra l'ultimo articolo in evidenza (sticky).
 * Pensata come alternativa o preliminare "a section-last-news".
 *
 */
?>

<div class="u-background-compl-10 u-layout-centerContent u-padding-r-top">

    <section class="u-layout-wide u-layout-r-withGutter u-text-r-s u-padding-r-top u-padding-r-bottom">

        <h2 id="news" class="u-layout-centerLeft u-text-r-s u-color-50 u-textClean u-text-h3">
            <a class="u-color-50 u-textClean u-text-h3 " href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">In evidenza</a>
        </h2>
        
<?php
$args = array(
    'posts_per_page' => 1,
    'post__in'  => get_option( 'sticky_posts' ),
    'ignore_sticky_posts' => 1
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
        
        <div class="Grid">

            <div class="Grid-cell u-sizeFull u-md-size1of2 u-lg-size1of2 u-text-r-s u-padding-r-all">
                <div class="Grid Grid--fit u-margin-r-bottom">
                    <p class="Grid-cell">
                        <span class="Dot u-background-50"></span>
                        <strong><a class="u-textClean u-text-r-xs" href="<?php echo get_category_link($first_category); ?>"><?php echo $first_category->name; ?></a></strong>
                    </p>
                    <p class="Grid-cell u-textSecondary"><?php echo $datapost; ?></p>
                </div>
                <div class="u-text-r-l u-layout-prose">
                    <h2 class="u-text-h2 u-margin-r-bottom">
                        <a class="u-text-h2 u-textClean u-color-black" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <p class="u-textSecondary u-lineHeight-l"><?php echo(get_the_excerpt()); ?></p>
                </div>
            </div>

            <div class="Grid-cell u-sizeFull u-md-size1of2 u-lg-size1of2 u-text-r-s u-padding-r-all">
                <a href="<?php the_permalink(); ?>">
                <img src="<?php print $img_url; ?>" class="u-sizeFull" alt="<?php the_title(); ?>" />
                </a>
            </div>

        </div>
        
        <div class="Grid Grid--withGutterM">
            
<?php
    
    endwhile;  endif;
    wp_reset_postdata();
    
    ?>

        </div>

        <p class="u-textCenter u-text-md-right u-text-lg-right u-margin-r-top">
            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="u-color-50 u-textClean u-text-h4">
                tutti i contenuti <span class="Icon Icon-chevron-right"></span></a>
        </p>

    </section>

    <a href="#utilita" class="Forward Forward--floating js-scrollTo" aria-hidden="true">
        <span class="Icon Icon-expand u-color-grey-40"></span>
    </a>

</div>
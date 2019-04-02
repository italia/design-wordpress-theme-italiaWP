<?php
/*
 * ### SEZIONE ULTIME NOTIZIE ###
 * Mostra gli ultimi N articoli caricati.
 * Il numero è preso dall'optione "dettagli-num-articoli" editabile dalla pagina "Dettagli" del backend
 *
 */
?>

<div class="u-background-compl-10 u-layout-centerContent u-padding-r-top section">

    <section class="u-layout-wide u-layout-r-withGutter u-text-r-s u-padding-r-top u-padding-r-bottom">

        <h2 id="news" class="u-layout-centerLeft u-text-r-s">
            <a class="u-color-50 u-textClean u-text-h3 " href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">Ultimi articoli</a>
        </h2>

        <div class="Grid Grid--withGutterM">
            
<?php
$args = array(
    'posts_per_page' => get_option('dettagli-num-articoli'),
    'post__not_in' => get_option( 'sticky_posts' )
);

$the_query = new WP_Query($args);
if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

        $img_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'news-image');
        if ($img_url != "") {
            $img_url = $img_url[0];
        }else if(get_theme_mod('active_immagine_evidenza_default')) {	
            $img_url = esc_url(get_theme_mod('immagine_evidenza_default'));
            if($img_url=="") {
                $img_url = get_bloginfo('template_url') . "/images/400x220.png";
            }
        }

        $category = get_the_category(); $first_category = $category[0];
        $datapost = get_the_date('j F Y', '', ''); ?>

            <div class="Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3 u-flex u-margin-r-bottom u-flexJustifyCenter">
                <div class="card-news u-nbfc u-borderShadow-xxs u-borderRadius-m u-color-grey-30 u-background-white">
                    <?php if($img_url!="") { ?>
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php print $img_url; ?>" class="u-sizeFull" alt="<?php the_title(); ?>">
                    </a>
                    <?php } ?>
                    <div class="u-text-r-l u-padding-r-all u-layout-prose">
                        <p class="u-text-h6 u-margin-bottom-l"><a class="u-color-50 u-textClean" href="<?php echo get_category_link($first_category); ?>"><?php echo $first_category->name; ?></a>
                        <span class="u-text-r-xxs u-textSecondary u-textWeight-400 u-lineHeight-xl u-cf"><?php echo $datapost; ?></span></p>
                        <h3 class="u-text-h4 u-margin-r-bottom"><a class="u-text-r-m u-color-black u-textWeight-400 u-textClean" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <p class="u-text-p u-textSecondary"><?php echo(get_the_excerpt()); ?></p>
                    </div>
                </div>
            </div>
            
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

    <div class="Forward Forward--floating" aria-hidden="true">
        <span class="Icon Icon-expand u-color-grey-40"></span>
    </div>

</div>

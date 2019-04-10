<?php
/*
 * ### LOOP ARCHIVIO GALLERIE ###
 *
 */
?>

<div class="u-layout-centerContent u-background-grey-20 u-padding-r-top">
    
    <section class="u-layout-wide u-layout-r-withGutter u-text-r-s u-padding-r-top u-padding-r-bottom">

<?php
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $total_post = wp_count_posts();
    $published_post = $total_post->publish;
    $total_pages = ceil( $published_post / $posts_per_page ); ?>
    
        <div class="u-layout-centerLeft">
            <h2 class="u-padding-r-bottom u-padding-r-top u-text-r-l">Gallerie fotografiche<br>
                <?php if($wp_query->max_num_pages != 0) { ?>
                <small>Pagina <?php echo $paged; ?> di <?php echo $wp_query->max_num_pages; ?></small>
                <?php } ?>
            </h2>
        </div>
        <div class="Grid Grid--withGutterM u-padding-r-top u-text-r-xxl">
                    
<?php

    if (have_posts()) :
    while (have_posts()) : the_post();


    $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'news-image' );
    if($img_url!="") {
        $link_img_url = $img_url[0];
    }else{
        $link_img_url = esc_url(get_theme_mod('immagine_evidenza_default'));
        if($link_img_url=="") {
            $link_img_url = get_bloginfo('template_url') . "/images/400x220.png";
        }
    }
    
    $category = get_the_category(); $first_category = $category[0];
    $datapost = get_the_date('j F Y', '', ''); ?>
                    
            <div class="Grid-cell usizefull u-md-size1of3 u-lg-size1of3 u-text-r-m u-margin-r-bottom u-layout-matchHeight">
                <section class="u-nbfc u-borderShadow-xxs u-borderRadius-m u-color-grey-30 u-background-white">
                    <figure class="u-background-grey-60 u-padding-all-s">
                        <a href="<?php the_permalink(); ?>" class="u-borderFocus u-block u-padding-all-xxs">
                            <img src="<?php print $link_img_url; ?>" class="u-sizeFull" alt="<?php the_title(); ?>">
                        </a>
                        <figcaption class="u-padding-r-top">
                            <span class="Icon Icon-camera u-color-white u-floatRight u-text-r-l" aria-hidden="true"></span>
                            <p class="u-text-r-xxs u-textWeight-700 u-padding-bottom-xs">Foto</p>
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

<?php endwhile;
      else : include('error.php');
      endif; ?>
            
        </div>
    </section>
</div>

<?php include_once('pagination.php');

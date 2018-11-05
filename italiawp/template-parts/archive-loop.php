<?php
/*
 * ### LOOP ARCHIVIO ###
 *
 */
?>

<div class="u-background-compl-10 u-text-r-xxl u-padding-r-top u-padding-r-bottom">
    <div class="u-layout-wide u-layoutCenter u-layout-r-withGutter">
        <div class="u-layout-centerContent u-padding-r-bottom">
            <section class="u-layout-wide">

<?php
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $total_post = wp_count_posts();
    $published_post = $total_post->publish;
    $total_pages = ceil( $published_post / $posts_per_page ); ?>
    
                <h2 class="u-padding-r-bottom u-padding-r-top u-text-r-l"><?php the_archive_title('',''); ?><br>
                    <?php if($wp_query->max_num_pages != 0) { ?>
                    <small>Pagina <?php echo $paged; ?> di <?php echo $wp_query->max_num_pages; ?></small>
                    <?php } ?>
                </h2>
                <div class="Grid Grid--withGutter">
                    
<?php

    if (have_posts()) :
    while (have_posts()) : the_post();


    $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'news-image' );
    if($img_url!="") {
        $link_img_url = $img_url[0];
    }
    
    $category = get_the_category(); $first_category = $category[0];
    $datapost = get_the_date('j F Y', '', ''); ?>
                    
                    <div class="Grid-cell u-sm-size1of3 u-md-size1of3 u-lg-size1of3 u-flex u-margin-r-bottom u-flexJustifyCenter">
                        <div class="card-news u-nbfc u-borderShadow-xxs u-borderRadius-m u-color-grey-30 u-background-white">
                            <?php if($img_url!="") { ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo $link_img_url; ?>" class="u-sizeFull" alt="<?php the_title(); ?>">
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

<?php endwhile;
      else : include('error.php');
      endif; ?>
                </div>
            </section>
        </div>
    </div>
</div>

<?php include_once('pagination.php');
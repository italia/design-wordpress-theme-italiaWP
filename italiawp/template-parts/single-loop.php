<?php
/*
 * ### LOOP ARTICOLO ###
 *
 */
?>

<?php

if (have_posts()) : while (have_posts()) : the_post();

    $img_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'news-image' );
    if($img_url!="") {
        $img_url = $img_url[0];
    }else if(get_theme_mod('active_immagine_evidenza_default')) {	
        $img_url = esc_url(get_theme_mod('immagine_evidenza_default'));
        if($img_url=="") {
            $img_url = get_bloginfo('template_url') . "/images/400x220.png";
        }
    }
    
    $category = get_the_category(); $first_category = $category[0];
    $datapost = get_the_date('j F Y', '', ''); ?>

<div class="u-layout-wide u-layoutCenter u-text-r-l u-padding-r-top u-margin-r-bottom u-layout-r-withGutter">
    <section class="Grid Grid--withGutter">

        <div class="Grid-cell u-md-size8of12 u-lg-size8of12">
            <div class="Grid Grid--fit u-margin-r-bottom">
                <p class="Grid-cell">
                    <span class="Dot u-background-50"></span>
                    <strong><a class="u-textClean u-text-r-xs" href="<?php echo get_category_link($first_category); ?>"><?php echo $first_category->name; ?></a></strong>
                </p>
                <p class="Grid-cell u-textSecondary"><?php echo $datapost; ?></p>
            </div>
            <div class="Prose u-layout-prose">
                <h2 class="u-text-h2 u-margin-r-bottom">
                    <a class="u-text-h2 u-textClean u-color-black" href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
                <?php the_content(); ?>
                <?php if (get_theme_mod('active_allegati_contenuto'))
                    get_template_part('template-parts/attachments'); ?>
            </div>
        </div>

        <div class="Grid-cell u-sizeFull u-md-size4of12 u-lg-size4of12">
            <?php if($img_url!="") { ?>
            <div class="u-sizeFull u-md-size11of12 u-lg-size11of12">
                <img src="<?php echo $img_url; ?>" class="u-sizeFull" alt="<?php the_title(); ?>">
            </div>
            <?php } ?>
            
            <?php get_template_part('template-parts/sidebar-single'); ?>
            
            <?php if (!get_theme_mod('active_allegati_contenuto'))
                    get_template_part('template-parts/attachments'); ?>
        </div>
    
        <?php
            if ( comments_open() || get_comments_number() ) :
                    comments_template();
            endif;
        ?>
        
    </section>

</div>

<div class="u-layout-wide u-layoutCenter u-text-r-l u-padding-r-top u-margin-r-bottom u-layout-r-withGutter">
    <nav role="navigation" aria-label="Navigazione paginata">
        <ul class="Grid Grid--fit Grid--alignMiddle u-text-r-xxs u-textCenter">
            <li class="Grid-cell u-textCenter">
            <?php
                if (get_adjacent_post(false, '', true)) {
                    previous_post_link('%link', '<span class="Icon-chevron-left u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina precedente</span>');
                }else{
                    $first = new WP_Query('posts_per_page=1&order=DESC');
                    $first->the_post();
                    echo '<a href="'.get_permalink().'"><span class="Icon-chevron-left u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina precedente</span></a>';
                    wp_reset_query();
                };
             ?>
            </li>
            <li class="Grid-cell u-textCenter">
            <?php
                if (get_adjacent_post(false, '', false)) {
                    next_post_link('%link', '<span class="Icon-chevron-right u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina successiva</span>');
                }else{
                    $last = new WP_Query('posts_per_page=1&order=ASC');
                    $last->the_post();
                    echo '<a href="'.get_permalink().'"><span class="Icon-chevron-right u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina successiva</span></a>';
                    wp_reset_query();
                };
             ?>
            </li>
        </ul>
    </nav>
</div>

<?php endwhile;
      else : include('error.php');
      endif; ?>

<?php
/*
 * ### LOOP PAGINA ###
 *
 */
?>

<?php

if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="u-layout-wide u-layoutCenter u-text-r-l u-padding-r-top u-margin-r-bottom u-layout-r-withGutter">
    
    <h1 class="u-text-h2"><?php the_title(); ?></h1>
    
    <section class="Grid Grid--withGutter">

        <div class="Grid-cell u-md-size8of12 u-lg-size8of12">
            <div class="Prose u-layout-prose">
                <?php the_content(); ?>
            </div>
        </div>

        <div class="Grid-cell u-sizeFull u-md-size4of12 u-lg-size4of12">
            
                    <div class="u-sizeFull u-md-size11of12 u-lg-size11of12" id="subnav"> 

                        <?php
                        $page = get_the_ID();
                        global $post;
                        $parent = wp_get_post_parent_id($post->ID);
                        $children = get_pages(array('child_of' => $post->ID)); ?>

                        <ul class="Linklist Linklist--padded u-layout-prose u-text-r-xs">

                            <?php if (count(get_post_ancestors($page)) != 0) { ?>
                                <ul class="Linklist Linklist--padded u-layout-prose u-text-r-xs">
                                    <li><a class="Linklist-link Linklist-link--lev3" href="<?php echo get_permalink($parent); ?>"><span class="Icon Icon-chevron-left"></span> Indietro</a></li>
                                </ul>
                                <div class="u-margin-r-top"></div>
                            <?php } ?>


                            <?php if ($parent != 0) { ?>
                                <li><a class="Linklist-link Linklist-link--lev1" href="<?php echo get_the_permalink($parent); ?>"><?php echo get_the_title($parent); ?></a></li>

                                <?php
                                $args = array(
                                    'post_parent' => $parent,
                                    'post_type' => 'page',
                                    'posts_per_page' => -1,
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC'
                                );

                                $the_query = new WP_Query($args);
                                if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();

                                        if ($page == get_the_ID()) { ?>

                                            <?php
                                            if (count($children) > 0) { ?>
                                                
                                            <li><a class="Linklist-link Linklist-link--lev2 is-expanded" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                                            <?php
                                                $args2 = array(
                                                    'post_parent' => $page,
                                                    'post_type' => 'page',
                                                    'posts_per_page' => -1,
                                                    'orderby' => 'menu_order',
                                                    'order' => 'ASC'
                                                );

                                                $the_query2 = new WP_Query($args2);
                                                if ($the_query2->have_posts()) : while ($the_query2->have_posts()) : $the_query2->the_post(); ?>

                                                        <li><a class="Linklist-link Linklist-link--lev3" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                                                        <?php
                                                    endwhile;
                                                endif;
                                                wp_reset_postdata();
                                            }else{ ?>
                                            <li><a class="Linklist-link Linklist-link--lev2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                      <?php } ?>

                                        <?php }else { ?>
                                            <li><a class="Linklist-link Linklist-link--lev2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                                        <?php } ?>

                                        <?php
                                    endwhile;
                                endif;
                                wp_reset_postdata(); ?>

                            <?php } else { ?>

                                <li><a class="Linklist-link Linklist-link--lev1" href="<?php echo get_the_permalink($page); ?>"><?php echo get_the_title($page); ?></a></li>

                                <?php
                                if (count($children) > 0) {

                                    $args = array(
                                        'post_parent' => $page,
                                        'post_type' => 'page',
                                        'posts_per_page' => -1,
                                        'orderby' => 'menu_order',
                                        'order' => 'ASC'
                                    );

                                    $the_query = new WP_Query($args);
                                    if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>

                                            <li><a class="Linklist-link Linklist-link--lev2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

                                    <?php
                                    endwhile;
                                    endif;
                                    wp_reset_postdata();
                                } ?>
                            <?php } ?>
                        </ul>

                    </div>
            <a href="#" title="torna all'inizio del contenuto" class="u-hiddenVisually">torna all'inizio del contenuto</a>
        </div>
    </section>

</div>

<?php endwhile;
      else : include('error.php');
      endif; ?>
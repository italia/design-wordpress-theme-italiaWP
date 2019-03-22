<?php
/*
 * ### PAGINAZIONE ###
 *
 */
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
    <nav role="navigation" aria-label="Navigazione paginata" class="u-layout-prose u-margin-r-top">
        <ul class="Grid Grid--fit Grid--alignMiddle u-text-r-xxs u-textCenter">
            <li class="Grid-cell u-textCenter">
                <?php echo get_previous_posts_link( '<span class="Icon-chevron-left u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina precedente</span>' ); ?>
            </li>

        <?php 
            if($paged<=4) {
                $jmin = 1; $jmax = 7;
            }else{
                $jmin = $paged - 3; $jmax = $paged + 3;
            }
            if($jmax > $wp_query->max_num_pages) $jmax = $wp_query->max_num_pages;

              for($j=$jmin; $j<=$wp_query->max_num_pages && $j<=$jmax; $j++) { ?>
                <?php if($j != $paged) {
                    $search = "";
                    if(is_home()) $link = get_permalink( get_option( 'page_for_posts' ) );
                    else if(is_search()) {
                        $link = get_bloginfo('url').'/';
                        $search = "/?s=".get_search_query();
                    }else if(is_post_type_archive()) {
                        $cpt = get_post_type($post);
                        $link = get_bloginfo('url').'/'.$cpt.'/';
                    }else {
                        $link = str_replace(get_bloginfo('url'),"",current_url());
                        if (strpos($link,'page/') !== false) {
                            $link = substr($link, 0, strpos($link, 'page/'));
                        }
                        if(!is_child_theme()) {
                            $link = get_bloginfo('url').$link;
                        }
                    } ?>
            <li class="Grid-cell u-textCenter u-hidden u-md-inlineBlock u-lg-inlineBlock">
                <a href="<?php echo $link; ?>page/<?php echo $j; if(is_search()) echo $search; ?>" aria-label="Pagina <?php echo $j; ?>" class="u-padding-r-all u-color-50 u-textClean u-block">
                    <span class="u-text-r-s"><?php echo $j; ?></span>
                </a>
                <?php }else{ ?>
            <li class="Grid-cell u-textCenter">
                <span class="u-text-r-s u-padding-r-all u-background-50 u-color-white"><?php echo $j; ?></span>
                <?php } ?>
            </li>

        <?php } ?>

            <li class="Grid-cell u-textCenter">
                <?php echo get_next_posts_link( '<span class="Icon-chevron-right u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina successiva</span>' ); ?>
            </li>
        </ul>
    </nav>
<?php endif; ?>
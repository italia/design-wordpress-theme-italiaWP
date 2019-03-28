<?php
/*
 * ### PAGINAZIONE ###
 *
 */
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
    <nav role="navigation" aria-label="Navigazione paginata" class="pagination u-layout-prose u-margin-r-top u-margin-r-bottom">
        <ul class="Grid Grid--fit Grid--alignMiddle u-text-r-xxs u-textCenter">
            <li class="Grid-cell u-textCenter">
                <?php echo get_previous_posts_link( '<span class="Icon-chevron-left u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina precedente</span>' ); ?>
            </li>
        <?php 
            if($paged) {
                $pages = paginate_links(array(
                    'total' => $wp_query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'show_all' => false,
                    'end_size' => 1,
                    'mid_size' => 1,
                    'prev_next' => false,
                    'before_page_number' => '<span class="u-text-r-s">',
                    'after_page_number' => '</span>',
                    'type' => 'array'
                ));

                if(is_array($pages)) {
                    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                    foreach ($pages as $page) {
                        if(get_query_var('paged') != 1) {
                            echo '<li class="Grid-cell u-textCenter u-hidden u-md-inlineBlock u-lg-inlineBlock">'.$page.'</li>';
                        }
                    }
                }
            } ?>
            <li class="Grid-cell u-textCenter">
                <?php echo get_next_posts_link( '<span class="Icon-chevron-right u-text-r-s" role="presentation"></span><span class="u-hiddenVisually">Pagina successiva</span>' ); ?>
            </li>
        </ul>
    </nav>
<?php endif; ?>

<script>
    $(document).ready(function () {
        $(".pagination li a").addClass("u-padding-r-all u-color-50 u-textClean u-block");
        $(".pagination li span.dots").addClass("u-padding-r-all u-color-50 u-block");
        $(".pagination li span.current").addClass("u-text-r-s u-padding-r-all u-background-50 u-color-white");
    });
</script>

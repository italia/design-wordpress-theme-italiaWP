<?php
/*
 * ### COMMENTI ###
 * 
 */
?>

<div class="Grid-cell u-sizeFull u-md-size1of2 u-lg-size1of2 u-text-r-s u-padding-r-all">
    <h5 class="u-padding-r-bottom u-padding-r-top u-text-r-l">Commenti</h5>
    <div class="Grid Grid--withGutter u-margin-bottom-l">

        <?php
        $args = array(
            'status' => 'approve',
            'post_id' => get_the_ID(),
        );

        $comments_query = new WP_Comment_Query;
        $comments = $comments_query->query($args);

        if ($comments) {
            foreach ($comments as $comment) {
                $commenter = wp_get_current_commenter();
                $req = get_option('require_name_email');
                $aria_req = ( $req ? " aria-required='true'" : '' );
                $consent = empty($commenter['comment_author_email']) ? '' : ' checked="checked"'; ?>

                <div class="Grid-cell">
                    <div class="u-color-grey-30 u-border-top-xxs u-padding-right-xxl u-padding-r-all">
                        <h3 class="u-padding-r-top u-padding-r-bottom">
                            <span class="u-text-h4 u-textClean u-color-black"><?php echo $comment->comment_author; ?></span>
                        </h3>
                        <p class="u-lineHeight-l u-text-r-xs u-textSecondary u-padding-r-right">
                            <?php echo $comment->comment_content; ?>
                        </p>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="Grid-cell">
                <div class="u-color-grey-30 u-border-top-xxs u-padding-right-xxl u-padding-r-all">
                    <p class="u-lineHeight-l u-text-r-xs u-textSecondary u-padding-r-right">
                        Nessun commento
                    </p>
                </div>
            </div>
    <?php } ?>
    </div>

    <div class="Grid Grid--withGutter">
            <?php
            $commenter = wp_get_current_commenter();
            $req = get_option('require_name_email');
            $aria_req = ( $req ? " aria-required='true'" : '' );
            $consent = empty($commenter['comment_author_email']) ? '' : ' checked="checked"';

            $fields = array(
                'author' =>
                '<div class="Form-field">' .
                    '<label class="Form-label ' . ( $req ? 'is-required' : '' ) . '" for="author">Nome' . ($req ? '*' : '') . '</label>' .
                    '<input class="Form-input" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" placeholder="Nome' . ($req ? '*' : '') . '" ' . $aria_req . ($req ? ' size="30" required' : '') . '>' .
                '</div>',
                
                'email' =>
                '<div class="Form-field">' .
                    '<label class="Form-label" ' . ( $req ? 'is-required' : '' ) . '" for="email">Email' . ($req ? '*' : '') . '</label>' .
                    '<input class="Form-input" id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" placeholder="Email' . ($req ? '*' : '') . '" ' . $aria_req . ($req ? ' size="30" required' : '') . '>' .
                '</div>',
                
                'url' =>
                '<div class="Form-field">' .
                    '<label class="Form-label" for="url">Sito</label>' .
                    '<input class="Form-input" id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" placeholder="Sito web" ' . $aria_req . ' size="30">' .
                '</div>',
                
                'cookies' =>
                '<div class="Form-field">' .
                    '<fieldset class="Form-field Form-field--choose Grid-cell">' .
                        '<legend class="Form-legend is-required">Salvataggio di un cookie con i miei dati (nome, email, sito web) per il prossimo commento</legend>' .
                        '<label class="Form-label Form-label--block" for="wp-comment-cookies-consent">' .
                            '<input type="checkbox" class="Form-input" value="yes" id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" ' . $aria_req . $consent . ' required>' .
                            '<span class="Form-fieldIcon" role="presentation"></span> ' . ($req ? '*' : '') . 'Do il mio consenso' .
                        '</label>' .
                    '</fieldset>' .
                '</div>'
            );

            $args = array(
                'fields' => $fields,
                
                'comment_field' =>
                '<div class="Form-field Grid-cell u-size4of4">' .
                    '<label class="Form-label" for="comment">Commento' . ($req ? '*' : '') . '</label>' .
                    '<textarea class="Form-input Form-textarea" placeholder="Commento' . ($req ? '*' : '') . '" id="comment" name="comment" maxlength="65525" ' . $aria_req . ($req ? ' required' : '') . '></textarea>' .
                '</div>',
                
                'title_reply' =>
                '<fieldset class="Form-fieldset">' .
                    '<legend class="Form-legend">Lascia un commento</legend>' .
                '</fieldset>'
            );
            
            comment_form($args); ?>
    </div>
</div>
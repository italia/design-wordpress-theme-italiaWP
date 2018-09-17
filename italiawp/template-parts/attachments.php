<?php
/*
 * ### ALLEGATI ###
 * Scaricare ed installare il plugin "Attachments"
 * da https://it.wordpress.org/plugins/attachments/
 * 
 * Info su GitHub https://github.com/jchristopher/attachments
 *
 */
?>

<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if (is_plugin_active('attachments/index.php')) { ?>

    <div class="u-sizeFull u-md-size11of12 u-lg-size11of12">

        <?php $attachments = new Attachments('attachments'); ?>
        <?php if ($attachments->exist()) : ?>
            <div class="u-margin-r-top"></div>
            <ul class="Linklist Linklist--padded u-layout-prose u-text-r-xs">
                <li><span class="Linklist-link Linklist-link--lev1">Allegati (<?php echo $attachments->total(); ?>)</span></li>

                <?php while ($attachments->get()) : ?>
                    <li><a class="Linklist-link Linklist-link--lev3" target="_blank" href="<?php echo $attachments->url(); ?>"><?php echo $attachments->field('title'); ?> [<?php echo $attachments->filesize(); ?>]</a></li>
                    <?php endwhile; ?>
            </ul>
        <?php endif; ?>

    </div>

<?php }

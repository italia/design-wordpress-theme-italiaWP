<?php
/*
 * ### SIDEBAR per le PAGINE ###
 *
 */
?>

<?php if (is_active_sidebar('sidebar-pagine')) { ?>

<div class="u-sizeFull u-md-size11of12 u-lg-size11of12 italiawp-sidebar">
    <?php dynamic_sidebar('sidebar-pagine'); ?>
</div>

<?php } ?>

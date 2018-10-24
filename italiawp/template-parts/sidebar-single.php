<?php
/*
 * ### SIDEBAR per gli ARTICOLI ###
 *
 */
?>

<?php if (is_active_sidebar('sidebar-articoli')) { ?>

<div class="u-sizeFull u-md-size11of12 u-lg-size11of12 italiawp-sidebar">
    <?php dynamic_sidebar('sidebar-articoli'); ?>
</div>

<?php } ?>

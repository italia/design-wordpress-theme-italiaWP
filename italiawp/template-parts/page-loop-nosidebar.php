<?php
/*
 * ### LOOP PAGINA SENZA SIDEBAR ###
 *
 */
?>

<?php

if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="u-layout-wide u-layoutCenter u-text-r-l u-padding-r-top u-margin-r-bottom u-layout-r-withGutter">
    
    <h1 class="u-text-h2"><?php the_title(); ?></h1>
    
    <section class="Grid Grid--withGutter">

        <div class="Grid-cell u-md-sizeFull u-lg-sizeFull">
            <div class="Prose u-layout-wide">
                <?php the_content(); ?>
                <?php if (get_theme_mod('active_allegati_contenuto'))
                        get_template_part('template-parts/attachments'); ?>
            </div>
        </div>
        
    </section>

</div>

<?php endwhile;
      else : include('error.php');
      endif; ?>

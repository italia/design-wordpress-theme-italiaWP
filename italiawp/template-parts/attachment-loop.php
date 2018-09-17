<?php
/*
 * ### LOOP ALLEGATO ###
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

        <a href="#" title="torna all'inizio del contenuto" class="u-hiddenVisually">torna all'inizio del contenuto</a>
    </section>

</div>

<?php endwhile;
      else : include('error.php');
      endif;

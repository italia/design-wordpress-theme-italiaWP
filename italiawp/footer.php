<?php
/*
 * Utilizzare i Widget per le 4 colonne e la pagina "Dettagli" del backend per i recapiti e url mappa
 *
 */
?>

<?php if(is_front_page()) { ?>
<div id="mappa" class="u-layout-centerContent u-padding-r-top u-padding-r-bottom">
    <section class="u-layout-wide u-layout-r-withGutter u-padding-r-top u-padding-r-bottom">
        <h2 class="u-layout-centerLeft u-text-h3">Mappa Interattiva</h2>
        <h5 class="u-layout-centerLeft u-text-h5 h5-map">Clicca su per attivare</h5>
    </section>
</div>

<div class="map-full-content">
    <div class="map-wrap"></div>
    <iframe src="<?php echo get_option('dettagli-map'); ?>" frameborder="0" allowfullscreen></iframe>
</div>
<?php } ?>
        
<div class="u-background-95 u-hiddenPrint">
    <div class="u-layout-wide u-layoutCenter u-layout-r-withGutter">
        <footer class="Footer u-background-95">

            <div class="u-cf">
                
            <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $custom_logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    $custom_logo = esc_url($custom_logo[0]);
                } else {
                    $custom_logo = get_stylesheet_directory_uri() . '/images/stemma-default.png';
                } ?>
                
                <img height="80" width="auto" class="Footer-logo" src="<?php echo $custom_logo; ?>" alt="<?php echo bloginfo('name'); ?>">

                <p class="Footer-siteName">
                    <?php bloginfo( 'name' ); ?>
                </p>
            </div>

            <div class="Grid Grid--withGutter">

                <?php   if (is_active_sidebar('footer-colonne')) { dynamic_sidebar('footer-colonne'); } ?>
                
            </div>
            <div class="Grid Grid--withGutter">

                <div class="Footer-block Grid-cell u-sm-size1of2 u-md-size1of4 u-lg-size1of4">
                    <h2 class="Footer-blockTitle">Contatti</h2>
                    <div class="Footer-subBlock">
                        <h3 class="Footer-subTitle">Recapiti</h3>
                        <address>
                            <?php echo get_option('dettagli-indirizzo'); ?><br>
                            <?php echo get_option('dettagli-cap'); ?>, <?php echo get_option('dettagli-citta'); ?><br>
                            Tel. <a href="tel:+39<?php echo get_option('dettagli-telefono'); ?>" >(+39) <?php echo get_option('dettagli-telefono'); ?></a><br>
                            Fax. <a href="tel:+39<?php echo get_option('dettagli-fax'); ?>" >(+39) <?php echo get_option('dettagli-fax'); ?></a><br>
                            C.F. / P.IVA <?php echo get_option('dettagli-cfpiva'); ?>
                        </address>
                    </div>
                </div>

                <div class="Footer-block Grid-cell u-sm-size1of2 u-md-size1of4 u-lg-size1of4">
                    <h2 class="Footer-blockTitle">Contatti</h2>
                    <div class="Footer-subBlock">
                        <h3 class="Footer-subTitle">Recapiti</h3>
                        <address>
                            Email: <a href="mailto:<?php echo get_option('dettagli-email'); ?>" ><?php echo get_option('dettagli-email'); ?></a><br>
                        <?php if(get_option('dettagli-email2')!="") { ?>
                            Email: <a href="mailto:<?php echo get_option('dettagli-email2'); ?>" ><?php echo get_option('dettagli-email2'); ?></a>
                        <?php } ?>
                        </address>
                    </div>
                </div>

                <div class="Footer-block Grid-cell u-sm-size1of2 u-md-size1of4 u-lg-size1of4">
                    <h2 class="Footer-blockTitle">Contatti</h2>
                    <div class="Footer-subBlock">
                        <h3 class="Footer-subTitle">Indirizzo PEC</h3>
                        <p><a href="mailto:<?php echo get_option('dettagli-pec'); ?>" ><?php echo get_option('dettagli-pec'); ?></a><br></p>
                    </div>
                </div>

                <div class="Footer-block Grid-cell u-sm-size1of2 u-md-size1of4 u-lg-size1of4">
                    <h2 class="Footer-blockTitle">Seguici su</h2>
                    <div class="Footer-subBlock">
                        <ul class="Footer-socialIcons">
                        <?php if(get_option('dettagli-facebook')!="") { ?>
                            <li><a target="_blank" href="<?php echo get_option('dettagli-facebook'); ?>"><span class="Icon Icon-facebook"></span><span class="u-hiddenVisually">Facebook</span></a></li>
                        <?php } ?>
                        <?php if(get_option('dettagli-twitter')!="") { ?>
                            <li><a target="_blank" href="<?php echo get_option('dettagli-twitter'); ?>"><span class="Icon Icon-twitter"></span><span class="u-hiddenVisually">Twitter</span></a></li>
                        <?php } ?>
                        <?php if(get_option('dettagli-youtube')!="") { ?>
                            <li><a target="_blank" href="<?php echo get_option('dettagli-youtube'); ?>"><span class="Icon Icon-youtube"></span><span class="u-hiddenVisually">Youtube</span></a></li>
                        <?php } ?>
                        <?php if(get_option('dettagli-instagram')!="") { ?>
                            <li><a target="_blank" href="<?php echo get_option('dettagli-instagram'); ?>"><span class="Icon Icon-instagram"></span><span class="u-hiddenVisually">Instagram</span></a></li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>

            </div>

            <ul class="Footer-links u-cf">
                <li><a href="<?php echo get_permalink(get_option('dettagli-id-privacy')); ?>" title="Privacy policy">Privacy</a></li>
                <li><a href="<?php echo get_permalink(get_option('dettagli-id-notelegali')); ?>" title="Note legali">Note legali</a></li>
                <li><a href="<?php echo get_permalink(get_option('dettagli-id-contatti')); ?>" title="Contatti">Contatti</a></li>
                <li>Realizzato con <a target="_blank" href="https://it.wordpress.org">WordPress</a></li>
                <!-- Per favore, non rimuoverlo! -->
                <li>Tema <a target="_blank" href="<?php echo wp_get_theme()->get('ThemeURI'); ?>"><?php echo wp_get_theme()->get('Name'); ?></a> di <a target="_blank" href="<?php echo wp_get_theme()->get('AuthorURI'); ?>"><?php echo wp_get_theme()->get('Author'); ?></a></li>
                <li>Basato sul <a target="_blank" href="https://italia.github.io/design-web-toolkit/">Web Toolkit AGID</a></li>
                <!-- Grazie :) -->
            </ul>

        </footer>

    </div>
</div>

<a href="#" title="torna all'inizio del contenuto" class="ScrollTop js-scrollTop js-scrollTo">
    <i class="ScrollTop-icon Icon-collapse" aria-hidden="true"></i>
    <span class="u-hiddenVisually">torna all'inizio del contenuto</span>
</a>

</div>

<?php wp_footer(); ?>

<!--[if IE 8]>
<script src="<?php bloginfo('template_url'); ?>/webtoolkit/respond.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/webtoolkit/rem.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/webtoolkit/selectivizr.js"></script>
<script src="<?php bloginfo('template_url'); ?>/webtoolkit/slice.js"></script>
<![endif]-->

<!--[if lte IE 9]>
<script src="<?php bloginfo('template_url'); ?>/webtoolkit/polyfill.min.js"></script>
<![endif]-->

<script>__PUBLIC_PATH__ = '<?php bloginfo('template_url'); ?>/webtoolkit/'</script>
<script src="<?php bloginfo('template_url'); ?>/webtoolkit/IWT.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/inc/scripts.js"></script>

</body>
</html>
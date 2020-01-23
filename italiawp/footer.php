<?php
/*
 * Utilizzare i Widget per le 4 colonne e la pagina "Dettagli" del backend per i recapiti e url mappa
 *
 */
?>

<?php if(is_front_page()):
        if (get_theme_mod('active_section_map'))
            get_template_part('template-parts/section-map');
      endif; ?>
        
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
                    <?php bloginfo( 'name' );
                          $italiawp_description = get_bloginfo('description');
                        if ($italiawp_description || is_customize_preview()) : ?>
                        <br>
                        <small><?php echo $italiawp_description; ?></small>
                        <?php endif; ?>
                </p>
            </div>

            <div class="Grid Grid--withGutter">

                <?php   if (is_active_sidebar('footer-colonne')) { dynamic_sidebar('footer-colonne'); } ?>
                
            </div>
            <div class="Grid Grid--withGutter">

                <div class="Footer-block Grid-cell u-sm-size1of2 u-md-size1of4 u-lg-size1of4">
                    <h2 class="Footer-blockTitle">Contatti</h2>
                    <div class="Footer-subBlock">
                        <h3 class="Footer-subTitle">Informazioni</h3>
                        <address>
                            <?php echo get_option('dettagli-indirizzo'); ?><br>
                            <?php echo get_option('dettagli-cap'); ?>, <?php echo get_option('dettagli-citta'); ?><br><br>
                            C.F. / P.IVA<br><?php echo get_option('dettagli-cfpiva'); ?><br>
                            <?php if(get_option('dettagli-codunivoco')!=""): ?>
                                <br>Cod. Univoco<br><?php echo get_option('dettagli-codunivoco'); ?>
                            <?php endif; ?>
                        </address>
                    </div>
                </div>

                <div class="Footer-block Grid-cell u-sm-size1of2 u-md-size1of4 u-lg-size1of4">
                    <h2 class="Footer-blockTitle">Contatti</h2>
                    <div class="Footer-subBlock">
                        <h3 class="Footer-subTitle">Recapiti</h3>
                        <address>
                            Telefono<br><a href="tel:+39<?php echo get_option('dettagli-telefono'); ?>" >(+39) <?php echo get_option('dettagli-telefono'); ?></a><br><br>
                            <?php if(get_option('dettagli-fax')!=""): ?>
                                Fax<br><a href="tel:+39<?php echo get_option('dettagli-fax'); ?>" >(+39) <?php echo get_option('dettagli-fax'); ?></a><br>
                            <?php endif; ?>
                            <br>
                        </address>
                    </div>
                </div>

                <div class="Footer-block Grid-cell u-sm-size1of2 u-md-size1of4 u-lg-size1of4">
                    <h2 class="Footer-blockTitle">Contatti</h2>
                    <div class="Footer-subBlock">
                        <h3 class="Footer-subTitle">Indirizzi Email</h3>
                        <address>
                            PEC<br><a href="mailto:<?php echo get_option('dettagli-pec'); ?>" ><?php echo get_option('dettagli-pec'); ?></a><br><br>
                        <?php if(get_option('dettagli-email')!=""): ?>
                            Email<br><a href="mailto:<?php echo get_option('dettagli-email'); ?>" ><?php echo get_option('dettagli-email'); ?></a><br><br>
                        <?php endif; ?>
                        <?php if(get_option('dettagli-email2')!=""): ?>
                            Email<br><a href="mailto:<?php echo get_option('dettagli-email2'); ?>" ><?php echo get_option('dettagli-email2'); ?></a>
                        <?php endif; ?>
                        </address>
                    </div>
                </div>

                <?php if( !( get_option('dettagli-facebook')=="" && get_option('dettagli-twitter')=="" && get_option('dettagli-youtube')=="" && get_option('dettagli-instagram')=="" ) ): ?>
                <div class="Footer-block Grid-cell u-sm-size1of2 u-md-size1of4 u-lg-size1of4">
                    <h2 class="Footer-blockTitle">Seguici su</h2>
                    <div class="Footer-subBlock">
                        <ul class="Footer-socialIcons">
                        <?php if(get_option('dettagli-facebook')!=""): ?>
                            <li><a target="_blank" href="<?php echo get_option('dettagli-facebook'); ?>"><span class="Icon Icon-facebook"></span><span class="u-hiddenVisually">Facebook</span></a></li>
                        <?php endif; ?>
                        <?php if(get_option('dettagli-twitter')!=""): ?>
                            <li><a target="_blank" href="<?php echo get_option('dettagli-twitter'); ?>"><span class="Icon Icon-twitter"></span><span class="u-hiddenVisually">Twitter</span></a></li>
                        <?php endif; ?>
                        <?php if(get_option('dettagli-youtube')!=""): ?>
                            <li><a target="_blank" href="<?php echo get_option('dettagli-youtube'); ?>"><span class="Icon Icon-youtube"></span><span class="u-hiddenVisually">Youtube</span></a></li>
                        <?php endif; ?>
                        <?php if(get_option('dettagli-instagram')!=""): ?>
                            <li><a target="_blank" href="<?php echo get_option('dettagli-instagram'); ?>"><span class="Icon Icon-instagram"></span><span class="u-hiddenVisually">Instagram</span></a></li>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <?php endif; ?>

            </div>

            <ul class="Footer-links u-cf">
                <?php if(get_option('dettagli-id-privacy')!=""): ?>
                    <li><a href="<?php echo get_permalink(get_option('dettagli-id-privacy')); ?>" title="Privacy policy">Privacy</a></li>
                <?php endif; ?>
                <?php if(get_option('dettagli-id-notelegali')!=""): ?>
                    <li><a href="<?php echo get_permalink(get_option('dettagli-id-notelegali')); ?>" title="Note legali">Note legali</a></li>
                <?php endif; ?>
                <?php if(get_option('dettagli-id-contatti')!=""): ?>
                    <li><a href="<?php echo get_permalink(get_option('dettagli-id-contatti')); ?>" title="Contatti">Contatti</a></li>
                <?php endif; ?>
                <li>Realizzato con <a target="_blank" href="https://it.wordpress.org">WordPress</a></li>
                
                <!-- Per favore, non rimuoverlo! -->
                <?php 
                $main_theme = wp_get_theme(get_template());
                $main_theme_name = $main_theme->get('Name');
                $main_theme_uri = $main_theme->get('ThemeURI');
                 ?>
                <li>Tema grafico <a target="_blank" href="<?php echo $main_theme_uri; ?>"><?php echo $main_theme_name; ?></a></li>
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
<script src="<?php bloginfo('template_url'); ?>/inc/carousel/owl.carousel.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/inc/carousel/owlcarousel2-a11ylayer.js"></script>

<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'albo-pretorio-on-line/AlboPretorio.php' ) ) { ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
<?php } ?>

<script src="<?php bloginfo('template_url'); ?>/inc/scripts.js"></script>
   
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/carousel/owl.carousel.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/carousel/owl.theme.default.min.css">

</body>
</html>

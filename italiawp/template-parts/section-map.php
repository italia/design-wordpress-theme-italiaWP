<?php
/*
 * ### SEZIONE MAPPA ###
 * Mostra la mappa di Google Maps
 *
 */
?>

<div id="mappa" class="u-layout-centerContent u-padding-r-top u-padding-r-bottom section">
    <section class="u-layout-wide u-layout-r-withGutter u-padding-r-top u-padding-r-bottom">
        <h2 class="u-layout-centerLeft u-text-h3">Mappa Interattiva</h2>
        <h5 class="u-layout-centerLeft u-text-h5 h5-map">Clicca su per attivare</h5>
    </section>
</div>

<div class="map-full-content">
    <div class="map-wrap"></div>
    <iframe src="<?php echo get_option('dettagli-map'); ?>" frameborder="0" allowfullscreen></iframe>
</div>

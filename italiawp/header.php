<!DOCTYPE html>
<!--[if IE 8]><html class="no-js ie89 ie8" lang="it"><![endif]-->
<!--[if IE 9]><html class="no-js ie89 ie9" lang="it"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="it">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="keywords" content="">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">

    <?php if (is_front_page()) { ?>
        <title><?php bloginfo('name'); ?></title>
    <?php } else { ?>
        <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <?php } ?>

    <link media="all" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/webtoolkit/build.css">
    <link media="all" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/inc/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    
    <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' ); ?>
    
    <link rel="icon" type="image/png" href="<?php echo esc_url($logo[0]); ?>">

    <?php wp_head(); ?>

    <!--
      In alternativa a WebFontLoader è possibile caricare il font direttamente da Google
        <link href='//fonts.googleapis.com/css?family=Titillium+Web:400,400italic,700,' rel='stylesheet' type='text/css' />
      o dal repository locale (src/fonts)
    -->
    <script type="text/javascript">
      WebFontConfig = {
        google: {
          families: ['Titillium+Web:300,400,600,700,400italic:latin']
        }
      };
      (function() {
        var wf = document.createElement('script');
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>

    <!-- HTML5shim per Explorer 8 -->
    <script src="<?php bloginfo('template_url'); ?>/webtoolkit/modernizr.js"></script>
    
    <script src="<?php bloginfo('template_url'); ?>/webtoolkit/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/inc/magnific-popup/jquery.magnific-popup.min.js"></script>
</head>

<body class="t-Pac">

    <div id="cookie-bar" class="CookieBar js-CookieBar u-background-95 u-padding-r-all" aria-hidden="true">
        <p class="u-color-white u-text-r-xs u-lineHeight-m u-padding-r-bottom">Questo sito utilizza cookie tecnici, analytics e di terze parti.
            <br>Proseguendo nella navigazione accetti l’utilizzo dei cookie.<br>
        </p>
        <p>
            <button class="Button Button--default u-text-r-xxs js-cookieBarAccept u-inlineBlock u-margin-r-all">Accetto</button>
            <a href="<?php echo get_permalink(get_option('dettagli-id-privacy')); ?>" class="u-text-r-xs">Privacy policy</a>
        </p>
    </div>

    <?php get_template_part('menu'); ?>

    <div id="main" class="site-content">
        
    <?php if(!is_attachment()) italiawp_create_breadcrumbs(); ?>

    <?php get_template_part('home-sections'); ?>

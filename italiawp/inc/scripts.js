$(document).ready(function () {
    $("#wp-calendar > caption").addClass("pika-title");
    $("#wp-calendar").addClass("Table u-text-r-xs pika-table");
    $("#wp-calendar a").addClass("pika-button pika-day");
    $("table:not(#wp-calendar)").addClass("Table Table--withBorder u-text-r-xs");
    $(".Grid-cell.u-sizeFull.u-md-size1of4.u-lg-size1of4 > a").addClass("Leads-link u-color-black");
    $(".box-servizi a").addClass("u-textClean u-text-h3 u-color-white");
    $(".form-submit > input").addClass("Button Button--default u-text-xs");
    $(".comment-respond").addClass("Form Form--spaced u-padding-all-xl u-background-grey-10 u-text-r-xs u-layout-prose");
    $(".italiawp-sidebar > ul").addClass("Linklist Linklist--padded u-layout-prose u-text-r-xs");
    $(".italiawp-sidebar > ul > li > a").addClass("Linklist-link Linklist-link--lev2");
    $(".italiawp-sidebar > ul > li > ul > li a").addClass("Linklist-link Linklist-link--lev3");
    
    mapWrap();

    $(".map-wrap").click(function () {
        $(this).fadeOut(10);
    });
    
    $('.image-content a').filter(function() {
            return $(this).attr('href').match(/\.(jpeg|jpg|png|gif)/i);
        }).magnificPopup({
        type: 'image'
    });

    $('.magnific-popup-gallery').filter(function() {
            return $(this).attr('href').match(/\.(jpeg|jpg|png|gif)/i);
        }).magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
        }
    });
    
    $('.Forward').click(function () {
        var $nextElement = $(this).parent().next();
        
        if($nextElement.length) {
            $currentElement = $nextElement;
            $('html,body').animate({
                scrollTop: $nextElement.offset().top - 74
            }, 200);
        }
        return false;
    });
    
    $("ul#primary-menu > li").each(function () {
        if ($(this).has("ul").length) {
            $(this).has("ul").find("a:first").removeAttr("href");
        }
    });
    
    $('a').each(function () {
        if (!(location.hostname === this.hostname || !this.hostname.length ||
                !$.trim($(this).html()).length || $(this).is(':has(figure)') ||
                $(this).closest(".Offcanvas").length || $(this).closest(".Header").length ||
                $(this).closest(".Footer-block").length || $(this).closest(".box-servizi").length ||
                $(this).closest(".Utilities").length)) {
            $(this).addClass('external-link');
        }
    });
    
    $(".italiawp-sidebar select, .Footer select").not(".italiawp-sidebar .italiawp-search select").addClass("Form-input");
    $(".italiawp-sidebar label, .Footer label").not(".italiawp-sidebar .italiawp-search label").addClass("Form-label u-padding-bottom-xs");
    $('.italiawp-sidebar input:not([type="button"]):not([type="submit"]), .Footer input:not([type="button"]):not([type="submit"])')
            .not('.italiawp-sidebar .italiawp-search input:not([type="button"]):not([type="submit"])').addClass("Form-input");
    $('.italiawp-sidebar input[type="button"], .italiawp-sidebar input[type="submit"], .Footer input[type="button"], .Footer input[type="submit"]')
            .not('.italiawp-sidebar .italiawp-search input[type="button"], .italiawp-sidebar .italiawp-search input[type="submit"]')
            .addClass("Button Button--default u-text-xs");
    
    $(".italiawp-sidebar label, .Footer label").not(".italiawp-sidebar .italiawp-search label").each(function(){
        $(this).next("select").andSelf().wrapAll('<div class="Form-field" />"');
    });
    
    $(".italiawp-sidebar .Form-field").not(".italiawp-sidebar .italiawp-search .Form-field")
        .wrap('<ul class="Linklist Linklist--padded u-layout-prose u-text-r-xs" />').wrap('<li class="Linklist-link Linklist-link--lev2 u-padding-all-xs" />')
        .wrap('<form class="Form u-padding-all-xs u-text-r-xs" />').wrap('<fieldset class="Form-fieldset" />')
        .wrap('<div class="Grid Grid--withGutter" />"').wrap('<div class="Grid-cell u-md-size1of1 u-lg-size1of1" />"');

    $(".italiawp-sidebar .italiawp-search .Form-field")
        .wrap('<ul class="Linklist Linklist--padded u-layout-prose u-text-r-xs" />').wrap('<li class="Linklist-link Linklist-link--lev2 u-padding-all-s" />');

    $(".italiawp-sidebar .italiawp-search").removeClass("Header-search");
});

$(window).resize(function() {
    mapWrap();
});

function mapWrap() {
    var altMap = parseInt($(".map-full-content iframe").outerHeight(), 10);
    $(".map-wrap").css("height",altMap+"px").css("margin-bottom",-altMap+"px");
    return;
}
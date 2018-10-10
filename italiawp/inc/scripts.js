$(document).ready(function () {
    $("#wp-calendar > caption").addClass("pika-title");
    $("#wp-calendar").addClass("Table u-text-r-xs pika-table");
    $("#wp-calendar a").addClass("pika-button pika-day");
    $("table:not(#wp-calendar)").addClass("Table Table--withBorder u-text-r-xs");
    $(".Grid-cell.u-sizeFull.u-md-size1of4.u-lg-size1of4 > a").addClass("Leads-link u-color-black");
    $(".box-servizi a").addClass("u-textClean u-text-h3 u-color-white");
    $(".form-submit > input").addClass("Button Button--default u-text-xs");
    $(".comment-respond").addClass("Form Form--spaced u-padding-all-xl u-background-grey-10 u-text-r-xs u-layout-prose");
    
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
});

$(window).load(function() {
});

$(window).resize(function() {
    mapWrap();
});

$(window).scroll(function() {
});

function mapWrap() {
    var altMap = parseInt($(".map-full-content iframe").outerHeight(), 10);
    $(".map-wrap").css("height",altMap+"px").css("margin-bottom",-altMap+"px");
    return;
}
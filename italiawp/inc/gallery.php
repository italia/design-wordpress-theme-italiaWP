<?php

/* Galleria */

function italiawp_custom_gallery( $output = '', $atts, $instance ) {
    $atts = array_merge(array('columns' => 3), $atts);

    $columns = $atts['columns'];
    $link = $atts['link'];
    $size = $atts['size'];
    
    $images = explode(',', $atts['ids']);

    $col_class = 'Grid-cell usizefull u-md-size1of3 u-lg-size1of3 u-text-r-m u-margin-r-bottom';
    if ($columns == 1) { $col_class = 'Grid-cell usizefull u-md-size1of1 u-lg-size1of1 u-text-r-m u-margin-r-bottom';}
    else if ($columns == 2) { $col_class = 'Grid-cell usizefull u-md-size1of2 u-lg-size1of2 u-text-r-m u-margin-r-bottom'; }

    $return = '<section class="u-layout-medium u-margin-r-top">
                    <div class="u-layout-centerLeft">
                        <h2 class="u-text-r-l">Galleria Fotografica</h2>
                    </div>';
    
    $return .= '<div class="Grid Grid--withGutter u-padding-r-top u-text-r-xxl">';
    $i = 0;

    foreach ($images as $key => $value) {
        $link_url = "";
        if($link == "file") $link_url = wp_get_attachment_image_src($value, 'full')[0];
        else if($link=="") $link_url = get_permalink($value);
        
        if($size != "") $image_size = wp_get_attachment_image_src($value, $size);
        else $image_size = wp_get_attachment_image_src($value,'post-thumbnails');
        
        $attachment_meta = wp_get_attachment($value);
        $image_caption = $attachment_meta['caption'];

        $return .= '
<div class="'.$col_class.'">
<section class="u-nbfc u-borderShadow-xxs u-borderRadius-m u-color-grey-30 u-background-white">
    <figure class="u-background-grey-60 u-padding-all-s">';
        if($link_url!="") {
            $return .= '<a href="'.$link_url.'" title="'.$attachment_meta['caption'].'" class="img-link-gallery u-borderFocus u-block u-padding-all-xxs">';
        }
            $return .= '<img src="'.$image_size[0].'" class="u-sizeFull in-gallery" alt="'.$attachment_meta['caption'].'"/>';
        if($link_url!="") {
            $return .= '</a>';
        }
            $return .= '<figcaption class="u-padding-r-top">
            <span class="Icon Icon-camera u-color-white u-floatRight u-text-r-l" aria-hidden="true"></span>
            <p class="u-color-teal-50 u-text-r-xxs u-textWeight-700 u-padding-bottom-xs">Foto</p>
            <p class="u-color-white u-text-r-xxs">'.date('j F Y',strtotime($attachment_meta['date'])).'</p>
        </figcaption>
    </figure>';
        
    if($image_caption!=="") {
        $return .= '
    <div class="u-text-r-l u-padding-r-all u-layout-prose">
        <h3 class="u-text-h4 u-margin-r-bottom">
            <span class="u-color-black u-textWeight-400 u-text-r-m">'.$image_caption.'</span>
        </h3>
    </div>';
    }
    
        $return .= '</section></div>';

        $i++;
    }

    $return .= '</div></section>';

    return $return;
}
add_filter('post_gallery','italiawp_custom_gallery', 10, 3 );

function wp_get_attachment( $attachment_id ) {
    $attachment = get_post( $attachment_id );
    return array(
        'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
        'caption' => $attachment->post_excerpt,
        'description' => $attachment->post_content,
        'href' => get_permalink( $attachment->ID ),
        'src' => $attachment->guid,
        'title' => $attachment->post_title,
        'date' => $attachment->post_date
    );
}

/* Immagini Singole */

function get_attachment_id($url) {
    $attachment_id = 0;
    $dir = wp_upload_dir();
    if (false !== strpos($url, $dir['baseurl'] . '/')) {
        $file = basename($url);
        $query_args = array(
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'fields' => 'ids',
            'meta_query' => array(
                array(
                    'value' => $file,
                    'compare' => 'LIKE',
                    'key' => '_wp_attachment_metadata',
                ),
            )
        );
        $query = new WP_Query($query_args);
        if ($query->have_posts()) {
            foreach ($query->posts as $post_id) {
                $meta = wp_get_attachment_metadata($post_id);
                $original_file = basename($meta['file']);
                $cropped_image_files = wp_list_pluck($meta['sizes'], 'file');
                if ($original_file === $file || in_array($file, $cropped_image_files)) {
                    $attachment_id = $post_id;
                    break;
                }
            }
        }
    }
    return $attachment_id;
}

add_filter('the_content', 'italiawp_custom_images', 100);
function italiawp_custom_images($content) {
    if (!preg_match_all('/<img [^>]+>/', $content, $matches)) {
        return $content;
    }

    foreach ($matches[0] as $image) {
        $doc = new DOMDocument();
        $doc->loadHTML($image);
        $xpath = new DOMXPath($doc);
        $class = $xpath->evaluate("string(//img/@class)");
        
        if ( strpos($class, 'in-gallery') == false ) {
            $src = $xpath->evaluate("string(//img/@src)");
            $attachment_id = get_attachment_id($src);
            $content = str_replace($image, italiawp_custom_image_tag($image, $attachment_id), $content);
        }
    }

    return $content;
}

function italiawp_custom_image_tag($image, $attachment_id) {
    $attachment_meta = wp_get_attachment($attachment_id);

    $imgCaption = $attachment_meta['caption'];
    $imgSrc = $attachment_meta['src'];
    $imgTitle = $attachment_meta['title'];
    $imgDate = $attachment_meta['date'];
    $imgAlt = $attachment_meta['alt'];
    
    $fullImage = wp_get_attachment_image_src($attachment_id, 'full');
    $fullImage = $fullImage[0];
    
    $custom_image = '
    <section class="u-nbfc u-borderShadow-xxs u-borderRadius-m image-content u-color-grey-30 u-background-white">
        <figure class="u-background-grey-60 u-padding-all-s">
            <img src="' . $imgSrc . '" class="u-sizeFull" alt="' . $imgAlt . '">
            <figcaption class="u-padding-r-top">
                <span class="Icon Icon-camera u-color-white u-floatRight u-text-r-l" aria-hidden="true"></span>
                <p class="u-color-teal-50 u-text-r-xxs u-textWeight-700 u-padding-bottom-xs">' . $imgTitle . '</p>
                <p class="u-color-white u-text-r-xxs">' . date('j F Y',strtotime($imgDate)) . '</p>
            </figcaption>
        </figure>';

    if ($imgCaption !== "") {
        $custom_image .= '
        <div class="u-text-r-l u-padding-r-all u-layout-prose">
            <h3 class="u-text-h4 u-margin-r-bottom">
                <span class="u-color-black u-textWeight-400 u-text-r-m">' . $imgCaption . '</span>
            </h3>
        </div>';
    }

    $custom_image .= '</section>';
    return $custom_image;
}

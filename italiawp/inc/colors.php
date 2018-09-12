<?php

function HTMLToRGB($htmlCode) {
    $htmlCode = strtoupper($htmlCode);
    
    if ($htmlCode[0] == '#')
        $htmlCode = substr($htmlCode, 1);

    if (strlen($htmlCode) == 3) {
        $htmlCode = $htmlCode[0] . $htmlCode[0] . $htmlCode[1] . $htmlCode[1] . $htmlCode[2] . $htmlCode[2];
    }

    $r = hexdec($htmlCode[0] . $htmlCode[1]);
    $g = hexdec($htmlCode[2] . $htmlCode[3]);
    $b = hexdec($htmlCode[4] . $htmlCode[5]);
    
    return array( floor( $r ), floor( $g ), floor( $b ) );
}

function RGBToHTML( $r, $g, $b ) {
    $r = dechex($r);
    $g = dechex($g);
    $b = dechex($b);

    return "#" . str_pad($r, 2, "0", STR_PAD_LEFT) . str_pad($g, 2, "0", STR_PAD_LEFT) . str_pad($b, 2, "0", STR_PAD_LEFT);
}

function RGBToHSL( $r, $g, $b ) {
	$oldR = $r;
	$oldG = $g;
	$oldB = $b;
	$r /= 255;
	$g /= 255;
	$b /= 255;
    $max = max( $r, $g, $b );
	$min = min( $r, $g, $b );
	$h;
	$s;
	$l = ( $max + $min ) / 2;
	$d = $max - $min;
    	if( $d == 0 ){
        	$h = $s = 0;
    	} else {
        	$s = $d / ( 1 - abs( 2 * $l - 1 ) );
		switch( $max ){
	            case $r:
	            	$h = 60 * fmod( ( ( $g - $b ) / $d ), 6 ); 
                        if ($b > $g) {
	                    $h += 360;
	                }
	                break;
	            case $g: 
	            	$h = 60 * ( ( $b - $r ) / $d + 2 ); 
	            	break;
	            case $b: 
	            	$h = 60 * ( ( $r - $g ) / $d + 4 ); 
	            	break;
	        }			        	        
	}
	return array( round( $h, 2 ), round( $s, 2 ), round( $l, 2 ) );
}

function HSLToRGB( $h, $s, $l ){
    $r; 
    $g; 
    $b;
	$c = ( 1 - abs( 2 * $l - 1 ) ) * $s;
	$x = $c * ( 1 - abs( fmod( ( $h / 60 ), 2 ) - 1 ) );
	$m = $l - ( $c / 2 );
	if ( $h < 60 ) {
		$r = $c;
		$g = $x;
		$b = 0;
	} else if ( $h < 120 ) {
		$r = $x;
		$g = $c;
		$b = 0;			
	} else if ( $h < 180 ) {
		$r = 0;
		$g = $c;
		$b = $x;					
	} else if ( $h < 240 ) {
		$r = 0;
		$g = $x;
		$b = $c;
	} else if ( $h < 300 ) {
		$r = $x;
		$g = 0;
		$b = $c;
	} else {
		$r = $c;
		$g = 0;
		$b = $x;
	}
	$r = ( $r + $m ) * 255;
	$g = ( $g + $m ) * 255;
	$b = ( $b + $m  ) * 255;
    return array( floor( $r ), floor( $g ), floor( $b ) );
}

function colorChangeSL($color,$sMod=0,$lMod=0) {    
    $color_RGB = HTMLToRGB($color);
    $color_HSL = RGBToHSL($color_RGB[0],$color_RGB[1],$color_RGB[2]);
    
    $h = $color_HSL[0];
    $s = round($color_HSL[1],2);
    $l = round($color_HSL[2],2);
    
    $ss = $s + round($sMod/100,2);
    $ll = $l + round($lMod/100,2);
    
    $new_color_RGB = HSLToRGB($h,$ss,$ll);
    $new_color = RGBToHTML($new_color_RGB[0],$new_color_RGB[1],$new_color_RGB[2]);
    
    return $new_color;
}

function colorSetSL($color,$sMod=100,$lMod=100) {    
    $color_RGB = HTMLToRGB($color);
    $color_HSL = RGBToHSL($color_RGB[0],$color_RGB[1],$color_RGB[2]);
    
    $h = $color_HSL[0];
    $s = abs(round($sMod/100,2));
    $l = abs(round($lMod/100,2));
    
    $new_color_RGB = HSLToRGB($h,$s,$l);
    $new_color = RGBToHTML($new_color_RGB[0],$new_color_RGB[1],$new_color_RGB[2]);
    
    return $new_color;
}

function colorCompl($color) {
    $color_RGB = HTMLToRGB($color);
    
    $new_color_RGB[0] = 255-$color_RGB[0];
    $new_color_RGB[1] = 255-$color_RGB[1];
    $new_color_RGB[2] = 255-$color_RGB[2];
    
    $new_color = RGBToHTML($new_color_RGB[0],$new_color_RGB[1],$new_color_RGB[2]);
    
    return $new_color;
}
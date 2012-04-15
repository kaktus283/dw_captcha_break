<?php
  $start = explode( ' ', microtime() );
  $start = $start[0] + $start[1];
//Required funcion
  function removeColor ( $file, $width, $height ){
  $image_new = imagecreatetruecolor( $width, $height );
  for( $i = 0; $i <= $height; $i++ ) {
    for( $j = 0; $j <= $width; $j++ ) {
      $image_open = imagecreatefrompng( $file );
      $rgb = imagecolorat( $image_open, $j, $i );
      $color_arr = imagecolorsforindex( $image_open, $rgb );
      if( $color_arr['red'] != 0 && $color_arr['green'] != 0 && $color_arr['blue'] != 0 ) {
        $color = imagecolorallocate( $image_new, 255, 255, 255 );
        imagesetpixel( $image_new, $j, $i, $color );
      }
    }
  }
  imagepng( $image_new, 'captcha2_1.png' );
  echo 'Captcha in black has been saved!<br />';
  }
//Function in action
  removeColor( 'captcha/1.png', 250, 50 );
  $end = explode( ' ', microtime() );
  $end = $end[0] + $end[1];
  $time = $end - $start;
  echo 'Captcha break in: '.substr( $time, 0, 5 ).' sec.';
?>

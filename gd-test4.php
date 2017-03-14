<?php
$text  = "下班了!3/10";

$image = imagecreate(128, 64); // width = 128, height = 64
$bg    = imagecolorallocate($image, 255, 255, 255); // 背景色

$font  = './wt002.ttf'; // 字型
$black = imagecolorallocate($image, 0, 0, 0); // 字的顏色

// imagettftext($image, 大小, 旋轉, 與左邊的距離, 與上面的距離, $black, $font, $text);
imagettftext($image, 16, 0, 0, 40,$black, $font, $text);

//header('Content-type: image/gif');
//header('Content-Disposition: Attachment;filename=image.png');
//header('Content-type: image/png');

//imagegif($image);
//imagefilter($image, IMG_FILTER_GRAYSCALE);
imagefilter($image, IMG_FILTER_COLORIZE, 0, 0, 0);
//imagepng($image);
imagepng($image,"image.png");
imagedestroy($image);
//$last_line = system('node test-3.js', $return_var);
exec("/opt/bin/node test-4.js", $output, $return_var);
//exec('ls', $output, $return_var);
//print_r($output);
echo $output[0];
//print_r($last_line);
//echo "last line: "+$last_line;
//echo "return :"+$return_var;


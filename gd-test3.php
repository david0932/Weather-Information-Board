<?php
$text  = "今天是3月10日\n";
$text .= "是旅遊的好天氣";

$image = imagecreate(128, 64); // width = 128, height = 64
$bg    = imagecolorallocate($image, 255, 255, 255); // 背景色

$font  = './wt002.ttf'; // 字型
$black = imagecolorallocate($image, 0, 0, 0); // 字的顏色

// imagettftext($image, 大小, 旋轉, 與左邊的距離, 與上面的距離, $black, $font, $text);
imagettftext($image, 14, 0, 0, 15, $black, $font, $text);

//header('Content-type: image/gif');
header('Content-Disposition: Attachment;filename=image.png');
header('Content-type: image/png');

//imagegif($image);
//imagefilter($image, IMG_FILTER_GRAYSCALE);
imagefilter($image, IMG_FILTER_COLORIZE, 0, 0, 0);
imagepng($image);
imagedestroy($image);
?>
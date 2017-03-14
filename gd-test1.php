<?php
$text  = "今天天氣真好\n";
$text .= "是旅遊的好天氣";

$image = imagecreate(800, 600); // width = 800, height = 600
$bg    = imagecolorallocate($image, 255, 255, 255); // 背景色

$font  = './wt002.ttf'; // 字型
$black = imagecolorallocate($image, 0, 0, 0); // 字的顏色

// imagettftext($image, 大小, 旋轉, 與左邊的距離, 與上面的距離, $black, $font, $text);
imagettftext($image, 30, 0, 0, 40, $black, $font, $text);

header('Content-type: image/gif');
imagegif($image);
imagedestroy($image);
?>
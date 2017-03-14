<?php 


function make_image($text){
		// set image   
		$image = imagecreate(128, 64); // width = 128, height = 64
		$bg    = imagecolorallocate($image, 255, 255, 255); // 背景色: 白色
		$font  = './wt002.ttf'; // 字型
		$black = imagecolorallocate($image, 0, 0, 0); // 字的顏色: 黑色
		// imagettftext($image, 大小, 旋轉, 與左邊的距離, 與上面的距離, $black, $font, $text);
		imagettftext($image, 18, 0, 0, 18,$black, $font, $text);
		// put to png file
		imagepng($image,"image.png");
		imagedestroy($image);;
}

// conver png to lcd data , and echo data
function png_to_lcd() {
	exec("/opt/bin/node test-4.js", $output, $return_var);
	echo $output[0];
}


 
// 天氣狀態

$weather_text = array('雷雨'=>'thunderstorm rain' ,'驟雨'=>'showers rain','小驟雨'=>'light showers rain', 
'多雲'=>'Cloudy','小雪' => 'Flurries','霧' => 'Fog','陰霾' => 'Haze','多雲時陰' => 'Mostly Cloudy',
'晴時多雲' => 'Mostly Sunny','局部多雲' => 'Partly Cloudy','多雲時晴' => 'Partly Sunny',
'凍雨' => 'Freezing Rain','雨' => 'Rain','冰雹' => 'Sleet','雪' => 'Snow',
'晴朗' => 'Sunny','未知' => 'Unknown','陰天' => 'Overcast','疏雲' => 'Scattered Clouds',
'小雨' => 'light rain', "小雨薄霧" => 'light rain mist',"雨霧" => "rain mist","薄霧" => "mist","晴朗" => "Clear",
'陰霾' => 'haze');
  					 
// ?query=[觀測點名稱]，例如: Taoyuan Air Base , Taipei 
$city = $_GET['city'];
$weather = $_GET['weather'];
$geo = $_GET['geo'];
if (isset($geo) && isset($weather)){
		$url = "http://api.wunderground.com/auto/wui/geo/WXCurrentObXML/index.xml?query=".$geo;
		$xml = simplexml_load_file($url);
		// 取得天氣狀況
		$str1 = $xml->weather;
		$str = array_search($str1,$weather_text);
	/*	if (!isset($str)) {
			$str = $weather_text;
		} */
		$lcd_text = $str."\n";
		$lcd_text .= "氣溫:".$xml->temp_c."°C\n";
		make_image($lcd_text);
		png_to_lcd();
		// show image
		//header('Content-type: image/png');
		//imagefilter($image, IMG_FILTER_COLORIZE, 0, 0, 0);
		//imagepng($image);
		//echo "finish..";
}
else if (isset($city)){
	$lcd_text = $city."\n"."目前天氣";
	make_image($lcd_text);
	png_to_lcd();
}
//echo 'test';

// show image
//header('Content-type: image/png');
//imagefilter($image, IMG_FILTER_COLORIZE, 0, 0, 0);
//imagepng($image);


// 氣象圖示 
/* 
foreach ($xml->icons->children() as $icon_set) {  
   if($icon_set['name']=='Contemporary'){  
       echo $icon_set->icon_url;  
   }      
} 
*/ 
/*  
圖示造型種類: 
   Default 
   Smiley 
   Helen 
   Generic 
   Old School 
   Cartoon 
   Mobile 
   Simple 
   Contemporary 
   Dunkin' Donuts     
*/  
/*  
echo "氣象狀況：",$xml->weather,"\n";  
  
echo "溫度：",$xml->temp_c,"°C\n";  
  
echo "相對濕度：",$xml->relative_humidity,"\n";  
  
echo "風向：",$xml->wind_dir,"\n";  
  
echo "風速：",$xml->wind_mph,"MPH\n";  
echo "風速：每小時",round($xml->wind_mph*1.6093),"公里\n";  
echo "風速：每秒",round($xml->wind_mph*0.447028),"公尺\n";  
  
echo "海平面氣壓：",$xml->pressure_mb,"百帕\n";  
  
echo "高溫指數：",$xml->heat_index_c,"°C\n";  
  
echo "風寒指數：",$xml->windchill_c,"°C\n";  
  
echo "水凝點：",$xml->dewpoint_c,"°C\n";  
  
echo "能見度：",$xml->visibility_km,"公里\n";  
  
echo "觀測時間：",date(  
   'Y-m-d H:i',  
   strtotime($xml->observation_time_rfc822)  
),"\n";  
*/  
/*  
thunderstorm rain = 雷雨 
showers rain = 驟雨 
light showers rain = 小驟雨 
 
Cloudy = 多雲 
Flurries = 小雪 
Fog = 霧 
Haze = 陰霾 
Mostly Cloudy = 多雲時陰 
Mostly Sunny = 晴時多雲 
Partly Cloudy = 局部多雲 
Partly Sunny = 多雲時晴 
Freezing Rain = 凍雨 
Rain = 雨 
Sleet = 冰雹 
Snow = 雪 
Sunny = 晴朗 
Unknown = 未知 
Overcast = 陰天 
Scattered Clouds = 疏雲  
*/  

?>
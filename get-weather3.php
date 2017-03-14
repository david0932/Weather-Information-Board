<?php
  $url = "http://api.wunderground.com/api/cdb1623dede001c2/conditions/q/Taiwan/Xinbei.json";
  $json_string = file_get_contents($url);
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'current_observation'}->{'display_location'}->{'city'};
  $temp_c = $parsed_json->{'current_observation'}->{'temp_c'};
  $weather = $parsed_json->{'current_observation'}->{'weather'};
  echo "Current temperature in ${location} is: ${temp_c}\n";echo "<BR>";
  echo "The weather is ${weather}\n";
?>
<?php
$resultzh = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Zurich,ch&appid=b0c4334e055feb697bcb232c0e6b8174&units=metric&lang=de');

$zh = json_decode($resultzh,1);
$tempzh = $zh['main']['temp'];
$descriptionzh = $zh['weather']['0']['description'];
$namezh = $zh['name'];
$resultzg = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Zug,ch&appid=b0c4334e055feb697bcb232c0e6b8174&units=metric&lang=de');
$zg = json_decode($resultzg,1);
$tempzg = $zg['main']['temp'];
$descriptionzg = $zg['weather']['0']['description'];
$namezg = $zg['name'];

$resultbs = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=Basel,ch&appid=b0c4334e055feb697bcb232c0e6b8174&units=metric&lang=de');
$bs = json_decode($resultbs,1);
$tempbs = $bs['main']['temp'];
$descriptionbs = $bs['weather']['0']['description'];
$namebs = $bs['name'];

$php_timestamp = $bs['dt'];
$dt = date("d/m/Y H:i", $php_timestamp);

$fp = fopen("weather.txt", "a");
$savestring = $tempzh . ";" . $namezh . ";" .$dt . ";" .$descriptionzh . PHP_EOL;
$savestring .= $tempzg . ";" . $namezg . ";" .$dt . ";" .$descriptionzg . PHP_EOL;
$savestring .= $tempbs . ";" . $namebs . ";" .$dt . ";" .$descriptionbs . PHP_EOL;
fwrite($fp, $savestring);
fclose($fp);
$lines = array_slice(file('weather.txt'), -3);
echo $lines[0];
echo $lines[1];
echo $lines[2];

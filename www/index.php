<?php
//blablabla
//podkluchaem classi
require_once "start.php";
require_once $dir_lib . "url_class.php";

//sozdaem object URL
$url = new URL();
$view = $url->getView(); //vitoschit ssilku

$class = $view . "Content";
if (file_exists($dir_lib . $class . "_class.php")) {
    require_once $dir_lib . $class . "_class.php";
    new $class();
} else {
    
}
?>
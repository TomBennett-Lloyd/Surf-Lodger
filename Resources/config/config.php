<?php
//set the root directory
$folder = realpath(dirname(__DIR__));
//set the directory for the config file (whether or not it's been created)
$configXML = dirname(__DIR__) . '/config/config.xml';
//set the path to the php library
defined("LIBRARY_PATH")
    or define("LIBRARY_PATH",realpath(dirname(__DIR__) . '/Library'));
//set the path to the html templates
defined("TEMPLATES_PATH")
    or define("TEMPLATES_PATH",realpath(dirname(__DIR__) . '/Templates'));
//get the config manager for extracting the config from the XML
require_once LIBRARY_PATH . '/configurationManager.php';
//get the config from the XML (in this case it's just the API Key handler
//but  this way it is easier to include more config in the future)
$config = ["APIKeys" => new apiConfiguration($configXML)];
//set the base javascript files to add to every page in the project
$jsFiles = ["external/JQuery/jquery-3.3.1.min.js","external/Bootstrap/js/bootstrap.min.js"];
//get the value of the API key from the handler (the handler also controls updating the keys)
$placesKey = (string) $config{'APIKeys'}->keys['places'];
//register the google maps javascript application if we have a key
if ($placesKey) {
    $externalJS = ["https://maps.googleapis.com/maps/api/js?key=". $placesKey ."&libraries=places&callback=initMap"];
} else {
    $externalJS = [];
}

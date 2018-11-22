<?php
//init the config
require_once(realpath("../../../Resources/config/config.php"));
//sanitise the data to upload to the xml
$dataIn = filter_input_array(INPUT_POST, ['places'=>FILTER_SANITIZE_FULL_SPECIAL_CHARS]);
//if the data is sanitary then update the keys
if  (dataIn){
    //assign the new data to the xml and update the config object
    
   if ($config[APIKeys]->updateKeys($dataIn)){
       //for now just return the success to the callback
       die("true");
   }   
}
die ("false");


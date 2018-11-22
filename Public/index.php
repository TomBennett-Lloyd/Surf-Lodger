<?php
    require_once("../Resources/config/config.php");
    
    require_once(TEMPLATES_PATH . "/header.php");
    
    if ($placesKey){
        require_once(TEMPLATES_PATH . "/mainFeature.php");
    }
    else 
    {
        require_once(TEMPLATES_PATH . "/initialConfig.php");
    }    
    require_once(TEMPLATES_PATH . "/footer.php");
?>
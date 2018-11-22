<?php
    
    foreach ($jsFiles as $fileName){
        echo('<script src="'  . $fileName . '" type="text/javascript"></script>');
    }
    foreach($externalJS as $fileName){
        echo('<script src="'  . $fileName . '" async defer></script>');
    }
     
?>
        
    </body>
</html>

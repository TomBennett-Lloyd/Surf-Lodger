<?php

class apiConfiguration {
    
    //assosciative array with the name of the key and it's value
    public $keys;
    private $filename;
        
    //loads in config file and turns it into an assosciative array with the containing API keys
    function __construct ($filename){
        try{
            $this->filename = $filename;
            $xml = simplexml_load_file($filename);
            $this -> keys = get_object_vars($xml); 
        } catch (Exception $ex) {
            die("invalid XML: ". $ex);
        }
        
    }
    //updates/ creates the config file with the new keys
    public function updateKeys (Array $newKeys){
        try {
            $this->keys=[];//could potentially get this from an existing file so we can add to it
            //merge with existing keys
            $this->keys = array_merge($this->keys,$newKeys);
            if ($this->keys != NULL){
                //if there are keys the build them into the xml file and save it
                $xml = new XMLBuilder($this->filename,$this->keys,"apiKeys");
                return $xml->saveFile();
            }
            return false;
        } catch (Exception $ex) {
            return false;
        }  
    }
}

class XMLBuilder {
    private $xml;
    private $filename;
    //class to build the xml files, takes the name of the file to be created, an asociative array to transform into the
    //xml and the name for the parent element.
    //has been designed to work recursively although that's not actually nescesary just yet, hence this functionality
    //hasn't been full tested yet
    function __construct($filename,$ascArray,$parentName){
        try{
            $this->xml = new DOMDocument();
            $this->filename = $filename;
            $this->append($ascArray,$parentName);
        } catch (Exception $ex) {
            die("Failed to append the XML: ".$ex);
        }
        
    }
    //function to append elements to a parent element
    public function append($ascArray,$parentName){
        try {
            //get the parent element if one already exists
            $existing = $this->xml->getElementsByTagName($parentName);
            //check if the parent did exists
           if ($existing->length==1 && $existing->item(0)->parentNode == $this->xml){
               //replace the existing parent with a modified version to contain the new array
               $this->xml->replaceChild($existing->item(0), $this->ArraytoXML(ascArray,$existing->item(0)));
           }
           else
           {
               //if not then create the parent element
               $parentNode = $this->xml->createElement($parentName);
               //append the array
               $this->xml->appendChild($this->arraytoXML($ascArray,$parentNode));
           }   
        } catch (Exception $ex) {
            die("Append Failed: ".$ex);
        }    
    }
    
    private function arrayToXML ($ascArray,$parentNode) {
        try {
            //create the new elements for each member of the array
            foreach ($ascArray as $key => $value) {
                $thisKey = $this->xml->createElement($key);
                //if its value is an array then create the xml for the array using this method
                if (is_array($value)){
                    $thisVal = $this->arrayToXML($value,$thisKey);
                } else {
                    //otherwise assign the text value
                    $thisVal =  $this->xml->createTextNode($value);
                }
                // append the new data to the parents
                $thisKey -> appendChild($thisVal);
                $parentNode->appendChild($thisKey);
             }
             return $parentNode;
        } catch (Exception $ex) {
            die("Array to XML Failed: ".$ex);
        }
    }
    
    public function saveFile() {
        //save the xml to the desired location, this will overwrite the existing file
        return $this->xml->save($this->filename);
    }
        
}
 
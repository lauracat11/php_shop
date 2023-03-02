<?php
class clsResponse{
    private $data;
    private $objxml;
    private $responseXML;

    function __construct(){
        $this->objxml = new clsXMLUtils();
        $this->responseXML = $this->objxml->ReadFileAsXML('./xml/out.xml');
        $this->createXML();
    }
  
    function createXML(){
        

    }
    function setHeader(string $pHeaderType){
        switch ($pHeaderType){
            case "XML":
                header('content-Type: text/xml');
                break;
            case "HTML":
                header('content-Type: text/html');
                break;
        }
    }
    function setContents(){
        
    }


    function Render(){
        $this->setHeader();
        
    }
}
?>


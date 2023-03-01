<?php

class clsResponse{
    private $data;
    private $objxml;
    private $responseXML;

    function __construct(){
        $this->objxml = new clsXMLUtils();
        $this->responseXML = $this->objxml->ReadFileAsXML('./xml/out.xml');
        // echo('hola');
        // print_r($this->responseXML);
        $this->createXML();


    }
    function createDOM(){
        $dom_sxe = dom_import_simplexml($this->data);
        $dom = new DOMDocument('1.0');
        $dom_sxe = $dom->importNode($dom_sxe, true);
        $dom_sxe = $dom->appendChild($dom_sxe);
        echo $dom->saveXML();
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
// crear funcion flag: si es 0= XML y si es 1 = html;

}
?>


<?php
class clsResponse{
    private  $responseXML;

    function __construct($pXML){
        $this->responseXML = $pXML;
        // print_r($this->responseXML);
    }
    function createDOM(){
        $dom_sxe = dom_import_simplexml($this->responseXML);
        $dom = new DOMDocument('1.0');
        $dom_sxe = $dom->importNode($dom_sxe, true);
        $dom_sxe = $dom->appendChild($dom_sxe);
        echo $dom->saveXML();
    }
    function createXML(){
        header('content-Type: text/xml');
        // echo ($this->responseXML);
    }
    function setHeader(){
        switch ($this->responseXML){
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


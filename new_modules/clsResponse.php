<?php
class clsResponse(){
    private  $responseXML;

    function __construct($pXML){
        $this->responseXML = $pXML;
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


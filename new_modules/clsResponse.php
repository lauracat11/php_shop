<?php
class clsResponse{
    private $data;
    private clsXMLUtils $objxml;
    private $responseXML;
    private string $responseType;

    function __construct(string $pResponseType){
        $this->responseType = $pResponseType;
        $this->objxml = new clsXMLUtils();
        $this->setContents();
    }

    function setHeader(){
        switch ($this->responseType){
            case "XML":
                header('content-Type: text/xml');
                break;
            case "HTML":
                header('content-Type: text/html');
                break;
        }
    }

    function setData($pDATA){
        $this->data = $pDATA;
    }

    function setContents():void{
        $this->responseXML = $this->objxml->ReadFileAsXML('./xml/out.xml');
        $this->setServerID();
        $this->setServerTime();
        $this->setExecutionTime();
        $this->setURL();
        
        
    }

    function setWebMethod(){

    }


    function setServerID(){
        $this->responseXML->head->server_id = '1';
    }

    function setServerTime(){
        $this->responseXML->head->server_time = date("Y-m-d H:i:s");
    }

    function setExecutionTime(){
        $this->responseXML->head->execution_time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
    }

    function setURL(){
        $this->responseXML->head->url = $_SERVER['REQUEST_URI'];
    }

    function Render(){
        $this->setHeader();
        $this->setContents();
        echo $this->responseXML->asXML();
    }
}
?>
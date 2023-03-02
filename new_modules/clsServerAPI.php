<?php
include_once "clsXMLUtils.php";
include_once "clsMethod.php";

class clsServerAPI{
    private clsXMLUtils $obj_xml;
    private array $arrMethods = [];

    function __construct(string $pXMLurl)
    {
        $this->obj_xml = new clsXMLUtils();
        $this->obj_xml->ReadFileAsXML($pXMLurl);
        $this->sacarRespuesta();
    }
    function sacarRespuesta():void{
        $this->response = new clsResponse ();
      
    }
    function ParseWebMethod():void{
        $xpath = $this->obj_xml->ApplyXPath('//web_methods_collection/web_method', false);
        foreach($xpath as $method){
            $this->addMethod($method);
        }

    }

    function addMethod(SimpleXMLElement $pMethod):void{
        $newMethod = new clsMethod($pMethod);
        array_push($this->arrMethods, $newMethod);
    }

    function Validate(string $pActionValue):void{

        foreach ($this->arrMethods as $M) {          
            if($pActionValue == $M->getActionValue()){ 
                $M->Validate();
            }

        }
    }

}

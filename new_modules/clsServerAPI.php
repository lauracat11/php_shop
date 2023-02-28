<?php
include_once "modules/utils/XML/clsXMLUtils.php";
include_once "clsMethod.php";

class clsServerAPI{
    private $obj_xml;
    private $arrMethods = [];
    function __construct($pXMLurl)
    {
        $this->obj_xml = new clsXMLUtils();
        $this->obj_xml->ReadFileAsXML($pXMLurl);
    }

    function ParseWebMethod(){
        $xpath = $this->obj_xml->ApplyXPath('//web_methods_collection/web_method', false);

        foreach($xpath as $method){
            $this->addMethod($method);
        }

    }

    function addMethod($pMethod){
        $newMethod = new clsMethod($pMethod);
        array_push($this->arrMethods, $newMethod);
    }

    function Validate($pActionValue){

        foreach ($this->arrMethods as $M) {          
            if($pActionValue == $M->getActionValue()){ 
                $M->Validate();
            }

        }
    }

}

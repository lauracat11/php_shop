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
            // print_r($method);
            // echo('<br>');
            // echo('<br>');
            // echo('<br>');
            // echo('<br>');
            // echo('<br>');
            // echo('<br>');
            $this->addMethod($method);
        }

        // print_r($this->arrMethods);
    }

    function addMethod($pMethod){
        $newMethod = new clsMethod($pMethod);
        array_push($this->arrMethods, $newMethod);
    }

}

?>
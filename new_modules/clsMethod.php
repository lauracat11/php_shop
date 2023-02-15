<?php
include_once "modules/utils/XML/clsXMLUtils.php";
include_once "clsParam.php";

class clsMethod{
    private $obj_xml;
    private $xml;
    private $arrParams = [];

    function __construct($XMLobject)
    {
        $this->xml = $XMLobject;
        // print_r($this->xml);
        $this->obj_xml = new clsXMLUtils();
    }


    function ParseParamCollection(){
        $this->obj_xml->ReadFileAsXML($this->xml);
        $xpathParams =$this->obj_xml->ApplyXPath('//params_collection', false);
        foreach ($xpathParams as $params){
            $this->addParam($params);
        }

        // print_r($this->arrParams);
    }

    function addParam($pParam){
        $newParam = new clsParam($pParam);
        array_push($this->arrParams, $newParam);
    }



}

?>
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
        // $ParamsCollection = $this->xml->params_collection;
        // print_r($ParamsCollection);
        $this->ParseParamCollection();
    }


    function ParseParamCollection(){
        
        $xpathParams = $this->xml->params_collection;
        // print_r($xpathParams);
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
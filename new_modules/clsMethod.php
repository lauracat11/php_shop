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
        // print_r($this->xml);
        $this->ParseParamCollection();
    }


    function ParseParamCollection(){
        
        $xpathParamsCollection = $this->xml->params_collection;
        // print_r($xpathParams);
        foreach ($xpathParamsCollection as $params){
            $this->addParam($params);
        }

        // print_r($this->arrParams);
    }

    function addParam($pParams){
        $newParams = new clsParam($pParams);
        array_push($this->arrParams, $newParams);
    }



}

?>
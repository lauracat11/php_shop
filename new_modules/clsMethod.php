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
        $this->ParseParamCollection();
    }


    function ParseParamCollection(){
        
        $xpathParamsCollection = $this->xml->params_collection;
        foreach($xpathParamsCollection as $params){
            foreach($params as $singleParams){
                $this->addParam($singleParams);
            }
        }

    }

    function addParam($pParams){
        $newParams = new clsParam($pParams);
        array_push($this->arrParams, $newParams);
    }

    function Validate(){
        foreach ($this->arrParams as $p){
            print_r($p->ValidateParam());
        }
    }

    function getActionValue(){
        $ActionValue = $this->xml->params_collection->param->default->__ToString();
        return $ActionValue;
    }

}

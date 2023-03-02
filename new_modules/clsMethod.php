<?php
include_once "clsParam.php";

class clsMethod{
    private SimpleXMLElement $xml;
    private array $arrParams = [];

    function __construct(SimpleXMLElement $XMLobject)
    {
        $this->xml = $XMLobject;
        $this->ParseParamCollection();
    }


    function ParseParamCollection():void{
        
        $xpathParamsCollection = $this->xml->params_collection;
        foreach($xpathParamsCollection as $params){
            foreach($params as $singleParams){
                $this->addParam($singleParams);
            }
        }

    }

    function addParam( SimpleXMLElement $pParams):void{
        $newParams = new clsParam($pParams);
        array_push($this->arrParams, $newParams);
    }

    function Validate():void{
        foreach ($this->arrParams as $p){
            $p->ValidateParam();
        }
    }

    function getActionValue():string{
        $ActionValue = $this->xml->params_collection->param->default->__ToString();
        return $ActionValue;
    }

}

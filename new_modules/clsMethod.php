<?php
include_once "clsParam.php";

class clsMethod{
    private SimpleXMLElement $xml;
    private array $arrParams = [];
    private array $arrErrors = [];

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

    function getArrayParams(){
        return $this->arrParams;
    }

    function addParam( SimpleXMLElement $pParams):void{
        $newParams = new clsParam($pParams);
        array_push($this->arrParams, $newParams);
    }

    function Validate():void{
        foreach ($this->arrParams as $p){
            $p->ParseParam();
            $p->ValidateParam();
            $pError = $p->getErrors();
            if (count($pError)>0){
                foreach ($pError as $e){
                    array_push($this->arrErrors, $e);
                }
            }
        }
    }

    function getActionValue():string{
        $ActionValue = $this->xml->params_collection->param->default->__ToString();
        return $ActionValue;
    }

    function getErrors(){
        return $this->arrErrors;
    }

}

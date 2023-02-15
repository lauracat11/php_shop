<?php
include_once "clsRequest.php";
class clsParam{
    private $obj_paramsc;
    private $arrParam=[];
    function __construct($obj_ParamsCollection)
    {
        $this->obj_params = $obj_ParamsCollection;
        // print_r($this->xml);
        $this->ParseParam();
        $this->getValue();
    }

    function ParseParam(){
        
        $xpathParam = $this->obj_params->param;
        // print_r($xpathParam);
        foreach ($xpathParam as $param){
            $this->addParam($param);
        }
        // print_r($this->arrParam);
    }

    function addParam($pParam){
        $newRequestParam = new clsRequest($pParam);
        array_push($this->arrParam, $newRequestParam);
    }
   
    
}

?>
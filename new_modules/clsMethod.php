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
        // print_r($this->xml) ;
        $this->ParseParamCollection();
    }


    function ParseParamCollection(){
        
        $xpathParamsCollection = $this->xml->params_collection;
        // print_r($xpathParamsCollection);
        foreach($xpathParamsCollection as $params){
            foreach($params as $singleParams){
                echo('heyeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee');
                print_r($singleParams);
                $this->addParam($singleParams);
            }
        }

        // print_r($this->arrParams);
    }

    function addParam($pParams){
        $newParams = new clsParam($pParams);
        array_push($this->arrParams, $newParams);
    }

    // function Validate(){
    //     foreach ($arrParams as $p){
    //         $p->ValidateParam();
    //     }
    // }



}

?>
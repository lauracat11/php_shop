<?php
include_once "clsRequest.php";
class clsParam{
    private $obj_paramsc;
    private $arrParam=[];
    function __construct($obj_ParamsCollection)
    {
        $this->obj_params = $obj_ParamsCollection;
        
        // print_r($this->obj_params);
        $this->ParseParam();
        $this->printValue();
    }

    function ParseParam(){
        $xpathParam = $this->obj_params;
        // print_r($xpathParam);
        foreach ($xpathParam as $param){
            $this->addParam($param);
        }
        
        // print_r($this->arrParam);


        foreach($this->arrParam as $singleParam){
            $res=$singleParam['name']->__toString();
            // echo ($res);
            $result = $this->getValueURL($res);
            // echo ($result);
            // switch($singleParam['name']){
            //     case 'action':
            //         break;
            //     case 'user':
            //         break;
            //     case 'pwd':
            //         break;
            // };

        }
    }

    function addParam($pParam){
        // $newRequestParam = new clsRequest($pParam);  
        array_push($this->arrParam, $pParam);
    }

//    Como podemos recorrer la array para coger los valores?
//    La validación se debe de realizar en el request?
//    Como debemos realizar las validaciones?


    function printValue(){
        $test = $this->obj_params->param;
        $res=$test->__toString();
        print_r($res);
        $values = $this->obj_params;
        // print_r($values);
    
}
function getValueURL($pUrl){
    // $URL = $_GET[$pUrl];

    if (isset($_GET[$pUrl])){
        $URL = $_GET[$pUrl];
        return $URL;
    }else{
        return 'no hay '.$pUrl;
    }
}


}
?>
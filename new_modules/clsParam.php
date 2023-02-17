<?php
include_once "clsRequest.php";
class clsParam{
    private $obj_params;
    // private $arrParam=[];

    private $mandatory;

    function __construct($obj_Param)
    {
        $this->obj_params = $obj_Param;
        
        // echo('entra params');
        // print_r($this->obj_params);
        // echo('<br>');
        // $this->ParseParam();
        // $this->printValue();
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
            // print_r($singleParam);
            foreach ($singleParam as $element){
                // echo ('Separacion');
                // print_r($element);
                // echo('nodo');
                print_r($element->getName());
            }
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

    // function addParam($pParam){
        // $newRequestParam = new clsRequest($pParam);  
    //     array_push($this->arrParam, $pParam);
    // }

//    Como podemos recorrer la array para coger los valores?
//    La validación se debe de realizar en el request?
//    Como debemos realizar las validaciones?


//     function printValue(){
//         $test = $this->obj_params->param;
//         $res=$test->__toString();
//         print_r($res);
//         $values = $this->obj_params;
//         // print_r($values);
    
// }
function getValueURL($pUrl){
    // $URL = $_GET[$pUrl];

    if (isset($_GET[$pUrl])){
        $URL = $_GET[$pUrl];
        return $URL;
    }else{
        return "undefined";
    }
}


// function ValidateParam(){
//     $v=getValue($this.name)

//     if ($this->mandatory and getValue($this.name)=="undefined"{
//         erro=234
//     })


//     if ($this.min_lenght>0 and str_len($v)<$tjos-min_len)

// }

}
?>
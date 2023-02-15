<?php

class clsRequest{
    private $obj_param;

    function __construct($obj_Params){
        $this->obj_param = $obj_Params;
        print_r($this->obj_param);
    }

    function getValue(){
        $URL = $_GET['user'];
        print_r($URL);
    }
    
    // function ParseUrl($URL){
    //     print_r($URL);
    //     $arrURL = explode(" " ,$URL);
    //     print_r($arrURL);
    //     // foreach($arrURL as $key=>$value){
    //     //     echo($key."->".$value . "<br>");
    //     // }
    // }
     
//     function Exists($param){
//         if (isset($_GET{$pName})){
//             return true;
//         }else{
//             return false;
//         }
//     }
// /////////////////////////////////////////////////////
//     function GetValue($param){
//         if($this->Exists()){
//             // return $_GET{$pName};
//         }
//         else{
//             return "undefined";
//         }
//     }
}




?>
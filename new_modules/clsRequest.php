<?php
class clsRequest{

    function __construct(){
    }

    function getValueURL(string $param):string{
        if (isset($_GET[$param])){
            $Value = $_GET[$param];
            return $Value;
        }else{
            return "undefined";
        }
    }

    function getALLvaluesURL(){
        try{
            $result = ($_GET);
            return $result;
        }catch(error){
            
        }
    }


}

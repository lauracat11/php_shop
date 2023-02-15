<?php

class clsRequest{
    private string $configfile;
    private $obj_xmlutil;
   

    function __construct($configfile){
       
    }
/////////////////////////////////////////////////////
    function Exists($param){
        if (isset($_GET{$pName})){
            return true;
        }else{
            return false;
        }
    }
/////////////////////////////////////////////////////
    function GetValue($param){
        if($this->Exists()){
            return $_GET{$pName};
        }
        else{
            return "undefined";
        }
    }
}




?>
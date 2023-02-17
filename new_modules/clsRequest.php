<?php

class clsRequest{
    private $param;

    function __construct($singleParam){
        $this->param = $singleParam;
    }

    function getValueURL($pUrl){
    
        if (isset($_GET[$pUrl])){
            $URL = $_GET[$pUrl];
            return $URL;
        }else{
            return "undefined";
        }
    }


}




?>
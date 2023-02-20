<?php

class clsRequest{

    private $param;

    function __construct($singleParam){
        $this->param = $singleParam;

    }

    function getValueURL(){

        if (isset($_GET[$this->param])){
            $URL = $_GET[$this->param];
            return $URL;
        }else{
            return false;
        }
    }


}




?>
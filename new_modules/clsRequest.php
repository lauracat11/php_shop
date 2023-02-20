<?php

class clsRequest{
    private $param;

    function __construct($singleParam){
        // $this->param = $singleParam;
        // $test = $this->param;
        // print_r($this->param);
        $this->getValueURL();
    }

    function getValueURL($pUrl){
        print_r($pUrl);
        if (isset($_GET[$pUrl])){
            $URL = $_GET[$pUrl];
            return $URL;
        }else{
            return "undefined";
        }
    }


}




?>
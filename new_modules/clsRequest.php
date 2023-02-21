<?php

class clsRequest{

    function __construct(){
    }

    function getValueURL($param){

        if (isset($_GET[$param])){
            $Value = $_GET[$param];

            return $Value;
        }else{

            return 'undefined';
        }
    }


}




?>
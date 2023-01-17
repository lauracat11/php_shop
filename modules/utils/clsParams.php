<?php

class clsParams{

    private $PARAMtype;
    private $PARAMarray;
    private $webMethod;
    public $obj_paramxml;
    private $XPATHaction;
    //Función que recoja los parámetros de la URL

    //Según el tipo de parámetros, se escogerá una plantilla de XML

    //Función que meta en la plantilla XML los parámetros de la URL

    //Getter del XML

    function __construct($webMethodValue, $TypeValue){
        $this->setParamMethod($webMethodValue);
        $this->setParamType($TypeValue);
        $this->XPATHaction = '/web_api/web_methods_collection/web_method[0]/params_collection/param/default';
    }

    function setParamMethod($pMethod){
        $this->webMethod = $pMethod;
        return $this->webMethod;
    }

    function setParamType($pType){
        $this->PARAMtype = $pType;
        return $this->PARAMtype;
    }
    
    function setArray($pArray){
        $this->PARAMarray = $pArray;
        return $this->PARAMarray;
    }

    function getParamsFromURL(){

        $action = $_GET["action"];
        $user = $_GET["user"];
        $pwd = $_GET['pwd'];
        $cid = $_GET['cid'];

    }



    function XMLParam($pName){
                $array = [
                    "action" => [],
                    "user" => [],
                    "pwd" => [],
                ];

}



    


   

}



?>
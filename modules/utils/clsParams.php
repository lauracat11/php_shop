<?php

class clsParams{

    private $ValidationParams;
    private $ParamName;
    public $obj_paramxml;
    private $XPATHaction;

    //Array que vaya guardando booleanos de test, si pasan los test y todo es true, será el motivo de hacer el return almethod

    private $ARRAY_TEST = [];
    //Función que recoja los parámetros de la URL

    //Según el tipo de parámetros, se escogerá una plantilla de XML

    //Función que meta en la plantilla XML los parámetros de la URL

    //Getter del XML

    function __construct($pParamName, $ValidationParams){
        $this->setParamName($pParamName);
        $this->setValidationParams($ValidationParams);
        $this->XPATHaction = '/web_api/web_methods_collection/web_method[0]/params_collection/param/default';
    }

    function setParamName($pMethod){
        $this->ParamName = $pMethod;
        return $this->ParamName;
    }

    function setValidationParams($pType){
        $this->ValidationParams = $pType;
        return $this->ValidationParams;
    }

    function getParamsFromURL($pNametoGet){
        $result = $_GET[$pNametoGet];
        array_push($this->ARRAY_TEST, $result);
    }

    function printARRAY(){
        var_dump($this->ARRAY_TEST);
    }
    
    function ValidateParams(){}

    //Función que detectará si es obligatorio o no
    function Check_mandatory(){}

    //Función que checkeará si es un string
    function Check_isString(){}

    //Función que checkeará el min length de un parámetro
    function Check_minlength($pParam){}


    function XMLParam($pName){

                // $array = [
                //     "action" => [],
                //     "user" => [],
                //     "pwd" => [],
                // ];

}



    


   

}



?>
<?php

class clsParam{

    private $ValidationParams;
    private $ParamName;
    public $obj_paramxml;
    private $XPATHaction;

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
        $this->ValidateParams($result);
    }

    function Check_minlength($pParam, $pLengthValue){
        var_dump($pParam);
        // var_dump($pLengthValue);

        if(strlen($pParam) >= $pLengthValue){
            return true;
        }else{
            return 1000;
        };
    }

     //Función que detectará si es obligatorio o no
     function Check_mandatory($pParam, $pMandatory){
        switch($pMandatory){
            case ("yes"):
                if($pParam == ""){
                    return 1011;
                }else{
                    return true;
                }

            case ("no"):
                return true;
        }
     }

     //Función que checkeará si es un string
     function Check_isString(){}
 
     //Función que checkeará el min length de un parámetro
     
 
 
     function XMLParam($pName){
 
                 // $array = [
                 //     "action" => [],
                 //     "user" => [],
                 //     "pwd" => [],
                 // ];
 
     }

    
    function ValidateParams($pParamToCheck){

        $checking = [];
        
        for ($i = 1; $i < count($this->ValidationParams[0]) ; $i++) {
            switch($this->ValidationParams[0][$i]){
                case "type":
                    switch($this->ValidationParams[1][$i]){
                        case "string":
                            array_push($checking, true);
                            break;
                        default:
                            array_push($checking, 1002);
                            break;
                        }
                    break;

                case "mandatory":
                        $result_mandatory = $this->Check_mandatory($pParamToCheck, $this->ValidationParams[1][$i]);
                        array_push($checking, $result_mandatory);
                        break;


                case "min_length":
                        $result_minlength = $this->Check_minlength($pParamToCheck, $this->ValidationParams[1][$i]);
                        array_push($checking, $result_minlength);
                        break;
            }
        }
        // var_dump($checking);
        }

        //Laura
        //for que recorrerá la matriz, comprobando el tipo y el valor del ValidationParams


    }

   



    


   





?>
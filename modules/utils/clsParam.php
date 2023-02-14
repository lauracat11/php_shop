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
        $returningvalue = $this->ValidateParams($result);
        return $returningvalue;
    }

    function Check_minlength($pParam, $pLengthValue){
        if(strlen($pParam) >= intval($pLengthValue)){
            return true;
        }else{
            return 1000;
        };
    }

    function Check_default($pParam){
        switch($pParam){
            case('login'):
                return true;
            case('logout'):
                return true;
            default:
                return 1021;
        }

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
     function Check_isString($checkString){
        $result = is_string($checkString);

        if($result == false){
            return 1003;
        }
        return $result;
     }

    function ValidateParams($pParamToCheck){

        $checking = [];
        
        for ($i = 0; $i < count($this->ValidationParams[0]) ; $i++) {
            switch($this->ValidationParams[0][$i]){
                case "type":
                    switch($this->ValidationParams[1][$i]){
                        case "string":
                            $result_string = $this->Check_isString($pParamToCheck);
                            array_push($checking, $result_string);
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
                        // print_r($this->ValidationParams[1]);
                        $result_minlength = $this->Check_minlength($pParamToCheck, $this->ValidationParams[1][$i]);
                        array_push($checking, $result_minlength);
                        break;
                case "default":
                        $result_default = $this->Check_default($pParamToCheck);
                        array_push($checking, $result_default);
                        break;
            }
        }
            return $checking;
        }
    }

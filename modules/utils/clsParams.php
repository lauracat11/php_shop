<?php

class clsParams{

    private $PARAMtype;
    private $PARAMarray;
    private $Method;
    public $obj_paramxml;
    //Función que recoja los parámetros de la URL

    //Según el tipo de parámetros, se escogerá una plantilla de XML

    //Función que meta en la plantilla XML los parámetros de la URL

    //Getter del XML

    function __construct($MethodValue, $TypeValue){
        $this->setParamMethod($MethodValue);
        $this->setParamType($TypeValue);
    }

    function setParamMethod($pMethod){
        $this->Method = $pMethod;
        return $this->Method;
    }

    function setParamType($pType){
        $this->PARAMtype = $pType;
        return $this->PARAMtype;
    }
    function setArray($pArray){
        $this->PARAMarray = $pArray;
        return $this->PARAMarray;
    }

    function XMLParam(){
        if($this->PARAMtype == "POST"){
            $tempArray = [];

        }
    }



    


   

}



?>
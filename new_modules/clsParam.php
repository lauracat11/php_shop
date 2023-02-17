<?php
include_once "clsRequest.php";
class clsParam{
    private $obj_params;
    // private $arrParam=[];

    private $mandatory;

    function __construct($obj_Param)
    {
        $this->obj_params = $obj_Param;
        $this->ParseParam();

    }

    function ParseParam(){
        foreach($this->obj_params as $singleParam){
            echo('<br>');
            //ESto obtienne el nombre del nodo
            $nodo = $singleParam->getName();
            print_r($singleParam->getName());

            $request = new clsRequest();

            echo('<br>');
            //ESto obtiene el valor
            print_r($singleParam->__toString());

        }
    }




}
?>
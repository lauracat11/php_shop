<?php
include_once "clsRequest.php";
class clsParam{
    private $obj_params;
    private $pType;
    private $pMandatory;
    private $pDefault;
    private $pMinLength;

    private $mandatory;

    function __construct($obj_Param)
    {
        $this->obj_params = $obj_Param;
        $this->ParseParam();

    }

    function ParseParam(){
        foreach($this->obj_params as $singleParam){
            // echo('<br>');
            //ESto obtienne el nombre del nodo
            $nodo = $singleParam->getName();
            // print_r($singleParam->getName());
            // print_r($nodo);
            // $request = new clsRequest();

            // echo('<br>');
            //ESto obtiene el valor
            // print_r($singleParam->__toString());
            switch ($nodo){
                case 'type':
                    $this->pType = $singleParam->__toString();
                    echo('<br>');
                    echo('este es el type');
                    echo('<br>');
                    print_r($this->pType);
                    break;
                case 'mandatory':
                    $this->pMandatory = $singleParam->__toString();
                    echo('<br>');
                    echo('este es el mandatory');
                    echo('<br>');
                    print_r($this->pMandatory);
                    break;

                case 'default':
                    $this->pDefault = $singleParam->__toString();
                    echo('<br>');
                    echo('este es el default');
                    echo('<br>');
                    print_r($this->pDefault );
                    break;
                case 'min_length':
                    $this->pMinLength = $singleParam->__toString();
                    echo('<br>');
                    echo('este es el min_length');
                    echo('<br>');
                    print_r($this->pMinLength);
                    break;
            }
            
        }
    }

    // function Validation(){

    // }



}
?>
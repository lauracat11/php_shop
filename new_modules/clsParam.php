<?php
include_once "clsRequest.php";
include_once "clsResponse.php";
class clsParam
{
    private $obj_params;
    private $pType;
    private $pMandatory;
    private $pDefault;
    private $pMinLength;
    private $pCid;
    private $obj_request;
    private $GetValueFromURL;
    private $ArrayValidateParams = [];
    private $request;
    private $response;

    function __construct($obj_Param)
    {
        $this->obj_params = $obj_Param;
        $this->ParseParam();
    }

    function ParseParam()
    {
        $ParamToValidate = $this->obj_params['name']->__toString();
        $this->obj_request = new clsRequest($ParamToValidate);
        $this->GetValueFromURL = $this->obj_request->getValueURL('action');

        if ($this->GetValueFromURL == false) {
            // echo ('Error en la validación del parámetro en URL');
            // echo ('<br>');
        } else {

            foreach ($this->obj_params as $singleParam) {
                 
                $nodo = $singleParam->getName();

                switch ($nodo) {
                    case 'type':
                        $this->pType = $singleParam->__toString();
                        break;

                    case 'mandatory':
                        $this->pMandatory = $singleParam->__toString();
                        break;

                    case 'default':
                        $this->pDefault = $singleParam->__toString();
                        break;

                    case 'min_length':
                        $this->pMinLength = $singleParam->__toString();
                        break;
                    case 'cid':
                        $this->pCid = $singleParam->__toString();
                        break;
                }
            }
        }
    }

    function ValidateParam(){
       $this->request = new clsRequest();

        $getName = $this->obj_params['name']->__toString();
        $getValue = $this->request->getValueURL($getName);
        
        switch ($getName){
            
            case 'user': 
                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        // print_r('Es mandatory user');
                        // echo('<br>');
                        $v = $this->Check_isString($getValue);
                        $w = $this->Check_minlength($getValue, $this->pMinLength);
                        break;
                    }
                }else{
                    return ('No es mandatory user');
                }
                

                break;
            case 'pwd':
                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        // print_r('Es mandatory pwd');
                        // echo('<br>');
                        $v = $this->Check_isString($getValue);
                        $w = $this->Check_minlength($getValue, $this->pMinLength);
                        break;
                    }
                }else{
                    return ('No es mandatory pwd');
                }
                break;
            case 'cid':

                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        // print_r('Es mandatory cid');
                        // echo('<br>');
                        $v = $this->Check_isString($getValue);
                        break;
                    }
                }else{
                    return ('No es mandatory cid');
                }
                break;
        }
      


    }

    function Check_minlength($pParam, $pLengthValue)
    {
        if (strlen($pParam) >= intval($pLengthValue)) {
            // echo('Es mayor que el length');
            // echo('<br>');
            return true;
        } else {
            // echo('No es mayor que el length');
            // echo('<br>');
            return 1000;
        };
    }


    //Función que checkeará si es un string
    function Check_isString($checkString)
    {
        $result = is_string($checkString);

        if ($result == false) {
            // echo('No es string');
            // echo('<br>');
            return 1003;
           
        }
        // echo('Es string');
        // echo('<br>');
        return $result;
    }

}

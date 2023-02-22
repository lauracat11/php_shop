<?php
include_once "clsRequest.php";
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

    function __construct($obj_Param)
    {
        $this->obj_params = $obj_Param;
        $this->ParseParam();
        // $this->GetValidatedResults();
    }

    function ParseParam()
    {
        // print_r($this->obj_params);
        // print_r($this->obj_params['name']->__toString());
        // echo('<br>');
        $ParamToValidate = $this->obj_params['name']->__toString();
        $this->obj_request = new clsRequest($ParamToValidate);

        //ESTO HAY QUE MODIFICARLO, ESTA MAL PONER ACTION ABAJO
        $this->GetValueFromURL = $this->obj_request->getValueURL('action');

        if ($this->GetValueFromURL == false) {
            echo ('Error en la validación del parámetro en URL');
            echo ('<br>');
        } else {

            foreach ($this->obj_params as $singleParam) {
                
                // echo($this->GetValueFromURL);
               
                $nodo = $singleParam->getName();
            
                // print_r($nodo);
                

            
                switch ($nodo) {
                    case 'type':
                        $this->pType = $singleParam->__toString();
                        // print_r($this->pType);
                       

                        break;

                    case 'mandatory':
                        $this->pMandatory = $singleParam->__toString();
                        // print_r($this->pMandatory);
                        break;

                    case 'default':
                        $this->pDefault = $singleParam->__toString();
                    
                        // print_r($this->pDefault);
                       
                        break;

                    case 'min_length':
                        $this->pMinLength = $singleParam->__toString();
                        
                        // print_r($this->pMinLength);

                        break;
                    case 'cid':
                        $this->pCid = $singleParam->__toString();
                        
                        // print_r($this->pCid);

                        break;
                }
            }
        }
    }

    function ValidateParam(){

        // echo('<br>');
        // echo('<br>');

        // echo('Parámetro a validar');
        // echo('<br>');
        
        // print_r($this->obj_params);
       $this->request = new clsRequest();

        $getName = $this->obj_params['name']->__toString();
        $getValue = $this->request->getValueURL($getName);
        // print_r($getValue);
        // print_r($this->pMandatory);
        switch ($getName){
            
            case 'user': 
                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        print_r($getValue);
                        print_r('Es mandatory user');
                        echo('<br>');
                        break;
                    }
                }else{
                    return ('No es mandatory user');
                }
                

                break;
            case 'pwd':
                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        // print_r($this->pMandatory);
                        print_r($getValue);
                        print_r('Es mandatory pwd');
                        echo('<br>');
                        break;
                    }
                }else{
                    return ('No es mandatory pwd');
                }
                break;
            case 'cid':
                // if($this->pMandatory == 'yes'){
                //     foreach ($this->obj_params as $sParam){
                //         // print_r($this->pMandatory);
                //         print_r('Es mandatory');
                //         // break;
                //     }
                // }else{
                //     return ('No es mandatory');
                // }
                break;
        }
        // print_r($v);
        // foreach ($this->obj_params as $sParam){
        //     print_r($sParam);
        // }


    }

    // function Check_minlength($pParam, $pLengthValue)
    // {
    //     if (strlen($pParam) >= intval($pLengthValue)) {
    //         return true;
    //     } else {
    //         return 1000;
    //     };
    // }

    // function Check_default($pParam)
    // {
    //     switch ($pParam) {
    //         case ('login'):
    //             return true;
    //         case ('logout'):
    //             return true;
    //         default:
    //             return 1021;
    //     }
    // }


    // //Función que detectará si es obligatorio o no
    // function Check_mandatory($pParam, $pMandatory)
    // {
    //     switch ($pMandatory) {
    //         case ("yes"):
    //             if ($pParam == "") {
    //                 return 1011;
    //             } else {
    //                 return true;
    //             }

    //         case ("no"):
    //             return true;
    //     }
    // }

    // //Función que checkeará si es un string
    // function Check_isString($checkString)
    // {
    //     $result = is_string($checkString);

    //     if ($result == false) {
    //         return 1003;
    //     }
    //     return $result;
    // }

    // function Validation($pValidated)

    // {
    //     //Valor recogido por URL
    //     $tempValue = $this->GetValueFromURL;

    //     //Nodo concreto en ese momento. Si validamos Type, Mandatory, etc.
    //     $tempNodo = $pValidated;

    //     foreach ($this->obj_params as $VsingleParam) {
    //         echo('Este es el valor del VsingleParam');
    //         echo('<br>');
    //         echo($VsingleParam->getName());
    //         echo('<br>');
    //         if ($VsingleParam->getName() == $tempNodo) {
    //             switch ($tempNodo) {
    //                 case 'type':
    //                     if ($this->pType == 'string') {
    //                         // echo ('Validando si es string');
    //                         array_push($this->ArrayValidateParams, 'validado el type');
    //                     } else {
    //                         echo ('Error, no se ha configurado este método en el caso type');
    //                         array_push($this->ArrayValidateParams, 'No validado el type');
    //                     }
    //                     break;
    //                 case 'mandatory':
    //                     if ($this->pMandatory == 'yes') {
    //                         echo ('Es mandatory');
    //                         array_push($this->ArrayValidateParams, 'es  mandatory');
    //                     } elseif ($this->pMandatory == 'no') {
    //                         echo ('No es mandatory');
    //                         array_push($this->ArrayValidateParams, 'no es mandatory');
    //                     } else {
    //                         echo ('No validado correctamente');
    //                         array_push($this->ArrayValidateParams, 'No validado el mandatory');
    //                     }
    //                     break;

    //                 case 'default':
    //                     if ($tempValue == $this->pDefault) {
    //                         echo ('Validado con éxito');
    //                         array_push($this->ArrayValidateParams, 'validado Default');
    //                     } else {
    //                         echo ('Error en la validación del Default');
    //                         array_push($this->ArrayValidateParams, 'No validado Default');
    //                     }
    //                     break;
    //                 case 'min_length':
    //                     $this->Check_minlength($tempValue, $this->pMinLength);
    //                     break;
    //                 case 'cid':
    //                     break;
    //                 default:
    //                     array_push($this->ArrayValidateParams, 'Default del switch');
    //             }
    //         }
    //     }
    // }

    // function GetValidatedResults()
    // {
    //     echo('Impresión del array');
    //     echo('<br>');
    //     print_r($this->ArrayValidateParams);
    //     echo('<br>');
    //     echo('<br>');
    //     return $this->ArrayValidateParams;
    // }
}

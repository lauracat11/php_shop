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

    function __construct($obj_Param)
    {
        $this->obj_params = $obj_Param;
        $this->ParseParam();
        $this->GetValidatedResults();
    }

    function ParseParam()
    {
        // print_r($this->obj_params);
        print_r($this->obj_params['name']->__toString());
        $ParamToValidate = $this->obj_params['name']->__toString();
        $this->obj_request = new clsRequest($ParamToValidate);
        $this->GetValueFromURL = $this->obj_request->getValueURL();

        if ($this->GetValueFromURL == false) {
            echo ('Error en la validación del parámetro en URL');
            echo ('<br>');
        } else {

            foreach ($this->obj_params as $singleParam) {
                echo ('<br>');
                echo('Este es el valor de la URL');
                echo('<br>');
                echo($this->GetValueFromURL);
                echo ('<br>');
                echo ('Empieza la iteración en Foreach');
                $nodo = $singleParam->getName();
                echo ('<br>');
                echo ('Impresión del nodo');
                echo ('<br>');
                print_r($nodo);
                echo ('<br>');

            
                switch ($nodo) {
                    case 'type':
                        $this->pType = $singleParam->__toString();
                        echo ('<br>');
                        echo ('este es el valor del type');
                        echo ('<br>');
                        print_r($this->pType);
                        echo ('<br>');
                        // $this->Validation('type');

                        break;

                    case 'mandatory':
                        $this->pMandatory = $singleParam->__toString();
                        echo ('<br>');
                        echo ('este es el valor del mandatory');
                        echo ('<br>');
                        print_r($this->pMandatory);
                        echo('<br>');

                        // $this->Validation('mandatory');
                        break;

                    case 'default':
                        $this->pDefault = $singleParam->__toString();
                        echo ('<br>');
                        echo ('este es el valor del default');
                        echo ('<br>');
                        print_r($this->pDefault);
                        echo('<br>');
                        // $this->Validation('default');
                        break;

                    case 'min_length':
                        $this->pMinLength = $singleParam->__toString();
                        // $pMinLength = $singleParam->__toString();
                        echo ('<br>');
                        echo ('este es el valor del min_length');
                        echo ('<br>');
                        print_r($this->pMinLength);
                        // $this->Validation('min_length');

                        break;
                    case 'cid':
                        $this->pCid = $singleParam->__toString();
                        echo ('<br>');
                        echo ('este es el valor del cid');
                        echo ('<br>');
                        print_r($this->pCid);
                        // $this->Validation('cid');

                        break;
                }
            }
        }
    }

    function Check_minlength($pParam, $pLengthValue)
    {
        if (strlen($pParam) >= intval($pLengthValue)) {
            return true;
        } else {
            return 1000;
        };
    }

    function Check_default($pParam)
    {
        switch ($pParam) {
            case ('login'):
                return true;
            case ('logout'):
                return true;
            default:
                return 1021;
        }
    }


    //Función que detectará si es obligatorio o no
    function Check_mandatory($pParam, $pMandatory)
    {
        switch ($pMandatory) {
            case ("yes"):
                if ($pParam == "") {
                    return 1011;
                } else {
                    return true;
                }

            case ("no"):
                return true;
        }
    }

    //Función que checkeará si es un string
    function Check_isString($checkString)
    {
        $result = is_string($checkString);

        if ($result == false) {
            return 1003;
        }
        return $result;
    }

    function Validation($pValidated)
    {
        //Valor recogido por URL
        $tempValue = $this->GetValueFromURL;

        //Nodo concreto en ese momento. Si validamos Type, Mandatory, etc.
        $tempNodo = $pValidated;

        foreach ($this->obj_params as $VsingleParam) {
            echo($VsingleParam->getName());
            echo('<br>');
            if ($VsingleParam->getName() == $tempNodo) {
                switch ($tempNodo) {
                    case 'type':
                        if ($this->pType == 'string') {
                            // echo ('Validando si es string');
                            array_push($this->ArrayValidateParams, 'validado el type');
                        } else {
                            echo ('Error, no se ha configurado este método en el caso type');
                            array_push($this->ArrayValidateParams, 'No validado el type');
                        }
                        break;
                    case 'mandatory':
                        if ($this->pMandatory == 'yes') {
                            echo ('Es mandatory');
                            array_push($this->ArrayValidateParams, 'es  mandatory');
                        } elseif ($this->pMandatory == 'no') {
                            echo ('No es mandatory');
                            array_push($this->ArrayValidateParams, 'no es mandatory');
                        } else {
                            echo ('No validado correctamente');
                            array_push($this->ArrayValidateParams, 'No validado el mandatory');
                        }
                        break;

                    case 'default':
                        if ($tempValue == $this->pDefault) {
                            echo ('Validado con éxito');
                            array_push($this->ArrayValidateParams, 'validado Default');
                        } else {
                            echo ('Error en la validación del Default');
                            array_push($this->ArrayValidateParams, 'No validado Default');
                        }
                        break;
                    case 'min_length':
                        $this->Check_minlength($tempValue, $this->pMinLength);
                        break;
                    case 'cid':
                        break;
                    default:
                        array_push($this->ArrayValidateParams, 'Default del switch');
                }
            }
        }
    }

    function GetValidatedResults()
    {
        print_r($this->ArrayValidateParams);
        return $this->ArrayValidateParams;
    }
}

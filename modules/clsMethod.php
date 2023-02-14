<?php

//Exportar XML Utils
include_once "modules/utils/XML/clsXMLUtils.php";
include_once "modules/utils/clsParam.php";


class clsMethod
{
    private $ARRAY_paramName;
    private $XMLroute;
    private $obj_xmlutils;


    function __construct($pXMLroute)
    {
        $this->XMLroute = $pXMLroute;
        $this->obj_xmlutils = new clsXMLUtils();
    }
    // Setter
    function GET_XMLroute()
    {
        return $this->XMLroute;
    }

    function Print()
    {
        // header("Content-type: text/xml");
        $this->obj_xmlutils->ReadFileAsXML($this->XMLroute);
        // $this->obj_xmlutils->ApplyXPath($this->XPATH, false);

        var_dump($this->obj_xmlutils);
        // var_dump($result);
    }

    function ParamValidation()
    {
        $this->obj_xmlutils->ReadFileAsXML($this->XMLroute);
        $xml_param = $this->obj_xmlutils->getObjXML();
        $xml_param_with_xpath = $xml_param->xpath('/web_api/web_methods_collection/web_method[1]/params_collection/param/@name');
        $arrayParamName = [];
        //Variable temp_array es de comprobación, cuando funcione hay que borrarla
        $temp_array = [];
        $validations = [];

        for ($i = 0; $i < count($xml_param_with_xpath); $i++) {
            $data = $xml_param_with_xpath[$i]['name'][0];
            array_push($arrayParamName, $data->__toString());
            switch ($data) {
                case ('action'):
                    $matrixToParam = [
                        ['type', 'mandatory', 'default'],
                    ];

                    $OmegaXPATH = $xml_param->xpath('/web_api/web_methods_collection/web_method[1]/params_collection/param[1]/type|//web_api/web_methods_collection/web_method[1]/params_collection/param[1]/mandatory|//web_api/web_methods_collection/web_method[1]/params_collection/param[1]/default');

                    for ($j = 0; $j < count($OmegaXPATH); $j++) {
                        array_push($temp_array, $OmegaXPATH[$j]->__toString());
                    }
                    array_push($matrixToParam, $temp_array);
                    $PARAM = new clsParam('action', $matrixToParam);
                    $result = $PARAM->getParamsFromURL('action');
                    for ($k = 0; $k < count($result); $k++) {
                        array_push($validations, $result[$k]);
                    }
                    echo('resultado de action <br>');
                    print_r($result);
                    echo('<br>');
                    break;

                case ('user'):
                    $matrixToParam = [
                        ['type', 'mandatory', 'min_length']
                    ];
                    $temp_array = [];
                    $OmegaXPATH = $xml_param->xpath('/web_api/web_methods_collection/web_method[1]/params_collection/param[2]/type|//web_api/web_methods_collection/web_method[1]/params_collection/param[2]/mandatory|//web_api/web_methods_collection/web_method[1]/params_collection/param[2]/min_length');

                    for ($j = 0; $j < count($OmegaXPATH); $j++) {
                        array_push($temp_array, $OmegaXPATH[$j]->__toString());
                    }
                    array_push($matrixToParam, $temp_array);
                    $PARAM = new clsParam('user', $matrixToParam);
                    $result = $PARAM->getParamsFromURL('user');
                    echo('resultado de user <br>');
                    print_r($result);
                    echo('<br>');
                    break;

                case ('pwd'):
                    $matrixToParam = [
                        ['type', 'mandatory', 'min_length']
                    ];
                    $temp_array = [];
                    $OmegaXPATH = $xml_param->xpath('/web_api/web_methods_collection/web_method[1]/params_collection/param[3]/type|//web_api/web_methods_collection/web_method[1]/params_collection/param[3]/mandatory|//web_api/web_methods_collection/web_method[1]/params_collection/param[3]/min_length');

                    for ($j = 0; $j < count($OmegaXPATH); $j++) {
                        array_push($temp_array, $OmegaXPATH[$j]->__toString());
                    }
                    array_push($matrixToParam, $temp_array);
                    $PARAM = new clsParam('pwd', $matrixToParam);
                    $result = $PARAM->getParamsFromURL('pwd');
                    echo('resultado de pwd <br>');
                    print_r($result);
                    echo('<br>');
                    break;


                default:
                    // array_push($temp_array, 'No he recogido nada');
                    break;
            }

            //  for ($y = 0; $y < count($validations); $y++) {
            //     if ($validations[$y] == false) {
            //          echo "Error en la validación";
            //     } else {
            //        echo "Validación correcta";
            //      }
            //  }
        };
        $this->ARRAY_paramName = $arrayParamName;
    }
}

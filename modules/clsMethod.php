<?php

    //Exportar XML Utils
    include_once "modules/utils/XML/clsXMLUtils.php";
    //Integrar la utilidad en el constructor

    // Imprimir por pantalla el xml por parámetro.


    class clsMethod{
        private $ARRAY_paramName;
        private $XMLroute;
        private $obj_xmlutils;
        // private $XPATH = '/web_api/web_methods_collection/web_method[0]/params_collection/param[0]/default';
        private $XPATH = "/";

        function __construct($pXMLroute){
            $this->XMLroute = $pXMLroute;
            $this->obj_xmlutils = new clsXMLUtils();
        }
        // Setter
        function GET_XMLroute(){
            return $this->XMLroute;
        }
        
        function Print(){
            // header("Content-type: text/xml");
            $this->obj_xmlutils->ReadFileAsXML($this->XMLroute);
            // $this->obj_xmlutils->ApplyXPath($this->XPATH, false);
           
            var_dump($this->obj_xmlutils);
            // var_dump($result);
        }

        function ParamValidation(){
            $this->obj_xmlutils->ReadFileAsXML($this->XMLroute);
            $xml_param = $this->obj_xmlutils->getObjXML();
            $xml_param_with_xpath = $xml_param->xpath('/web_api/web_methods_collection/web_method[1]/params_collection/param/@name');
            $arrayParamName = [];
            
            for($i = 0; $i < count($xml_param_with_xpath); $i++){
                $data = $xml_param_with_xpath[$i]['name'][0];
                array_push($arrayParamName,$data->__toString());

            };
            $this->ARRAY_paramName = $arrayParamName;

            

        }

    }

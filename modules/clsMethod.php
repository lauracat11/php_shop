<?php

    //Exportar XML Utils
    include_once "modules/utils/XML/clsXMLUtils.php";
    //Integrar la utilidad en el constructor

    // Imprimir por pantalla el xml por parámetro.


    class clsMethod{

        private $XMLroute;
        private $obj_xmlutils;
        // private $XPATH = '/web_api/web_methods_collection/web_method[0]/params_collection/param[0]/default';
        private $XPATH = "/web_api";

        function __construct($pXMLroute){
            $this->XMLroute = $pXMLroute;
            $this->obj_xmlutils = new clsXMLUtils();
        }
        // Setter
        function GET_XMLroute(){
            return $this->XMLroute;
        }
        
        function Print(){
            header("Content-type: text/xml");
            $this->obj_xmlutils->ReadFileAsXML($this->XMLroute);
            // $result = $this->obj_xmlutils->ApplyXPath($this->XPATH, true);
            echo $this->obj_xmlutils->getXML();
            // var_dump($result);
        }

    }
?>
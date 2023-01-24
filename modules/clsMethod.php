<?php

    //Exportar XML Utils
    include_once "modules/utils/XML/clsXMLUtils.php";
    //Integrar la utilidad en el constructor

    // Imprimir por pantalla el xml por parámetro.


    class clsMethod{

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
            $this->obj_xmlutils->ApplyXPath($this->XPATH, false);
           
            var_dump($this->obj_xmlutils);
            // var_dump($result);
        }

    }
?>
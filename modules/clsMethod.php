<?php

    //Exportar XML Utils
    include_once "modules/utils/XML/clsXMLUtils.php";
    //Integrar la utilidad en el constructor

    // Imprimir por pantalla el xml por parámetro.


    class clsMethod{

        private $XMLroute;
        private $obj_xmlutils;

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
            echo $this->obj_xmlutils->getXML();
        }

    }
?>
<?php

    //Exportar XML Utils
    include_once "modules/utils/XML/clsXMLUtils.php";
    //Integrar la utilidad en el constructor

    // Imprimir por pantalla el xml por parámetro.
    header("Content-type: text/xml");

    class clsServerAPI{
        public $XMLroute;
        public $obj_xmlutils;

        function __constructor(){

        }
        
        // Setter
        function setXMLroute($pXMLroute){
            $this->XMLroute = $pXMLroute;
            return $this->XMLroute;
        }

        function hola(){
            // var_dump($this->obj_xmlutils);
        }
        
        function Print(){
            $this->obj_xmlutils = new clsXMLUtils();
            $this->obj_xmlutils->ReadFileAsXML($this->XMLroute);
            $this->obj_xmlutils->getXML();

            // echo $this->obj_xmlutils;

        }

    }
?>
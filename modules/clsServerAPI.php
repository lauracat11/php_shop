<?php

    //Exportar XML Utils
    include_once __DIR__."/modules/utils/XML/clsXMLUtils.php";
    //Integrar la utilidad en el constructor

    // Imprimir por pantalla el xml por parámetro.

    class clsServerAPI{
        private $XMLroute;
        private $obj_xmlutils;

        function __constructor($pXMLroute){
            $this->XMLroute =$pXMLroute;
            $this->obj_xmlutils = new clsXMLUtils();
        }

        function getXMLroute(){
            return $this->XMLroute;
        }

        function Print(){
            $this->obj_xmlutils->ReadFileAsXML($this->XMLroute);
            $this->obj_xmlutils->getXML();
        }

    }
?>
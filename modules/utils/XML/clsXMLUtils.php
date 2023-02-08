<?php

class clsXMLUtils{

    public $obj_simplexml;
    public $xpathvalue;

    function __construct()
    {

    }

    public function ReadFileAsXML($pURL){
        $this->obj_simplexml = simplexml_load_file($pURL);
        return $this->obj_simplexml;
    }

    //Creamos un Getter

    public function getXML(){
        return $this->obj_simplexml->asXML();
    }

    public function getObjXML(){
        return $this->obj_simplexml;
    }

    public function TEST(){
        echo "hola";
    }

    public function ApplyXPath($pPath, $pSaveXML){

        $xpath = $this->obj_simplexml->xpath($pPath);
        $str = '<root>';

        foreach($xpath as $n){
            $str = $str . $n->asXML();
        }

        $str = $str . '</root>';
        $xpathresult = simplexml_load_string($str);
        $this->XMLvalue($xpathresult);
        
        if($pSaveXML == true){
            $this->saveXML($xpathresult);
        }

        return $xpathresult;
    }

    public function saveXML($pXML){
        $route = 'xml/' . $this->GenerateHash() . '.xml';
        return $pXML->asXML($route);
    }

    private function GenerateHash(){
        $fecha = new DateTime();
        $random = strval(rand(0,100000));
        $hash = hash('sha256',$random);
        $result = $fecha->format('Y-m-d H;i;s') . $hash;
        return $result;
    }
    
    private function XMLvalue($pNametoObtain){

        foreach($pNametoObtain as $obtainValue){
            $XMLvalue = $obtainValue;
            $string = $XMLvalue->asXML();
            $this->xpathvalue = $string;
        }
        return $this->xpathvalue;

    }

    public function getXPATHvalue(){
        return $this->xpathvalue;
    }
}

?>
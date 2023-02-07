<?php

class clsXMLUtils{
    private $obj_simplexml_base;
    private $result;
    private $error_num;
//////////////////////////////////////////////////////////////////////////////
    function __construct(){
        //echo "-> clsXMLUtils constructor";
    }
//////////////////////////////////////////////////////////////////////////////
    public function ReadFile(string $pURL):bool {
        $this->obj_simplexml_base=simplexml_load_file($pURL);
        $this->result= $this->obj_simplexml_base;
        return true;
    }

    public function WriteXMLFile($pFilePath, $pXML):void{
        $f=fopen($pFilePath,"w");
        fwrite($f, $pXML);
        fclose($f);
    }
//////////////////////////////////////////////////////////////////////////////
    public function getXML(): string{
        return $this->result->asXML();
    }
//////////////////////////////////////////////////////////////////////////////
    public function ApplyXPath(string $pPath):bool{

        $arr=$this->obj_simplexml_base->xpath($pPath);
        $this->result=$this->arraytoXML($arr);
        return true;
    }
//////////////////////////////////////////////////////////////////////////////
    private function arraytoXML(array $pArr){     
        $str=$this->arraytoXMLString( $pArr);
        return simplexml_load_string($str);
    }
//////////////////////////////////////////////////////////////////////////////
    private function arraytoXMLString(array $pArr) : string{
        $str="<xpath_result>";
        foreach($pArr as $n){
            $str=$str . $n->asXML();
        }
        $str=$str . "</xpath_result>";
        return $str;
    }
//////////////////////////////////////////////////////////////////////////////
}

?>
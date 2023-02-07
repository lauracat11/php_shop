<?php


include_once __DIR__."/com/clsXMLUtils.php";

class clsServerApi{
    private string $configfile;
    private $obj_xmlutil;
   

    function __construct($configfile){
        $this->obj_xmlutil= new clsXMLUtils;
        $this->configfile=$configfile;
        //$this->Init();
    }

    function Init(){
        $this->ReadConfigurationFile();
        $this->ParseWebMethods();
    }

    function ReadConfigurationFile():void{
        $this->obj_xmlutil->ReadFile($this->configfile);
    }


    function ParseWebMethods(){
        $arrMethods=$this->obj_xmlutil->ApplyXpath('//web_methods_collection/web_method');
        foreach ($arrMethods as $Method) {
            $this->addMethod($this->obj_xmlutil->ArrayToSimpXML($Method));
        }
    }
    public function addMethod(SimpleXMLElement $XMLMethod): void{
        $cls_method= new clsMethod($XMLMethod);
        array_push($this->ArrMethods, $cls_method);
       
    }

    }

    function Print(): void{
        echo $this->obj_xmlutil->getXML();
    }


}




?>
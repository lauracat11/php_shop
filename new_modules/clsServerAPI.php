<?php

include_once "clsXMLUtils.php";
include_once "clsMethod.php";

class clsServerAPI
{
    private clsXMLUtils $obj_xml;
    private array $arrMethods = [];
    private clsMethod $selectedMethod;
    private array $arrErrors = [];

    function __construct(string $pXMLurl){
        echo('echo en ServerAPI');
        $this->obj_xml = new clsXMLUtils();
        $this->obj_xml->ReadFileAsXML($pXMLurl);
        echo('aure');
    }

    function ParseWebMethod(): void{
        $xpath = $this->obj_xml->ApplyXPath('//web_methods_collection/web_method', false);
        foreach ($xpath as $method) {
            $this->addMethod($method);
        }
    }

    function addMethod(SimpleXMLElement $pMethod): void{
        $newMethod = new clsMethod($pMethod);
        array_push($this->arrMethods, $newMethod);
    }

    function Validate(string $pActionValue): void
    {
        $MethodExists = false;
        foreach ($this->arrMethods as $M) {
            if ($pActionValue == $M->getActionValue()) {
                $MethodExists = true;
                $M->Validate();
                $this->selectedMethod = $M;
                if(count($M->getErrors())>0){
                    $this->arrErrors = $M->getErrors();
                }
            }
        }
        
        if($MethodExists == false){
           $this->sendErrorToArrErrors(1200);
        }
    }

    function getErrors(){
        return $this->arrErrors;
    }

    function sendErrorToArrErrors($ErrorNumber){
        $error = new clsError($ErrorNumber);
        array_push($this->arrErrors, $error);
    }
}
 ?>
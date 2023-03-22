<?php

include_once "clsXMLUtils.php";
include_once "clsMethod.php";

class clsServerAPI
{
    private clsXMLUtils $obj_xml;
    private array $arrMethods = [];
    private array $arrErrors = [];

    function __construct(string $pXMLurl){
        $this->obj_xml = new clsXMLUtils();
        $this->obj_xml->ReadFileAsXML($pXMLurl);
    }

    function ParseWebMethod(): void{
        $xpath = $this->obj_xml->ApplyXPath('//web_methods_collection/web_method', false);
        foreach ($xpath as $method) {
            $this->addMethod($method);
        }
    }

    function addMethod(SimpleXMLElement $pMethod): void{
        clsServerAPI::EchoShowing('Añadido el método', $pMethod . 'Se ha añadido a el Array de métodos');
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
                echo('hola');
                clsServerAPI::EchoShowing('Método Validado', 'todo bien');
                if(count($M->getErrors())>0){
                    $this->arrErrors = $M->getErrors();
                }
            }
        }
        
        if($MethodExists == false){
           $this->sendErrorToArrErrors(1200);
        }
    }

    function getErrors():array{
        return $this->arrErrors;
    }

    function sendErrorToArrErrors(int $ErrorNumber):void{
        $error = new clsError($ErrorNumber);
        array_push($this->arrErrors, $error);
    }

    public static function EchoShowing(string $title, string $object):void{
        
        echo('//////////////////////////////');
        echo('<br>');
        echo("{$title}");
        echo('<br>');
        echo("{$object}");
        echo('<br>');
        echo('//////////////////////////////');
        echo('<br>');

    }
}
 ?>
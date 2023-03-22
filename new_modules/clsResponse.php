<?php
class clsResponse{

    private clsXMLUtils $objxml;
    private $responseXML;
    private clsRequest $request;
    private array $URLvalues;
    private array $arrErrors = [];

    function __construct(){
        $this->request = new clsRequest();
        $this->URLvalues = $this->request->getALLvaluesURL();
        $this->objxml = new clsXMLUtils();
    }

    function appendError(array $pArrayAllErrors){
        if(count($pArrayAllErrors)>0){
            foreach($pArrayAllErrors as $e){
                array_push($this->arrErrors, $e);
            }
        }
    }

    function setError(clsError $pError){
        array_push($this->arrErrors, $pError);
    }

    function setHeader(string $responsetype){
        switch ($responsetype){
            case "XML":
                header('content-Type: text/xml');
                break;
            case "HTML":
                header('content-Type: text/html');
                break;
            default:
                $error = new clsError(1004);
                $this->setError($error);
                break;
        }
    }

    function setContents():void{
        $this->responseXML = $this->objxml->ReadFileAsXML('./xml/out.xml');
        $this->setServerID();
        $this->setServerTime();
        $this->setExecutionTime();
        $this->setWebMethod();
        $this->setURL();
        $this->setParametersToXML();
        $this->setErrorsToXML();
    }

    function setWebMethod(){

        if(count($this->URLvalues) > 0){
            $this->responseXML->head->webmethod->name = $this->URLvalues['action'];    
        }else{
        $this->setError(new clsError(1015));
        $this->responseXML->head->webmethod->name = 'undefined'; 
        }
    }

    function setParametersToXML(){
        foreach($this->URLvalues as $parameter){
            $name = array_search($parameter, $this->URLvalues);
            if($name != 'action'){
                $value = $parameter;
                $TempArray = [$name, $value];
                $currentParameter = $this->responseXML->head->webmethod->parameters->addChild('parameter');
                $currentParameter->addChild('name', $TempArray[0]);
                $currentParameter->addChild('value', $TempArray[1]);
            }
        }
    }

    function setErrorsToXML(){
        if(count($this->arrErrors) > 0){
            foreach($this->arrErrors as $error){
                $currentError = $this->responseXML->head->errors->addChild('error');
                $currentError->addChild('message_error', $error->getMessageError());
                $currentError->addChild('severity', $error->getSeverity());
                $currentError->addChild('user_message', $error->getUserMessage());
            }
        }
    }

    function setServerID(){
        $this->responseXML->head->server_id = '1';
    }

    function setServerTime(){
        $this->responseXML->head->server_time = date("Y-m-d H:i:s");
    }

    function setExecutionTime(){
        $this->responseXML->head->execution_time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];
    }

    function setURL(){
        $this->responseXML->head->url = $_SERVER['REQUEST_URI'];
    }

    function RenderErrors(){
        print_r($this->arrErrors);
    }

    function Render(string $pResponseType){
        $this->setHeader($pResponseType);
        $this->setContents();
        switch($pResponseType){
            case "XML":
                ob_clean();
                echo $this->responseXML->asXML();
                break;
            case 'HTML':
                break;
            default:
                break;
        }
    }

  
}
?>
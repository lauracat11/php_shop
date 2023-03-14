<?php
class clsResponse{
    private $data;
    private clsXMLUtils $objxml;
    private $responseXML;
    private string $responseType;
    private clsRequest $request;
    private array $URLvalues;
    private array $arrErrors = [];

    function __construct(string $pResponseType){
        $this->request = new clsRequest();
        $this->URLvalues = $this->request->getALLvaluesURL();
        $this->responseType = $pResponseType;
        $this->objxml = new clsXMLUtils();
        $this->setContents();

    }
    function appendError($pArrayAllErrors){
        if(count($pArrayAllErrors)>0){
            foreach($pArrayAllErrors as $e){
                array_push($this->arrErrors, $e);
            }
        }
    }
    function setError($pError){
        array_push($this->arrErrors, $pError);
    }

    function setHeader(){
        switch ($this->responseType){
            case "XML":
                header('content-Type: text/xml');
                break;
            case "HTML":
                header('content-Type: text/html');
                break;
            default:
                $error = new clsError(1004);
                array_push($arrErrors,$error);
        }
    }

    function setData($pDATA){
        $this->data = $pDATA;
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
        $this->responseXML->head->webmethod->name = $this->URLvalues['action'];    
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
        foreach($this->arrErrors as $error){
            
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

    function Render(){
        $this->setHeader();
        $this->setContents();
        echo $this->responseXML->asXML();
    }
}
?>
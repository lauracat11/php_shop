<?php
class clsResponse{
    private $data;
    private clsXMLUtils $objxml;
    private $responseXML;
    private string $responseType;
    private clsRequest $request;
    private array $URLvalues;

    function __construct(string $pResponseType){
        $this->request = new clsRequest();
        $this->URLvalues = $this->request->getALLvaluesURL();
        $this->responseType = $pResponseType;
        $this->objxml = new clsXMLUtils();
        $this->setContents();

    }

    function setHeader(){
        switch ($this->responseType){
            case "XML":
                header('content-Type: text/xml');
                break;
            case "HTML":
                header('content-Type: text/html');
                break;
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
        $this->setParameters();
    }

    function setWebMethod(){
        $this->responseXML->head->webmethod->name = $this->URLvalues['action'];     
    }

    function setParameters(){
        foreach($this->URLvalues as $parameter){
            $name = array_search($parameter, $this->URLvalues);
            if($name != 'action'){
                $value = $parameter;
                $TempArray = [$name, $value];
                // $xmlstr = <<<XML
                //     parameter>
                //         <name>$name</name>
                //         <value>$value</value>
                //     </parameter>
                //     XML;
            // $xmlstr = '<parameter><name>'. $name. '</name><value>'. $value. '</value></parameter>';
                // $this->responseXML->head->webmethod->parameters->addChild($xmlstr);
                $currentParamenter = $this->responseXML->head->webmethod->parameters->addChild('parameter');
                $currentParamenter->addChild('name', $TempArray[0]);
                $currentParamenter->addChild('value', $TempArray[1]);
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

    function Render(){
        $this->setHeader();
        $this->setContents();
        echo $this->responseXML->asXML();
    }
}
?>
<?php 

class clsResponse{

    //Aquí se guardará el objetoXML
    private $private_output_buffer = "";

    //Aquí se guarda el tipo de header que queremos
    private $private_responseType = "XML";

    function __construct($oBuffer,$p_RType)
    {
        $this->private_output_buffer = $oBuffer;
        $this->private_responseType = $p_RType;
    }

    function getOutputBuffer(){
        return $this->private_output_buffer;
    }

    function getResponseType(){
        return $this->private_responseType;
    }

    function setResponseType($newResponseType){
        $this->private_responseType = $newResponseType;
    }

    function Render(){

        $this->setHeader();
        // $this->flushData($this->private_output_buffer);

        echo $this->private_output_buffer->asXML();

        // $this->resetHeaders();
        // return $this->private_output_buffer->asXML();
    }

    function resetHeaders(){
        if (headers_sent() ) {
            header_remove();
        }
    }

    function setHeader(){

        switch($this->private_responseType){
            case 'XML':
                header('Content-type: text/xml');
                break;
            case 'HTML':
                header('Content-type: text/html');
                break;
        }
    }

    function flushData($pXML){


        ob_clean();
        if (ob_get_level() == 0) ob_start();
        
        foreach($pXML[0] as $recorrerXML){
            header_remove('Content-type');
            echo $recorrerXML->asXML();
            ob_flush();
            flush();
            sleep(1);
        }
        header_remove();
        ob_end_flush();

    }

}



?>
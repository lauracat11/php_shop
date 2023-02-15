<?php
class clsParam{
    private $xml;
    function __construct($XMLParamsOject)
    {
        $this->xml = $XMLParamsOject;
        print_r($this->xml);
    }

    
}

?>
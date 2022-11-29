<?php
    include_once "modules/clsServerAPI.php";
    $API =  new clsServerAPI();
    $API->setXMLroute("xml/web_api_0_1.xml");
    $API->Print();
?>
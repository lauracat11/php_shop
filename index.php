<?php
    

    include_once "new_modules/clsServerAPI.php";
    include_once "new_modules/clsParam.php";

    $Request = new clsRequest();
    $API = new clsServerAPI("xml/web_api_0_1.xml");
  
    $action_value = $Request->getValueURL("action");

    if($action_value != "undefined"){
        $API->ParseWebMethod();
        $API->Validate($action_value);

    }

    // $obj_xml = new clsXMLUtils ();
    
    
    $w = simplexml_load_file('xml/out.xml');
    header('Content-Type: text/xml');
    echo($w)->asXML();


















?>
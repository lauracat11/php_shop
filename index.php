<?php
include_once "new_modules/clsServerAPI.php";
include_once "new_modules/clsParam.php";
include_once "new_modules/clsRequest.php";

header('Content-Type: text/xml');
$w = simplexml_load_file('xml/out.xml');
echo($w)->asXML();
    $API = new clsServerAPI("xml/web_api_0_1.xml");
    $Request = new clsRequest();
    

  
    $action_value = $Request->getValueURL("action");

    if($action_value != "undefined"){
        $API->ParseWebMethod();
        $API->Validate($action_value);

    }

?>
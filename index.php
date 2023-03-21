<?php
include_once "new_modules/clsServerAPI.php";
include_once "new_modules/clsParam.php";
include_once "new_modules/clsRequest.php";
include_once "new_modules/clsError.php";

    clsServerAPI::EchoShowing();
    $API = new clsServerAPI("xml/web_api_0_1.xml");
    $response = new clsResponse();
    $Request = new clsRequest();

    try{
        $action_value = $Request->getValueURL("action");
    }finally{
        if($action_value != 'undefined'){
            $API->ParseWebMethod();
            $API->Validate($action_value);
            $tempErrorMethod = $API->getErrors();
            $response->appendError($tempErrorMethod);
        }else{
            $error = new clsError(1007);
            $response->setError($error);
        }     

        $response->Render('HTML');
    }
?>
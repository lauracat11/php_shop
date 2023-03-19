<?php
include_once "new_modules/clsServerAPI.php";
include_once "new_modules/clsParam.php";
include_once "new_modules/clsRequest.php";
include_once "new_modules/clsError.php";


    $API = new clsServerAPI("xml/web_api_0_1.xml");
    $response = new clsResponse('XML');
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
    }


    /////////////////////TESTING AREA////////////////////
    // $response->RenderErrors();
    $response->Render();
    // $response->setErrorsToXML();
    ///////////////////////////////////////////////7/////
?>
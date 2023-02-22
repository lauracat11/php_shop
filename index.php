<?php
    // include_once "modules/clsMethod.php";
    // include_once "modules/utils/clsParam.php";
    include_once "new_modules/clsServerAPI.php";
    include_once "new_modules/clsParam.php";
    //Este es Paco
    // $API =  new clsMethod("xml/web_api_0_1.xml");
    // $testARRAY = [['type','mandatory','min_length'],['string', 'yes', 15]];
    //Esta es Paquita
    // $PARAM = new clsParam('user', $testARRAY);
    // $API->Print();
    // $API->ParamValidation()
    //Entra un cliente
 
    // $URL = $_SERVER['REQUEST_URI'];
    //Paquita ya no nos habla
    // $PARAM->printARRAY();

////////////////////////////////////////////////////////////////////////
    $Request = new clsRequest();
    $API = new clsServerAPI("xml/web_api_0_1.xml");
  
    $action_value = $Request->getValueURL("action");

    if($action_value != "undefined"){
        $API->ParseWebMethod();
        $API->Validate($action_value);

    }

    // $API->ParseWebMethod();
    



















?>
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

    $API = new clsServerAPI("xml/web_api_0_1.xml");
    $API->ParseWebMethod();


//    $URL = $_SERVER['REQUEST_URI'];
    
    // $obj_request = new clsRequest;
    // $obj_request->Exist()





















?>
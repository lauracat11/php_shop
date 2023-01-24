<?php
    include_once "modules/clsMethod.php";
    include_once "modules/utils/clsParam.php";
    //Este es Paco
    $API =  new clsMethod("xml/web_api_0_1.xml");
    $testARRAY = [['type','mandatory','min_length'],['string', 'yes', 15]];
    //Esta es Paquita
    $PARAM = new clsParam('user', $testARRAY);
    $API->Print();

    //Entra un cliente
    // $URL = $_SERVER['REQUEST_URI'];

    //Paquita ha pedido cosas
    // $PARAM->getParamsFromURL("user");
    // $PARAM->getParamsFromURL("pwd");

    //Paquita ya no nos habla
    // $PARAM->printARRAY();
?>
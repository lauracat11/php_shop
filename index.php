<?php
    include_once "modules/clsMethod.php";
    include_once "modules/utils/clsParams.php";
    //Este es Paco
    $API =  new clsMethod("xml/web_api_0_1.xml");

    //Esta es Paquita
    $PARAM = new clsParams('a','a');
    // $API->Print();

    //Entra un cliente
    $URL = $_SERVER['REQUEST_URI'];

    //Paquita ha pedido cosas
    $PARAM->getParamsFromURL("user");
    $PARAM->getParamsFromURL("pwd");

    //Paquita ya no nos habla
    // $PARAM->printARRAY();
?>
<?php
    include_once "modules/clsServerAPI.php";
    $API =  new clsServerAPI("xml/web_api_0_1.xml");
    // $API->Print();

    $user = $_POST["user"];
    $pwd = $_POST["pwd"];

    echo $user
?>
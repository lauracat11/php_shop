<?php
/*
Verificar:
- Definición de datos privados en objetos
- Errores y su gestión
- Estrategia de funcionamiento
- Objetos vs tipos convencionales
- Strong typed data
*/
include_once __DIR__."/com/utils/clsRequest.php";
include_once __DIR__."/com/utils/clsServerApi.php";


$obj_request= new clsRequest();

$obj_api= new clsServerApi("../xml/users/api_auth.xml");





/*---->>>>>>>>>>>*/ 
$obj_params= new clsParams();

/*
ALT final

$obj_api->ReadConfigurationFile();
*/

// _ws_auth.php?action=login&user=pepe&pass=sdfawldf
$obj_api= new clsServerApi(".xml");

$method=new clsMethod("login")
$p= new clsParam()
$p->name="action"
$p->default_value="login"
$p->mandatory="yes"

$method.addParam($p)

$obj_method=$obj_api->addMethod($method);
/*

$obj_method->addParam("action", default="login", mandatory="yes");
$obj_method->addParam("user", null, mandatory="yes");
$obj_method->addParam("pass", null, mandatory="yes");


// _ws_auth.php?action=logout&cid=adoadfsdfkasjfw34232
$obj_method=$obj_api->addMethod("logout")
$obj_method->addParam("action", default="logout", mandatory="yes");
$obj_method->addParam("cid", null, mandatory="yes");

if($obj_api.Validate($obj_params)){
    echo "OK"
 
}
else{
    echo (""errror)""  
     die;
}
/////////////////
$action= @obj_api.GetParam("action");

switch ($action) {
    case "login":
        echo "login";
        $err=new clsUser(@obj_api.GetParam("user"), @obj_api.GetParam("pwd"))
        
        break;
    case "logout":
        echo "i es una barra";
        break;

    case "addtocart":

}


*/




?>
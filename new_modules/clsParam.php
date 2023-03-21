<?php
include_once "clsRequest.php";
include_once "clsResponse.php";
class clsParam
{
    private SimpleXMLElement $obj_params;
    private string $pType;
    private string $pMandatory;
    private string $pDefault;
    private string $pMinLength;
    private string $pCid;
    private string $URLParamName;
    private clsRequest $obj_request;
    private string $GetValueFromURL;
    private array $ArrayValidateParams = [];
    private clsRequest $request;
    private array $arrErrorParam =[];

    function __construct(SimpleXMLElement $obj_Param)
    {
        echo('echo en Param');
        $this->obj_params = $obj_Param;
    }

    function ParseParam(): void
    {
        $ParamToValidate = $this->obj_params['name']->__toString();
        $this->obj_request = new clsRequest($ParamToValidate);
        $this->GetValueFromURL = $this->obj_request->getValueURL('action');

        if ($this->GetValueFromURL == false) {
        } else {
            foreach ($this->obj_params as $singleParam) {
                $nodo = $singleParam->getName();
                switch ($nodo) {
                    case 'type':
                        $this->pType = $singleParam->__toString();
                        break;
                    case 'mandatory':
                        $this->pMandatory = $singleParam->__toString();
                        break;
                    case 'default':
                        $this->pDefault = $singleParam->__toString();
                        break;
                    case 'min_length':
                        $this->pMinLength = $singleParam->__toString();
                        break;
                    case 'cid':
                        $this->pCid = $singleParam->__toString();
                        break;
                    default:
                        $this->sendErrorToArrErrors(1001);
                        break;
                }
            }
        }
    }

    function ValidateParam()  {
       $this->request = new clsRequest();
        $getName = $this->obj_params['name']->__toString();
        $getValue = $this->request->getValueURL($getName);
        $this->URLParamName = $getName;
       
       if($getValue != "undefined"){
        switch ($getName){
            case 'action':
                // echo('action');
                break;
            case 'user': 
                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        $this->Check_isString($getValue);
                        $this->Check_minlength($getValue, $this->pMinLength);
                        break;
                    }
                }else{
                    return 0;
                }
                break;
            case 'pwd':
                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        $this->Check_isString($getValue);
                        $this->Check_minlength($getValue, $this->pMinLength);
                        break;
                    }
                }else{
                    return 0;
                }
                break;
            case 'cid':
                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        $this->Check_isString($getValue);
                        $this->Check_minlength($getValue, $this->pMinLength);
                        break;
                    }
                }else{
                    return 0;
                }
                break;
            default:
                $this->sendErrorToArrErrors(1002);
                break;
        }
       }else{
         $this->sendErrorToArrErrors(1002);
       } 
        
    }

    function Check_minlength(string $pParam, int $pLengthValue):int
    {
        if (strlen($pParam) >= intval($pLengthValue)) {
            return 0;
        } else {
            $this->sendErrorToArrErrors(1000);
            return 1000;

        };
    }

    function Check_isString(string $checkString):string
    {
        $result = is_string($checkString);

        if ($result == false) {
            $this->sendErrorToArrErrors(1003);
        }
        return 0;
    }

    function getErrors(){
        return $this->arrErrorParam;
    }

    function sendErrorToArrErrors($ErrorNumber){
        $error = new clsError($ErrorNumber);
        array_push($this->arrErrorParam, $error);
    }
}

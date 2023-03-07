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
    private clsRequest $obj_request;
    private string $GetValueFromURL;
    private array $ArrayValidateParams = [];
    private clsRequest $request;
    private array $arrErrorParam =[];

    function __construct(SimpleXMLElement $obj_Param)
    {
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
                        $error = new clsError(1001);
                        array_push($arrErrorParam, $error);
                        break;
                }
            }
        }
    }

    function ValidateParam()  {
       $this->request = new clsRequest();

        $getName = $this->obj_params['name']->__toString();
        $getValue = $this->request->getValueURL($getName);
        
        switch ($getName){
            case 'action':
                echo('action');
                break;
            case 'user': 
                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        $v = $this->Check_isString($getValue);
                        $w = $this->Check_minlength($getValue, $this->pMinLength);
                        break;
                    }
                }else{
                    return 0;
                }

                break;
            case 'pwd':
                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        $v = $this->Check_isString($getValue);
                        $w = $this->Check_minlength($getValue, $this->pMinLength);
                        break;
                    }
                }else{
                    return 0;
                }
                break;
            case 'cid':

                if($this->pMandatory == 'yes'){
                    foreach ($this->obj_params as $sParam){
                        $v = $this->Check_isString($getValue);
                        break;
                    }
                }else{
                    return 0;
                }
                break;

            default:
                echo($getName);
                $error = new clsError(1002);
                array_push($this->arrErrorParam, $error);
                break;
        }

    }

    function Check_minlength(string $pParam, int $pLengthValue):int
    {
        if (strlen($pParam) >= intval($pLengthValue)) {
            return 0;
        } else {
            $error = new clsError(1000);
            array_push($this->arrErrorParam,$error);
            return 1000;

        };
    }

    function Check_isString(string $checkString):string
    {
        $result = is_string($checkString);

        if ($result == false) {
            $error = new clsError(1003);
            array_push($this->arrErrorParam,$error);
        }
        return 0;
    }

    function getErrors(){
        return $this->arrErrorParam;
    }
}
?>
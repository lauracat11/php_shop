<?php

class clsError{

    private int $ErrorNumber;
    private string $MessageError;
    private string $Severity;
    private string $UserMessage;

    function __construct($pErrorNumber)
    {
      $this->ErrorNumber = $pErrorNumber;
    }

    function Validate(){

    }
}

?>
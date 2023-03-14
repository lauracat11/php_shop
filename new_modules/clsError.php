<?php

class clsError{

    public int $ErrorNumber;
    public string $MessageError;
    public string $Severity;
    public string $UserMessage;

    function __construct($pErrorNumber)
    {
      $this->ErrorNumber = $pErrorNumber;
      $this->Validate();
    }

    function Validate(){
      switch($this->ErrorNumber){
        case 1000:
          $this->MessageError = "El parámetro no cumple el mínimo de carácteres establecido.";
          $this->Severity = 8;
          $this->UserMessage =" No sabemos que poner";
        
        case 1001:
          $this->MessageError = "El nodo está vacío";
          $this->Severity = 9;
          $this->UserMessage =" No sabemos que poner";
        
        case 1002:
          $this->MessageError = "Falta algún parámetro";
          $this->Severity = 10;
          $this->UserMessage =" No sabemos que poner";
        
        case 1003:
          $this->MessageError = "El parámetro no es String, cuando debería serlo";
          $this->Severity = 10;
          $this->UserMessage =" No sabemos que poner";
        
        case 1004:
          $this->MessageError = "Error en el set Header";
          $this->Severity = 10;
          $this->UserMessage =" No sabemos que poner";
        
        case 1007:
          $this->MessageError = "Es undefined en el clsRequest";
          $this->Severity = 10;
          $this->UserMessage =" No sabemos que poner";
        
        case 1099:
          $this->MessageError = "Error en el Response: No parámetro Action en la URL";
          $this->Severity = 10;
          $this->UserMessage =" No sabemos que poner";
        
        case 1099:
          $this->MessageError = "Error en el Response: No parámetro Action en la URL";
          $this->Severity = 10;
          $this->UserMessage =" No sabemos que poner";
        case 1200:
          $this->MessageError = "No existe el método obtenido en la URL";
          $this->Severity = 11;
          $this->UserMessage =" No sabemos que poner";
        }
      }
    }

?>
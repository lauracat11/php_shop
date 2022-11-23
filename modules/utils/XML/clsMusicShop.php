<?php

class clsMusicShop{



    function __construct($pURL){
        $this->XMLutils = new clsXMLUtils;
        $this->XML = $this->XMLutils->ReadFileAsXML($pURL);
        $this->CART= [];
        $this->additionalGift = [];
    }

    function readCDs(){
        $this->XMLutils->ApplyXPath('/CATALOG/CD/', false);
    }
    function AddtoCart($pTitle){
        $item = $this->XMLutils->ApplyXPath('/CATALOG/CD[TITLE="'. $pTitle .'"]|/CD[2]', false);
        
        array_push($this->CART,$item);
    }

    function CalculateTotal(){
        $discount = 10;
        $sumatotal = 0;
        //iterar por cada uno obteniendo y sumando el precio
        foreach($this->CART as $elementosdentrodelcarro){
            $suma = floatval($elementosdentrodelcarro->CD->PRICE);
            $sumatotal = $sumatotal+$suma;
        }
        if($sumatotal>100){
            $discount = 20;
        }
        if($sumatotal>200){
            $this->additionalGift = "free gift";
        }
        $this->total = $sumatotal - ($sumatotal * ($discount/100));
        echo $this->total;

        if($this->additionalGift != null){
            echo $this->additionalGift;
        }

    }
    function getCartXML(){
        return $this->CART;
    }


}

?>
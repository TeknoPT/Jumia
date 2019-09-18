<?php
require_once "Sessions.php";
require_once 'model/Costumer.php';

class CostumerController 
{
    public function show(){
        $costumer = new Costumer();
        $costumers = $costumer->listAll();
        $countryList = $costumer->getListOfCountrys();

        $_SESSION['costumers'] = $costumers;
        $_SESSION['countryList'] = $countryList;

        require_once 'view/costumer_view.php';
    }
}
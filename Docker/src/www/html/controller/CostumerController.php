<?php
require_once "Sessions.php";
require_once 'model/Costumer.php';

class CostumerController 
{
    /**
     * This method returns the country code of the phone number. 
     * @param $phone -> a phone number example (253) 12487127213
     * @author Tek
     */
    public function show(){
        $costumer = new Costumer();
        $costumers = $costumer->listAll();
        $countryList = $costumer->getListOfCountrys();

        $_SESSION['costumers'] = $costumers;
        $_SESSION['countryList'] = $countryList;

        require_once 'view/costumer_view.php';
    }
    
    /**
     * This method returns the country code of the phone number. 
     * @param $phone -> a phone number example (253) 12487127213
     * @author Tek
     */
    public function getValid()
    {
        $costumer = new Costumer();
        $costumers = $costumer->listValid();
        //$countryList = $costumer->getListOfCountrys();

        return $costumers;
    }
}
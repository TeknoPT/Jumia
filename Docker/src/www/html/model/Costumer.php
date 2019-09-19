<?php

require_once "controller/DatabaseConnection.php";

class Costumer 
{

    /**
     * This method returns the list of things to fill the table on the fronted. 
     * @author Tek
     */
    public function listAll(){
        $db = new DatabaseConnection();
        $result = $db->query('SELECT * FROM customer');
        $multiarray  = $result->fetchAll();

        $arryTemplate=[
            "Country"   =>  "",
            "State"     =>  "", // If phone is valid
            "Country Code"     =>  "",
            "Phone num."     =>  "",
        ];

        $arryOutput=[];

        foreach ($multiarray as $costumer){
            
            $arryTemplate=[
                "Country"   =>  $this->getCountry($costumer["phone"]),
                "State"     =>  $this->checkState($costumer["phone"]),
                "Country Code"     =>  $this->getCountryCode($costumer["phone"]),
                "Phone num."     =>  $this->getPhoneNumber($costumer["phone"]),
            ];

            array_push($arryOutput, $arryTemplate);
        }
        return $arryOutput;
    }

    /**
     * This method returns the country of phone number. 
     * @param $phone -> a phone number example (253) 12487127213
     * @author Tek
     */
    public function getCountry ($phone){
        if ( preg_match("/\(237\)/", $phone) ) {
            return "Cameroon";
        } elseif ( preg_match("/\(251\)/", $phone) ) {
            return "Ethiopia";
        } elseif ( preg_match("/\(212\)/", $phone) ) {
            return "Morocco";
        } elseif ( preg_match("/\(258\)/", $phone) ) {
            return "Mozambique";
        } elseif ( preg_match("/\(256\)/", $phone) ) {
            return "Uganda";
        } else {
            return "NULL";
        }
    }

    /**
     * This method returns the country code of the phone number. 
     * @param $phone -> a phone number example (253) 12487127213
     * @author Tek
     */
    public function getCountryCode($phone){
        return '+'.substr($phone, strpos($phone, "(")+1, strpos($phone, ")")-1);
    }

    /**
     * This method returns if the phone number is valid or invalid "OK" or "NOK". 
     * @param $phone -> a phone number example (253) 12487127213
     * @author Tek
     */
    public function checkState($phone){
        if ( preg_match("/\(237\)\ ?[2368]\d{7,8}$/", $phone) ) {
            return "OK";
        } elseif ( preg_match("/\(251\)\ ?[1-59]\d{8}$/", $phone) ) {
            return "OK";
        } elseif ( preg_match("/\(212\)\ ?[5-9]\d{8}$/", $phone) ) {
            return "OK";
        } elseif ( preg_match("/\(258\)\ ?[28]\d{7,8}$/", $phone) ) {
            return "OK";
        } elseif ( preg_match("/\(256\)\ ?\d{9}$/", $phone) ) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    /**
     * This method returns the phone number, removing the country number. 
     * @param $phone -> a phone number example (253) 12487127213
     * @author Tek
     */
    public function getPhoneNumber($phone){
        return substr($phone, strpos($phone, ")")+1, strlen($phone));
    }

    /**
     * This method returns the list of the countrys. 
     * @author Tek
     */
    public function getListOfCountrys(){
        return $array = [
            [
                "id" => 237,
                "name" => "Cameroon",
            ],
            [
                "id" => 251,
                "name" => "Ethiopia",
            ],
            [
                "id" => 212,
                "name" => "Morocco",
            ],
            [
                "id" => 258,
                "name" => "Mozambique",
            ],
            [
                "id" => 256,
                "name" => "Uganda",
            ]            
        ];
    }
}

?>
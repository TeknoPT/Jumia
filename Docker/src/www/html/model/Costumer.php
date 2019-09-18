<?php

require_once "controller/DatabaseConnection.php";

class Costumer 
{

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

    private function getCountry ($phone){
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

    private function getCountryCode($phone){
        return '+'.substr($phone, strpos($phone, "(")+1, strpos($phone, ")")-1);
    }

    private function checkState($phone){
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

    private function getPhoneNumber($phone){
        return substr($phone, strpos($phone, ")")+1, strlen($phone));
    }

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
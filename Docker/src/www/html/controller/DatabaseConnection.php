<?php

class DatabaseConnection
{
    public $db;
    
    function __construct()
    {
        $this->db = new PDO('sqlite:/var/www/db/sample.db');
    }

    function query($query){
        //perform the query
        $result = $this->db->query( $query ); //PDO query method for result
        return $result;
    }

    function fetchAll(){
        return $this->db->fetch();
    }

}

?>
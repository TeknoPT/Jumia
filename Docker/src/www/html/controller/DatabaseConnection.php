<?php
/**
 * This class is to create the database connection to the file.
 * @author Tek
 */
class DatabaseConnection
{
    public $db;
    
    function __construct()
    {
        $this->db = new PDO('sqlite:/var/www/db/sample.db');
    }

    /**
     * This method returns the query to the database.
     * @param $query -> query to database.
     * @author Tek
     */
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
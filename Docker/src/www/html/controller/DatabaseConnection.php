<?php

class DatabaseConnection extends SQLite3
{
    function __construct()
    {
        $this->open('/var/www/db/sample.db');
    }
}



?>
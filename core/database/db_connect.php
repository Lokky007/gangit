<?php

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 12.2.2016
 * Time: 21:40
 */

class db_connect
{
    public static function connect($sql)
    {
        // Check connection

        $conn = new mysqli(db_server_name, db_user_name, db_password, db_name);

        if ($conn->connect_error) {
            error_log("---- ERROR ----> " . date('Y-m-d H:i:s') . " Database Connection in file 'configuration_db.php'. REASON: Incorrect settings of database.\n $conn->connect_error \n", 3, "error.log");
            die("Connection failed. Problem with database.");
        } // Do query and send it back
        else {
            $result = $conn->query($sql);
        }

        return $result;
    }
}
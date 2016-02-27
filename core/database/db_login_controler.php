<?php

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 21.2.2016
 * Time: 14:51
 */
class db_login_controler extends db_connect
{
    public static function prepare_login_data($users_login, $users_password){

        $sql = "SELECT * FROM `users` WHERE `user_login` = '$users_login' and `user_password`= '$users_password'";

        $result = db_connect::connect($sql);
        return $result;
    }
}
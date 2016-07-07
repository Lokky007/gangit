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

    /*
     * Check parameters like nick, userid and session if user is logged
     */
    public static function check_login_status($id_user, $nick, $session){

        $sql = "SELECT * FROM `users` WHERE `user_nick` = '$nick' AND `user_id`= $id_user AND `user_actualSession`='$session'";

        $result = db_connect::connect($sql);

        return $result;
    }

    /*
     * Write new session into db when user is logged
     * @param newSession is new unique
     */
    public static function write_sessionAfterLogin($id_user, $nick, $sessionForStore){

        $sql = "UPDATE `users` SET `user_actualSession`= $sessionForStore WHERE `user_nick` = '$nick' and `user_id`= $id_user";

        $result = db_connect::connect($sql);

        return $result;
    }

}
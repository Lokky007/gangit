<?php

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 21.2.2016
 * Time: 14:38
 */
include_once(path.'core/database/db_login_controler.php');

class login_controler {

    public static function check_login_parameters(){
        $username = $_POST['login'];
        $password =$_POST['pass']; // md5($_POST['pass']);
        $result = FALSE; //Default is FALSE, set TRUE if data are correct

        if ((!empty($username)) || (!empty($password))){
            $db_result = db_login_controler::prepare_login_data($username,$password);

            //If data are correct and found 1 record, go set session for user
            if ($db_result->num_rows == 1) {

                $db_data = $db_result->fetch_array();

                $session_data[0] = $db_data['user_id'];
                $session_data[1] = $db_data['user_nick'];

                //generate session
                $sessionForStore = login_controler::generateSessionId();

                login_controler::set_user_session($session_data[0],$session_data[1], $sessionForStore);

                //generate and write new session into db
                db_login_controler::write_sessionAfterLogin($db_data['user_id'], $db_data['user_nick'], $sessionForStore);

                $result = TRUE;
            }
        }
        return $result;
    }


    //set session
    private static function set_user_session($id_user, $nick, $session){

        $_SESSION['id_user'] = $id_user;
        $_SESSION['nick'] = $nick;
        $_SESSION['session'] = $session;

        return;
    }

    //if currently session user == session in database created when user was logged return TRUE
    public static function check_session(){
    return true;


    }




    /*
     * Generate random session form string and numbers
     * @param $lengthOfSession
     */
    public static function generateSessionId(){

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomSession = '';
        $lengthOfSession=25;

        for ($i = 0; $i < $lengthOfSession; $i++) {
            $randomSession .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomSession;
    }


}

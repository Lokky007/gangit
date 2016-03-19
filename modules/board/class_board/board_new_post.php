<?php

/**
 * Created by PhpStorm.
 * User: Dočkal Lukáš
 * Date: 16.3.2016
 * Time: 21:14
 */
class board_new_post
{
    public static function prepareItemsForNewPost(){
        $status = board_new_post::checkLoginStatus();

        //if he found items in session and check is correct ->return items for insert psot
        //Else print text for login/attention


        if ($status->num_rows == 1){
            echo 'Pro zanechání inzerce musíte být přihlášen';
        }
        else{
            echo '<form action="" method="POST"  role="form" class="board_new_post">
                                 <textarea rows="8" cols="90" class="form-control textarea_broad_new_topic"></textarea> <br>
                                <button type="submit" class="btn btn-default" name="odeslat" value="odeslat">Odeslat</button>
                                </form>';
        }

        return;
    }

    public static function checkLoginStatus(){

        $id_user = $_SESSION['id_user'];
        $nick = $_SESSION['nick'];

        $status = db_login_controler::check_login_status($id_user, $nick);

        return $status;
    }

}
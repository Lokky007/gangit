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

        //if he found items in session and check is correct ->return items for insert post
        //Else print text for login/attention


        if ($status->num_rows == 1){
            echo '<form action="" method="POST"  role="form" class="board_new_post" >
                    <textarea name="board_post" rows="8" cols="90" class="form-control textarea_broad_new_topic"
                    placeholder="Části pro nákup a prodej otagujte pomocí tlačítek umístěných vedle tohoto okna.Tagy slouží pro oddělejí spamu. Lze je vkládat i manuálně."></textarea> <br>
                    <button type="submit" class="btn btn-default" name="odeslat" value="odeslat">Odeslat</button>
                  </form>';
        }
        else{
            echo '<b>Pro zanechání inzerce musíte být přihlášen</b>';
        }

        return;
    }

    public static function checkLoginStatus(){

        $id_user = $_SESSION['id_user'];
        $nick = $_SESSION['nick'];

        $status = db_login_controler::check_login_status($id_user, $nick);

        return $status;
    }


    /*
     * FUNCTION
     * method is situated in form of POSTFORM in prepareItemsForNewPost function.
     * It take textarea and conver it to UpperCases for searhch of defined word
     * In html is javascript that check same rules and visualise it to the user
     */
    public static function writePostIntoDb(){

        $userId = $_SESSION['id_user'];

        if(isset($_POST['odeslat'])) {

            $contentPost = $_POST['board_post'];

            if ($contentPost == '') {
                $message = '<div class="new_post_insert_fail" >Nelze odeslat prázdnou inzerci</div>';
            }
            else {

                //set all letters lower and found tags
                $upperContentPost = mb_convert_case($contentPost, MB_CASE_UPPER, "UTF-8");
                //recognize spam and demand/supply

                $typePost = board_new_post::setTypeOfPost($upperContentPost);
                if ($typePost == True) {
                    //for demand/supp
                    $typeNum = 1;
                } else {
                    //form spam post;
                    $typeNum = 2;
                }

                db_board::writePostIntoDb($contentPost, $userId, $typeNum);
                 $message = '<div class="new_post_insert_success" >Zapsání proběhlo uspěšně</div>';

            }
            return $message;
        }
    }

    public static function setTypeOfPost($upperContentPost)
    {

        if (board_new_post::startsWith($upperContentPost, 'SELL') OR board_new_post::startsWith($upperContentPost, 'BUY') OR
            board_new_post::startsWith($upperContentPost, 'PRODÁM') OR board_new_post::startsWith($upperContentPost, 'KOUPÍM') OR
            board_new_post::startsWith($upperContentPost, 'PRODAM') OR board_new_post::startsWith($upperContentPost, 'KOUPIM')) {
            return True;
        }

        return false;

    }

    public static function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }
/*
 * function for render comment form.
 */
    public static function prepareItemsForComment($id){

            $form = '<form action="" method="POST" role="form" class="board_new_post" >
                    <textarea name="board_comment" rows="4" cols="70" class="form-control textarea_broad_new_topic"
                    placeholder="Zde vložte svůj komentář"></textarea> <br>
                    <input type="hidden" name="id_post" value='.$id.'><br>
                    <button type="submit" class="btn btn-default" name="send_comment" value="odeslat">Odeslat</button>
                  </form>';

        return $form;

    }


}
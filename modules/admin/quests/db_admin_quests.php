<?php

/**
 * Created by PhpStorm.
 * User: owner
 * Date: 30.4.2016
 * Time: 23:54
 */
class db_admin_quests  extends db_connect
{
    public static function insertQuestToDb($title, $level, $loc_x, $loc_y, $body){

        $id_user = $_SESSION['id_user'];

        $sql = "INSERT INTO quests(quest_name, quest_level, quest_loc_x, quest_loc_y, quest_text, user_id) VALUES ('$title', $level, $loc_x, $loc_y, '$body ', (SELECT user_id FROM users where user_id = $id_user)) ";
        $result=db_connect::connect($sql);

        if($result){
            echo "<div class='news_insert_successful'>Quest zapsán a zveřejněn</div>";

        }
        else{
            echo "<div class='news_insert_failed'> Error- Jeden z údajů k zapsání je neplatný.</div><br>";
            echo "INSERT INTO quests(quest_name, quest_level, quest_loc_x, quest_loc_y, quest_text, user_id) VALUES ('$title', $level, $loc_x, $loc_y, '$body ', (SELECT user_id FROM users where user_id = $id_user))";
        }
        return;


    }
}
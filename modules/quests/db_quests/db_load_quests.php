<?php

/**
 * Created by PhpStorm.
 * User: owner
 * Date: 1.5.2016
 * Time: 14:08
 */

class db_load_quests extends db_connect
{
    public static function loadAllQuests(){

        $sql = "SELECT quest_id,
                       quest_name,
                       quest_level,
                       quest_loc_x,
                       quest_loc_y,
                       quest_text,
                       users.user_nick
                FROM quests
                LEFT JOIN users ON users.user_id = quests.user_id";

        $sql_result = db_connect::connect($sql);

        return $sql_result;

    }
}
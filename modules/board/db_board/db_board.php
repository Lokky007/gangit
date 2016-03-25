<?php

/**
 * Created by PhpStorm.
 * User: Lukáš Dočkal
 * Date: 16.3.2016
 * Time: 21:01
 */
class db_board extends db_connect
{
    public static  function preparePostFromDb(){
        $sql = "SELECT `board_id`,
                        `board_text`,
                        `board_post_type`,
                        `users`.`user_nick` as `board_usersPost`
                FROM `board`
                INNER JOIN `users` ON `board`. `user_id` = `users`.`user_id`
                ORDER BY `board_date` DESC LIMIT 40;";

        $result = db_connect::connect($sql);

        return $result;
    }


    public static function writePostIntoDb($content, $userId, $typeNum){
        var_dump($typeNum);
        $sql = "INSERT INTO board(`board_text`,`board_date`,`board_post_type`, `user_id`) values ('$content', now(), $typeNum , $userId);";

        $result = db_connect::connect($sql);

        return $result;
    }
}
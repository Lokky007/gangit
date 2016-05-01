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
                WHERE `board_post_type`!= 3 AND `board_parent_id` = 0
                ORDER BY `board_date` DESC LIMIT 40;";

        $result = db_connect::connect($sql);

        return $result;
    }

    public static function loadComment($parent_id){
        $sql = "SELECT `board_id`,
                        `board_parent_id`,
                        `board_text`,
                        `board_post_type`,
                        `board_date`,
                        `users`.`user_nick` as `board_usersComment`
                FROM `board`
                INNER JOIN `users` ON `board`. `user_id` = `users`.`user_id`
                WHERE `board_parent_id`= $parent_id;";

        $result = db_connect::connect($sql);

        return $result;
    }

    public static function prepareCheckOfComment($post_id){
        $sql = "SELECT `board`.`board_id`
                FROM `board`
                WHERE `board`.`board_parent_id` = $post_id and `board`.`board_parent_id` != 0;" ;

        $result = db_connect::connect($sql);

        return $result;
    }


    public static function writePostIntoDb($content, $userId, $typeNum){

        $sql = "INSERT INTO board(`board_text`,`board_date`,`board_post_type`, `user_id`) values ('$content', now(), $typeNum , $userId);";

        $result = db_connect::connect($sql);

        return $result;
    }

    public static function writeCommentIntoDb($id_post, $comment, $userId){

        $sql = "INSERT INTO board(`board_parent_id`, `board_text`,`board_date`,`board_post_type`, `user_id`) values ($id_post, '$comment', now() ,'3' , $userId);";

        $result = db_connect::connect($sql);

        return $result;
    }
}
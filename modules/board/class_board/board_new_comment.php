<?php

/**
 * Created by PhpStorm.
 * User: Lukáš Dočkal
 * Date: 29.3.2016
 * Time: 12:22
 */
class board_new_comment
{

    public static function writeCommentIntoDb()
    {
        if (isset($_POST['send_comment'])) {
            $id_post = $_POST['id_post'];
            $comment = $_POST['board_comment'];
            $userId = $_SESSION['id_user'];

            db_board::writeCommentIntoDb($id_post, $comment, $userId);
       }

    }
}
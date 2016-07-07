<?php

/**
 * Created by PhpStorm.
 * User: Lukáš Dočkal
 * Date: 5.6.2016
 * Time: 22:35
 */
//include(path."core/database/db_connect.php");

class db_chatBox extends db_connect
{
    public static function writeMessage()
    {
        $userId = $_SESSION['id_user'];
        $message = $_GET['message'];
        var_dump('jede');
        $sql = "INSERT INTO chat(`chat_messageContent`, `chat_messageTime`,`chat_messageAuthorId`) values ($message, now() , $userId);";

        db_connect::connect($sql);

    }
}
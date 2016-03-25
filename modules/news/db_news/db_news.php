<?php

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 23.2.2016
 * Time: 13:00
 */
class db_news extends db_connect
{
    public static function prepareNews()
    {
        $sql = "SELECT news_id, news_title, news_body,news_date, news_type_id, user_nick FROM `news`
                INNER JOIN `users` ON users.user_id = news.user_id
                ORDER BY `news_date` DESC LIMIT 15;
                ";

        $result = db_connect::connect($sql);

        return $result;
    }
}
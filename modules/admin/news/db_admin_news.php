<?php

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 2.3.2016
 * Time: 21:16
 */

class db_admin_news extends db_connect
{
    public static function loadNewsType()
    {
        $sql = "Select news_type_id, news_type_name from news_type ";
        $sql_result = db_connect::connect($sql);

        while ($row =  $sql_result->fetch_array()) {
            //return all record like option items into select box
             echo'<option value="'.$row['news_type_id'].'">'.$row['news_type_name'].'</option>' ;

        }
        return ;

    }



    public static function insertNewsToDb($news_title, $news_type_id, $news_body)
    {
        $id_user = $_SESSION['id_user'];

        $sql = "INSERT INTO news(news_title, news_type_id, news_body, user_id) VALUES ('$news_title', $news_type_id, '$news_body', (SELECT user_id FROM users where user_id = $id_user)) ";
        $result=db_connect::connect($sql);

        if($result){
            echo "<div class='news_insert_successful'>Novinka zapsána a zveřejněna</div>";

        }
        else{
            echo "<div class='news_insert_failed'> Error- Jeden z údajů k zapsání je neplatný.<br>";
            echo "INSERT INTO news(news_title, news_type_id, news_body, user_id) VALUES ('$news_title', $news_type_id, '$news_body', (SELECT user_id FROM users where user_id = $id_user)</div>";
        }
        return;
    }

}
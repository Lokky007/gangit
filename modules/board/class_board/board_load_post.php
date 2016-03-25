<?php

/**
 * Created by PhpStorm.
 * User: Dočkal Lukáš
 * Date: 20.3.2016
 * Time: 0:04
 */
include(path.'modules/board/db_board/db_board.php');

class board_load_post extends db_board
{
    public static function load_posts(){

        $html='';

        $sql_result = db_board::preparePostFromDb();

        while ($row = $sql_result->fetch_assoc()) {
                $html .= '<div class="board_posts">';
                $html .= $row['board_post_type'] . $row['board_text'] . "Id:" . $row['board_id'] . 'Autor:'. $row['board_usersPost'];
                $html .= '</div>';

        }

       return $html;
        }

}
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
                //call function for connection of icon to view
                $iconType = self::prepareIconForPostType($row['board_post_type'] );

                //prepare html view for rendering post
                $html .= '<div class="board_posts post_type_'.$row['board_post_type'].'">';
                $html .= "<div id ='post_". $row['board_id']."'>" . $iconType . 'Autor:'. $row['board_usersPost'] . '<br>' . $row['board_text'] . "</div>";
                $html .= '</div>';
                $html .= "<script>
                            $(document).ready(function() {
                                $('#post_" . $row['board_id'] . "').click(function() {
                                    $('#invisible_reply_" . $row['board_id'] . "').slideToggle(\"fast\");
                                                    });
                                                });
                           </script>";
            $html .= "<div class='' style='display:none;' id='invisible_reply_". $row['board_id']."'> abrakadabra</div>";

        }

       return $html;
        }

    public static function prepareIconForPostType($typePost){

        $link = 'cislo_default';
        switch($typePost){

            case '1':
                $link = 'spam_post.img';
                break;
            case '2':
                $link = 'class_post.img';
                break;
        }

        //prepare all img link
        $imageLink = "<img src = $link>";
        return $imageLink;
    }

}
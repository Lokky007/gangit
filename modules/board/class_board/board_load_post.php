<?php

/**
 * Created by PhpStorm.
 * User: Dočkal Lukáš
 * Date: 20.3.2016
 * Time: 0:04
 */
include(path.'modules/board/db_board/db_board.php');
include(path.'modules/board/class_board/board_load_comment.php');

class board_load_post extends db_board
{

    public static function load_posts(){

        $html='';

        //$sqlPreparePosts mean load all post saved in db
        $sqlPreparePosts = db_board::preparePostFromDb();

        //$status mean if user is logged on or off;
        $isLogged = board_new_post::checkLoginStatus();


        while ($row = $sqlPreparePosts->fetch_assoc()) {
                //call function for connection of icon to head of post
                $iconType = self::prepareIconForPostType($row['board_post_type'] );

                //prepare html view for rendering post
                $html .= '<div class="board_posts post_type_'.$row['board_post_type'].'">';
                $html .= "<div id ='post_". $row['board_id']."'>" . $iconType . ' Autor:'. $row['board_usersPost'] . '<br><b>' . $row['board_text'] . "</b></div>";

               // $isLogged = $sqlPrepareUserStatus->num_rows == 1;

                //if user is logged, return javascript with form for commment
                if ($isLogged){
                    $html .= "<div class='' style='display:none;' id='invisible_reply_" . $row['board_id'] . "'> <hr>";
                    $html .= board_new_post::prepareItemsForComment($row['board_id']);
                    $html .= '</div>';
                    $html .= board_load_post::prepareComments($row['board_id'], $isLogged).'</div>';


                    $html .= "<script>
                            $(document).ready(function() {
                                $('#post_" . $row['board_id'] . "').click(function() {
                                    $('#invisible_reply_" . $row['board_id'] . "').slideToggle(\"fast\");
                                                    });
                                                });
                           </script>";
                }
                //else return end of div
                else{
                    $html .= board_load_post::prepareComments($row['board_id'],$isLogged)."</div>";
                }
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

    public static function prepareComments($board_id, $isLogged){

        $divComment='';
        //$sqlCheckComments for check comment under specific post
        $sqlCheckComments = db_board::prepareCheckOfComment($board_id);
        $countOfComment = $sqlCheckComments->num_rows;

        if ($countOfComment >= 1) {

            //search comment
            $comments = db_board::loadComment($board_id)->fetch_all();
            $divComment = '<hr>';
            foreach ($comments as $comment) {
                $divComment .= '<div class="comment_under_post">';

                if ($comment[1] != 0) {
                    //render comment
                    $divComment .= board_load_post::renderComment($comment[0], $comment[2], $comment[5], $comment[4], $isLogged);

                    //check if comment is commented
                    $divComment .= self::prepareComments($comment[0], $isLogged);

                } else {
                    //render comment
                    $divComment .= board_load_post::renderComment($comment[0], $comment[2], $comment[5], $comment[4], $isLogged);
                }
                $divComment .= '</div>';
            }
        }
        return $divComment;
    }

    public static function renderComment($id, $text, $user, $date, $isLogged){
        $html='';
        $html .= '<div class="comment">';
        $html .= "<div id ='post_". $id."'>" .$date . 'Autor:'. $user . '<br><b>' . $text . "</b></div>";
        $html .= '</div>';
        //if user is logged, render div with form for comment
        if ($isLogged) {
            $html .= "<div class='' style='display:none;' id='invisible_reply_" . $id . "'>" . board_new_post::prepareItemsForComment($id) . '</div><hr>';
            $html .= "<script>
                            $(document).ready(function() {
                                $('#post_" . $id . "').click(function() {
                                    $('#invisible_reply_" . $id . "').slideToggle(\"fast\");
                                                    });
                                                });
                           </script>";
        }
        else{
            $html .= '<hr>';
        }
        return $html;
    }

}
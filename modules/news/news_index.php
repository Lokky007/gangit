<?php
include(path.'core/templates/main_template.php');
require_once(path.'modules/news/db_news/db_news.php');
?>

<div class='info_bar_module'>
    <div class='text'>
        <?php include path.'core/accessories/chatbox/chatBox_index.php';?>
    </div>
</div>

    <?php
    $news = db_news::prepareNews();

    //set params for visible and invis new
    $visible_news = true;
    $visible_events = true;
    $display_news = 'block';
    $display_events = 'block';

    if (!$news){
        echo "Zádné položky k zobrazení";
    }
    else {

        echo"<div class='web_news'><div class='web_news_column_left'>";

            while ($row = $news->fetch_assoc()) {

                echo "<div class='items_under_infobar'>";
                echo " <div id=\"news" . $row['news_id'] . "\"><div class='newsTitle'>" . $row['news_title'] . "</div></div>
                        <div class=\"invisible_news_" . $row['news_id'] . "\" style=\"display: $display_news;\">
                        " .
                                $row['news_body']
                                . "<br>
                                </div>

                            <script>
                                $(document).ready(function() {
                                    $('#news" . $row['news_id'] . "').click(function() {
                                            $('.invisible_news_" . $row['news_id'] . "').slideToggle(\"fast\");
                                    });
                                });
                            </script>";
                echo '</div>';

                //visible first new and invis other
                if ($visible_news){
                    $display_news='none';
                    $visible_news=false;
                }
        }

        echo '</div>';
    }

    //TOTO JE BLOK PRO PRAVY SLOUPEC. CSS neni nadefinovano, ale je otagovanoo
    $events = db_news::prepareEvents();

        if (!$events){
            echo "Zádné položky k zobrazení";
        }
        else {
            while ($event = $events->fetch_assoc()){

                echo "<div class='web_news_column_right'>";
                echo " <div id=\"events" . $event['event_id'] . "\"> <div class='items_under_infobar'>" . $event['event_name'] . "
                        <div class=\"invisible_events_" . $event['event_id'] . "\" style=\"display: $display_events;\">
                        " .
                          $event['event_text']
                    . "<br>
                                </div></div></div>

                            <script>
                                $(document).ready(function() {
                                    $('#events" . $event['event_id'] . "').click(function() {
                                            $('.invisible_events_" . $event['event_id'] . "').slideToggle(\"fast\");
                                    });
                                });
                            </script>";
                echo '</div>';

                //visible first new and invis other
                if ($visible_events){
                    $display_events='none';
                    $visible_events=false;
                }

            }
            echo "</div>";
        }
    ?>

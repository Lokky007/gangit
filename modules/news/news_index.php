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
    $visible = true;
    $display = 'block';

    if (!$news){
        echo "Zádné položky k zobrazení";
    }
    else {

        echo"<div class='web_news'><div class='web_news_column_left'>";

            while ($row = $news->fetch_assoc()) {

                echo "<div class='items_under_infobar'>";
                echo " <div id=\"" . $row['news_id'] . "\"><div class='newsTitle'>" . $row['news_title'] . "</div></div>
                        <div class=\"invisible_" . $row['news_id'] . "\" style=\"display: $display;\">
                        " .
                                $row['news_body'] . "<br>Autor novinky: " . $row['user_nick']
                                . "<br></div>

                            <script>
                                $(document).ready(function() {
                                    $('#" . $row['news_id'] . "').click(function() {
                                            $('.invisible_" . $row['news_id'] . "').slideToggle(\"fast\");
                                    });
                                });
                            </script>";
                echo '</div>';

                //visible first new and invis other
                if ($visible){
                    $display='none';
                    $visible=false;
                }
        }

        echo '</div>';
    }

    //TOTO JE BLOK PRO PRAVY SLOUPEC. CSS neni nadefinovano, ale je otagovanoo

    echo"<div class='web_news_column_right'>
             <div class='items_under_infobar'>Zde bude kalendar s akcemi guildy a GM akcemi</div>
        </div></div>";

    ?>

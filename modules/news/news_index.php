<?php
include(path.'core/templates/main_template.php');
require_once(path.'modules/news/db_news/db_news.php');
?>

<div class='info_bar_module'>
    <div class='text'>
        <b>
            <p>
                Tot bude hlavicka ktera popisuje zakladni definici modulu, Nezapomenout ji vyplnit.
                Bude obsahovat ucel modulu a zpusob jak s nim pracovat.
            </p>

            <br/>
            bla bla
            <br />
        </b>
    </div>
</div>

<div class='items_under_infobar'>
    <?php
    $news = db_news::prepareNews();
    if (!$news){
        echo "Zádné položky k zobrazení";
    }
    else {
        while ($row = $news->fetch_assoc()) {
            echo " <div id=\"" . $row['news_id'] . "\"><h4>" . $row['news_title'] . "</h4></div>
        <div class=\"invisible_" . $row['news_id'] . "\" style=\"display: none;\">
        Popis novinky: " .
                $row['news_body'] . "<br>Autor questu: " . $row['user_nick']
                . "<br></div>

            <script>
                $(document).ready(function() {
                    $('#" . $row['news_id'] . "').click(function() {
                        $('.invisible_" . $row['news_id'] . "').slideToggle(\"fast\");
                    });
                });
            </script>";
        }
    }
    ?>
</div>
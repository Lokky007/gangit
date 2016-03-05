<?php

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 29.2.2016
 * Time: 18:39
 */

include_once(path.'modules/admin/news/db_admin_news.php');

?>

<div class="" style="text-decoration: underline;"> Zveřejni novou novinku</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ((!empty($_POST['news_title'])) and (!empty($_POST['news_body']))) {
        db_admin_news::insertNewsToDb($_POST['news_title'],$_POST['news_type_id'] ,$_POST['news_body']);
    }
    else{
        $alert = 'POZOR: Nejsou vyplněna potřebná pole.';
    }
}

?>

<form action="index.php?page_id=1000&subpage_id=1001" method="post">
        <br>
            <input name="news_title" class="admin_news_input_form_text" placeholder="Titulek..." type="text" >
            Typ: <select name="news_type_id" class="admin_news_input_form_text">
                            <?php
                                db_admin_news::loadNewsType();
                            ?>
                        </select><br>
            <input class="admin_news_input_form_text" placeholder="Text..." style="width: 700px; height: 300px;" type="text" name="news_body"><br>
    <input type="submit" name="" style="color: black;" value="Zveřejnit">
</form>

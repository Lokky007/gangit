<?php

/**
 * Created by PhpStorm.
 * User: Lukáš Dočkal
 * Date: 30.4.2016
 * Time: 23:54
 */

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 29.2.2016
 * Time: 18:39
 */

include_once(path.'modules/admin/quests/db_admin_quests.php');

?>

<div class="" style="text-decoration: underline;"> Zveřejni quets</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ((!empty($_POST['quests_title'])) and (!empty($_POST['quests_level'])) and
        (!empty($_POST['quests_loc_x'])) and (!empty($_POST['quests_loc_y'])) and
        (!empty($_POST['quests_body']))) {
        db_admin_quests::insertQuestToDb($_POST['quests_title'], $_POST['quests_level'] , $_POST['quests_loc_x'],
                                         $_POST['quests_loc_y'], $_POST['quests_body']);
    }
    else{
        echo 'POZOR: Nejsou vyplněna potřebná pole.';
    }
}

?>

<form action="index.php?page_id=1000&subpage_id=1010" method="post">
    <br>
    <input name="quests_title" class="admin_news_input_form_text" placeholder="Název questu..." type="text" ><br>
    <input name="quests_level" class="admin_news_input_form_text" placeholder="Pro levely..." type="text" >
    <input name="quests_loc_x" class="admin_news_input_form_text" placeholder="Lokace X..." type="text" >
    <input name="quests_loc_y" class="admin_news_input_form_text" placeholder="Lokace Y..." type="text" >

    <input name="quests_body" class="admin_news_input_form_text" placeholder="Text..." style="width: 700px; height: 300px;" type="text"><br>
    <input type="submit" name="" style="color: black;" value="Zapsat">
</form>

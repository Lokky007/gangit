<?php
/**
 * Created by PhpStorm.
 * User: Lukáš Dočkal
 * Date: 5.6.2016
 * Time: 21:50
 */
include(path.'core/database/db_chatBox.php');
?>


<div id="chatBox_readMessages">
    Zprávy se načítají...
    <br><br>
</div>

<form name="chatBox_SendMessage">
    Zpráva: <input type="text" name="textMessage" size="150"><a onclick="submitMessage()">Odeslat</a>
</form>

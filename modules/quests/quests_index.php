<?php
/**
 * Created by PhpStorm.
 * User: owner
 * Date: 1.5.2016
 * Time: 13:07
 */

include(path.'core/templates/main_template.php');
require_once(path.'modules/quests/class_quests/quests_load.php');

?>
<div class='info_bar_module'>
    <div class='text'>
        <b>
            <p>
                Tot bude hlavicka quests
            </p>

            <br/>
            bla bla
            <br />
        </b>
    </div>
</div>
<?php

echo quests_load::loadQuests();


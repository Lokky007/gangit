<?php
/**
 * Created by PhpStorm.
 * User: Lukáš Dčkal
 * Date: 27.2.2016
 * Time: 15:34
 */
include(path.'core/templates/main_template.php');

//if subpage_id not set, redirect it to main subpage_id=1001
if (!isset($_GET['subpage_id'])){
    header('Location: index.php?page_id=1000&subpage_id=1001');
}else {

    //MENU
    echo "<div class='info_bar_module admin_module    '>
                    <div class='admin_menu'>
                        <form action='index.php?page_id=1000' method='get'>
                            <button name=\"subpage_id\" value=\"1001\" >Vlozit novinku</button>
                            <button href=''>Vlozit quest</button>
                            <button href=''>Spravovat ucty</button>
                        </form>
                    </div>
                <div class='admin_content'>";
    //CONTENT
        $access = new db_page_access_controler();

        $page = $access->loadPageLocation($_GET['subpage_id']);
        include_once(path.$page['page_location']);



    echo '    </div>
            </div>';

}

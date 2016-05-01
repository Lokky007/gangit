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

                            <button onclick=\"location.href='index.php?page_id=1000&subpage_id=1001'\">Vlozit novinku</button>
                            <button onclick=\"location.href='index.php?page_id=1000&subpage_id=1010'\">Vlozit quest</button>
                            <button href=''>Spravovat ucty</button>

                    </div>


                <div class='admin_content'>";
        //CONTENT
        $access = new db_page_access_controler();

        $page = $access->loadPageLocation($_GET['subpage_id']);
        include_once(path.$page['page_location']);



    echo '    </div>
            </div>';

}

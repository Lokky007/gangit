<?php
/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 12.2.2016
 * Time: 20:57
 */

include_once('configuration.php');
include_once( path.'core/database/db_connect.php' );


//If page in Url is not set, redirect to main page (page_id = 1)
if (!isset($_GET['page_id'])){
    header('Location: index.php?page_id=1');
}
else {

    $page_id = intval($_GET['page_id']);

    //check if pageid is correct -> is integer
    //intval return 0 if string ->redirect to main page (page_id = 1)
    if ($page_id == 0){
        db_connect::connect(db_server_name, db_user_name, db_password, db_name);
    }
    else{

    }

    //$sql =  'select * from users WHERE user_id = ' . $_SESSION['id_user'];

    //page_controler::checkUserAccess();

}
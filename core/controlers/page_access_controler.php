<?php

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 12.2.2016
 * Time: 21:00
 */
include_once( path.'core/database/db_page_access_controler.php');

class page_access_controler
{

    public static function page_access($page_id, $id_user, $nick)
    {
        $access = new db_page_access_controler();
        $pages = $access->compareUserAndAccessRights($page_id, $id_user, $nick);

        if ($pages and $page_id < 1001) {
            $page = $access->loadPageLocation($page_id);
            include_once(path.$page['page_location']);
            return;

        } else {
            die('access denited');
        }
    }

}
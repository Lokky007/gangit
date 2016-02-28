<?php

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 12.2.2016
 * Time: 21:17
 */
class db_page_access_controler extends db_connect
{

    public function compareUserAndAccessRights($page_id, $idUser, $user_nick)
    {

        $pageRights = $this->getPageRights($page_id);
        $userRights = $this->getUserRights($idUser, $user_nick);

        return (($pageRights <= $userRights['access_id']) and ($pageRights != null)) ;
    }


    private function getPageRights($page_id)
    {

        $sql = "select page_access from pages WHERE page_id = $page_id";
        $sql_result = db_connect::connect($sql);

        if ($sql_result->num_rows == 1) {
            $result_page = $sql_result->fetch_assoc();
        }
        else {
            $result_page['page_access']=null;
        };

        return $result_page['page_access'];
    }
    private function getUserRights($idUser, $user_nick)
    {

        $sql = "select access_id from users where user_id = $idUser and user_nick = '$user_nick'";
        $sql_result = db_connect::connect($sql);

        if ($sql_result->num_rows == 1) {
            $result_user = $sql_result->fetch_assoc();
        }
        else{
            $result_user = '0';
        }

        return $result_user;
    }

    public static function loadPageLocation($page_id)
    {
        $sql =  "select page_title, page_location, page_access from pages WHERE page_id = $page_id";
        $sql_result = db_connect::connect($sql);
        $result=$sql_result->fetch_assoc();

        return $result;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 12.2.2016
 * Time: 21:17
 */
class page_access
{
    public static function returnPageAccess(){

        $html=re::prepareSqlQuery() >prepareSqlQuery();
        return $html;
            }



        private function prepareSqlQuery(){
        $sql = 'select page_title, page_location, page_access from `pages` WHERE `page_id` = ' . $page_id;
        $sql_result = db_connect::connect($sql);
        $result = $sql_result->fetch_assoc();

    }

}
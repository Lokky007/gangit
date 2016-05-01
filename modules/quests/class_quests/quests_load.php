<?php

/**
 * Created by PhpStorm.
 * User: owner
 * Date: 1.5.2016
 * Time: 14:03
 */
require_once(path.'modules/quests/db_quests/db_load_quests.php');

class quests_load extends db_load_quests
{
    public static function loadQuests(){

        $loadAllQuests=db_load_quests::loadAllQuests();

        $html = '';

        while ($quest = $loadAllQuests->fetch_array()) {

            $html .= quests_load::prepareHtmlForQuests($quest);

        }
        return $html;
    }

    public static function prepareHtmlForQuests($quest){

        $html = '';
        $html .= '<div class="questBlock" id=$quest[\'quest_id\']>';
            $html .= '<div class="questName">Název: '.$quest['quest_name'].'</div>';
            $html .= '<div class="questLevel">Level: '.$quest['quest_level'].'</div>';
            $html .= '<div class="questX">Pozice X:'.$quest['quest_loc_x'].'</div>';
            $html .= '<div class="questY">Pozice Y:'.$quest['quest_loc_y'].'</div>';
            $html .= '<br><div class="questText">'.$quest['quest_text'].'</div>';
        $html .= '</div>';

        return $html;
    }
}
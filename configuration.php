<?php

/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 12.2.2016
 * Time: 21:19
 */


session_start();

define ("path", "./");

define ("db_server_name", "localhost");
define ('db_user_name', "root");
define ('db_password', "");
define ('db_name', "gangit");

define ('page_status', '0'); //1 for Service status , 0 for enabled
define ('access_service_key','S8g9sd'); //for hidden input in service page
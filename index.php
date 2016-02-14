<?php
/**
 * Created by PhpStorm.
 * User: Lukas Dockal
 * Date: 12.2.2016
 * Time: 20:57
 */

include_once('configuration.php');
include_once( path.'core/database/db_connect.php' );

if(empty($_SESSION['id_user'])){$_SESSION['id_user'] = 0;};
if(empty($_POST['access_service'])){$_POST['access_service'] = '';};

//If page in Url is not set, redirect to main page (page_id = 1)
if (!isset($_GET['page_id'])){
    header('Location: index.php?page_id=1');
}
else {

    $page_id = intval($_GET['page_id']);

    //check if pageid is correct -> is integer
    //intval return 0 if string ->redirect to main page (page_id = 1)
    if ($page_id == 0){
        header('Location: index.php?page_id=1');
    }
    //test access to page
    //      if 0 free access for everyone
    //      if 1 for registered users
    //      if 2 for admin
    else{
        // backdoor for administrator in service mode
        if($_POST['access_service']==access_service_key){
            $_SESSION['access_service'] = access_service_key;
        }
        //block entry in configuration file 1 -> blocked on
        if ((page_status==1) and (!$_SESSION['access_service']== access_service_key)) {
                echo "<head>
                        <meta charset=\"utf-8\">
                        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
                        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">

                        <link href=\"" . path . "core/css/styles.css\" rel=\"stylesheet\">
                        <link href=\"" . path . "core/css/bootstrap.min.css\" rel=\"stylesheet\">
                        <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>
                        <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>
                        <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
                        <script src=\"" . path . "core/js/bootstrap.min.js\"></script>
                      </head>

                      <div class=\"container\">
                          <div class=\"container-fluid service_align-middle\">

                            <div class='web_status'>
                                <img src=\"" . path . "core/images/service.jpg\" alt=\"Service\" >
                            </div>
                         <form class='hidden_access_input' method=\"post\">
                         Access: <input name='access_service' type='password'>
                          <input type=\"submit\" value=\"Submit\">
                        </form>
                        </div>
                      </div>
                ";
            }

        else {
            $sql =  'select page_title, page_location, page_access from `pages` WHERE `page_id` = ' . $page_id;
            $sql_result = db_connect::connect($sql);
            $result=$sql_result->fetch_assoc();

            //try access
            if (($result['page_access'] == $_SESSION['id_user'])) {
                echo 'je to ok';
            }

            return $result;
        }

    }

}
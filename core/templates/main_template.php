
<!DOCTYPE html>
<html lang="cz">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Gangit</title>

    <!-- Bootstrap -->
    <link href="<?php echo path.'core/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo path.'core/css/styles.css' ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo path.'core/js/bootstrap.min.js'?>"></script>


    <!--Import my files-->
    <?php
    require_once('./core/controlers/login_controler.php');
    //require_once('./core/Db/Db_login.php');

    /*
    require_once('./news_modul/db/db_load_news.php');
    require_once('./quest_modul/db/db_load_quests.php');
    */
    ?>
</head>

<body>

<div class="navbar navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./index.php">GANGIT</a>
        </div>

        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav active">
                <li>
                    <a href="#">Crafting</a>
                </li>
                <li>
                    <a href="#">Questy</a>
                </li>
                <li>
                    <a href="#">Mapa</a>
                </li>
                <li>
                    <a href="#">Vývěska</a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
                <li>
                    <a href="#"></a>
                </li>
                <li>
                    <a href="#">Forum</a>
                </li>

                <?php
                if (!empty($_SESSION['id_user']) and (!empty($_SESSION['nick']))){

                    echo '<li><div class="success_login_message"> Welcome <a href="#">'.($_SESSION['nick']).'</a></div></li>';

                    echo '<form action="index.php?page_id=1" method="get" class="navbar-form navbar-right" role="form">
                                <button type="submit" class="btn btn-default" name="logOut" value="logout">Log Out</button>
                                </form>';


                }

                else{

                    echo '   <form method="POST" class="navbar-form navbar-right" role="form" >
                                         <div class="form-group">
                                        <input type="text" class="form-control" name="login" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="pwd" name="pass" placeholder="Enter password">
                                    </div>
                                    <button type="submit" class="btn btn-default" name="login_button" value="Login">Sign In</button>';

                    if (isset($_POST['login_button'])) {
                        $login_status = login_controler::check_login_parameters();
                        if ($login_status == FALSE) {

                            echo "<div class=\"fail_login_message\">INCORRECT<br> pass/login</div>";
                        }
                        else{
                            header('Location: index.php?page_id=1');
                        }
                    }
                    echo "</form> ";

                }
                ?>

            </ul>

        </div>
    </div>
</div>
<div class="main_body">

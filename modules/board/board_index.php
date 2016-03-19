<?php
include(path.'core/templates/main_template.php');
require_once(path.'modules/board/class_board/board_new_post.php');
?>


<div class='info_bar_module'>
    <div class='text'>
        <b>
            <p>
                Kratka hlavicka Vyvesky  definici chovani apod.
            </p>

            <br/>
            bla bla
            <br />
        </b>
    </div>
</div>

    <div  class="body_index">


<!--Rules
        <div class="board_rules">
            <b>Pravidla vývěsky:</b>
            <ul>
                <li>žádné vulgarismy a napadání</li>
                <li>Tea</li>
                <li>Milk</li>
            </ul>
        </div>

    -->
<div class="row">


            <div class="col-xs-8 col-sm-6">

<?php
board_new_post::prepareItemsForNewPost();
?>
            </div>
            <div class="col-xs-4 col-sm-6">
                <b>Pravidla vývěsky:</b>
                <ul>
                    <li>žádné vulgarismy a napadání</li>
                    <li>Tea</li>
                    <li>Milk</li>
                </ul>
            </div>
        </div>

</div>

<?php
include(path.'core/templates/main_template.php');
require_once(path.'modules/board/class_board/board_new_post.php');
require_once(path.'modules/board/class_board/board_load_post.php');
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(".button_dehide").click(function(){
            $("#dehide_new_post_form").slideToggle("slow");
        });
    });
</script>

<div class="body_index" style="display: none;" id="dehide_new_post_form">
<div class="row">
    <div class="col-xs-8 col-sm-6">
        <?php
        board_new_post::prepareItemsForNewPost();
        ?>
    </div>
            <div class="col-xs-4 col-sm-6">
                <!--Rules-->
                <b>Pravidla vývěsky:</b>
                <ul>
                    <li>Žádné vulgarismy a napadání</li>
                    <li>Využívejte vytvořených tagů pro efektivnější filtraci</li>
                    <li>Milk</li>
                </ul>
            </div>
        </div>
</div>
<!--Filters-->
        <div class="board_filter_bar">
            <button class="btn btn-default button_dehide">Přidat inzerci</button>
                <div class="board_filter_option">
                            <b> Aktivovat filtry:    </b>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox1" value="option1" onclick="jQuery('.post_type_1').toggle('slow','swing');"> Prodám/koupím
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox2" value="option2" onclick="jQuery('.post_type_2').toggle('slow','swing');"> Spam
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" id="inlineCheckbox3" value="option3"> Od poslední návštěvy
                            </label>
                            <label class="checkbox-inline">
                                <?php echo board_new_post::writePostIntoDb() ?>
                            </label>
            </div>
        </div>


<?php
//print posts
echo board_load_post::load_posts();

?>

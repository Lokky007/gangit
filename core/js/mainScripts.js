/**
 * Created by owner on 5.9.2016.
 */
function opacity100($itemForSet) {
    $(document).ready(function() {

        var infobar = document.getElementsByClassName($itemForSet);
        infobar[0].style.opacity = "0.9"
    })
}

function opacity50($itemForSet) {
    $(document).ready(function () {

        var infobar = document.getElementsByClassName($itemForSet);
        infobar[0].style.opacity = "0.6"
    })
}

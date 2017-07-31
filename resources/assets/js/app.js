-require('./bootstrap');

$(document).ready(function () {
    $(".collapse_icon").click(function () {
        $header = $(this);
        $content = $header.parent().parent().find(".collection");
        $content.slideToggle(500, function () {
            $header.html(function () {
                return $content.is(":visible") ? "<i class=\"material-icons\">arrow_drop_up</i>" : "<i class=\"material-icons\">arrow_drop_down</i>";
            });
        });

    });
});


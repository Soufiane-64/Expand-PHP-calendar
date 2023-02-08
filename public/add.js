document.addEventListener("DOMContentLoaded",function () {

    $("#form").submit(function(e) {
        var $form = $(this);
        console.log($form);
        $.post($form.attr("action"), $form.serialize())
            .done(function(data) {

                alert("Operation erfolgreich abgeschlossen!");
                location.href = 'http://localhost/calendar-php/public';
            })
            .fail(function() {
                alert("Die Operation wurde nicht erfolgreich abgeschlossen!");
            });
    });
});
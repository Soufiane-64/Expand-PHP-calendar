document.addEventListener("DOMContentLoaded",function () {

    $("#delete").click(function(e) {
        var button = $(this);
        $.get(`crud.php?crud=delete&id=${button.attr("value")}`)
            .done(function(data) {
                console.log(data);
                alert("Operation erfolgreich abgeschlossen!");
                location.href = 'http://localhost/calendar-php/public/';
            })
            .fail(function() {
                alert("Die Operation wurde nicht erfolgreich abgeschlossen!");
            });
    });
});
$(function(){
    $.ajax({
        url: "view/getNumberOfThing",
        data: "type=file",
        type: "POST",
        success: function (data) {
            $.each(data, function(index, item) {

            });
        }
    });
});
$(function(){
    $.ajax({
        url: "view/getNumberOfThing",
        data: "type=file",
        type: "POST",
        success: function (data) {
            $('#th1').append(data);
        }
    });
    $.ajax({
        url: "view/getNumberOfThing",
        data: "type=webLink",
        type: "POST",
        success: function (data) {
            $('#th2').append(data);
        }
    });
    $.ajax({
        url: "view/getNumberOfThing",
        data: "type=text",
        type: "POST",
        success: function (data) {
            $('#th3').append(data);
        }
    });
    $.ajax({
        url: "view/getNumberOfThing",
        data: "type=videoLink",
        type: "POST",
        success: function (data) {
            $('#th4').append(data);
        }
    });
});
/*global $*/

$(document).ready(function() {
    $("#submit").click(login);
});

function login() {
    $.ajax({
        type: "post",
        url: "APIs/login.php",
        dataType: "json",
        data: {
            "email": $("#email").val(),
        },
        success: function(data) {
            console.log("success!");
            console.log(data);
        },
        error: function(err) {
            console.log("error!");
            console.log(err);
        },
        complete: function() {
            console.log("complete!")
            //optional, used for debugging purposes
        },
    })
}

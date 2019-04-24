/*global $*/

$(document).ready(function() {
    $("#dislikeImage").on("click", dislike());
    $("#questionMarkImage").on("click", questionMark());
    $("#likeImage").on("click", like);
});

function dislike() {
    $.ajax({
        type: "get",
        url: "api/dislike.php",
        dataType: "json",
        data: {
            "match": true,
        },
        success: function(data) {
            console.log(arguments);
        }
    })
}

function questionMark() {
    $.ajax({
        type: "get",
        url: "api/questionMark.php",
        dataType: "json",
        data: {
            "match": "unsure",
        },
        success: function(data) {
            console.log(arguments);
        }
    })
}

function like() {
    $.ajax({
        type: "get",
        url: "api/like.php",
        dataType: "json",
        data: {
            "match": false,
        },
        success: function(data) {
            console.log(arguments);
        }
    })
}

$(document).ready(function() {
    $("#searchId").change(search);

    function search() {
        $.ajax({
            type: "get",
            url: "api/api.php",
            dataType: "JSON",
            crossDomain: true,
            data: {
                "q": $("#searchId").val(),

            },
            success: function(data) {
                console.log(arguments);
                console.log("data: " + data);

                var pageurl0 = data.hits[0].pageURL;
                var pageurl1 = data.hits[1].pageURL;
                var pageurl2 = data.hits[2].pageURL;

                var pageurl3 = data.hits[3].pageURL;
                var pageurl4 = data.hits[4].pageURL;
                var pageurl5 = data.hits[5].pageURL;

                var pageurl6 = data.hits[6].pageURL;
                var pageurl7 = data.hits[7].pageURL;
                var pageurl8 = data.hits[8].pageURL;
                
                $("#container").css("display", "flex")
                $(".col").css("display", "block")
                
                $("#col1").append($("<img>").attr("src", pageurl0));
                $("#col1").append($("<img>").attr("src", pageurl1));
                $("#col1").append($("<img>").attr("src", pageurl2));

                $("#col2").append($("<img>").attr("src", pageurl3));
                $("#col2").append($("<img>").attr("src", pageurl4));
                $("#col2").append($("<img>").attr("src", pageurl5));

                $("#col3").append($("<img>").attr("src", pageurl6));
                $("#col3").append($("<img>").attr("src", pageurl7));
                $("#col3").append($("<img>").attr("src", pageurl8));

                for(var i=0; i<3; i++){
                    $(".col").append($("<img>").attr("src", "images/no_favorite.png"));
                }
                
            },
            error: function(err) {
                console.log("error!")
                console.log(err)
            },
            complete: function() {
                //optional, used for debugging purposes
                console.log("complete");
            }
        })
    }
});

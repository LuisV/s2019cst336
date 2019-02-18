var image1 = Math.floor(Math.random() * 3) + 1;
var image2 = Math.floor(Math.random() * 3) + 1;
var image3 = Math.floor(Math.random() * 3) + 1;
var display1 = document.createElement("IMG");
var display2 = new Image();
var display3 = new Image();
$(document).ready(function() {
    play1.addEventListener("click", play);

    function play() {
        image1 = Math.floor(Math.random() * 3) + 1;
        image2 = Math.floor(Math.random() * 3) + 1;
        image3 = Math.floor(Math.random() * 3) + 1;
        $("#test").html("<img src ='img/" + image1 + ".png' />");
        $("#image2").html("<img src ='img/" + image2 + ".png' />");
        $("#image3").html("<img src ='img/" + image3 + ".png' />");

        if (image1 === image2 && image2 === image3 && image1 === 1){
            $("#amount").html("You win $200");
        }

    }
});

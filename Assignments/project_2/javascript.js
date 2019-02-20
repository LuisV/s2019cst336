$(document).ready(function(){
	
   $('#submit').click(function(){
	   
	   $('#superheroOutput').html("Chosen superhero: " + $('#superhero').val());
		 $('#fromOutput').html("Chosen start date: " + $('#fromDate').val());
		 $('#toOutput').html("Chosen end date: " + $('#toDate').val());
	});
});
	
	document.getElementById("submit").onclick = js; 
	
	function js(){
		var valueFromList = document.getElementById("size");
		var burgerSize = valueFromList.options[valueFromList.selectedIndex].text;
		document.getElementById("burgerSizeOutput").innerHTML = "Burger size: " + burgerSize; 
	}
	
 
	
	

	
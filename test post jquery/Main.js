function doc(id){return document.getElementById(id);}
$( document ).ready(function() {
    $('#Login').click(function(event){
    	event.preventDefault();
		console.log("xD");
		var Datos = { Action : "Login", user : doc("Perico3").value, Pass : doc("Perico2").value};
		$.post("./perico2.php",
			Datos,
	    	function(data, status){
	        	console.log("Data: " + data + "\nStatus: " + status);
	    });
	});
});

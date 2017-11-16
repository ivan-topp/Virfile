get = function (id){return document.getElementById(id);}
$(document).ready(function() {
    $('#Login').click(function(event){
    	event.preventDefault();
		var Datos = { Action : "Login", User : $('#User').val(), Pass : $('#Pass').val()};
		$.post("./Front.php",
			Datos,
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			console.log("Data: " + data);
	    			location.reload();
	    		}
	        	
	    });
	});
});
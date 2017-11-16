get = function (id){return document.getElementById(id);}
$(document).ready(function() {
    $('#Logout').click(function(event){
    	event.preventDefault();
		var Datos = { Action : "Logout"};
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
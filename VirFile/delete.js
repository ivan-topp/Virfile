$(document).ready(function() {
    $("#btndelete").click(function(event){
    	event.preventDefault();
		var Datos = { Action : "delete"};
		$.post("./recibe.php",
			Datos,
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			console.log("Data: " + data);
	    			//location.reload();
	    		}
	        	
	    });
	});
});

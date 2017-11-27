$(document).ready(function() {
    $("btnlist1").click(function(event){
    	event.preventDefault();
		var Datos = { Action : "list"};
		$.post("./test.php",
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
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
	    			data = JSON.parse(data);
	    			if(Object.keys(data).indexOf('Error') == -1){
	    				location.reload();
	    			}else $('#loginError').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no coinciden, asegurate de haber ingresado bien tus datos.</div>');
	    		}
	        	
	    });
	});
});
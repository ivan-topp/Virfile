get = function (id){return document.getElementById(id);}
$(document).ready(function() {
    $('#add_user').click(function(event){
    	event.preventDefault();
    	var user_name = $("#user_name").val();
    	var user_alone = $("#user_alone").val();
    	var user_mail  = $("#user_mail").val();
    	var user_pass  = $("#user_pass").val();
    	console.log(user_name);
    	console.log(user_alone);
    	console.log(user_mail);
    	console.log(user_pass);

    	
		var Datos = { user_name : user_name, user_alone: user_alone , user_mail: user_mail , user_pass: user_pass};
		console.log(Datos);
		
		$.post("./.php",Datos, function(data, status){
	    		if(status != "success"){console.log("Error al agregar al Usuario.");}
	    		else{
	    			console.log("Usuario agregado exitosamente.");
	    		}
	        	
	    });
	});
});
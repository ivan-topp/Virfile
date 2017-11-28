var listaActive = false;
var FilesActive = true;
$(document).ready(function() {
	function Listar(){
		var Datos = { Action : "list"};
		$.post("./Front.php",
			Datos, 
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			$('.User').remove();

	    			console.log("Data: " + data);
	    			if(data != ''){
						data = JSON.parse(data);
		    			$('#ListUsers').append('<tr class="User"><td>ELIMINAR</td><td>ID USUARIO </td><td>NOMBRE USUARIO</td><td>CORREO</td></tr>');
		    			data.forEach(function(val, indx){
		    				//

		    				$('#ListUsers').append('<tr class="User"><td><input type="checkbox" id="'+val.ID_User+'" name="numero[]"></td><td>'+val.ID_User+'</td><td>'+val.User_Name+'</td><td>'+val.Mail+'</td></tr>');
		    				console.log(val);
		    			});
	    			}
		    			
	    		}
	        	
	    });
	}
	$('#Logout').click(function(event){
		var Datos = { Action : "Logout"};
		$.post("./Front.php",
			Datos,
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			//console.log("Data: " + data);
	    			location.reload();
	    		}
	        	
	    });
	});
    $("#btnlist1").click(function(event){
    	event.preventDefault();
    	listaActive = !listaActive;
    	$('#Lista').toggleClass('hidden');
    	FilesActive = !FilesActive;
    	$('#Files').toggleClass('hidden');
    	if(listaActive){	
			Listar();
    	}
    	
	});
	$("#btndelete1").click(function(event){
		$("input:checkbox:checked").each(function() {
			console.log(parseInt($(this).attr('id')));
			
			var id = $(this).attr('id');
			var Datos = { Action : "delete", ID : parseInt($(this).attr('id'))};
			$.post("./Front.php",
				Datos,
		    	function(data, status){
		    		if(status != "success"){console.log("Error al realizar la peticion.");}
		    		else{
		    			console.log("Data: " + data);
		    			//location.reload();
		    		}
		        	
		    });
		});
		Listar();
    	//event.preventDefault();
    });

    	/*
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
	    */
});
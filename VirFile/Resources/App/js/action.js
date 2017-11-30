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
	    			data = JSON.parse(data);
	    			$('#ListUsers').append('<tr class="User"><td>ELIMINAR</td><td>ID USUARIO </td><td>NOMBRE USUARIO</td><td>CORREO</td></tr>');
	    			data.forEach(function(val, indx){
	    				$('#ListUsers').append('<tr class="User"><td><input type="checkbox" id="'+val.ID_User+'" name="numero[]"></td><td>'+val.ID_User+'</td><td>'+val.User_Name+'</td><td>'+val.Mail+'</td></tr>');
	    				console.log(val);
	    			});
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

	/*$('#btnedit').click(function(){
		$("input:checkbox:checked").each(function() {
			console.log(parseInt($(this).attr('id')));
			var id = $(this).attr('id');	
			var Datos = { Action : "Edit_User"};
			$.post("./Front.php",
				Datos,
		    	function(data, status){
		    		if(status != "success"){console.log("Error al realizar la peticion.");}
		    		else{
		    			console.log("Data: " + data);
		    		}
		    	});		

		});	
	});*/


	$('#editUser').click(function(){


		$("input:checkbox:checked").each(function() {
			//console.log(parseInt($(this).attr('id')));
			var id = $(this).attr('id');	
			var switchs= parseInt($('#editUserLevel').val());
			//console.log(switchs);
			if(switchs==0 || switchs==1){
				
				var Datos = { Action : "Edit", ID : parseInt(id) , UserName : $('#editUserUserName').val(), Name : $('#editUserName').val(), Mail : $('#editUserMail').val(), Pass : $('#editUserPass').val(), Level : parseInt($('#editUserLevel').val())};
				console.log(Datos);
				$.post("./Front.php",
					Datos,
		    		function(data, status){
		    			if(status != "success"){console.log("Error al realizar la peticion.");}
		    			else{
		    				console.log("HOLA");
			    			data = JSON.parse(data);
			    			if(Object.keys(data).indexOf('Error') == -1){
			    				console.log(data);
			    				//location.reload();//location.href='./user.php';
			    			}else $('#_status').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no son correctos, asegurate de haber ingresado bien tus datos.</div>');
			    		}
		    		});
		    }else $('#_status').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no son correctos, asegurate de haber ingresado bien tus datos.</div>'); 
		});	
	});
	$('#Add').click(function(){
		
		var switchs= parseInt($('#registerUserLevel').val());
		var empresa= parseInt($('#registerUserEnterprise').val());
		console.log(switchs);
		if(switchs==0 || switchs==1){
			
			
			var Datos = Register_A={ Action : "Add", Name : $('#registerUserName').val(), UserName : $('#registerUserUserName').val(), Mail : $('#registerUserMail').val(), Pass : $('#registerUserPass').val(), Enterprise : empresa, Level:switchs};
			console.log(Datos);
			$.post("./Front.php",
				Datos,
	    		function(data, status){
	    			if(status != "success"){console.log("Error al realizar la peticion.");}
	    			else{
		    			data = JSON.parse(data);
		    			if(Object.keys(data).indexOf('Error') == -1){
		    				console.log(data);
		    				//location.reload();//location.href='./user.php';
		    			}else $('#_status').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no son correctos, asegurate de haber ingresado bien tus datos.</div>');
		    		}
	    		});
	    }else $('#_status').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no son correctos, asegurate de haber ingresado bien tus datos.</div>');
	
		
	});


});
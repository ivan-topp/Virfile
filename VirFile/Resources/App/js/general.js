get = function (id){return document.getElementById(id);}
$(document).ready(function() {
	function ListUsers(){
		var Datos = { Action : "listUsers"};
		$.post("./Front.php",
			Datos, 
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			$('.User').remove();
	    			//console.log("Data: " + data);
	    			data = JSON.parse(data);
	    			$('#UsersList').append('<tr class="User"><td>ELIMINAR</td><td>ID USUARIO </td><td>NOMBRE USUARIO</td><td>CORREO</td></tr>');
	    			data.forEach(function(val, indx){
	    				$('#UsersList').append('<tr class="User"><td><input type="checkbox" id="'+val.ID_User+'" class="'+val.ID_E+','+val.User_Name+'" name="numero[]"></td><td>'+val.ID_User+'</td><td>'+val.User_Name+'</td><td>'+val.Mail+'</td></tr>');
	    				//console.log(val);
	    			});
	    		}
	    });
	}

	function ListEnterprise(){
		var Datos = { Action : "listEnterprise"};
		$.post("./Front.php",
			Datos, 
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			$('.Enterprise').remove();
	    			console.log("Data: " + data);
	    			data = JSON.parse(data);
	    			$('#EnterpriseList').append('<tr class="Enterprise"><td>ELIMINAR</td><td>ID EMPRESA </td><td>NOMBRE EMPRESA</td></tr>');
	    			data.forEach(function(val, indx){
	    				$('#EnterpriseList').append('<tr class="Enterprise"><td><input type="checkbox" id="'+val.ID_E+'" name="numero2[]"></td><td>'+val.ID_E+'</td><td>'+val.Name+'</td></tr>');
	    				//console.log(val);
	    			});
	    		}
	    });
	}
	$('#ListadoEmpresas').click(function(){
		ListEnterprise();
	});
	$('#ListadoUsuarios').click(function(){
		ListUsers();
	});

	$('#LoadEnterprise').click(function(){
		ListEnterprise();
	});


	$('#LoadUsers').click(function (){
		ListUsers();
	});

    $("#Delete").click(function(event){
    	$('.Enterprise').remove();
		$("input:checkbox:checked").each(function() {
			console.log(parseInt($(this).attr('id')));
			 
			var id = $(this).attr('id');
			var Datos = { Action : "deleteUser", ID : parseInt($(this).attr('id')), Name : $(this).attr('class').split(',')[1], empresa : $(this).attr('class').split(',')[0]};
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
		ListUsers();
    	//event.preventDefault();
    });
	$("#DeleteEnterprise").click(function(event){
		$('.User').remove();
		$("input:checkbox:checked").each(function() {
			console.log(parseInt($(this).attr('id')));
			var Datos = { Action : "deleteEnterprise", ID : parseInt($(this).attr('id'))};
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
		ListUsers();
    	//event.preventDefault();
    });
	$('#registerUser').click(function(){
		var switchs= parseInt($('#registerUserLevel').val());
		var empresa= parseInt($('#registerUserEnterprise').val());
		console.log(switchs);
		if(switchs==0 || switchs==1){
			var flag="RegisterUser";
			if(switchs==1){
				flag="RegisterAdmin";
			}
			var Datos = Register_A={ Action : flag, Name : $('#registerUserName').val(), UserName : $('#registerUserUserName').val(), Mail : $('#registerUserMail').val(), Pass : $('#registerUserPass').val(), Enterprise : empresa};
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
    $('#registerAdmin').click(function(){
		var Register_E = { Action : "RegisterEnterprise", Enterprise: $('#registerNameEnterprise').val() };
		var get_E = { Action : "IdEnterpise", Enterprise: $('#registerNameEnterprise').val() };
		var ID;
		var Bandera=false;
		$.post("./Front.php", Register_E,
		   	function(data, status){
		   		if(status != "success"){console.log("Error al realizar la peticion.");}
		   		else{
		   			console.log(data);
		   			data = JSON.parse(data);
		   			if(Object.keys(data).indexOf('Error') == -1){
		   				console.log(data);
		   				Bandera=true;
		   				//location.reload();//location.href='./user.php';
		   			}else $('#_status').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no son correctos, asegurate de haber ingresado bien tus datos.</div>');
		   		}
		   	});
	    setTimeout(function(){
		    if(Bandera){
		    	var Bandera2=false;
			    	$.post("./Front.php", get_E,
						function(data, status){
							if(status != "success"){console.log("Error al realizar la peticion.");}
							else{
								data = JSON.parse(data);
								if(Object.keys(data).indexOf('Error') == -1){
									ID = data.ID_E;
									Bandera2=true;
								}else $('#_status').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no son correctos, asegurate de haber ingresado bien tus datos.</div>');
							}
					});
				setTimeout(function(){
					if(Bandera2){
						$.post("./Front.php", { Action : "RegisterAdmin", Name : $('#registerAdminName').val(), Enterprise : ID, UserName : $('#registerAdminUserName').val(), Mail : $('#registerAdminMail').val(), Pass : $('#registerAdminPass').val()},
						   	function(data, status){
						    	if(status != "success"){console.log("Error al realizar la peticion.");}
						    	else{
						    		console.log(data);
						    		data = JSON.parse(data);
						    		if(Object.keys(data).indexOf('Error') == -1){
						    			console.log(data);//location.reload();//location.href='./user.php';
						    		}else $('#_status').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no son correctos, asegurate de haber ingresado bien tus datos.</div>');
						    	}
						});
					}
				}, 200);
		    }
		}, 200);
	});
});
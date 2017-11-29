get = function (id){return document.getElementById(id);}
$(document).ready(function() {

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
	    				console.log(data);
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
		    	console.log('Geting ID');
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
						console.log('Creating Admin');
						$.post("./Front.php", { Action : "RegisterAdmin", Name : $('#registerAdminName').val(), Enterprise : ID, UserName : $('#registerAdminUserName').val(), Mail : $('#registerAdminMail').val(), Pass : $('#registerAdminPass').val()},
						   	function(data, status){
						    	if(status != "success"){console.log("Error al realizar la peticion.");}
						    	else{
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
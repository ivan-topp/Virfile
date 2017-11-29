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
		var Register_A;
		var ID;
		var Bandera=false;
		setTimeout(function(){$.post("./Front.php", Register_E,
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			data = JSON.parse(data);
	    			if(Object.keys(data).indexOf('Error') == -1){
	    				console.log(data);
	    				Bandera=true;
	    				//location.reload();//location.href='./user.php';
	    			}else $('#_status').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no son correctos, asegurate de haber ingresado bien tus datos.</div>');
	    		}
	    });}, 20);
	    setTimeout(function(){
	    if(Bandera){
	    	var Bandera2=false;
	    	
		    	$.post("./Front.php", get_E,
					function(data2, status2){
						if(status2 != "success"){console.log("Error al realizar la peticion.");}
						else{
							console.log(data2);
							data2 = JSON.parse(data2);
							console.log(data2);
							Bandera2=true;
							//ID = data2.ID_E;
							/*if(Object.keys(data2).indexOf('Error') == -1){
								Register_A={ Action : "RegisterAdmin", Enterprise: ID, Name : $('#registerAdminName').val(), UserName : $('#registerAdminUserName').val(), Mail : $('#registerAdminMail').val(), Pass : $('#registerAdminPass').val() };
								//location.reload();//location.href='./user.php';
							}else $('#_status').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no son correctos, asegurate de haber ingresado bien tus datos.</div>');*/
						}
				});
			
			if(Bandera2){
				$.post("./Front.php", Register_A,
				   	function(data3, status3){
				    	if(status3 != "success"){console.log("Error al realizar la peticion.");}
				    	else{
				    		data3 = JSON.parse(data3);
				    		if(Object.keys(data3).indexOf('Error') == -1){
				    			location.reload();//location.href='./user.php';
				    		}else $('#_status').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Los datos ingresados no son correctos, asegurate de haber ingresado bien tus datos.</div>');
				    	}
				});
			}
	    }}, 20);
		    
	});
});
function Registra(){
	var connect, form, response, result, usuario, name, email, password, confirm_pass;
	usuario = __("Register_User").value;
	name = __("Register_Name").value;
	email = __("Register_Email").value;
	password = __("Register_Pass").value;
	confirm_pass = __("Register_ConfirmPass").value;


	if(usuario != "" && name != "" && email != "" && password != "" && confirm_pass != ""){
		if(password==confirm_pass){
			form = 'usuario='+usuario+'&nombre='+name+'&email='+email+'&password='+password;
			connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
			connect.onreadystatechange = function(){
				if(connect.readyState == 4 && connect.status == 200){
					if(connect.responseText == 1){
						result = '<div class="alert alert-dismissible alert-success">';
				        result += '<h4>Registro Completado!</h4>';
				        result += '<p><strong>Estamos Redireccionandote..</strong></p>';
				        result += '</div>';
				        __('Alerta_Register').innerHTML = result;
				        //location.reload();				//Acá podemos redirigir a la pagina de cuando logeo correctamente.
					}else{
						__('Alerta_Register').innerHTML = connect.responseText;
					}
				}else if(connect.readyState !=4){
					result = '<div class="alert alert-dismissible alert-danger">';
			        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
			        result += '<h4>Procesando...</h4>';
			        result += '<p><strong>Estamos procesando tu registro...</strong></p>';
			        result += '</div>';
			        __('Alerta_Register').innerHTML = result;
				}
			}
			connect.open('POST','ajax.php?mode=register',true);
			connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			connect.send(form);
		}else{
			result = "<div class='alert alert-dismissible alert-danger'>";
			result += "<button type='button' class='close' data-dismiss='alert'>x</button>";
			result += "<strong>Error: </strong> Las Contraseñas no coinciden.";
			result += "</div>";
		    __('Alerta_Register').innerHTML = result;
		}
	}else{
		result = "<div class='alert alert-dismissible alert-danger'>";
		result += "<button type='button' class='close' data-dismiss='alert'>x</button>";
		result += "<strong>Error: </strong> Todos los datos deben estar completados.";
		result += "</div>";
	    __('Alerta_Register').innerHTML = result;
	}
}

function CheckRegister(e){
	if(e.keyCode == 13) {
    	Registra();
  }
}
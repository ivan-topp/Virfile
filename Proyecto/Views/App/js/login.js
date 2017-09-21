function Logea(){
	var connect, form, response, result, usuario, password;
	usuario = __("Login_User").value;
	password = __("Login_Pass").value;
	form = 'usuario='+usuario+'&password='+password;
	connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	connect.onreadystatechange = function(){
		if(connect.readyState == 4 && connect.status == 200){
			if(connect.responseText == 1){
				result = '<div class="alert alert-dismissible alert-success">';
		        result += '<h4>Conectado...</h4>';
		        result += '<p><strong>Estamos Redireccionandote..</strong></p>';
		        result += '</div>';
		        __('Alerta_Login').innerHTML = result;
		        location.reload();				//Acá podemos redirigir a la pagina de cuando logeo correctamente.
			}else{
				__('Alerta_Login').innerHTML = connect.responseText;
			}
		}else if(connect.readyState !=4){
			result = '<div class="alert alert-dismissible alert-warning">';
	        result += '<button type="button" class="close" data-dismiss="alert">x</button>';
	        result += '<h4>Procesando...</h4>';
	        result += '<p><strong>Estamos intentando logearte....</strong></p>';
	        result += '</div>';
	        __('Alerta_Login').innerHTML = result;
		}
	}
	connect.open('POST','ajax.php?mode=login',true);
	connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	connect.send(form);
}

function CheckLogin(e){
	if(e.keyCode == 13) {
    	Logea();
  }
}
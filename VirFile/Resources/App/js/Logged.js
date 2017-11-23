get = function (id){return document.getElementById(id);}
$(document).ready(function() {
    $('#Logout').click(function(event){
    	event.preventDefault();
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
	$('#UploadFile').submit(function(event){
    	event.preventDefault();
    	var input = $('#arch')[0];
    	if('files' in input){
    		if(input.files.length > 0){
    			for(var i = 0; i < input.files.length; i++){
    				var formData = new FormData();
					formData.append('Action','Up');
					formData.append('upload', input.files[i]);
					if(input.files[i].size < 104857600){
				    	$.ajax({
						    url: "./Front.php",
						    data: formData,
						    type: 'POST',
						    contentType: false,
						    processData: false,
						}).done(function(data) {
							  console.log(data);
						});
					}else console.log("El Archivo "+input.files[i].name+" no se ha podido subir por que excede el limite de 100Mb.");
    			}
    		}else console.log("Selecciona 1 o más archivos");	
    	}
	});

	$('#List').click(function(event){
    	var formData = new FormData();
		var Data = { Action : "ListDir"};
		$.post("./Front.php",
			Data,
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			console.log("Data: " + data);
	    			//location.reload();
	    		}
	    });
	});
});
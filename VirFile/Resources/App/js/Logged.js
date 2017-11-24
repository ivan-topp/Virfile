get = function (id){return document.getElementById(id);}
$(document).ready(function() {
	var currentDir = "";
	$.post("./Front.php",
			{Action : "getUserId"},
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			currentDir = data;
	    		}
	        	
	    });

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
		console.log(currentDir);
		$('.contenido').remove();
		var Data = { Action : "ListDir", Directory : currentDir.toString()};
		$.post("./Front.php",
			Data,
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			console.log(data);
	    			data = JSON.parse(data);
	    			for (var i = 0; i < data.length; i++) {
	    				var Archivo = data[i].split('/');
	    				var aux = Archivo[Archivo.length-1].split(',');
	    				if(aux[1]=="File") $('#lista').append('<button class="contenido file" id="'+aux[0]+'">'+aux[0]+'</button>');
	    				else $('#lista').append('<button class="contenido dire" id="'+aux[0]+'">'+aux[0]+'</button>');
	    				console.log("Archivo: " + Archivo[Archivo.length-1]);
	    			}
	    		}
	    });
	});
	$('body').on('click', '.contenido', function(){
		alert($(this).attr('id'));
	});
});
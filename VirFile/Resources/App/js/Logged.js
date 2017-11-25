var get = function (id){return document.getElementById(id);}
var currentDir = "";
var UserId = "";
var selectedContent = [];
var ListDir = function(){
	setTimeout(function(){
		//console.log(currentDir);
		$('.contenido').remove();
		var Data = { Action : "ListDir", Directory : currentDir.toString()};
		$.post("./Front.php",
			Data,
		   	function(data, status){
		   		if(status != "success"){console.log("Error al realizar la peticion.");}
		   		else{
		   			//console.log(data);
		   			data = JSON.parse(data);
		   			if(Object.keys(data).indexOf('Error') == -1){
		   				for (var i = 0; i < data.length; i++) {
			   				var Archivo = data[i].split('/');
			   				var aux = Archivo[Archivo.length-1].split(',');
			   				if(aux[1]=="File") $('#lista').append('<button class="contenido file" id="'+aux[0]+'">'+aux[0]+'</button>');
			   				else $('#lista').append('<button class="contenido dire" id="'+aux[0]+'">'+aux[0]+'</button>');
			   				//console.log("Archivo: " + Archivo[Archivo.length-1]);
			   			}
		   			}else{
		   				console.log(data.Error);
		   			}
		   			
		   		}
		   });
	}, 20);
}
$(document).ready(function() {
	setTimeout(function(){
		$.post("./Front.php",
			{Action : "getUserId"},
	    	function(data, status){
	    		if(status != "success"){console.log("Error al realizar la peticion.");}
	    		else{
	    			currentDir = data;
	    			UserId = data;
	    		}
	        	
	    });
	    ListDir();
	}, 20);
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
		ListDir();
	});
	$('body').on('click', '.contenido', function(){
		if(selectedContent.indexOf($(this).attr('id')) == -1){
			selectedContent.push($(this).attr('id'));
		}else{
			selectedContent.splice(selectedContent.indexOf($(this).attr('id')));
		}
		console.log(selectedContent);
	});
	$('body').on('dblclick', '.dire', function(){
		selectedContent=[];
		currentDir = currentDir + '/' + $(this).attr('id');
		ListDir();
		
	});
	$('#Back').click(function(){
		if(currentDir != UserId){
			var aDir = currentDir.split('/');
			currentDir = '';
			aDir.forEach(function(val, indx){
				if(indx < aDir.length-1){
					currentDir = currentDir + val + '/';
				}
			});
			currentDir = currentDir.substr(0, currentDir.length-1);
			ListDir();
		}else{
			console.log("Last Dir");
		}
	});
	$('#mkdir').click(function(){
		var valid1 = /^[a-zA-ZÀ-ÿ0-9 \u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ0-9 \u00f1\u00d1]*)*[a-zA-ZÀ-ÿ0-9 \u00f1\u00d1]+$/;
		if(valid1.test($('#nameDir').val())){
			setTimeout(function(){
				var Data = { Action : "CreateDir", DirectoryName : currentDir + '/' + $('#nameDir').val().trim()};
				$.post("./Front.php",
					Data,
				   	function(data, status){
				   		if(status != "success"){console.log("Error al realizar la peticion.");}
				   		else{
				   			data = JSON.parse(data);
				   			if(Object.keys(data).indexOf('Error') == -1){
				   				console.log(data);
				   				ListDir();
				   			}else console.log(data.Error);			
				   		}
				   });
			}, 20);
		}else{
			console.log("Error, Solo debe ingresar letras o números (el espacio entremedio de palabras es válido)!");
		}
		
		//console.log($('#nameDir').val());
	});
});
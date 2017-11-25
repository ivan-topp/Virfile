var get = function (id){return document.getElementById(id);}
var currentDir = "";
var UserId = "";
var selectedContent = [];
var valid1 = /^[a-zA-ZÀ-ÿ0-9 \u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ0-9 \u00f1\u00d1]*)*[a-zA-ZÀ-ÿ0-9 \u00f1\u00d1]+$/;
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
		if(selectedContent.indexOf($(this).attr('id') + ', Dire') == -1 && selectedContent.indexOf($(this).attr('id') + ', File') == -1){
			if($(this).attr('id').indexOf('.')>-1) selectedContent.push($(this).attr('id') + ', File');
			else selectedContent.push($(this).attr('id') + ', Dire');
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
			selectedContent=[];
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
		if($('#nameDir').val() != ''){
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
		}
		//console.log($('#nameDir').val());
	});
	$('#remove').click(function(){
		selectedContent.forEach(function (val, indx){
			setTimeout(function(){
				var Data = { Action : "Remove", Content : currentDir + '/' + val.split(',')[0], type : val.split(',')[1].trim()};
				$.post("./Front.php",
					Data,
				   	function(data, status){
				   		if(status != "success"){console.log("Error al realizar la peticion.");}
				   		else{
				   			selectedContent = [];
				   			data = JSON.parse(data);
					   		if(Object.keys(data).indexOf('Error') == -1){
					   			console.log(data);
					   			ListDir();
					   		}else console.log(data.Error);		
				   		}
				   });
			}, 20);
			//val = val.split(',')[0];
			//console.log("Eliminando "+val);
		});
	});
	$('#changeName').click(function(){
		if(selectedContent.length == 1){
			if($('#newName').val()!=""){
				if(valid1.test($('#newName').val())){
					setTimeout(function(){
						var filename = selectedContent[0].split(',')[0].trim();
						console.log((/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : false);
						var extension = (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename)[0] : false;
						if(extension!=false) var Data = { Action : "ChangeName", OldName : currentDir + '/' + selectedContent[0].split(',')[0].trim(), NewName : currentDir + '/' + $('#newName').val().trim() + '.' + extension};
						else var Data = { Action : "ChangeName", OldName : currentDir + '/' + selectedContent[0].split(',')[0].trim(), NewName : currentDir + '/' + $('#newName').val().trim()};
						$.post("./Front.php",
							Data,
						   	function(data, status){
						   		if(status != "success"){console.log("Error al realizar la peticion.");}
						   		else{
						   			data = JSON.parse(data);
							   		if(Object.keys(data).indexOf('Error') == -1){
							   			console.log(data);
							   			ListDir();
							   			selectedContent = [];
							   		}else console.log(data.Error);	
						   		}
						   });
					}, 20);
				}else{
					console.log("Error, Solo debe ingresar letras o números (el espacio entremedio de palabras es válido)!");
				}
			}				
		}else{
			console.log("Por favor selecciona solo un archivo.");
		}
	});
	$('#download').click(function(){
		if(selectedContent.length == 1){
			if(selectedContent[0].split(',')[1].trim() != 'Dire'){
				setTimeout(function(){
					var Datos = { Action : "Download", Name : selectedContent[0].split(',')[0], Path : currentDir + '/' + selectedContent[0].split(',')[0]};
					$.post("./Front.php",
						Datos,
				    	function(data, status){
				    		if(status != "success"){console.log("Error al realizar la peticion.");}
				    		else{
				    			console.log("Data: " + data);
				    			data = JSON.parse(data);
							   	if(Object.keys(data).indexOf('Error') == -1){
							   		console.log(selectedContent[0].split(',')[0]);
							   		$('#downloadAux').removeClass('hidden');
							   		$('#downloadAux').html('<a id="Down" href="http://127.0.0.1:8090/Lenguaje%20de%20Marcado/VirFile/Downloads/'+selectedContent[0].split(',')[0]+'" download="'+selectedContent[0].split(',')[0]+'">Descargar: '+selectedContent[0].split(',')[0]+'</a>');
							   		selectedContent = [];
							   	}else console.log(data.Error);
				    		}
				    });
				}, 20);
			}
		}else console.log("Por favor antes selecciona un archivo.");
	});
	$('#downloadAux').click( function(){
		$('#downloadAux').addClass('hidden');
		$('#Down').remove();
	});
});
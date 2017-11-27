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
			   				if(typeof document.getElementById(aux[0]) !== "undefined"){
			   					if(aux[1]=="Dire") $('#navFile').append('<table class="contenido"><tr><td><img class="dire" id="'+aux[0]+'" src="./Resources/App/images/carpeta.png" alt=""></td></tr><tr><td>'+aux[0]+'</td></tr></table>');
			   				}
			   			}
		   				for (var i = 0; i < data.length; i++) {
			   				var Archivo = data[i].split('/');
			   				var aux = Archivo[Archivo.length-1].split(',');
			   				if(typeof document.getElementById(aux[0]) !== "undefined"){
			   					if(aux[1]=="File") $('#navFile').append('<table class="contenido"><tr><td><img class="file" id="'+aux[0]+'" src="./Resources/App/images/archivo.png" alt=""></td></tr><tr><td>'+aux[0]+'</td></tr></table>');
			   				}
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
	    			ListDir();
	    		}
	    });	
	}, 20);	
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
	$('#Upload').click(function(){
		$('#upError').html('');
    	var input = $('#arch')[0];
    	if('files' in input){
    		if(input.files.length > 0){
    			for(var i = 0; i < input.files.length; i++){
    				var formData = new FormData();
					formData.append('Action','Up');
					formData.append('upload', input.files[i]);
					formData.append('curDir', currentDir);
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
					}else $('#upError').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> No se ha podido subir el archivo porque excede el limite de 100Mb.</div>'); 
    			}
    			ListDir();
    		}else $('#upError').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Por favor, selecciona al menos 1 archivo.</div>');
    	}
    	
	});

	$('#List').click(function(event){
		ListDir();
	});
	$('body').on('click', '.file', function(){
		($(this).parent()).parent().parent().toggleClass('selected');
		if(selectedContent.indexOf($(this).attr('id') + ', File') == -1){
			selectedContent.push($(this).attr('id') + ', File');
		}else{
			selectedContent.splice(selectedContent.indexOf($(this).attr('id') + ', File'), 1);
		}
		console.log(selectedContent);
	});
	$('body').on('click', '.dire', function(){
		($(this).parent()).parent().parent().toggleClass('selected');
		if(selectedContent.indexOf($(this).attr('id') + ', Dire') == -1){
			selectedContent.push($(this).attr('id') + ', Dire');
		}else{
			selectedContent.splice(selectedContent.indexOf($(this).attr('id') + ', Dire'), 1);
		}
		console.log(selectedContent);
	});
	
	$('body').on('dblclick', '.dire', function(){
		selectedContent=[];
		currentDir = currentDir + '/' + $(this).attr('id');
		ListDir();		
	});
	$('#openFolder').click(function(){
		if(selectedContent.length == 1){
			currentDir = currentDir + '/' + selectedContent[0].split(',')[0];
			ListDir();
			selectedContent=[];
		}
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
		$('#newFolderError').html('');
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
					   			}else $('#newFolderError').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> '+data.Error+'</div>');		
					   		}
					   });
				}, 20);
			}else{
				$('#newFolderError').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Solo debe ingresar letras o números (el espacio entremedio de palabras es válido).</div>');
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
				   			//console.log(data);
				   			data = JSON.parse(data);
					   		if(Object.keys(data).indexOf('Error') == -1){
					   			console.log(data);
								
					   		}else console.log(data.Error);
				   		}
				   });
			}, 20);
		});
		ListDir();
	});
	$('#changeName').click(function(){
		$('#editError').html('');
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
							   		}else $('#editError').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> '+data.Error+'</div>');	
						   		}
						   });
					}, 20);
				}else{
					$('#editError').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Solo debe ingresar letras o números (el espacio entremedio de palabras es válido).</div>');
				}
			}				
		}else{
			$('#editError').html('<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a><strong>Error!</strong> Por favor selecciona solo un archivo.</div>');
		}
	});
	$('#download').click(function(){
		$('.Down').remove();
		if(selectedContent.length > 0){
			$('#downloadAux').html('');
			selectedContent.forEach(function(val, indx){
				if(selectedContent[0].split(',')[1].trim() != 'Dire'){
					setTimeout(function(){
						var Datos = { Action : "Download", Name : val.split(',')[0], Path : currentDir + '/' + val.split(',')[0]};
						$.post("./Front.php",
							Datos,
					    	function(data, status){
					    		if(status != "success"){console.log("Error al realizar la peticion.");}
					    		else{
					    			console.log("Data: " + data);
					    			data = JSON.parse(data);
								   	if(Object.keys(data).indexOf('Error') == -1){
								   		console.log(val.split(',')[0]);							   		
								   		$('#downloadAux').append('<a class="Down" href="http://127.0.0.1:8090/Lenguaje%20de%20Marcado/VirFile/Downloads/'+val.split(',')[0]+'" download="'+val.split(',')[0]+'">Descargar: '+val.split(',')[0]+'</a>');
								   		selectedContent = [];
								   	}else console.log(data.Error);
					    		}
					    });
					}, 20);
				}
			});
			
		}else {
			$('.Down').remove();
			$('#downloadAux').html('Por favor selecciona al menos un archivo.');
		}
	});
	$('#arch').change(function(){
		var nFiles = $(this)[0].files.length;
		var size = 0;
		for (var i = 0; i < nFiles; i++) {
			size = size + $(this)[0].files[i].size;
		}
		$('#selecteds').html('Se han seleccionado: ' + nFiles + ' Archivos, Tamaño total: ' + ((size/1024)/1024).toFixed(2) + ' Mb');
	});
});
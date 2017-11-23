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
	    			console.log("Data: " + data);
	    			location.reload();
	    		}
	        	
	    });
	});
	$('#UploadFile').submit(function(event){
    	event.preventDefault();
    	var form = $('form')[0];
		var formData = new FormData();
		formData.append('Action','Up');
		formData.append('upload', $('input[type=file]')[0].files[0]);
    	$.ajax({
		    url: "./Front.php",
		    data: formData,
		    type: 'POST',
		    contentType: false,
		    processData: false,
		}).done(function(data) {
			  console.log(data);
		});
	});
});
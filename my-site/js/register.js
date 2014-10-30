$(document).ready(function(){
    $.get( "/php/register.php", function( data ) {
    	var table = '';
    	for(i = 0; i<data.length; i++) {
    		table += "<option value=" + data[i]['id'] + ">"+ data[i]['company_name'] +"</option>"; 
    	}
    	
    	$("#company").html(table);
    	}, 
    	"json"
    );
    
	$('#error_div').hide();
	$('#form-register').submit(function(){
						
		$('#error_div').show();
		$('#error_div').html('Submitting.....').removeClass('alert-danger').addClass('alert-success');
		
		var name = $('#InputName').val();
		var age = $('#InputAge').val();
		var company = $('#company').val(); 
		var lastname = $('#InputLastName').val();
		
		$.post("/php/processRegistration.php", {
				name:name,
				age:age,
				company: company,
				lastname: lastname
			},
			function(data) {
				if(data == 1) {
					document.location = '/view/list.html';
				}
				else {
					$('#error_div').html(data).removeClass('alert-success').addClass('alert-danger');
				}
			});
		
		return false;	
	});
});
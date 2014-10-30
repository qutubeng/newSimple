$(document).ready(function(){

	$('#error_div').hide();
	$.get( "/php/register.php", function( data ) {
    	var table = '';
    	for(i = 0; i<data.length; i++) {
    		table += "<option value=" + data[i]['id'] + ">"+ data[i]['company_name'] +"</option>"; 
    	}
    	
    	$("#company").html(table);
    	
	}, "json");
	
	$.get( "/php/processEdit.php", function( data ) {
    	$("#InputName").val(data[0]['name']);
    	$("#InputAge").val(data[0]['age']);
    	$("#company").val(data[0]['company']).attr('selected','selected');
    	$("#id").val(data[0]['id']); 
    	$("#InputLastName").val(data[0]['lastname']);	
	}, "json");
	
	$('#form-edit').submit(function() {
		
		$('#error_div').show();
		$('#error_div').html('Editting.....').removeClass('alert-danger').addClass('alert-success');
				
		var id = $('#id').val();
		var name = $('#InputName').val();
		var age = $('#InputAge').val();
		var company = $('#company').val();
		var lastname = $('#InputLastName').val();
		
		$.post("/php/submitEdit.php?id="+id,{
				
				name:name,
				age:age,
				company: company,
				lastname: lastname,
			} ,
			function(data){
				if(data == 1){
					document.location = '/view/list.html';
					//$('#error_div').html("Success").removeClass('alert-danger').addClass('alert-success');
					
				}else{
					$('#error_div').html(data).removeClass('alert-success').addClass('alert-danger');
				}
			});
		return false;
		
	});
});
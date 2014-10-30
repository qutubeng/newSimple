$(document).ready(function(){
	
		$.get( "/php/employeeList.php", function( data ) {
			var table = '';
			for(i = 0; i<data.length; i++) {
				table += "<tr><td>"+data[i]['id']+"</td><td> "+data[i]['name']+" "+ data[i]['lastname']+" </td><td> "+data[i]['age']+" </td><td> " + data[i]['company_name'] +"</td><td><a class = 'btn btn-default btn-edit' id = '"+ data[i]['id'] +"'>Edit</a></td><td><a class= 'btn btn-default btn-del' id='"+data[i]['id']+"'>Delete</a> </td> </tr>";
			}
			
			$("#mrows").html(table);
			run();
		}, "json");

	function run(){
		$('#dataTable').dataTable();
		$('.btn-edit').click(function(){
			var id = $(this).attr('id');
			$.post('/php/processEdit.php', {id:id}, function(){});
			document.location = '/view/edit.html';
			return false;
		});
		
		$('.btn-del').click(function(){
			var id = $(this).attr('id');
			$.post('/php/deleteData.php', {id:id}, function(data){});
			document.location = '/view/list.html';
			return false;
		});
	}
});


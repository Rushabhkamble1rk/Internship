
	$(document).on('click','#btn-add',function(e) {
		var data = $("#register-form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "create.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
					//$('#register-form').modal('hide');
					alert('Data added successfully !'); 
   	                     location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
$(document).on('click','.update',function(e) {
		var id=$(this).attr("data-id");
		/*var firstName=$(this).attr("data-firstName");
		var secondName=$(this).attr("data-secondName");*/
		var phone=$(this).attr("data-phone");
		var email=$(this).attr("data-email");
		
		/*var address=$(this).attr("data-address");*/
		
		$('#id_u').val(id);
	/*	$('#firstname_u').val(firstName);
		$('#secondname_u').val(secondName);*/
		$('#phone_u').val(phone);
		$('#email_u').val(email);
	
	/*	$('#address_u').val(address);*/
	});
	
	$(document).on('click','#update',function(e) {
		var data = $("#update_form").serialize();
		$.ajax({
			data: data,
			type: "post",
			url: "update.php",
			success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						//$('#editEmployeeModal').modal('hide');
						alert('Data updated successfully !'); 
                        location.reload();						
					}
					else if(dataResult.statusCode==201){
					   alert(dataResult);
					}
			}
		});
	});
		

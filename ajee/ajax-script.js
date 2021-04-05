$(document).on('submit','#userForm',function(e){
        e.preventDefault();
       
        $.ajax({
        method:"POST",
        url: "php-script.php",
        data:$(this).serialize(),
        success: function(data){
        $('#msg').html(data);
        $('#userForm').find('input').val('')
    }});

/*$(document).on('submit','#userForm',function(r){
        r.preventDefault();
       
        $.ajax({
        method:"POST",
        url: "table.php",
        data:$(this).serialize(), 
        dataType:"json",
         success: function(data){
         	$('#userForm').attr('disabled',flase);
         	if(data.userid)
         	{
         		var html = '<tr>';
    				html += '<td>'+data.userid+'</td>';
    				 html += '<td>'+data.password+'</td>';
    				 html += '<td>'+data.name+'</td>'
    				 html += '<td>'+data.address+'</td>'
    				 html += '<td>'+data.phone+'</td>'
    				 html += '<td>'+data.country+'</td>'
    				 html += '<td>'+data.state+'</td>'
    				 html += '<td>'+data.city+'</td>'
    				 html += '<td>'+data.branch+'</td>'
    				 html += '<td>'+data.email+'</td>'
    				 html += '<td>'+data.gender+'</td></tr>';
    				 $('#table_data').prepend(html);
         	}
        }   
		});*/
});
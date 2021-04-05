<?php
$connect = new PDO("mysql:host=localhost;dbname=student", "root", "");

$query = "SELECT * FROM studentdetail ORDER BY  DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="styleCss.css">
</head>
<body>
<script src="validation.js"async></script>
<div class="user-detail">
    <p id="msg"></p>
    <form id="userForm" method="POST" onSubmit="return formValidation();">
  <center>  <h1> Student Registeration Form</h1> </center>  
  <hr>  
<label for="userid">User id:</label>
<input type="text" name="userid" size="12" >
<label for="passid">Password:</label>
<input type="password" name="password" size="12" />
<label for="username">Name:</label>
<input type="text" name="name" size="50" />
<label for="address">Address:</label>
<input type="text" name="address" size="50" />
<label for="zip">Phone:</label>
<input type="text" name="phone" />
<label> 
<!-- Country:   
<div id="countryWrap"><select id="country" name="country"></select></div>
state:
<div id="stateWrap"><select id="state" name="state"></select></div>
city:
<div id="cityWrap"><select id="city" name="city">

</select></div>-->

<br>
<br>
  
Branch:  
</label>   
  
<select name="branch">  
<option value="Mechanical engineering.">Mechanical engineering.</option>                     
<option value="Computer Engineering">Computer Engineering</option>  
<option value="Civil engineering.">Civil engineering.</option>  
<option value="Electronic engineering.">electronic engineering.</option>  
<option value="Chemical engineering">Chemical engineering</option>  
<option value="Electrical engineering">Electrical engineering</option>  
n>  
</select>  <br><br>
<label for="email">Email:</label>
<input type="text" name="email" size="50" />
<label>Gender</label>
       <br>
       <br>
         <label >Male
          <input type="radio" checked="checked" name="gender" id="gender" value="Male">
         <span class="checkmark"></span>
     <label >Female
<input type="radio" name="gender" value="Female">
<span class="checkmark"></span>
</label>
</div>
<br>
<br>
  <button type="submit" id="add" >Submit</button>

</form>
<!--====form section start====-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax-script.js"></script>
<table class="table table-striped table-bordered" border='1'>
  
    <thead>
     <tr>
                  <th>Userid</th> 
                <th>Password</th> 
                <th>Name</th> 
                <th>Address</th> 
                <th>Phone</th> 
              <!--  <th>Country</th> 
                <th>State</th>
                <th>City</th>-->
                <th>Branch</th>
                <th>Email</th>
                <th>Gender</th>
          </tr>
              </thead>
    <tbody id="table_data">
    
       
        </tbody>
        </table> 
        </body>
</html>
   <script>
$(document).ready(function(){

$('#country-dropdown').on('change', function() {
var country_id = this.value;
$.ajax({
url: "ajee/ajax1.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#state-dropdown").html(result);
$('#city-dropdown').html('<option value="">Select State First</option>'); 
}
});
});    
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$.ajax({
url: "ajee/ajax1.php",
type: "POST",
data: {
state_id: state_id
},
cache: false,
success: function(result){
$("#city-dropdown").html(result);
}
});
});
 
 $('#userForm').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"php-script.php",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function(){
    $('#add').attr('disabled', 'disabled');
   },
   success:function(data){
    $('#add').attr('disabled', false);
    if(data.userid)
    {
     var html = '<tr>';
            html += '<td>'+data.userid+'</td>';
             html += '<td>'+data.password+'</td>';
             html += '<td>'+data.name+'</td>'
             html += '<td>'+data.address+'</td>'
             html += '<td>'+data.phone+'</td>'
           /*  html += '<td>'+data.country+'</td>'
             html += '<td>'+data.state+'</td>'
             html += '<td>'+data.city+'</td>'*/
             html += '<td>'+data.branch+'</td>'
             html += '<td>'+data.email+'</td>'
             html += '<td>'+data.gender+'</td></tr>';
     $('#table_data').prepend(html);
     $('#userForm')[0].reset();
    }
   }
  })
 });
 
});
</script>




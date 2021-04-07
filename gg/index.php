<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  
  <div class="container" >
    <form id="register-form">
      
   <center><h1>Registration Form</h1></center>   

        <label for ="user">
                FirstName: 
              </label>
      <div class="form-group ">
        <input class="form-control" name="firstName" placeholder="Enter First name" type="text">
      </div>
       <label for ="user">
                Last Name: 
              </label>
     <div class="form-group ">
       <input class="form-control" name="secondName" placeholder="Enter Last name" type="text">
     </div>
         <label for ="user">
                Phone Number: 
              </label>
     <div class="form-group ">
       <input class="form-control" name="phone" placeholder="Enter phone  Number" type="text">
     </div>
 <label for ="user">
                Email: 
              </label>
      <div class="form-group ">
        <input class="form-control" name="email" placeholder="Enter Email address" type="text">
      </div>
     
      
     
   
      <label for ="user">
                Address: 
              </label>

     <div class="form-group ">
       <input class="form-control" name="address" placeholder="Enter address" type="text">
     </div>

    
       </div>
     </div>
      <div>
      <center>  <button type="button" class="btn btn-success" id="btn-add">Add</button></center>
      </form>
    <table class="table">
  <thead class="thead-dark">
    <tr>
                      <th>ID</th>
                     <th>First Name</th> 
                <th>Last Name</th>
             <th>Phone</th> 
           <th>Email</th>
           
                <th>Address</th> 
           
            <th>Action</th>
           </tr>
              </thead>
   <?php
        $result = mysqli_query($conn,"SELECT * FROM `datainsert` ");
          $i=1;
          while($row = mysqli_fetch_array($result)) {
        ?>
        <tr id="<?php echo $row["id"]; ?>">
       
          <td><?php echo $i; ?></td>
         
          <td><?php echo $row["firstName"]; ?></td>
          <td><?php echo $row["secondName"]; ?></td>
        <td><?php echo $row["phone"]; ?></td>
         <td><?php echo $row["email"]; ?></td>
          
          <td><?php echo $row["address"]; ?></td>
          <td>
            <a href="#editEmployeeModal" class="edit" data-toggle="modal">
              <i class="material-icons update" data-toggle="tooltip" 
              data-id="<?php echo $row["id"]; ?>"
                phone="<?php echo $row["phone"]; ?>"
              data-email="<?php echo $row["email"]; ?>"
             
             
              title="Edit"></i>
            </a>
          <a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
             title="Delete"></i></a>
                    </td>

</button>
                    </td>
        </tr>
        <?php
        $i++;
        }
        ?>
        </tbody>
</table>

 <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>
  <script src="ajaxwe.js"></script>
  <script src="validation.js"></script>

  <div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form>
            
          <div class="modal-header">            
            <h4 class="modal-title">Delete User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id_d" name="id" class="form-control">          
            <p>Are you sure you want to delete these Records?</p>
            <p class="text-warning"><small>This action cannot be undone.</small></p>
          </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" class="btn btn-danger" id="delete">Delete</button>
          </div>
          <script >

            $(document).on("click", ".delete", function() { 
    var id=$(this).attr("data-id");
    $('#id_d').val(id);
    
  });
  $(document).on("click", "#delete", function() { 
    $.ajax({
      url: "delete.php",
      type: "POST",
      cache: false,
      data:{
        type:3,
        id: $("#id_d").val()
      },
      success: function(dataResult){
          //$('#deleteEmployeeModal').modal('hide');
          $("#"+dataResult).remove();
          alert('Data updated successfully !'); 
                        location.reload();
      
      }
    });
  });
  </script>
        </form>
      </div>
    </div>
  </div>

  <div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="update_form">
          <div class="modal-header">            
            <h4 class="modal-title">Edit User</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id_u" name="id" class="form-control" required>         
            
            <div class="form-group">
              <label>PHONE</label>
              <input type="phone" id="phone" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" id="email" name="email" class="form-control" required >
            </div>
         
          <div class="modal-footer">
          <input type="hidden" value="2" name="type">
            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
            <button type="button" class="btn btn-info" id="update">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>


</body>
</html>

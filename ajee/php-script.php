<?php

$connect = new PDO("mysql:host=localhost;dbname=student", "root", "");

$data = array(


	':userid'  => $_POST['userid'],
	':password'  => $_POST['password'],
	':name'  => $_POST['name'],
	':address'  => $_POST['address'],
	':phone'  =>$_POST['phone'],
 /* ':country'  =>$_POST['countryname'],
  ':state'  =>$_POST['statename'],
  ':city'  =>$_POST['cityname'],*/
	':branch'  =>$_POST['branch'],
	':email'  =>$_POST['email'],
  ':gender'  =>$_POST['gender']
); 


      $query="INSERT INTO `studentdetail`( userid,password,name,address,phone,/*country,state,city,*/
      branch,email,gender) VALUES(':userid',':password',':name',':address',':phone',
     /* ':country',':state',':city',*/':branch',':email',':gender')";  
      

$statement = $connect->prepare($query);
 
if($statement->execute($data))
{
 $output = array(
  
  'userid'=>$_POST['userid'],
  'password'=>$_POST['password'],
  'name'=>$_POST['name'],
  'address'=>$_POST['address'],
  'phone'=>$_POST['phone'],
 /* 'country'=>$_POST['country'],
  'state'=>$_POST['state'],
  'city'=>$_POST['city'],*/
  'branch'=>$_POST['branch'],
  'email'=>$_POST['email'],
  'gender'=>$_POST['gender']
 );

 echo json_encode($output);
}

    
 

?>
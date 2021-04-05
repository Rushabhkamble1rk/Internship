 
            <?php 
            include('database.php'); 
                $db=$conn;  
           
$result = mysqli_query($conn,"SELECT * FROM studentdetail Order By DESC");

echo "<table border='1'>
<tr>
                  <th>Userid</th> 
                <th>Password</th> 
                <th>Name</th> 
                <th>Address</th> 
                <th>Phone</th> 
                <th>Country</th> 
                <th>State</th>
                <th>City</th>
                <th>Branch</th>
                <th>Email</th>
                <th>Gender</th>
                 <tbody id="table_data">
</tr>";

while($row = mysqli_fetch_array($result))
{
 
                echo "<td>" .$row['userid']. "</td>"; 
                echo "<td>" .$row['password']. "</td>"; 
                echo "<td>" . $row['name']. "</td>";
               echo "<td>" .$row['address']. "</td>";
                echo "<td>" .$row['phone']. "</td>";
                echo "<td>" .$row['country']. "</td>";
                echo "<td>" . $row['state']. "</td>";
                echo "<td>" . $row['city']. "</td>";
                echo "<td>" .$row['branch']. "</td>";
               echo "<td>" . $row['email']. "</td>";
                echo "<td>" . $row['gender']. "</td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($conn); 

             ?> 
 


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

input, select {
  width: 100%;
  padding: 12px 20px;
  margin: 2px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button{
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 2px 0;
  border: none;
  display: inline-block;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding-top:1px;
    padding-bottom: 10px;
  padding-right: 60px;
  padding-left: 60px;
  margin-top:10px;
  margin-left: 30px;
  margin-right: 30px;
  margin-bottom: 70px;
}

a{
  text-decoration: none;
  color: white;
}
</style>
</head>
<body>
  <div>
<h1>Show All Clinics</h1>
<?php
$conn = new mysqli('localhost','root','','covid');
    if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
    }else{
   
 $query = "select * from clinic ";
    $result = $conn->query($query);
    echo "<table>";
    echo "<tr>";
    echo "<th>Clinic Name</th>";
    echo "<th>Contact Number</th>";
    echo "<th>Address</th>";
    echo "<th>Vaccine Brand</th>";
    echo "<th>Longitude</th>";
    echo "<th>Latitude</th>";
    echo "<th>Delete</th>";
    echo "<th>Update</th>";
    echo "</tr>";

     while ($cat = $result->fetch_assoc()) {
     	echo "<tr>";
     	echo "<td>".$cat['clinic_name']."</td>";
    echo "<td>".$cat['contact_number']."</td>";
    echo "<td>".$cat['address']."</td>";
    echo "<td>".$cat['vaccine_brand']."</td>";
    echo "<td>".$cat['longitude']."</td>";
    echo "<td>".$cat['latitude']."</td>";
     echo"<td><button style='background-color: red;color: white'><a href='?id=".$cat['id']."'>Delete</a></button></td>";
            echo "<td><button style='background-color: blue;color: white'><a href='update.php?id=".$cat['id']."'>Update</a></button></td>";
        echo "</tr>";
 }	
 echo "</table>";
  if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $del = "delete from clinic where id = '".$id."'";
        $delete =  $conn->query($del);
        if(!$delete){
            echo $conn->error;
        }else{
           Header("location:show.php");
        }
    }

  if (isset($_POST['back'])) {
  	Header("location:admainPanel.php");
  }  
}


?>
<br><br>
<form method="post">
    <button name="back">back</button>
</form></div>
</body>
</html>



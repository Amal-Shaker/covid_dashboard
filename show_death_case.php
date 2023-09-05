

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
a{
  text-decoration: none;
  color: white;
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
  margin-left: 70px;
  margin-right: 70px;
  margin-bottom: 70px;
}
</style>
</head>
<body>
  <div>
<h1>Show All Death Cases</h1>
<?php
$conn = new mysqli('localhost','root','','covid');
    if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
    }else{
   
 $query = "select * from death_case ";
    $result = $conn->query($query);
    echo "<table>";
    echo "<tr>";
    echo "<th>User id</th>";
    echo "<th>Name</th>";
    echo "<th>Age</th>";
    echo "<th>City</th>";
    echo "<th>Date the case</th>";
    echo "<th>Delete</th>";
    echo "<th>Update</th>";
    echo "</tr>";

     while ($cat = $result->fetch_assoc()) {
     	echo "<tr>";
     	echo "<td>".$cat['id_user']."</td>";
    echo "<td>".$cat['name']."</td>";
    echo "<td>".$cat['age']."</td>";
    echo "<td>".$cat['city']."</td>";
    echo "<td>".$cat['death_date']."</td>";
     echo"<td><button style='background-color: red;color: white'><a href='?id=".$cat['id']."'>Delete</a></button></td>";
            echo "<td><button style='background-color: blue;color: white'><a href='update_death_case.php?id=".$cat['id']."'>Update</a></button></td>";
        echo "</tr>";
 }	
 echo "</table>";
  if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $del = "delete from death_case where id = '".$id."'";
        $delete =  $conn->query($del);
        if(!$delete){
            echo $conn->error;
        }else{
           Header("location:show_death_case.php");
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



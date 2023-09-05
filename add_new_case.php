<?php
$conn = new mysqli('localhost','root','','covid');
    if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
    }else{
if(isset($_POST['add'])){
 $add = "INSERT INTO covid.new_cases VALUES(NULL,".$_POST['id_user'].",'".$_POST['name']."',".$_POST['age'].",'".$_POST['city']."','".$_POST['date_case']."')";
        $result = $conn->query($add);
       
}
if(isset($_POST['back'])){
	Header("location:admainPanel.php");
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
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
  margin-left: 70px;
  margin-right: 70px;
  margin-bottom: 70px;
}
</style>
</head>
<body>
	<div>
<h1>Add New Case</h1>

<form method="post">
	<label>User id:<input type="number" name="id_user"></label><br><br>
		<label>Name:<input type="text" name="name"></label><br><br>

	<label>Age:<input type="number" name="age"></label><br><br>
	<label>City:<input type="text" name="city"></label><br><br>
	<label>Date the Case:<input type="Date" name="date_case" ></label><br><br>
	
<button name="add">Add</button>
<button name="back">back</button>

</form></div>
</body>
</html>

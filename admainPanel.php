<?php
if(isset($_POST['add'])){
	Header("location:add.php");
}

if(isset($_POST['show'])){
	Header("location:show.php");
}
if(isset($_POST['add_new_case'])){
	Header("location:add_new_case.php");
}

if(isset($_POST['show_new_case'])){
	Header("location:show_new_case.php");
}
if(isset($_POST['add_death_case'])){
	Header("location:add_death_case.php");
}

if(isset($_POST['show_death_case'])){
	Header("location:show_death_case.php");
}
if(isset($_POST['logout'])){
  Header("location:start.php");
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
<h1>Hello admain</h1>
<form method="post">
	<button name="add">Add Clinic</button><br><br>
<button name="show">Show All Clinics</button><br><br>
<button name="add_new_case">Add New Case</button><br><br>
<button name="show_new_case">Show All New Case</button><br><br>
<button name="add_death_case">Add Death Case</button><br><br>
<button name="show_death_case">Show All Death Case </button><br><br>
<button name="logout">Log out</button><br><br>

</form>
</div>
</body>
</html>
<?php
$conn = new mysqli('localhost','root','','covid');
    if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
    }else{
if(isset($_POST['add_clinic'])){
 $add = "INSERT INTO covid.clinic VALUES(NULL,'".$_POST['clinic_name']."',".$_POST['contact_number'].",'".$_POST['address']."','".$_POST['vaccine_brand']."','".$_POST['longitude']."','".$_POST['latitude']."')";
        $result = $conn->query($add);
       
}
if(isset($_POST['backTo'])){
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
<h1>Add Clinic</h1>

<form method="post">
	<label>Clinic Name:<input type="text" name="clinic_name"></label><br><br>
	<label>Contact Number:<input type="number" name="contact_number"></label><br><br>
	<label>Address:<input type="text" name="address"></label><br><br>
	<label>Vaccine_Brand:<input type="text" name="vaccine_brand"></label><br><br>
	<label>Longitude:<input type="text" name="longitude"></label><br><br>
	<label>Latitude:<input type="text" name="latitude"></label><br><br>
<button name="add_clinic" id="bt1">Add Clinic</button>
<button name="backTo" id="bt2">Back</button>

</form></div>
</body>
</html>

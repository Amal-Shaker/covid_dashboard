	

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
  padding: 14px 20px ;
  margin: 2px 0px 10px;
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
  padding-right: 60px;
  padding-left: 60px;
  padding-bottom: 10px;
  margin-top:10px;
  margin-left: 70px;
  margin-right: 70px;
  margin-bottom: 70px;
}
</style>
</head>
<body>

<br>
<div>
	<h1 style="font-weight: bold;font-size: 25">Login in </h1>

<form method="post">
	<label>User Name:
		<input type="text" name="name" >
	</label>
	<br>
	<br>
	<label>Password: 
		<input type="password" name="password" >
	</label>
	<br><br>
	<button name="login">Login</button>
  <a href="send_mail.php" style="text-decoration: none;color: green">Forget your password?</a>
</form></div>
<?php 
ob_start();
	$conn = new mysqli('localhost','root','','covid');
    if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
    }else{ 
if(isset($_POST['login'])){
 $query = "select * from admain where 1 ";
    $result = $conn->query($query);
    if (!$result) {
        echo $conn->error;
      }else{

        $cat = $result->fetch_assoc(); 
    
     if($cat['name'] == $_POST['name'] && $cat['password'] == $_POST['password']){
        echo $cat['name'];
      echo $cat['password'];
        Header("location:admainPanel.php");
     }
      }
     
 	
}
}
ob_end_flush();
?>
</body>
</html>

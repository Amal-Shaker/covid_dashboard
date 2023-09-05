<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
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

	

<?php 	
require_once 'mail.php';
  $pass =  rand(100000,999999);
 try{
 	$conn = new mysqli('localhost','root','','covid');
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}else {
	
	  $del = "select * from admain where 1";
	   $resultt = $conn->query($del);
	   if (!$resultt) {
        echo $conn->error;
    } else {
        $cat = $resultt->fetch_assoc();
        $email = $cat['email'];
        $password = $cat['password']; 
    }

    $update = "UPDATE admain set password = '" . $pass . "'where  1";
    $resul = $conn->query($update);

    $mail->setFrom('nodej4582@gmail.com', 'Covid app');
    $mail->addAddress($email);     //Add a recipient
    $mail->Subject = 'New Password';
    $mail->Body    = 'The new password is  <b>'.$pass .'</b>';
 	$mail->send();
echo "<div>";
 	echo'<form method="POST">';
 	echo "<h1>Your new password has been sent to your email</h1>";
 	echo "<button name='goToLogin'>Go to Login</button>";
 	echo "</form>";
echo "</div>";
 	 if (isset($_POST['goToLogin'])) {
     Header("location:start.php");
}
} 

}catch (Exception $e) {
    echo "Message could not be sent";
}
 

?>

</body>
</html>




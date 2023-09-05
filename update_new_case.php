<?php

$conn = new mysqli('localhost','root','','covid');
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}else {
if (isset($_POST['back'])) {
    Header("location:show_new_case.php");
}
?>
<html>
<head>
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
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $del = "select * from new_cases where id = '" . $id . "'";
    $resultt = $conn->query($del);
    if (!$resultt) {
        echo $conn->error;
    } else {
        $cat = $resultt->fetch_assoc();
        $id = $cat['id'];
        $id_user = $cat['id_user'];
        $name= $cat['name'];
        $age = $cat['age'];
        $city = $cat['city'];
        $date_case = $cat['date_case'];
       
    }
}
if (isset($_POST['update'])) {
    
$update = "UPDATE new_cases set id_user = " . $_POST['id_user'] . " ,name ='" . $_POST['name'] . "',age = " . $_POST['age'] . ",city ='" . $_POST['city']."',date_case ='". $_POST['date_case'] . "'where id = " .$GLOBALS['id'] ;
    $resul = $conn->query($update);
    if (!$resul) {
        echo "error";
    } else {
        $GLOBALS['id_user'] =$GLOBALS['name'] =$GLOBALS['age'] =$GLOBALS['city'] =  $GLOBALS['date_case'] =  $GLOBALS['id'] = null;

    }
}
}
        ?>

        <form method='post' id='form'>
            
            User id:<input type='number' name='id_user'value=<?php echo $GLOBALS['id_user'] ?>  ><br><br>
            Name:<input type='text' name='name' value="<?php echo $GLOBALS['name'] ?>"  ><br><br>
             Age:<input type='number' name='age'value=<?php echo $GLOBALS['age'] ?>   ><br><br>
               City:<input type='text' name='city'value="<?php echo $GLOBALS['city'] ?> "  ><br><br>
                 Date case:<input type='Date' name='date_case'value=<?php echo $GLOBALS['date_case'] ?>   ><br><br>
            <button name='update'> update </button>
            <button name='back'> back</button>
        </form></div>

</body>
</html>




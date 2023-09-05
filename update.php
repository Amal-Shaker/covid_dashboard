<?php

$conn = new mysqli('localhost','root','','covid');
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}else {
if (isset($_POST['back'])) {
    Header("location:show.php");
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
    $del = "select * from clinic where id = '" . $id . "'";
    $resultt = $conn->query($del);
    if (!$resultt) {
        echo $conn->error;
    } else {
        $cat = $resultt->fetch_assoc();
        $id = $cat['id'];
        $clinic_name = $cat['clinic_name'];
        $contact_number= $cat['contact_number'];
        $address = $cat['address'];
        $vaccine_brand = $cat['vaccine_brand'];
        $longitude = $cat['longitude'];
        $latitude = $cat['latitude'];
       
    }
}
if (isset($_POST['update'])) {
    
$update = "UPDATE clinic set clinic_name = '" . $_POST['clinic_name'] . "' ,contact_number =" . $_POST['contact_number'] . ",address = '" . $_POST['address'] . "',vaccine_brand = '" . $_POST['vaccine_brand'] . "',longitude ='" . $_POST['longitude']."',latitude ='". $_POST['latitude'] . "'where id = " .$GLOBALS['id'] ;
    $resul = $conn->query($update);
    if (!$resul) {
        echo "error";
    } else {
        $GLOBALS['clinic_name'] =$GLOBALS['contact_number'] =$GLOBALS['address'] =$GLOBALS['longitude'] =  $GLOBALS['latitude'] =  $GLOBALS['id'] =$GLOBALS['vaccine_brand']= null;

    }
}
}
        ?>

        <form method='post' id='form'>
            
            clinic name:<input type='text' name='clinic_name'value="<?php echo $GLOBALS['clinic_name'] ?> "  ><br><br>
            contact number:<input type='number' name='contact_number' value=<?php echo $GLOBALS['contact_number'] ?>  ><br><br>
             address:<input type='text' name='address'value="<?php echo $GLOBALS['address'] ?> "  ><br><br>
              vaccine_brand:<input type='text' name='vaccine_brand'value="<?php echo $GLOBALS['vaccine_brand'] ?> "  ><br><br>
               longitude:<input type='text' name='longitude'value="<?php echo $GLOBALS['longitude'] ?> "  ><br><br>
                 latitude:<input type='text' name='latitude'value="<?php echo $GLOBALS['latitude'] ?> "  ><br><br>
            <button name='update'> update </button>
            <button name='back'> back</button>
        </form>
</div>
</body>
</html>




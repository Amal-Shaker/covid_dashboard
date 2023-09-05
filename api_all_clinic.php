<?php 
$conn = new mysqli('localhost','root','','covid');
$response = array();
    if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
    }else{
   
 $query = "select * from clinic ";
    $result = $conn->query($query);
    if($result){
    	header('Content-type: application/json; charset=UTF-8');
    	// header("content-Type: JSON; charset=UTF-8");
    	$i = 0;
    	while($cat = $result->fetch_assoc()){
    		$response[$i]['id'] = $cat['id'];
    		$response[$i]['clinic_name'] = $cat['clinic_name'];
    		$response[$i]['contact_number'] = $cat['contact_number'];
    		$response[$i]['address'] = $cat['address'];
            $response[$i]['vaccine_brand'] = $cat['vaccine_brand'];
    		$response[$i]['longitude'] = $cat['longitude'];
    		$response[$i]['latitude'] = $cat['latitude'];
$i ++;
    	}
    	echo json_encode($response,JSON_PRETTY_PRINT);
    }
}

?>
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
    	$i = $_GET['id'];
    	while($cat = $result->fetch_assoc()){
    		if($cat['id'] == $i){
    		$response[0]['id'] = $cat['id'];
    		$response[0]['clinic_name'] = $cat['clinic_name'];
    		$response[0]['contact_number'] = $cat['contact_number'];
    		$response[0]['address'] = $cat['address'];
            $response[0]['vaccine_brand'] = $cat['vaccine_brand'];
    		$response[0]['longitude'] = $cat['longitude'];
    		$response[0]['latitude'] = $cat['latitude'];
    		break;
    		}
    		
    	}
    	echo json_encode($response[0],JSON_PRETTY_PRINT);
    }
}

?>
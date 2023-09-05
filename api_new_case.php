<?php
$conn = new mysqli('localhost','root','','covid');
$response = array();

    if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
    }else{
 $query = "select * from new_cases ";
    $result = $conn->query($query);
  if($result){
    	header('Content-type: application/json; charset=UTF-8');
    	$i = 0;
    	$bool = false;
    	while($cat = $result->fetch_assoc()){
    		if(count($response) == 0){
    			 $response[$i]['date_case'] = $cat['date_case'];
    			 $response[$i]['number_of_cases'] = 1;
    			
    		}else{
    			for($j=0; $j<count($response); $j++){
    				if($response[$j]['date_case'] == $cat['date_case']){
    					$response[$j]['number_of_cases']++;
    					$bool = true;
    					break;
    				}
    			}
    			if($bool == false){
    			 $response[$i]['date_case'] = $cat['date_case'];
    			 $response[$i]['number_of_cases'] = 1;
    				
    			}
    			
    		}

 $i ++;
    	}
    	echo json_encode($response,JSON_PRETTY_PRINT);
    }


}

?>
<?php
$conn = new mysqli('localhost','root','','covid');
$response = array();

    if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
    }else{
 $query = "select * from death_case ";
    $result = $conn->query($query);
  if($result){
    	header('Content-type: application/json; charset=UTF-8');
    	$i = 0;
    	$bool = false;
    	while($cat = $result->fetch_assoc()){
    		if(count($response) == 0){
    			 $response[$i]['death_date'] = $cat['death_date'];
    			 $response[$i]['number_of_death'] = 1;
    			
    		}else{
    			for($j=0; $j<count($response); $j++){
    				if($response[$j]['death_date'] == $cat['death_date']){
    					$response[$j]['number_of_death']++;
    					$bool = true;
    					break;
    				}
    			}
    			if($bool == false){
    			 $response[$i]['death_date'] = $cat['death_date'];
    			 $response[$i]['number_of_death'] = 1;
    				
    			}
    			
    		}

 $i ++;
    	}
    	echo json_encode($response,JSON_PRETTY_PRINT);
    }


}

?>
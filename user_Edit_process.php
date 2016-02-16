<?php include('config.php'); ?>
<?php
		$post_date = file_get_contents("php://input");
		$data = json_decode($post_date);
		$id= $data->id;
		$sql = "SELECT * FROM CUSTOMERS where id =".$id;
	

	$result = $conn->query($sql);
    $row = $result->fetch_assoc();
	 if ($result->num_rows > 0) 
        {   

 

                $json_data['is_success']    = 1;
                $json_data['message']       = '';
                $json_data['html']          = $row;
        
            }
            else
            {
                $json_data['is_success']    = 0;
                $json_data['message']       = 'No ';
                $json_data['html']          = '';
            }
	
	
	echo json_encode($json_data);
    exit;

?>	
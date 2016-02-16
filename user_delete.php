<?php include('config.php'); ?>
<?php
		$post_date = file_get_contents("php://input");
		$data = json_decode($post_date);
		 $id= $data->id;
		 $sql = "DELETE FROM CUSTOMERS WHERE id = '$id'";

		if ($conn->query($sql) === TRUE) {
   			$json_data['is_success']    = 1;
		} else {
    		$json_data['is_success']    = 0;
		}
		
		$conn->close();	
		echo json_encode($json_data);
        exit;
	
?>
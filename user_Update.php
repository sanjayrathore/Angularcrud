<?php include('config.php'); ?>
<?php
		$post_date = file_get_contents("php://input");
		$data = json_decode($post_date);
		$id 							 = $data->id;
		$firstname			    		 = $data->firstname;
		$lastname			    		 = $data->lastname;
		$email			    			 = $data->email;
		$dob			    			 = $data->dob;
		$gender			    			 = $data->gender;

		$sql = "UPDATE CUSTOMERS SET firstname='".$firstname."',lastname='".$lastname."', email='".$email."', dob='".$dob."',gender='".$gender."' WHERE id='".$id."'";
		$result = $conn->query($sql);
	
		if ( empty($result)) 
		{
		 	$json_data['is_success']    = 0;

		} 
		else 
		{
			$json_data['is_success']    = 1;
			
		}
		echo json_encode($json_data);
            exit;
           ?>
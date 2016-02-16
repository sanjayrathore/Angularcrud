<?php include('config.php'); ?>
<?php
		$post_date = file_get_contents("php://input");
		$data = json_decode($post_date);
		$id 							 = $data->id;
		$is_enabled                      = $data->is_enabled;

		if ($is_enabled == 1) 
		{
			$is_enabled = 0;
		}
		else
		{
			$is_enabled = 1;
		}
		$sql = "UPDATE CUSTOMERS SET is_enabled='".$is_enabled."' WHERE id='".$id."'";
		$result = $conn->query($sql);
		if ( empty($result)) 
		{
		 	$json_data['is_success']    = 0;


		} 
		else 
		{
			//$json_data['is_success']    = 1;
			$json_data['is_enabled']	=$is_enabled;

			$sql = "SELECT  id,firstname,email,is_enabled FROM CUSTOMERS   ";
            $result = $conn->query($sql);
          
            $rows = '';

            if ($result->num_rows > 0) 
            {   

                while($row = $result->fetch_assoc()) 
                {   
                    $rows[] = $row;
       
                }

                $json_data['is_success']    = 1;
                $json_data['message']       = '';
                $json_data['html']          = $rows;
        
            }
            else
            {
                $json_data['is_success']    = 0;
                $json_data['message']       = 'No ';
                $json_data['html']          = '';
            }
		}
		 $conn->close();
		echo json_encode($json_data);
            exit;
           ?>
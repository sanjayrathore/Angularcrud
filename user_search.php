<?php include('config.php'); ?>
<?php
		$post_date = file_get_contents("php://input");
		$data = json_decode($post_date);
		
        $search = $data->search;

        $sql = "SELECT  id,firstname,email,is_enabled FROM CUSTOMERS  where firstname LIKE '$search%' OR email LIKE '$search%'";

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
                $json_data['message']       = 'No Record Found ';
                $json_data['html']          = '';
            }
            $conn->close();


            echo json_encode($json_data);
            exit;
            
        ?>
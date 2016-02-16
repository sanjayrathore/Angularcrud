
   

 
 <?php include('config.php');  ?>
   
        <?php 
            
            // header("Access-Control-Allow-Origin: *");
            // header("Content-Type: application/json; charset=UTF-8");
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
            $conn->close();


            echo json_encode($json_data);
            exit;
            
        ?>
          
   
        


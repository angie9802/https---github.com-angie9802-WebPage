<?php

    require 'config.php';
    
    
    if(isset($_POST['action'])){
        $sql = "SELECT * FROM data_patienthhs WHERE user_id LIKE !=''";
        $result=$conn->query($query);

        if(isset($_POST['user_id'])){
            $user_id = implode("','", $_POST['user_id']);
            $sql .="AND user_id IN('".user_id."')";
        }
        if(isset($_POST['fecha'])){
            $fecha = implode("','", $_POST['fecha']);
            $sql .="AND fecha IN('".fecha."')";
        }

        $result = $conn->query($sql);
        $output ='';
        
        if($resul->num_row > 0){
            while($row=$resul->fetch_assoc()){
                $output .= '<div class="col-md-3 mb-2">
                <div class="card-deck">
                   <div class="card border-secondary">
           
                       <div class="card-body">
                       
                           <p>
                               ID :'.$row['user_id'].'<br>
                               temperatura(°C) :'.$row['temperatura'].'<br>
                               bpm : '.$row['bpm'].'<br>
                               sO2(%) : '.$row['sO2'].'<br>
                           </p>
                           
                       </div>
                   </div>
               </div>
           </div>';
            }
        }
        else{
            $output = "<h3>No data found</h3>";
        }
        echo $output;
    }

    
?>
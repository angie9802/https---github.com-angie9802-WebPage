<?php
    $conn = new mysqli("aulal.org","emb2020","EmbebidoS","embebidos");
    
    if($conn->connect_error){
        die("Failed to connect".$conn->connect_error);
    }


    
?>
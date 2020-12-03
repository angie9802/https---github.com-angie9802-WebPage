
<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>   

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>



    <body>
        <h3 class="text-center text-light bg-danger p-2">Patients Data</h3>
        <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                
                <h5>Filters Data</h5>
                <hr>
                <h6 class="text-info">Select patient id</h6>
                <ul class="list-group">
                    <?php
                        $sql = " SELECT DISTINCT user_id FROM data_patienthhs ORDER BY user_id";
                        $result=$conn->query($sql);
                        while($row=$result->fetch_assoc()){   
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input data_check" value="<?= 
                                $row['user_id']; ?>" id="user_id"><?= $row['user_id']; ?>
                            </label>
                        </div>
                    </li>
                <?php } ?>
                </ul>
                <hr>
                <h6 class="text-info">Select date</h6>
                <ul class="list-group">
                    <?php
                        $sql = " SELECT DISTINCT fecha FROM data_patienthhs ORDER BY fecha";
                        $result=$conn->query($sql);
                        while($row=$result->fetch_assoc()){   
                    ?>
                    <li class="list-group-item">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input data_check" value="<?= 
                                $row['fecha']; ?>" id="fecha"><?= $row['fecha']; ?>
                            </label>
                        </div>
                    </li>
                <?php } ?>
                </ul>
                

            </div>
            <div class="col-lg-9">
                <h5 class="text-center" id="textChange">All Data</h5>
                <hr>
                <div class="text-center">
                    <img src="images/loader.gif" id="loader" width="200" style="display:none;">
                </div>
                <div class="row" id="result">
                    <?php
                        $sql="SELECT * FROM data_patienthhs";
                        $result=$conn->query($sql);
                        while($row=$result->fetch_assoc()){
                        
                    ?>
                    <div class="col-md-3 mb-2">
                         <div class="card-deck">
                            <div class="card border-secondary">
                    
                                <div class="card-body">
                                
                                    <p> 
                                        ID : <?= $row['user_id']; ?><br>
                                        temperatura(°C) : <?= $row['temperatura']; ?><br>
                                        bpm : <?= $row['bpm']; ?><br>
                                        sO2(%) : <?= $row['sO2']; ?><br>
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div> 
                    <?php } ?>
                <div>
                </div>
            </div>
        </div>
      
        <script type="text/javascript">
            $(document).ready(function(){
                    $(".data_check").click(function(){
                        $("#loader").show();

                        var action = 'data';
                        var user_id = get_filter_text('user_id');
                        var fecha = get_filter_text('fecha');


                        $.ajax({
                            url: 'action.php',
                            method :'POST',
                            data:{action:action,user_id:user_id,fecha:fecha},
                            success:function(response){
                                $("#result").html(response);
                                $("#loader").hide();
                                $("#textChange").text("Filtered Data");
                            }
                        });

                    });
                function get_filter_text(text_id){
                    var filterData = [];
                    $('#'+text_id+':checked').each(function(){
                        filterData.push($(this).val());
                    });
                    return filterData;
                }
            });
        </script>
    </body>
</html>
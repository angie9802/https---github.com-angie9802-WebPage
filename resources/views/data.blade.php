
@extends('layouts.app')
@section('title', 'Data')


@section('content')

    <form class="form-inline">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75 mr-sm-2" type="text" id="patient_id" placeholder="Insert patient ID" aria-label="Search">
        <input class="btn  btn-primary" type="submit" style="margin-right:10px" id="search_patient" value="search">
    </form>
    
    <h1 id="prueba"></h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Temperature</th>
                  <th scope="col">BPM</th>
                  <th scope="col">sO2</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody id="show_patient">
                
              </tbody>
        </table>
      </div>



<script type="text/javascript">
      $(document).ready(function(){
        $("#search_patient").on('click',function(){
            event.preventDefault();
            alert('hola1');
            var id = document.getElementById("patient_id").value;
            if(id !=''){
                alert(id);
                $.ajax({
                url:'get-client-data',
                method:'get',
                dataType: 'JSON',
                success:function(response){
                    alert('llego aca');
                    var data_filter = response.filter( element => element.user_id == id );
                    console.log(data_filter);     
                    var finalTable = ""; 
                    $.each(data_filter,function(data_filter){
                        finalTable += "<tr><th scope=\"row\">"+data_filter.user_id+"</th><td>"+data_filter[2]+"</td><td>"+data_filter.bpm+"</td><td>"+data_filter.sO2+"</td><td>"+data_filter.fecha+"</td></tr>";
                    });
                    $('#show_patient').html(finalTable);
                }
                });
            }
            else{
                alert('Insert an ID');
            }
        });
    });

</script>

@endsection
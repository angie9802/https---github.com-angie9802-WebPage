
@extends('layouts.app')
@section('title', 'Data')


@section('pag_title','Patient Data')



@section('content')
    

        <form class="form-inline d-flex">
            <div class="d-flex justify-content-center">
                <input class="form-control form-control-sm ml-3 w-75 mr-sm-2" type="text" id="patient_id" placeholder="Insert patient ID" aria-label="Search">
            </div>
            <input  class="btn btn-outline-danger rounded-pill" type="submit" style="margin-right:10px; text-align:center" id="search_patient" value="search">
        </form>
    
  
    <div class="table-responsive p-3">
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
           
            var id = document.getElementById("patient_id").value;
            if(id !=''){
                alert(id);
                $.ajax({
                url:'get-client-data',
                method:'get',
                dataType: 'JSON',
                success:function(response){
               
                    var data_filter = response.filter( element => element.user_id == id );
                    alert(data_filter.length);
                   // console.log(data_filter);     
                    var finalTable = ""; 
                    for (let i = 0; i < data_filter.length; i++) {
                        var element = data_filter[i];
                        finalTable += "<tr><th scope=\"row\">"+data_filter[i].user_id+"</th><td>"+data_filter[i].temperatura+"</td><td>"+data_filter[i].bpm+"</td><td>"+data_filter[i].sO2+"</td><td>"+data_filter[i].fecha+"</td></tr>";
                        console.log(element);
                    }
                  
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

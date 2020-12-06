
@extends('layouts.app')
@section('title', 'Data')

@section('corazon')
<a href="/menu">
    <img src="images/corazon.png">
</a>
@endsection
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
                  <th scope="col">Temperature (°C)</th>
                  <th scope="col">BPM</th>
                  <th scope="col">sO2 (%)</th>
                  <th scope="col">Date</th>
                </tr>
              </thead>
              <tbody id="show_patient">
                
              </tbody>
        </table>
      </div>
    
    <div class="panel-body">
         <div id="chart_div" style="width: 100%; height: 600px;"></div>
    </div>


<script type="text/javascript" >

google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawDateChart);

function drawDateChart(chart_data, chart_main_title) {

let jsonData = chart_data;

console.log(typeof(chart_data));

  var data = new google.visualization.DataTable();
  data.addColumn('string', 'date');
  data.addColumn('number', 'Temperature (°C)');
  data.addColumn('number', 'BPM');
  data.addColumn('number', 'sO2 (%)');

    $.each(jsonData, (i, jsonData) => {
        let date = jsonData.fecha;
        let temperatura = parseFloat($.trim(jsonData.temperatura));
        let bpm = parseInt($.trim(jsonData.bpm));
        let sO2 = parseInt($.trim(jsonData.sO2));
        data.addRows([
            [date,temperatura,bpm,sO2]
        ]);

    });


  var options = {
    hAxis: {
      title: 'Time'
    },
    vAxis: {
      title: 'Data Values'
    },
    colors: ['#FF0000', '#25F600','#0026B0']
  };

  var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}




    $(document).ready(function(){
        $("#search_patient").on('click',function(){
            event.preventDefault();
           
            var id = document.getElementById("patient_id").value;
            if(id !=''){
               
                $.ajax({
                url:'get-client-data',
                method:'get',
                dataType: 'JSON',
                success:function(response){
               
                    var data_filter = response.filter( element => element.user_id == id );
                  
                    var data_json = JSON.stringify(data_filter);
                    console.log(typeof(data_filter));
                    var finalTable = ""; 
                    for (let i = 0; i < data_filter.length; i++) {
                        var element = data_filter[i];
                        finalTable += "<tr><th scope=\"row\">"+data_filter[i].user_id+"</th><td>"+data_filter[i].temperatura+"</td><td>"+data_filter[i].bpm+"</td><td>"+data_filter[i].sO2+"</td><td>"+data_filter[i].fecha+"</td></tr>";
                        console.log(element);
                    }
                  
                    $('#show_patient').html(finalTable);
                    
                    drawDateChart(data_filter,'Graphic Data');
                }
                });
            }
            else{
                alert('Insert an ID');
            }
        });



    });

</script>



<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@endsection
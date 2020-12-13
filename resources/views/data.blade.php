
@extends('layouts.app')
@section('title', 'Data')

@section('corazon')
<a href="/menu">
    <img src="images/corazon.png">
</a>
@endsection
@section('pag_title','Sensor Data')



@section('content')
    

        <form class="form-inline d-flex">
            <div class="d-flex justify-content-center">
                <input class="form-control form-control-sm ml-3 w-75 mr-sm-2" type="text" id="patient_id" placeholder="Insert machine ID" aria-label="Search">
            </div>
            <input  class="btn btn-outline-danger rounded-pill" type="submit" style="margin-right:10px; text-align:center" id="search_patient" value="search">
        </form>
    
  
    <div class="table-responsive p-3">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                  <th scope="col">Machine ID</th>
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
    

    <div id="dashboard_div">
      <div id="filter_div"></div>
      <div id="chart_div"></div>
    </div>


<script type="text/javascript" >

google.charts.load('current', {
  callback: drawDashboard,
  packages: ['corechart', 'controls']
});


function drawDashboard(chart_data, chart_main_title) {

let jsonData = chart_data;

console.log(typeof(chart_data));

  var data = new google.visualization.DataTable();
  data.addColumn('date', 'date');
  data.addColumn('number', 'Temperature (°C)');
  data.addColumn('number', 'BPM');
  data.addColumn('number', 'sO2 (%)');

    $.each(jsonData, (i, jsonData) => {

        let timestamp= Date.parse(jsonData.fecha);
        let todate=new Date(timestamp).getDate();
        let tomonth=new Date(timestamp).getMonth();
        let toyear=new Date(timestamp).getFullYear();
        let tohour=new Date(timestamp).getHours();
        let tominute=new Date(timestamp).getMinutes();
        let toseconds=new Date(timestamp).getSeconds();
        let date = new Date(toyear,tomonth,todate,tohour,tominute,toseconds);
      
        let date1 = jsonData.fecha;
        console.log(typeof(date));
        let temperatura = parseFloat($.trim(jsonData.temperatura));
        let bpm = parseInt($.trim(jsonData.bpm));
        let sO2 = parseInt($.trim(jsonData.sO2));
        data.addRows([
            [date,temperatura,bpm,sO2]
        ]);

    });

  

  var dataRangeSlider = new google.visualization.ControlWrapper({
    controlType: 'DateRangeFilter',
    containerId: 'filter_div',
    options: {
      filterColumnLabel: 'date'
    }
  });

  google.visualization.events.addListener(dataRangeSlider, 'ready', function () {
    var state = dataRangeSlider.getState();
    console.log(state.lowValue, state.highValue);
  });

  var lineChart = new google.visualization.ChartWrapper({
    chartType: 'LineChart',
    containerId: 'chart_div',
    options: {
      title: 'Graphic Data',
      width: 1200,
      height: 900,
      chartArea: {
        left: 80,
        top: 50,
        width: '80%',
        height: '80%'
      }
    }
  });

  var dashboard = new google.visualization.Dashboard(document.getElementById('dashboard_div'));
  dashboard.bind(dataRangeSlider, lineChart);
  dashboard.draw(data);
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
               
                    var data_filter = response.filter( element => element.machine_id == id );
                  
                    var data_json = JSON.stringify(data_filter);
                    console.log(typeof(data_filter));
                    var finalTable = ""; 
                    for (let i = 0; i < data_filter.length; i++) {
                        var element = data_filter[i];
                        finalTable += "<tr><th scope=\"row\">"+data_filter[i].machine_id+"</th><td>"+data_filter[i].temperatura+"</td><td>"+data_filter[i].bpm+"</td><td>"+data_filter[i].sO2+"</td><td>"+data_filter[i].fecha+"</td></tr>";
                        console.log(element);
                    }
                  
                    $('#show_patient').html(finalTable);
                    
                    drawDashboard(data_filter,'Graphic Data');
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
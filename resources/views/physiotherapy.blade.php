@extends('layouts.app')
@section('title', 'Physiotherapy')

@section('corazon')
<a href="/menu">
    <img src="images/corazon.png">
</a>
@endsection

@section('pag_title','Physiotherapy')

@section('content')


<form class="form-inline d-flex">
    <div class="d-flex justify-content-center">
        <input class="form-control form-control-sm ml-3 w-75 mr-sm-2" type="text" id="patient_id" placeholder="Insert ID" aria-label="Search">
    </div>
    <input  class="btn btn-outline-danger rounded-pill" type="submit" style="margin-right:10px; text-align:center" id="search_patient" value="search">
</form>


<div class="table-responsive p-3">
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Angular position X</th>
          <th scope="col">Angular position Y</th>
          <th scope="col">Angular position Z</th>
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

google.charts.load('current', {packages: ['corechart','controls']});
google.charts.setOnLoadCallback(drawDateChart);

function drawDateChart(chart_data, chart_main_title) {

let jsonData = chart_data;

console.log(typeof(chart_data));

var data = new google.visualization.DataTable();
data.addColumn('string', 'date');
data.addColumn('number', 'mag_acel');
data.addColumn('number', 'th_x');
data.addColumn('number', 'th_y');
data.addColumn('number', 'th_z');

$.each(jsonData, (i, jsonData) => {
let date = jsonData.fecha;
let mag_acel = parseFloat($.trim(jsonData.mag_acel));
let th_x = parseFloat($.trim(jsonData.th_x));
let th_y = parseFloat($.trim(jsonData.th_y));
let th_z = parseFloat($.trim(jsonData.th_z));
data.addRows([
    [date,mag_acel,th_x,th_y,th_z]
]);

});


var options = {
hAxis: {
title: 'Time', 
},
vAxis: {
title: 'Data Values'
},
colors: ['#FF0000', '#25F600','#0026B0'],
explorer: { 
actions: ['dragToZoom', 'rightClickToReset'],
axis: 'horizontal',
keepInBounds: true,
maxZoomIn: 4.0}
};

  
var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

chart.draw(data, options);
}

///////////////////////////////////

$(document).ready(function(){
$("#search_patient").on('click',function(){
    event.preventDefault();
   
    var id = document.getElementById("patient_id").value;
    if(id !=''){
       
        $.ajax({
        url:'get-client-data-p',
        method:'get',
        dataType: 'JSON',
        success:function(response){
       
            var data_filter = response.filter( element => element.machine_id == id );
          
            var data_json = JSON.stringify(data_filter);
            console.log(typeof(data_filter));
            var finalTable = ""; 
            for (let i = 0; i < data_filter.length; i++) {
                var element = data_filter[i];
                finalTable += "<tr><th scope=\"row\">"+data_filter[i].machine_id+"</th><td>"+data_filter[i].gi_x+"</td><td>"+data_filter[i].gi_y+"</td><td>"+data_filter[i].gi_z+"</td><td>"+data_filter[i].fecha+"</td></tr>";
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
<?php $count = 0; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Survey</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style type="text/css">
        .box{
            width:800px;
            margin:0 auto;
        }
    </style>


</head>
<body>
<br />
<div class="container">
    <h3 align="center">Statistics of survey results "{{\App\Survey::where('id',$id)->value('title')}} with type "radio"</h3><br />

    <div class="panel panel-default">

        <div class="panel-body" align="center">


        </div>
    </div>

</div>

</body>
<script type="text/javascript">
    @foreach($list_answer_radio as $key => $l)
    var analytics{{$key}} = <?php echo json_encode($l); ?>

     google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(function () {
        var data{{$key}} = google.visualization.arrayToDataTable(analytics{{$key}});
        var options{{$key}} = {
            title : 'Percentage: {{$question[$key]->title}} '
        };
        $('.panel-body').append("<div id='pie_chart{{$key}}' style='width:750px; height:450px;'></div>");
        var chart{{$key}} = new google.visualization.PieChart(document.getElementById('pie_chart{{$key}}'));
        chart{{$key}}.draw(data{{$key}}, options{{$key}});
    });
    @endforeach

</script>
</html>

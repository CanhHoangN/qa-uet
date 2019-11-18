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
    @foreach($list_question_textarea as $key => $question)
        <h3>Q: {{$question->title}}</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Answer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list_answer_text = DB::table('answer_survey')->where('question_id',$question->id)->get() as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{DB::table('users')->where('id',$value->user_id)->value('name')}}</td>
                    <td>{{DB::table('users')->where('id',$value->user_id)->value('email')}}</td>
                    <td>{{$value->answer}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endforeach
    @foreach($list_question_text as $key => $question)
        <h3>Q: {{$question->title}}</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Answer</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list_answer_text = DB::table('answer_survey')->where('question_id',$question->id)->get() as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{DB::table('users')->where('id',$value->user_id)->value('name')}}</td>
                    <td>{{DB::table('users')->where('id',$value->user_id)->value('email')}}</td>
                    <td>{{$value->answer}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    @endforeach

    <h3 align="center">Statistics of survey results "{{\App\Survey::where('id',$id)->value('title')}}" with type "radio"</h3><br />
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
            title : 'Percentage: {{$l[0][0]}} '
        };
        $('.panel-body').append("<div id='pie_chart{{$key}}' style='width:750px; height:450px;'></div>");
        var chart{{$key}} = new google.visualization.PieChart(document.getElementById('pie_chart{{$key}}'));
        chart{{$key}}.draw(data{{$key}}, options{{$key}});
    });
    @endforeach

</script>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Maxlength</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-maxlength/1.7.0/bootstrap-maxlength.min.js"></script>
</head>
<body>


<form>
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" class="form-control" >
    </div>
    <div class="form-group">
        <label>Details:</label>
        <textarea class="form-control" maxlength="100"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-success">Submit</button>
    </div>
</form>


<script type="text/javascript">
    $('textarea').maxlength({
        alwaysShow: true,
        threshold: 10,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger",
        separator: ' out of ',
        preText: 'You write ',
        postText: ' chars.',
        validate: true
    });
</script>


</body>
</html>

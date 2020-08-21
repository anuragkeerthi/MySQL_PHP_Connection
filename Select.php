<?php
session_start();
$table_name = $_POST['select'];
$_SESSION['table_name'] = $table_name;
$user_type = $_SESSION['user_type'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Select</title>

    <link href="http://13.229.25.59/assets/css/9lp-20150601.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://13.229.25.59/assets/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400' rel='stylesheet' type='text/css'>
    <link href='jquery.jOrgChart.css' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png"
          href="https://pbs.twimg.com/profile_images/994623983579475971/7OV6VW9r_400x400.jpg"/>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/" style="color:white;">LAMBTON</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="Login.php">Home</a></li>
            </ul>
        </div>
    </div>
</nav>

<div style="padding: 80px 0 40px;" class="container">

    <ol class="breadcrumb">
        <li><a href="Login.php" class="active">Select one of the Tables</a></li>
    </ol>


    <h1>Select Table</h1>
    <hr/>
    <br><br><br><br>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <form class="form-horizontal" method="POST">

                <div class="form-group ">
                    <label class="col-sm-2 control-label">Select</label>
                    <div class="col-sm-10">
                        <select name="select" class="form-control" id="select">
                            <!-- Insert the exact tablenames below in the option tags-->
                            <option>dbusers</option>
                            <option>test</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
                        <br/>&nbsp;<br/>

                    </div>
                </div>
            </form>
            <br><br><br>


        </div>
    </div>

</div>

<hr/>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                &COPY; 2018 Vishwanath Keerthi
                <br/>
                <a href=" " target="_blank">LinkedIn</a>
            </div>

        </div>
    </div>
</footer>
</body>
<?php
if (isset($_POST['submit'])) {

    if ($user_type == 'a' || $user_type == 'A')
        echo " <script>window.location.href =\"Table.php\"; </script> ";
    else
       echo " <script>window.location.href =\"Table_user.php\"; </script> ";

}

?>


</html>

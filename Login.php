<?php
session_destroy();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "Northwind";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>LogIn</title>

    <link href="http://13.229.25.59/assets/css/9lp-20150601.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://13.229.25.59/assets/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400' rel='stylesheet' type='text/css'>
    <link href='jquery.jOrgChart.css' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png"
          href="https://pbs.twimg.com/profile_images/994623983579475971/7OV6VW9r_400x400.jpg"/>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

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
        <li><a href="login.php" class="active">LogIn</a></li>
    </ol>


    <h1>LogIn</h1>
    <hr/>
    <div class="alert alert-danger" style="display:none;">
        <strong>Oops!</strong> your form has errors.
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <br><br><br>
            <form class="form-horizontal" method="POST" action="Login.php">

                <div class="form-group ">
                    <label for="Username" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required="required"
                               value=""
                               id="name" name="username" placeholder="Username ..."/>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="Password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" required="required"
                               id="password" name="password"
                               value=""
                               placeholder="Password ..."/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary"/>
                        <br/>&nbsp;<br/>
                        <small>All fields are required.</small>
                    </div>
                </div>
            </form>


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
$flag = 0;
$user = $_POST['username'];
$pwd = $_POST['password'];
$query = "select * from dbusers";
$result = $run = mysqli_query($conn, $query) or die("Query failed" . mysqli_error());
while ($row = mysqli_fetch_array($result)) {
    if ($user == $row['username'] && $pwd == $row['password']) {
        session_start();
        $user_type = $row['type'];
        $_SESSION['user_type'] = $user_type;
        $flag = 1;
    }
}

if ($flag == 1)
    echo "<script>window.location.href =\"Select.php\"; </script>";
else {
    echo " ";
}

?>

</html>

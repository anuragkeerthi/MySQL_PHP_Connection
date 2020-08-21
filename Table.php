<?php
session_start();
$table_name = $_SESSION['table_name'];
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "Northwind";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>DATABASE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
                <li><a href="Login.php">LogIn</a></li>
                <li><a href="Select.php">Select</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">

    <div class="container">
        <h2>Select one of the Operations</h2><br><br>
        <div class="btn-group btn-group-justified">
            <a href="Table.php?insert" name="insert" class="btn btn-primary">Insert</a>
            <a href="Table.php?update" name="update" class="btn btn-primary">Update</a>
            <a href="Table.php?delete" name="delete" class="btn btn-primary">Delete</a>
        </div>
    </div>
    <br><br>

    <?php
    $sql = "desc $table_name";
    $result = mysqli_query($conn, $sql);

    echo "
<h1 > Table Data :</h1>
<br>
    <table class='table'>
        <thead>
          <tr>
           ";

    while ($row = mysqli_fetch_assoc($result)): ?>
        <th>
            <?php echo $row['Field']; ?>
        </th>
    <?php endwhile;


    echo "  </tr>
        </thead>
        <tbody>

   ";


    $sql = "select * from $table_name";
    $run = mysqli_query($conn, $sql);


    while ($rows = mysqli_fetch_assoc($run)) {
        echo "
         <tr>
         ";

        foreach ($rows as $key => $value) {
            echo '<td>' . $value . '</td>';
        }


        echo "
</tr>
         ";
    }

    echo "</tbody>
    </table>
    ";
    ?>


</body>
</html>

<br><br><br><br>
<?php

if (isset($_GET['update'])) {
    echo "
    <div class=\"form-group\">
    <form class=\"form-horizontal\" method=\"GET\" >
    <label style='font-size:x-large' >Enter Query</label>
    <input name='update_query' class=\"form-control input-lg\" id=\"inputlg\" type=\"text\" value='UPDATE $table_name SET column1=value, column2=value  WHERE some_coloumn=some_value'>
    <br>
    <input  name='update_btn' class=\"btn btn-success\" type=\"submit\" value=\"Execute\">
    </form>
</div>

    
    ";
}

?>

<?php

if (isset($_GET['update_btn'])) {
    $update_query = $_GET['update_query'];
    if (mysqli_query($conn, $update_query)) {
        ?>

        <script>window.location.href = "Table.php"; </script>
        <?php

    }
}

?>


<?php

if (isset($_GET['insert'])) {
    echo "
    <div class=\"form-group\">
    <form class=\"form-horizontal\" method=\"GET\" >
    <label style='font-size:x-large' >Enter Query</label>
    <input name='insert_query' class=\"form-control input-lg\" id=\"inputlg\" type=\"text\" value='INSERT INTO $table_name VALUES (value1, value2, value3,…)'>
    <br>
    <input  name='insert_btn' class=\"btn btn-success\" type=\"submit\" value=\"Execute\">
    </form>
</div>

    
    ";
}
?>

<?php
if (isset($_GET['insert_btn'])) {
    $insert_query = $_GET['insert_query'];
    if (mysqli_query($conn, $insert_query)) {
        ?>

        <script>window.location.href = "Table.php"; </script>
        <?php

    }
}

?>

<?php

if (isset($_GET['delete'])) {
    echo "
    <div class=\"form-group\">
    <form class=\"form-horizontal\" method=\"GET\" >
    <label style='font-size:x-large' >Enter Query</label>
    <input name='delete_query' class=\"form-control input-lg\" id=\"inputlg\" type=\"text\" value='DELETE FROM $table_name WHERE some_column = some_value'>
    <br>
    <input  name='delete_btn' class=\"btn btn-success\" type=\"submit\" value=\"Execute\">
    </form>
</div>

    
    ";
}

?>

<?php
if (isset($_GET['delete_btn'])) {
    $delete_query = $_GET['delete_query'];
    if (mysqli_query($conn, $delete_query)) {
        ?>

        <script>window.location.href = "Table.php"; </script>
        <?php

    }
}

?>


<br><br><br>


</div>
</body>
</html>




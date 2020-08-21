<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "Northwind";
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<html>

<head>
    <title>
        Welcome
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
<div class="container">
    <div class="jumbotron">
        <h1>Database</h1>
    </div>
    <?php
    if ((isset($_GET['edit_id']))){
        $sql = "select * from dbusers where id = '$_GET[edit_id]' ";
        $run = mysqli_query($conn, $sql);
        while ($rows = mysqli_fetch_assoc($run)){
            $id = $rows['id'];
            $username = $rows['username'];
            $password = $rows['password'];
            $type = $rows['type'];
        }
        ?>

        <h2>Update User Details</h2>
        <form class="col-md-6" method="post">
            <div class="form-group">
                <label>ID</label>
                <input type="text" name="edit_id" value=" <?php echo $id;?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="edit_username" value=" <?php echo $username;?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value=" <?php echo $password;?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Type</label>
                <input type="text" name="Edit_type" value=" <?php echo $type;?>" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="hidden"  value="<?php echo $_GET['edit_id']?>" name = "edit_user_id" >
                <input type="submit" value=" Done Updating" name="edit_user_btn" class="btn-btn-danger">
            </div>
        </form>
        <?php
    }
    else{
        ?>
        <h2>Insert User Details</h2>
        <form class="col-md-6" method="post">
            <div class="form-group">
                <label>ID</label>
                <input type="text" name="id1" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username1" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password1" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Type</label>
                <input type="text" name="type1" class="form-control" required>
            </div>
            <div class="form-group">

                <input type="submit"  name="submit_user" class="btn-btn-primary">
            </div>
        </form>
        <?php
    }

    $sql = "select * from dbusers";
    $run = mysqli_query($conn , $sql);

    echo "
    <table class='table'>
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Type</th>
            <th>Update</th>
            <th>Delete</th>
            </tr>
        </thead>
        <tbody>

    ";
    while ($rows = mysqli_fetch_assoc($run)){
        echo "
         <tr>
         <td>$rows[id]</td>
         <td>$rows[username]</td>
         <td>$rows[password]</td>
         <td>$rows[type]</td>
         <td><a href='Welcome.php?edit_id=$rows[id]' class='btn btn-success'>Update</a></td>
         <td><a href='Welcome.php?del_id=$rows[id]' class='btn btn-danger'>Delete</a></td>
</tr>
         ";
    }

    echo "</tbody>
    </table>
    ";
    ?>
</div>

</body>
</html>
<?php

if(isset($_POST['submit_user'])){
    $id1 =$_POST['id1'];
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $type1 = $_POST['type1'];

    $insert_sql = "insert into dbusers(id,username,password,type) values ('$id1','$username1','$password1','$type1')";

    if(mysqli_query($conn,$insert_sql)){
        ?>
        <script>location.reload();</script>
        <?php
    }
}

if( isset($_GET['del_id'])) {
    $delete_sql = "Delete from dbusers where id ='$_GET[del_id]'";
    if(mysqli_query($conn, $delete_sql)){
        ?>

        <script>window.location.href ="Welcome.php"; </script>
        <?php


    }
}

if (isset($_POST['edit_user_btn']))
{
    $edit_id = $_POST['edit_user_id'];
    $edit_username = $_POST['edit_username'];
    $edit_password = $_POST['edit_password'];
    $edit_type1 = $_POST['Edit_type'];

    $update_sql = "update dbusers set id='$edit_id',username='$edit_username',password='$edit_password',type='$edit_type1'where id='$edit_id'";
    if(mysqli_query($conn, $update_sql)){
        ?>

        <script>window.location.href ="Welcome.php"; </script>
        <?php

    }}
?>

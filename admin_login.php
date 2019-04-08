<?php
session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
        $server = "localhost";
        $user = "root";
        $password = "";
        $dbname = "projectofinale_db";
        $conn = mysqli_connect($server,$user,$password, $dbname);


        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM admin where username = '$username'";

        if($result = mysqli_query($conn, $sql)){
            if($result->num_rows > 0 && $result->fetch_assoc()['password'] == $password){

                $_SESSION['username'] = $username;
                
                header('Location: admin_add.php');
            }else{
                echo "<script>alert(\"Username atau Password salah/tidak ada !\");</script>";
            }
        }
    }
?>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>HanPeng Admin Login</title>
</head>
<body>
<form method ="post">
    <div class="container" style ="margin-top : 50px;">

        <div class="jumbotron">
            <h1 class="display-4">HanPeng Admin</h1>
            <p class="lead">This is a login page for HanPeng Admins to edit things needed for HanPengStore.</p>
            
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="username" class="form-control" name="username" aria-describedby="emailHelp" placeholder="Enter username">
            <small id="usernameHelp" class="form-text text-muted">Enter admin username</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
            <small id="passwordHelp" class="form-text text-muted">Enter admin password</small>
        </div>
        
        <input type="submit" value ="Login" class="btn btn-primary btn-block">

    </div>
</form>
</body>
</html>
<?php     

session_start();
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "projectofinale_db";
    $conn = mysqli_connect($server,$user,$password, $dbname);

    if(isset($_SESSION['username']))
    $username = $_SESSION['username'];
    

    if(isset($_POST["insert"]))  
     {    
          $user = $_POST['username'];
          $nama = $_POST['nama'];
          $password = $_POST['password'];
          $query = "SELECT * FROM admin where username = '$user' ";  
          if(mysqli_query($conn, $query)->num_rows == 0)  
          {  
                $sql = "INSERT INTO admin values ('$user', '$nama', '$password')";  
                if(mysqli_query($conn, $sql))  
                {  
                    echo "<script>alert(\"Data inserted ! Admin added !\");</script>";
                }else{
                    echo mysqli_error($conn);
                }
          }else{
               echo "<script>alert(\"Username sudah ada !!  Coba yang lain !\");</script>";
          }
          
     }  

     if(isset($_POST['logout'])){
          session_destroy();
          header('Location: admin_login.php');
     }
?>
<html lang="en">
<head>
    <title>Tambah Admin</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php 
if(isset($_SESSION['username'])){ 
     $sql = "SELECT nama FROM admin where username = '$username'";
     $result = mysqli_query($conn, $sql);
     $nama = $result->fetch_assoc()['nama'];     
     ?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container">
               <a class="navbar-brand" href="#">HP Store</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                         <li class="nav-item">
                         <a class="nav-link" href="admin_add.php">Add Laptop </a>
                         </li>
                         <li class="nav-item">
                         <a class="nav-link" href="admin_manage.php">Manage Laptop</a>
                         </li>
                         <li class="nav-item active">
                         <a class="nav-link" href="tambah_admin.php">Tambah Admin</a>
                         </li>
                         
                    </ul>
                    <!-- <form class="form-inline my-2 my-lg-0">
                         <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> -->
                    </div>
               <h5 class= "display-7 pt-1 pr-4" style="color : white;">Username : <?php echo $username; ?></h5>
               <form class="form-inline my-2 my-lg-0" method ="post">
                    <input class="btn btn-danger my-2 my-sm-0" type="submit" name = "logout" value = "Log Out">
               </form>
          </div>
               
          </nav>
          
          <div class="container">
               <div class="jumbotron jumbotron-fluid"  style = "margin-top: 40px;">
                    <div class="container">
                    <h1 class="display-4">Tambah Admin</h1>
                    <p class="lead">Hello <b><?php echo $nama; ?></b> ;) Mau tambah admin ???</p>
                    </div>
               </div>

          
               <div class="container">
                    <form action="" method = "post" enctype="multipart/form-data">
                    <div class="row">
                         <input type="text" name = "nama" class = "form-row col-5 ml-1" placeholder ="Nama"><br>
                         <input type="text" name = "username" class = "form-row col-3" placeholder = "Username"><br>
                         <input type="text" name ="password" class = "form-row col-3" placeholder = "Password"><br>
                         
                         
                         <br>  
                         <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-warning form-row col-1 ml-3" />              
                    </div>
                         
                    </form>
               </div>
          
          
          <table class="table table-striped"  style = "margin-top: 40px;">  
              <thead class="table-dark" style="background-color : #003366;">
                <tr>
                        <td>Username</td><td>Nama</td>
                    </tr>
              </thead>
            <tbody>
               <?php  
                   $query = "SELECT * FROM admin ORDER BY username";  
                    $result = mysqli_query($conn, $query);  
                    while($row = mysqli_fetch_array($result))  
                    { 
                    echo "  
                         <tr>  
                              <td>
                                   ".$row['username']."
                              </td>
                              <td>
                                   ".$row['nama']."
                              </td>
                              
                               
                          </tr>  
                     ";  
                    }  
               ?>  
               </tbody>
          </table>
          </div>
     <?php } 
     
     else {
          echo "<h1 class ='text-centered'>Please Login from admin_login.php !</h1>";
      }
     
     ?>
     
</body>
</html>

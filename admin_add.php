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
          $kode = $_POST['kode_brg'];
          $merek = $_POST['merek'];
          $nama = $_POST['nama_brg'];
          $core =$_POST['core'];
          $vga = $_POST['vga'];
          $hdd = $_POST['hdd'];
          $ssd = $_POST['ssd'];
          $inch = $_POST['inch'];
          $os = $_POST['os'];
          $price = $_POST['price'];
          //$pic = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  

          $pic = $_FILES['image']['name'];

          $query = "INSERT INTO barang (kode_brg,merek,nama_brg,core,vga,hdd,ssd,inch,os,price,pic) 
          VALUES ('$kode', '$merek', '$nama','$core','$vga','$hdd','$ssd','$inch','$os','$price','$pic')";  
          if(mysqli_query($conn, $query))  
          {  
               move_uploaded_file($_FILES['image']['tmp_name'], "images/$pic");
               echo '<script>alert("Data Inserted into Database")</script>';  
          }else{
               echo mysqli_error($conn);
          }
     }  

     if(isset($_POST['logout'])){
          session_destroy();
          header('Location: admin_login.php');
     }
?>
<html lang="en">
<head>
    <title>Admin Page</title>
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
                         <li class="nav-item active">
                         <a class="nav-link" href="admin_add.php">Add Laptop </a>
                         </li>
                         <li class="nav-item">
                         <a class="nav-link" href="admin_manage.php">Manage Laptop</a>
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
                    <h1 class="display-4">HanPeng Store</h1>
                    <p class="lead">Welcome <b><?php echo $nama; ?></b> ;)</p>
                    </div>
               </div>

          
               <div class="container">
               <form action="" method = "post" enctype="multipart/form-data">
                    <input type="text" name = "kode_brg" class = "form-control" placeholder ="Kode Barang"><br>
                    <input type="text" name = "merek" class = "form-control" placeholder = "Merek"><br>
                    <input type="text" name ="nama_brg" class = "form-control" placeholder = "Nama Barang"><br>
                    <input type="text" name ="core" class = "form-control" placeholder = "Core"><br>
                    <input type="text" name = "vga" class = "form-control" placeholder = "VGA"><br>
                    <input type="text" name = "hdd" class = "form-control" placeholder = "HDD"><br>
                    <input type="text" name ="ssd" class = "form-control" placeholder = "SSD"> <br>
                    <input type="text" name ="inch" class = "form-control" placeholder = "Screen Resolution"><br>
                    <input type="text" name ="os" class = "form-control" placeholder = "Operating System"><br>
                    <input type="text" name = "price" class = "form-control" placeholder = "Price"><br>
                    Picture File : <input type="file" name="image" id="image" >  
                    <br>  
                    <br>  
                    <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info form-control" />              
               </form>
               </div>
          
          </div>
     <?php } 
     
     else {
          echo "<h1 class ='text-centered'>Please Login from admin_login.php !</h1>";
      }
     
     ?>
     
</body>
</html>

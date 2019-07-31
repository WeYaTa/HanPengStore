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
          $ram =$_POST['ram'];
          $vga = $_POST['vga'];
          $hdd = $_POST['hdd'];
          $ssd = $_POST['ssd'];
          $inch = $_POST['inch'];
          $os = $_POST['os'];
          $price = "Rp. ".number_format("".$_POST['price']."",0,"",".").",-";
          //$pic = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  

          $pic1 = $_FILES['image1']['name'];
          $pic2 = $_FILES['image2']['name'];
          $pic3 = $_FILES['image3']['name'];
          $pic4 = $_FILES['image4']['name'];

          $query = "INSERT INTO barang (kode_brg,merek,nama_brg,core,ram,vga,hdd,ssd,inch,os,price,pic1,pic2,pic3,pic4) 
          VALUES ('$kode', '$merek', '$nama','$core','$ram','$vga','$hdd','$ssd','$inch','$os','$price','$pic1','$pic2','$pic3','$pic4')";  
          if(mysqli_query($conn, $query))  
          {  
               move_uploaded_file($_FILES['image1']['tmp_name'], "images/$pic1");
               move_uploaded_file($_FILES['image2']['tmp_name'], "images/$pic2");
               move_uploaded_file($_FILES['image3']['tmp_name'], "images/$pic3");
               move_uploaded_file($_FILES['image4']['tmp_name'], "images/$pic4");
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
    <title>Admin Add</title>
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
                         <li class="nav-item">
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
                    <h1 class="display-4">HanPeng Store</h1>
                    <p class="lead">Welcome <b><?php echo $nama; ?></b> ;)</p>
                    </div>
               </div>

          
               <div class="container">
               <form action="" method = "post" enctype="multipart/form-data">
                    <input type="text" name = "kode_brg" class = "form-control" placeholder ="Kode Barang"><br>
                    <select class="form-control" name = "merek">
                         <option disabled selected value>Merek</option>
                         <option value = "ASUS">ASUS</option>
                         <option value = "Apple">Apple</option>
                         <option value = "MSI">MSI</option>
                         <option value = "Lenovo">Levono</option>
                         <option value = "HP">Dell</option>
                    </select><br>
                    <input type="text" name ="nama_brg" class = "form-control" placeholder = "Nama Barang"><br>
                    <input type="text" name ="core" class = "form-control" placeholder = "Core"><br>
                    <input type="text" name ="ram" class = "form-control" placeholder = "RAM"><br>
                    <input type="text" name = "vga" class = "form-control" placeholder = "VGA"><br>
                    <input type="text" name = "hdd" class = "form-control" placeholder = "HDD"><br>
                    <input type="text" name ="ssd" class = "form-control" placeholder = "SSD"> <br>
                    <input type="text" name ="inch" class = "form-control" placeholder = "Screen Resolution"><br>
                    
                    <select class="form-control" name = "os">
                         <option disabled selected value>Operating System</option>
                         <option value = "Windows 10 PRo 64bit">Windows 10 Pro 64bit</option>
                         <option value = "Windows 10 Home 64bit">Windows 10 Home 64bit</option>
                         <option value = "MacOS Sierra">MacOS Sierra</option>
                         
                    </select><br>
                    <input type="text" name = "price" class = "form-control" placeholder = "Price"><br>
                    Picture Files  : <br>
                    <input type="file" name="image1" id="image1" >  <Br>
                    <input type="file" name="image2" id="image2" >  <br>
                    <input type="file" name="image3" id="image3" >  <br>
                    <input type="file" name="image4" id="image4" >  
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

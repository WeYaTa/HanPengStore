 <?php     
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "projectofinale_db";
    $conn = mysqli_connect($server,$user,$password, $dbname);

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
?>
<html lang="en">
<head>
    <title>Admin Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

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
          </div>
     </nav>
     
     <div class="container">
          <div class="jumbotron jumbotron-fluid"  style = "margin-top: 40px;">
               <div class="container">
               <h1 class="display-4">HanPeng Store</h1>
               <p class="lead">This is the admin page of HP-Store ;)</p>
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
          <!-- <table class="table table-bordered">  
                
               <?php  
                    /*$query = "SELECT * FROM barang ORDER BY kode_brg";  
                    $result = mysqli_query($conn, $query);  
                    while($row = mysqli_fetch_array($result))  
                    { 
                    echo "  
                         <tr>  
                              <td>
                                   ".$row['kode_brg']."
                              </td>
                              <td>
                                   ".$row['merek']."
                              </td>
                              <td>
                                   ".$row['nama_brg']."
                              </td>
                              <td>
                                   ".$row['core']."
                              </td>
                              <td>
                                   ".$row['vga']."
                              </td>
                              <td>
                                   ".$row['hdd']."
                              </td>
                              <td>
                                   ".$row['ssd']."
                              </td>
                              <td>
                                   ".$row['inch']."
                              </td>
                              <td>
                                   ".$row['os']."
                              </td>
                              <td>
                                   ".$row['price']."
                              </td>
                               <td>  
                                    <img src='images/".$row['pic']."' height='200' width='200' class='img-thumnail' />  
                               </td>  
                          </tr>  
                     ";  
                    } */ 
               ?>  
          </table> -->
     </div>
     
</body>
</html>
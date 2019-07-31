<?php     
session_start();
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "projectofinale_db";
    $conn = mysqli_connect($server,$user,$password, $dbname);

    if(isset($_SESSION['username']))
    $username = $_SESSION['username'];

    if(isset($_POST['logout'])){
     session_destroy();
     header('Location: admin_login.php');
}

    if(isset($_POST['sbmt'])){
        $kode_brg = $_POST['kode_brg'];
        $merek = $_POST['merek'];
        $nama_brg = $_POST['nama_brg'];
        $core = $_POST['core'];
        $ram = $_POST['ram'];
        $vga = $_POST['vga'];
        $hdd = $_POST['hdd'];
        $ssd = $_POST['ssd'];
        $os = $_POST['os'];
        $price = $_POST['price'];
        $query = "SELECT * from barang where kode_brg = '$kode_brg'";
        $pic1 = mysqli_query($conn,$query)->fetch_assoc()['pic1'];
        $pic2 = mysqli_query($conn,$query)->fetch_assoc()['pic2'];
        $pic3 = mysqli_query($conn,$query)->fetch_assoc()['pic3'];
        $pic4 = mysqli_query($conn,$query)->fetch_assoc()['pic4'];
        
          if ($_FILES['pic1']['size'] != 0)
          {
               echo "<script>alert(\"Picture 1 Edited!\");</script>";
               if(file_exists('images/'.$pic1)) {
                    unlink('images/'.$pic1); 
               }
               $pic1 = $_FILES['pic1']['name'];
               move_uploaded_file($_FILES['pic1']['tmp_name'], "images/".$pic1);
          }
          if ($_FILES['pic2']['size'] != 0)
          {
               echo "<script>alert(\"Picture 2 Edited !\");</script>";
               if(file_exists('images/'.$pic2)) {
                    unlink('images/'.$pic2); 
               }
               $pic2 = $_FILES['pic2']['name'];
               move_uploaded_file($_FILES['pic2']['tmp_name'], "images/".$pic2);
          }
          if ($_FILES['pic3']['size'] != 0)
          {
               echo "<script>alert(\"Picture 3 Edited!\");</script>";
               if(file_exists('images/'.$pic3)) {
                    unlink('images/'.$pic3); 
               }
               $pic3 = $_FILES['pic3']['name'];
               move_uploaded_file($_FILES['pic3']['tmp_name'], "images/".$pic3);
          }
          if ($_FILES['pic4']['size'] != 0)
          {
               echo "<script>alert(\"Picture 4 Edited!\");</script>";
               if(file_exists('images/'.$pic4)) {
                    unlink('images/'.$pic4); 
               }
               $pic4 = $_FILES['pic4']['name'];
               move_uploaded_file($_FILES['pic4']['tmp_name'], "images/".$pic4);
          }

          $sql = "UPDATE barang SET
               merek = '$merek',
               nama_brg = '$nama_brg',
               core = '$core',
               ram = '$ram',
               vga = '$vga' , 
               hdd = '$hdd' ,
               ssd = '$ssd',
               os = '$os',
               price = '$price',
               pic1 = '$pic1',
               pic2 = '$pic2',
               pic3 = '$pic3', 
               pic4 = '$pic4' 
               where kode_brg = '$kode_brg'";
          

        if(mysqli_query($conn,$sql)) echo "<script>alert(\"Update Success\");</script>";
     }

     if (isset($_POST['search'])) {
          $cari = $_POST['search_bar'];
          switch ($_POST['choice']) {
               
               case 'kode_brg':
                    $query = "SELECT * FROM barang where kode_brg LIKE '%$cari' OR kode_brg LIKE '%$cari%' OR kode_brg LIKE '$cari%' ORDER BY kode_brg"; 
                    break;
               case 'merek':
                    $query = "SELECT * FROM barang where merek LIKE '%$cari' OR merek LIKE '%$cari%' OR merek LIKE '$cari%' ORDER BY merek"; 
                    break;
               case 'nama':
                    $query = "SELECT * FROM barang where nama_brg LIKE '%$cari' OR nama_brg LIKE '%$cari%' OR nama_brg LIKE '$cari%' ORDER BY nama_brg"; 
                    break;
               case 'core':
                    $query = "SELECT * FROM barang where core LIKE '%$cari' OR core LIKE '%$cari%' OR core LIKE '$cari%' ORDER BY core"; 
                    break;
               case 'ram':
                    $query = "SELECT * FROM barang where ram LIKE '%$cari' OR ram LIKE '%$cari%' OR ram LIKE '$cari%' ORDER BY ram"; 
                    break;
               case 'vga':
                    $query = "SELECT * FROM barang where vga LIKE '%$cari' OR vga LIKE '%$cari%' OR vga LIKE '$cari%' ORDER BY vga"; 
                    break;          
               case 'hdd':
                    $query = "SELECT * FROM barang where hdd LIKE '%$cari' OR hdd LIKE '%$cari%' OR hdd LIKE '$cari%' ORDER BY hdd"; 
                    break;
               case 'ssd':
                    $query = "SELECT * FROM barang where ssd LIKE '%$cari' OR ssd LIKE '%$cari%' OR ssd LIKE '$cari%' ORDER BY ssd"; 
                    break;
               case 'inch':
                    $query = "SELECT * FROM barang where inch LIKE '%$cari' OR inch LIKE '%$cari%' OR inch LIKE '$cari%' ORDER BY inch"; 
                    break;
               case 'os':
                    $query = "SELECT * FROM barang where os LIKE '%$cari' OR os LIKE '%$cari%' OR os LIKE '$cari%' ORDER BY os"; 
                    break;               
                    
               default:
                    $query = "SELECT * FROM barang ORDER BY kode_brg"; 
                    break;
          }
     }else {
          $query = "SELECT * FROM barang ORDER BY kode_brg";
     }
?>
<head>
    <title>Admin Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
     button a{
          color : white;
     }

     button a:hover{
          color : black;
     }

</style>
<body>
<?php 
          if(isset($_SESSION['username'])){ 
        
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
                    <li class="nav-item active">
                    <a class="nav-link" href="admin_manage.php">Manage Laptop</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="tambah_admin.php">Tambah Admin</a>
                    </li>
               </ul>
               
          </div>
          <h5 class= "display-7 pt-1 pr-4" style="color : white;">Username : <?php echo $username; ?></h5>
               <form class="form-inline my-2 my-lg-0" method ="post">
                    <input class="btn btn-danger my-2 my-sm-0" type="submit" name = "logout" value = "Log Out">
               </form>
          </div>
     </nav>
     
     <div class="container">
        <form  style = "margin-top: 40px;" method = "POST">
            <div class="form-row">
                <div class="col-9">
                    <input type="text" class="form-control" placeholder="Search For Laptops" name = "search_bar">
                </div>
                <div class="col-2">
                <select id="inputState" class="form-control" name ="choice" >
                    <option selected value = "kode_brg">Kode_Barang</option>
                    <option value = "merek">Merek</option>
                    <option value = "nama">Nama</option>
                    <option value = "core">Core</option>
                    <option value = "ram">RAM</option>
                    <option value = "vga">VGA</option>
                    <option value = "hdd">HDD</option>
                    <option value = "ssd">SSD</option>
                    <option value = "inch">Inch</option>
                    <option value = "os">Operating System</option>
                </select>
                </div>
                <div class="col">
                <input type="submit" class="btn btn-warning " name = "search" value ="Search"> 
                </div>
            </div>
        </form>
     </div>

     <table class="table table-striped"  style = "margin-top: 40px;">  
              <thead class="table-dark" style="background-color : #003366;">
                <tr>
                <td colspan = '2'>Action</td><td>Kode_Barang</td><td>Merek</td><td>Nama Barang</td><td>Core</td><td>RAM</td><td>VGA</td><td>HDD</td><td>SSD</td>
                        <td>Resolution</td><td>Operating System</td><td>Harga</td><td>Picture1</td><td>Picture2</td><td>Picture3</td>
                    </tr>
              </thead>
            <tbody>
               <?php  
                   // $query = "SELECT * FROM barang ORDER BY kode_brg";  
                    $result = mysqli_query($conn, $query);  
                    while($row = mysqli_fetch_array($result))  
                    { 
                    echo "  
                         <tr>  
                         <td>
                         <button type='button' class='btn btn-success text-decoration-none'><a class = 'text-decoration-none' href = 'admin_edit.php?act=edit&id=".$row['kode_brg']."'>Edit</a></button>
                        </td>
                        
                        
                         <td>  
                         <button type='button' class='btn btn-danger '><a class = 'text-decoration-none' href = 'admin_edit.php?act=delete&id=".$row['kode_brg']."'>Delete</a></button> 
                         </td> 
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
                                   ".$row['ram']."
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
                                    <a target = '_blank' href = 'images/".$row['pic1']."'>".$row['pic1']."</a>
                               </td>  
                               <td>  
                               <a target = '_blank' href = 'images/".$row['pic2']."'>".$row['pic2']."</a>
                              </td> 
                              <td>  
                                    <a target = '_blank' href = 'images/".$row['pic3']."'>".$row['pic3']."</a>
                               </td>  
                           
                               
                          </tr>  
                     ";  
                    }  
               ?>  
               </tbody>
          </table>
          <?php } 
     
     else {
          echo "<h1 class ='text-centered'>Please Login from admin_login.php !</h1>";
      }
     
     ?>
</body>
</html>

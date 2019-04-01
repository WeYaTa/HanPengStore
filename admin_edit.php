<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "projectofinale_db";
    $conn = mysqli_connect($server,$user,$password, $dbname);
    $sql = "SELECT * FROM barang where kode_brg ="."'".$_GET['id']."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    if(isset($_GET['act']) &&  $_GET['act'] == "edit"){
        echo "
                <div class='jumbotron jumbotron-fluid'>
                <div class='container'>
                <h1 class='display-4'>Edit Page</h1>
                <p class='lead'>This is a Edit page for id  ".$row['kode_brg']." Laptop </p>
                </div>
            </div>
            <div class = 'container'>
                <form action = 'admin_manage.php' method ='POST' enctype='multipart/form-data'>
                    <input type = 'hidden' name = 'kode_brg' value ='".$row['kode_brg']."'>
                    kode_brg : <input type = 'text' class = 'form-control' value ='".$row['kode_brg']."' disabled><br>
                    merek : <input type = 'text' class = 'form-control' name = 'merek' value ='".$row['merek']."'><br>
                    nama_brg <input type = 'text' class = 'form-control' name = 'nama_brg' value ='".$row['nama_brg']."'><br>
                    core  : <input type = 'text' class = 'form-control'  name = 'core' value ='".$row['core']."'><br>
                    vga   :<input type = 'text' class = 'form-control'  name = 'vga' value ='".$row['vga']."'><br>
                    hdd   : <input type = 'text' class = 'form-control' name = 'hdd' value ='".$row['hdd']."'><br>
                    ssd   : <input type = 'text' class = 'form-control' name = 'ssd' value ='".$row['ssd']."'><br>
                    inch  : <input type = 'text' class = 'form-control'  name = 'inch' value ='".$row['inch']."'><br>
                    os    : <input type = 'text'  class = 'form-control' name = 'os' value ='".$row['os']."'><br>
                    price : <input type = 'text'  class = 'form-control' name = 'price' value ='".$row['price']."'><br>
                    pic   : <input type = 'file' class = 'form-control-file'  id='exampleFormControlFile1' name = 'pic' value ='".$row['pic']."'><br>
                    <input type='submit' name='sbmt' id='insert' value='submit' class='btn btn-info form-control' /> 
                </form>
                
            </div>
        ";
    }else if(isset($_GET['act'])&& $_GET['act'] == "delete"){
        $sql = "DELETE FROM barang where kode_brg ="."'".$_GET['id']."'";

        if(mysqli_query($conn,$sql)){
            echo "<h1>Record deleted Succesfully</h1>";
            echo "<button><a href='admin_manage.php'>way back home</button>";
        }else{
            echo "Error deleting record: " . $conn->error;
        }
    }
?>
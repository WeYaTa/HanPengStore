<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<title>Edit HanPeng</title>
<?php 
session_start();
    $server = "localhost";
    $user = "root";
    $password = "";
    $dbname = "projectofinale_db";
    $conn = mysqli_connect($server,$user,$password, $dbname);

    if(isset($_GET['id'])){
    $sql = "SELECT * FROM barang where kode_brg ="."'".$_GET['id']."'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    
    if(isset($_GET['act']) &&  $_GET['act'] == "edit"){
        echo "
            <div class='jumbotron jumbotron-fluid'>
                <div class = 'container'>
                <div class ='form-row'>
                    <div class='col-11'>
                    <h1 class='display-4'>Edit Page</h1>
                    <p class='lead'>This is a Edit page for id  ".$row['kode_brg']." Laptop </p>
                    </div>
                    <div class = 'col-1'>
                    <input style='margin-top:30px;' type='submit' class='btn btn-danger btn-lg' id = 'back' value ='Back'> 
                    </div>
                </div>
                </div>
            </div>
            <div class = 'container'>
                <form action = 'admin_manage.php' method ='POST' enctype='multipart/form-data'>
                    <input type = 'hidden' name = 'kode_brg' value ='".$row['kode_brg']."'>
                    Kode Barang : <input type = 'text' class = 'form-control' value ='".$row['kode_brg']."' disabled><br>
                    Merek : <input type = 'text' class = 'form-control' name = 'merek' value ='".$row['merek']."'><br>
                    Nama Barang <input type = 'text' class = 'form-control' name = 'nama_brg' value ='".$row['nama_brg']."'><br>
                    Core  : <input type = 'text' class = 'form-control'  name = 'core' value ='".$row['core']."'><br>
                    RAM  : <input type = 'text' class = 'form-control'  name = 'ram' value ='".$row['ram']."'><br>
                    VGA   :<input type = 'text' class = 'form-control'  name = 'vga' value ='".$row['vga']."'><br>
                    HDD   : <input type = 'text' class = 'form-control' name = 'hdd' value ='".$row['hdd']."'><br>
                    SSD   : <input type = 'text' class = 'form-control' name = 'ssd' value ='".$row['ssd']."'><br>
                    Screen Resolution  : <input type = 'text' class = 'form-control'  name = 'inch' value ='".$row['inch']."'><br>
                    Operating System    : <input type = 'text'  class = 'form-control' name = 'os' value ='".$row['os']."'><br>
                    Price : <input type = 'text'  class = 'form-control' name = 'price' value ='".$row['price']."'><br>
                    Picture Files   : <br><input type = 'file' class = 'form-control-file' name = 'pic1'/> <input type = 'file' class = 'form-control-file' name = 'pic2'/> <input type = 'file' class = 'form-control-file' name = 'pic3'/><input type = 'file' class = 'form-control-file' name = 'pic4'/><br>
                    <input type='submit' name='sbmt' id='insert' value='Confirm Edit' class='btn btn-info form-control' /> 
                </form>
                
            </div>
        ";
    }else if(isset($_GET['act'])&& $_GET['act'] == "delete"){
        $sql = "DELETE FROM barang where kode_brg ="."'".$_GET['id']."'";

        if(mysqli_query($conn,$sql)){
            echo "<div class= 'jumbotron'><h1>Record Deleted Succesfully</h1>
           <button class = 'btn btn-danger'><a href='admin_manage.php'>Back</button></div>";
        }else{
            echo "Error deleting record: " . $conn->error;
        }
    }
}else{
    echo "<h1 class ='text-centered'>Please Login from admin_login.php !</h1>";
}
?>
<script>
    $("#back").click(function(){
        window.location.replace('admin_manage.php');
    });
</script>


<?php
    function conn(){
        $server = "localhost";
        $user = "root";
        $password = "";
        $dbname = "projectofinale_db";
        $conn = mysqli_connect($server,$user,$password, $dbname);
        return $conn;
    }

    function getRandomLaptop(){
        $conn = conn();
        $arr= array();
        $sql = "SELECT * FROM barang ORDER BY RAND() LIMIT 6";
        if($result = mysqli_query($conn, $sql)){
            for($i = 0; $row = mysqli_fetch_assoc($result); $i++){
                $arr[$i] =  array($row['kode_brg'],$row['merek'],$row['nama_brg'],$row['core'],$row['ram'],$row['vga'],$row['hdd'],$row['ssd'],$row['inch'],$row['os'],$row['price'],$row['pic1'],$row['pic2'],$row['pic3'],$row['pic4']);
            }
        }
        return $arr;
    }
?>
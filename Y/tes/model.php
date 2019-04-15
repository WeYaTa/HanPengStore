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

    function getAllLaptop(){
        $conn = conn();
        $arr= array();
        $sql = "SELECT * FROM barang ORDER BY RAND()";
        if($result = mysqli_query($conn, $sql)){
            for($i = 0; $row = mysqli_fetch_assoc($result); $i++){
                $arr[$i] =  array($row['kode_brg'],$row['merek'],$row['nama_brg'],$row['core'],$row['ram'],$row['vga'],$row['hdd'],$row['ssd'],$row['inch'],$row['os'],$row['price'],$row['pic1'],$row['pic2'],$row['pic3'],$row['pic4']);
            }
        }
        return $arr;
    }

    function searchLaptop($cari){
        $conn = conn();
        $arr= array();
        $sql = "SELECT * FROM barang where kode_brg LIKE '%$cari' OR kode_brg LIKE '%$cari%' OR kode_brg LIKE '$cari%' OR merek LIKE '%$cari' OR merek LIKE '%$cari%' OR merek LIKE '$cari%'
                OR nama_brg LIKE '%$cari' OR nama_brg LIKE '%$cari%' OR nama_brg LIKE '$cari%' OR core LIKE '%$cari' OR core LIKE '%$cari%' OR core LIKE '$cari%'
                OR ram LIKE '%$cari' OR ram LIKE '%$cari%' OR ram LIKE '$cari%' OR vga LIKE '%$cari' OR vga LIKE '%$cari%' OR vga LIKE '$cari%'
                OR hdd LIKE '%$cari' OR hdd LIKE '%$cari%' OR hdd LIKE '$cari%' OR ssd LIKE '%$cari' OR ssd LIKE '%$cari%' OR ssd LIKE '$cari%'
                OR inch LIKE '%$cari' OR inch LIKE '%$cari%' OR inch LIKE '$cari%' OR os LIKE '%$cari' OR os LIKE '%$cari%' OR os LIKE '$cari%'
        ";
        if($result = mysqli_query($conn, $sql)){
            for($i = 0; $row = mysqli_fetch_assoc($result); $i++){
                $arr[$i] =  array($row['kode_brg'],$row['merek'],$row['nama_brg'],$row['core'],$row['ram'],$row['vga'],$row['hdd'],$row['ssd'],$row['inch'],$row['os'],$row['price'],$row['pic1'],$row['pic2'],$row['pic3'],$row['pic4']);
            }
        }
        return $arr;
    }

    function getLaptopByID($id){
        $conn = conn();
       
        $sql = "SELECT * FROM barang where kode_brg = '$id'";
        if($result = mysqli_query($conn, $sql)){
            $row = mysqli_fetch_assoc($result);
            $arr =  array($row['kode_brg'],$row['merek'],$row['nama_brg'],$row['core'],$row['ram'],$row['vga'],$row['hdd'],$row['ssd'],$row['inch'],$row['os'],$row['price'],$row['pic1'],$row['pic2'],$row['pic3'],$row['pic4']);
            
        }
        return $arr;
    }
?>
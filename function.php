<?php

    include('config.php');
    
    function addTransaksi($data){
        global $conn;
    
        $IDPenyewa = $data['ID_penyewa'];
        $IDLapangan = $data['ID_lapangan'];
        $tanggal = $data['tanggal'];
        $start = $data['start'];
        $finish = $data['finish'];
        $metode = $data['metode'];
        
    
    
        $query = "CALL add_transaksi('$IDPenyewa','$IDLapangan', '$tanggal', '$start', '$finish', '$metode')";
        $result = mysqli_query($conn, $query);
    
    
        $isSucceed = mysqli_affected_rows($conn);
    
    
        return $isSucceed;
    }

    function readTransaksi($data){
        global $conn;

        $query = "SELECT transaksi.* FROM transaksi";
        $result = mysqli_query($conn, $query);
        
        return $result;
    }

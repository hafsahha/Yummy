<?php

    include('config.php');
    
    function addTransaksi($data){
        global $conn;
    
        $IDPenyewa = $data['ID_penyewa'];
        $IDLapangan = $data['ID_lapangan'];
        $tanggal = $data['tanggal_transaksi'];
        $start = $data['waktu_mulai'];
        $finish = $data['waktu_selesai'];
        $metode = $data['metode_pembayaran'];    
    
        $query = "CALL add_transaksi('$IDPenyewa', '$IDLapangan', '$tanggal', '$start', '$finish', '$metode')";
        $result = mysqli_query($conn, $query);
    
        $isSucceed = mysqli_affected_rows($conn);
    
        return $isSucceed;
    }

    function readTransaksi(){
        global $conn;

        $query = "SELECT transaksi.* FROM transaksi";
        $result = mysqli_query($conn, $query);
        
        return $result;
    }

    function addPenyewa($data){
        global $conn;
    
        $nama = $data['nama'];
        $noHP = $data['no_hp'];
        $member = $data['membership'];
    
        $query = "CALL add_penyewa('$nama', '$noHP', $member)";
        $result = mysqli_query($conn, $query);
    
        $isSucceed = mysqli_affected_rows($conn);
    
        return $isSucceed;
    }

    function addMembership($data){
        global $conn;
    
        $query = "UPDATE penyewa SET membership = 1 WHERE ID = $data";
        $result = mysqli_query($conn, $query);
    
        $isSucceed = mysqli_affected_rows($conn);
    
        return $isSucceed;
    }

    function readPenyewa(){
        global $conn;
    
        $query = "SELECT * FROM penyewa";
        $result = mysqli_query($conn, $query);
    
        return $result;
    }    

    function findPenyewa($data){
        global $conn;
    
        $query = "SELECT ID FROM penyewa WHERE nama = '$data' LIMIT 1";
        $result = mysqli_query($conn, $query);
    
        return $result;
    }    
    
    function addLapangan($data){
        global $conn;
    
        $jenisLapangan = $data['jenis_lapangan'];
        $jenisOlahraga = $data['jenis_olahraga'];
        $fasilitas = $data['fasilitas_umum'];
        $harga = $data['harga'];
        $pj = $data['ID_PJ'];
    
        $query = "CALL add_lapangan('$jenisLapangan', '$jenisOlahraga', '$fasilitas', $harga, $pj)";
        $result = mysqli_query($conn, $query);
        
        $isSucceed = mysqli_affected_rows($conn);
        
        return $isSucceed;
        }

    function readLapangan(){
        global $conn;
        
        $query = "SELECT * FROM lapangan";
        $result = mysqli_query($conn, $query);
        
        return $result;
    }

    function findLapangan($data){
        global $conn;
    
        $query = "SELECT * FROM lapangan WHERE ID = '$data' LIMIT 1";
        $result = mysqli_query($conn, $query);
    
        return mysqli_fetch_assoc($result);
    }    

    function readActiveLapangan(){
        global $conn;
    
        $query = "SELECT * FROM lapangan WHERE status = 1";
        $result = mysqli_query($conn, $query);
    
        return $result;
    }
    
    function addFasilitas($data){
        global $conn;
    
        $nama = $data['nama_fasilitas'];
        $harga = $data['harga'];
    
        $query = "CALL add_fasilitas('$nama', $harga)";
        $result = mysqli_query($conn, $query);
    
        $isSucceed = mysqli_affected_rows($conn);
    
        return $isSucceed;
    }

    function readFasilitas(){
        global $conn;
    
        $query = "SELECT * FROM fasilitas";
        $result = mysqli_query($conn, $query);
    
        return $result;
    }

    function addPJ($data){
        global $conn;
    
        $nama = $data['nama'];
        $noHP = $data['no_hp'];
    
        $query = "CALL add_pj('$nama', '$noHP')";
        $result = mysqli_query($conn, $query);
    
        $isSucceed = mysqli_affected_rows($conn);
    
        return $isSucceed;
    }

    function readPJ(){
        global $conn;
    
        $query = "SELECT * FROM pj";
        $result = mysqli_query($conn, $query);
    
        return $result;
    }

    function addTransaksiFasilitas($data){
        global $conn;
    
        $IDFasilitas = $data['ID_fasilitas'];
        $IDTransaksi = $data['ID_transaksi'];
    
        $query = "CALL add_transaksi_fasilitas($IDFasilitas, $IDTransaksi)";
        $result = mysqli_query($conn, $query);
    
        $isSucceed = mysqli_affected_rows($conn);
    
        return $isSucceed;
    }

    function readTransaksiFasilitas(){
        global $conn;
    
        $query = "SELECT * FROM transaksi_fasilitas";
        $result = mysqli_query($conn, $query);
    
        return $result;
    }

    function ReadLapanganDetail($id) {
        global $conn;

        // Escape ID untuk mencegah SQL Injection
        $query = "SELECT * FROM lapangan WHERE ID = $id";
        $result = mysqli_query($conn, $query);
    
        if ($result) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }

    function readLapanganWithPJ(){
        global $conn;
    
        $query = "SELECT lapangan.*, pj.nama AS nama_pj 
                  FROM lapangan 
                  LEFT JOIN pj ON lapangan.ID_PJ = pj.ID";
        $result = mysqli_query($conn, $query);
    
        return $result;
    }
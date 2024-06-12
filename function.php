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
    
        $query = "SELECT transaksi_fasilitas.*, penyewa.nama AS nama_penyewa, fasilitas.nama_fasilitas AS nama_fasilitas
                  FROM transaksi_fasilitas 
                  INNER JOIN transaksi ON transaksi_fasilitas.id_transaksi = transaksi.id
                  INNER JOIN penyewa ON transaksi.id_penyewa = penyewa.ID
                  INNER JOIN fasilitas  ON transaksi_fasilitas.ID_fasilitas= fasilitas.ID";
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

    function readTransaksiID(){
        global $conn;
    
        $query = "SELECT transaksi.*, penyewa.nama AS nama_penyewa, lapangan.jenis_lapangan AS nama_lapangan, GROUP_CONCAT(fasilitas.nama_fasilitas SEPARATOR ', ') AS fasilitas_sewa
                  FROM transaksi
                  LEFT JOIN penyewa ON transaksi.ID_penyewa = penyewa.ID
                  LEFT JOIN lapangan ON transaksi.ID_lapangan = lapangan.ID
                  LEFT JOIN transaksi_fasilitas ON transaksi.ID = transaksi_fasilitas.ID_transaksi
                  LEFT JOIN fasilitas ON transaksi_fasilitas.ID_fasilitas = fasilitas.ID
                  GROUP BY transaksi.ID";
        $result = mysqli_query($conn, $query);
        
        return $result;
    }
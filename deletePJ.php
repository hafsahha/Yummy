<?php
// Mengambil parameter ID PJ yang akan dihapus dari URL
if(isset($_GET['id_pj'])) {
    $id_pj = $_GET['id_pj'];

    // Lakukan koneksi ke database
    $conn = mysqli_connect('localhost', 'root', '', 'db_abadi');

    // Periksa koneksi
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Buat query SQL untuk menghapus data PJ berdasarkan ID
    $sql = "DELETE FROM pj WHERE ID = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind parameter ke statement
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameter
        $param_id = $id_pj;

        // Mencoba mengeksekusi statement
        if(mysqli_stmt_execute($stmt)){
            // Redirect kembali ke halaman admin setelah penghapusan
            header("location: admin.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Tutup statement
    mysqli_stmt_close($stmt);

    // Tutup koneksi
    mysqli_close($conn);
} else {
    // Jika tidak ada ID PJ yang diterima, redirect kembali ke halaman admin
    header("location: admin.php");
    exit();
}
?>

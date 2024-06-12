<?php
// Mengambil parameter ID lapangan yang akan dihapus dari URL
if(isset($_GET['id_lapangan'])) {
    $id_lapangan = $_GET['id_lapangan'];

    // Lakukan koneksi ke database
    $conn = mysqli_connect('localhost', 'root', '', 'db_abadi');

    // Periksa koneksi
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Buat query SQL untuk menghapus data lapangan berdasarkan ID
    $sql = "DELETE FROM lapangan WHERE ID = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind parameter ke statement
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameter
        $param_id = $id_lapangan;

        // Mencoba mengeksekusi statement
        if(mysqli_stmt_execute($stmt)){
            // Redirect kembali ke halaman lapangan setelah penghapusan
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
    // Jika tidak ada ID lapangan yang diterima, redirect kembali ke halaman lapangan
    header("location: admin.php");
    exit();
}
?>

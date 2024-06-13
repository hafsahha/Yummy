<?php
// Include file konfigurasi database
include 'config.php';

// Periksa jika metode request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Periksa apakah ID PJ ada dalam formulir POST
    if (isset($_POST['ID'])) {
        // Ambil nilai ID PJ dari formulir
        $id_pj = $_POST['ID'];

        // Ambil data lainnya dari formulir
        $nama_pj = $_POST['nama_pj'];
        $no_hp_pj = $_POST['no_hp_pj'];

        // Siapkan query untuk mengupdate data Penanggung Jawab
        $query = "UPDATE pj SET nama = ?, no_hp = ? WHERE ID = ?";

        // Persiapkan statement
        if ($stmt = mysqli_prepare($conn, $query)) {
            // Bind parameter ke statement
            mysqli_stmt_bind_param($stmt, "ssi", $nama_pj, $no_hp_pj, $id_pj);

            // Jalankan statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect kembali ke halaman utama dengan pesan sukses
                header("Location: admin.php#pj?edit_pj_success=true");
                exit();
            } else {
                // Jika statement gagal dijalankan, tampilkan pesan error
                echo "Error: " . mysqli_error($conn);
            }

            // Tutup statement
            mysqli_stmt_close($stmt);
        } else {
            // Jika statement gagal dipersiapkan, tampilkan pesan error
            echo "Error preparing statement: " . mysqli_error($conn);
        }
    } else {
        // Jika ID tidak ada dalam POST, redirect ke halaman utama
        header("Location: admin.php#pj");
        exit();
    }
} else {
    // Jika permintaan bukan POST, redirect ke halaman utama
    header("Location: admin.php#pj");
    exit();
}
?>

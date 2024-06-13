<?php
// Periksa apakah ID transaksi sudah diterima
if(isset($_GET['id_transaksi'])) {
    $id_transaksi = $_GET['id_transaksi'];

    // Lakukan koneksi ke database
    $conn = mysqli_connect('localhost', 'root', '', 'db_abadi');

    // Periksa koneksi
    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $sql = "SELECT tf.*, p.nama AS nama_penyewa, f.nama_fasilitas, f.harga 
            FROM transaksi_fasilitas tf
            JOIN transaksi t ON tf.ID_transaksi = t.ID 
            JOIN penyewa p ON t.ID_penyewa = p.ID 
            JOIN fasilitas f ON tf.ID_fasilitas = f.ID 
            WHERE tf.ID_transaksi = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
        // Bind parameter ke statement
        mysqli_stmt_bind_param($stmt, "i", $param_id_transaksi);

        // Set parameter
        $param_id_transaksi = $id_transaksi;

        // Mencoba mengeksekusi statement
        if(mysqli_stmt_execute($stmt)){
            // Mendapatkan hasil
            $result = mysqli_stmt_get_result($stmt);

            // Periksa apakah ada data
            if(mysqli_num_rows($result) > 0){
                $detail_fasilitas = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $nama_penyewa = $detail_fasilitas[0]['nama_penyewa'];
            } else{
                $detail_fasilitas = [];
                $nama_penyewa = '';
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
            exit();
        }
    }

    // Tutup statement
    mysqli_stmt_close($stmt);

    // Tutup koneksi
    mysqli_close($conn);
} else {
    // Jika tidak ada ID transaksi yang diterima, redirect kembali ke halaman transaksi
    header("location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Detail Fasilitas</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <img src="assets/img/logo.png" alt="">
                <!-- <h1>Abadi<span></span></h1> -->
            </a>
            <a class="btn-book-a-table" href="admin.php">Admin Page</a>
        </div>
    </header><!-- End Header -->
    <main id="main" style="padding-top: 70px;">
    <section id="lapangan" class="services">
        <div class="container">
            <div class="section-header">
                <h2>Fasilitas Ekstra</h2>
                <p>Data <span>Sewa Fasilitas Ekstra</span> Abadi</p>
            </div>
            <div class="container mt-5">
                <h2>Detail Fasilitas untuk <?= htmlspecialchars($nama_penyewa) ?></h2>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Fasilitas</th>
                            <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($detail_fasilitas)): ?>
                        <?php $counter = 1; ?>
                        <?php foreach($detail_fasilitas as $fasilitas): ?>
                        <tr>
                            <td><?= $counter++; ?></td>
                            <td><?= htmlspecialchars($fasilitas['nama_fasilitas']) ?></td>
                            <td>Rp <?= number_format($fasilitas['harga'], 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada fasilitas ekstra yang disewa</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                </table>
                <a href="admin.php#transaksi" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </section>  
    </main>  
    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                        Jl. Dr. Setiabudi No.287B, Isola,  <br>
                        Kec. Sukasari, Kota Bandung, Jawa Barat 40154<br>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Reservations</h4>
                        <p>
                        <strong>Phone:</strong> +(022) 20135755<br>
                        <strong>Email:</strong> abadeez@example.com<br>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                        <strong>Mon-Sun: 7AM</strong> - 22PM<br>
                        Holiday: Closed
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Abadi</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>
</html>

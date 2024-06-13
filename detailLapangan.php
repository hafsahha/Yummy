<?php
    include('config.php');
    include('function.php');

    // Mengambil ID lapangan dari URL
    $id = $_GET['id'];
    $pj = readPJ();
    $lapanganDetail = null;
    
    if ($id) {
        // Jalankan query untuk mendapatkan detail lapangan
        $lapangan = ReadLapanganDetail($id);
        if ($lapangan) {
            // Jika data ditemukan, simpan detail lapangan
            $lapanganDetail = $lapangan;
        } else {
            // Jika data tidak ditemukan, redirect ke halaman index
            echo "
            <script>
                alert('Data tidak ditemukan!');
                document.location.href = 'index.php';
            </script>";
            exit();
        }
    }
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        
        <title>Detail Lapangan</title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        
        <!-- Favicons -->
        <link href="assets/img/favicon.png" rel="icon">
        <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
        
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet">
        
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
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo.png" alt="">
        <h1><span></span></h1>
      </a>

            <nav id="navbar" class="navbar">
                <ul>
                <li><a href="/abadeez/#hero">Home</a></li>
                <li><a href="/abadeez/#gallery">Gallery</a></li>
                <li><a href="/abadeez/#about">About</a></li>
                <li><a href="/abadeez/#lapangan">Fields</a></li>
                <li><a href="/abadeez/#contact">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a class="btn-book-a-table" href="transaksi.php">Reservasi Lapangan</a>

        </div>
    </header><!-- End Header -->
    
    <main id="main">
    
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
        <div class="container">
    
            <div class="d-flex justify-content-between align-items-center">
            <h2>Detail Lapangan</h2>
            <ol>
                <li><a href="index.php">Home</a></li>
                <li>Detail Lapangan</li>
            </ol>
            </div>
    
        </div>
        </div><!-- End Breadcrumbs -->
    
        <!-- ======= Lapangan Detail Section ======= -->
        <section id="lapangan-detail" class="lapangan-detail">
        <div class="container" data-aos="fade-up">
    
            <div class="section-header">
            <h2>Detail Lapangan</h2>
            <p>DETAIL <span>LAPANGAN</span> ABADI SPORTS</p>
            </div>
    
            <?php if ($lapanganDetail): ?>
                <div class="row g-0">
                    <div class="col-lg-4 reservation-image" style="background-image: url(assets/img/lapangan/<?= $lapanganDetail['gambar'] ?>); height: 700px; width: 1080px;"></div>
                    </div>
                </div>
                <div class="container px-4 px-lg-5 mt-5">
                    <div class="row justify-content-center">
                        <div class="card">
             
                            <!-- Product name-->
                            <div class="d-flex justify-content-between align-items-center" >
                                <h5 class="fw-bolder text-primary">Harga</h5>
                                <div class="rent-price mb-3">
                                <span style="font-size: 1rem" class="text-primary"
                                    ><strong>Rp<?= number_format($lapanganDetail['harga']) ?></strong>/jam</span>
                                </div>
                            </div>
                            <ul class="list-unstyled list-style-group">
                                <li
                                class="border-bottom p-2 d-flex justify-content-between">
                                <span>Jenis Lapangan</span>
                                <span style="font-weight: 600"><?= str_replace('_', ' ', $lapangan['jenis_lapangan']) ?></span>
                                </li>
                                <li
                                class="border-bottom p-2 d-flex justify-content-between">
                                <span>Jenis Olahraga</span>
                                <span style="font-weight: 600"><?= $lapanganDetail['jenis_olahraga'] ?></span>
                                </li>
                                <li
                                class="border-bottom p-2 d-flex justify-content-between">
                                <span>Fasilitas Umum</span>
                                <span style="font-weight: 600"><?= $lapanganDetail['fasilitas_umum'] ?></span>
                                </li>
                                <li
                                class="border-bottom p-2 d-flex justify-content-between">
                                <span>Ketersediaan</span>
                                <span style="font-weight: 600"><?= $lapanganDetail['status'] == 1 ? 'Tersedia' : 'Sudah dibooking' ?></span>
                                </li>
                                <li class="border-bottom p-1 d-flex justify-content-between">
                                    <span>Penanggung Jawab</span>
                                    <?php
                                    // Ambil ID PJ dari detail lapangan
                                    $idPJ = $lapanganDetail['ID_PJ'];

                                   // Cari nama PJ berdasarkan ID PJ
                                    $namaPJ = "";

                                    foreach ($pj as $row) {
                                        if ($row['ID'] == $idPJ) {
                                            $namaPJ = $row['nama'];
                                            break;
                                        }
                                    }

                                    // Tampilkan nama PJ
                                    echo '<span style="font-weight: 600">' . $namaPJ . '</span>';
                                    ?>
                                </li>
                            </ul>
                        </div>
                     </div>
                     <br>
                        <div class="card-footer border-top-0 bg-transparent">
                            <div class="text-center">
                                <a href="index.php" class="btn d-flex align-items-center justify-content-center btn-danger mt-auto"
                                style="column-gap: 0.4rem">Kembali ke Daftar Lapangan</a>
                            </div>
                            <div class="text-center">
                                <a href="transaksi.php?id=<?=$_GET['id']?>" class="btn d-flex align-items-center justify-content-center btn-primary mt-4"
                                style="column-gap: 0.4rem">Sewa Lapangan</a>
                            </div>
                        </div>

                    <?php else: ?>
                    <p>Detail lapangan tidak ditemukan.</p>
                    <?php endif; ?>
                </div>
        </section><!-- End Lapangan Detail Section -->
    
    </main><!-- End #main -->
    
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
        &copy; Copyright <strong><span>Yummy</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
    </div>

    </footer><!-- End Footer -->
        <!-- End Footer -->
    
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    <div id="preloader"></div>
    
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    
    </body>
    
    </html>
<?php
    include('function.php');
    $penyewa = readPenyewa();
    $lapangan = readlapangan();
    $fasilitas = readFasilitas();

	if (isset($_POST['btn-add'])) {
        if (isset($_POST['transaksi'])) {
            $isAddSucceed_1 = addMembership($_POST['nama']);
        } else {
            $_POST['membership'] = 1;
            $isAddSucceed_2 = addPenyewa($_POST);
        }

        if ($isAddSucceed_1 || $isAddSucceed_2) {
            echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Gagal menambahkan Data !');
                document.location.href = 'index.php';
            </script>";
        }
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Join Membership</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
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
                    <h2>join Membership</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>join Membership</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Form join Membership Section ======= -->
        <section id="book-a-table" class="book-a-table">
          <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Join Membership</h2>
                    <p>Join <span>Membership</span> Baru</p>
                </div>

                <div class="row g-0">
                    <div id="form_image" class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>
                      <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                        <form action="membership.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
                          <div class="row gy-4">
                            <div id="non_member">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Penyewa</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No Hp</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                                </div>
                            </div>
                            <div id="member">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Penyewa</label>
                                    <select class="form-select" aria-label="Category" id="nama" name="nama">
                                        <option value="" selected disabled hidden>Pilih</option>
                                        <?php
                                        foreach($penyewa as $penyewa){
                                            if ($penyewa['membership'] == 0) {
                                                echo '<option value="'.$penyewa['ID'].'">'.$penyewa['nama'].'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" id="membership" name="transaksi">
                                <label for="transaksi">Saya Sudah Pernah Transaksi</label>
                            </div>
						        <div class="text-center mt-3">
							<button type="submit" name="btn-add">Join Membership</button>
						</div>
					</form>
                    </div><!-- End Form Join Membership -->

                </div>
            </div>
        </section><!-- End Form Join Membership Section -->

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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/ajax.js"></script>

</body>

</html>
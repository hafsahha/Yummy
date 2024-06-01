<?php
    include('function.php');
    $transaksi = readTransaksi();
    $penyewa = readPenyewa();
    $lapangan = readActivelapangan();

	if (isset($_POST['btn-add'])) {
		// Jalankan query tambah record baru
		$isAddSucceed = addTransaksi($_POST);
		if ($isAddSucceed > 0) {
			// Jika penambahan sukses, tampilkan alert
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

    <title>Tambah Transaksi</title>
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

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <h1>Yummy<span>.</span></h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="/abadi/#hero">Home</a></li>
                    <li><a href="/abadi/#about">About</a></li>
                    <li><a href="/abadi/#menu">Menu</a></li>
                    <li><a href="/abadi/#events">Events</a></li>
                    <li><a href="/abadi/#chefs">Chefs</a></li>
                    <li><a href="/abadi/#gallery">Gallery</a></li>
                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav><!-- .navbar -->

            <a class="btn-book-a-table" href="transaksi.php">Book a Table</a>

        </div>
    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Tambah Transaksi</h2>
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Tambah Transaksi</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Form Tambah Transaksi Section ======= -->
        <section id="book-a-table" class="book-a-table">
          <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Tambah Transaksi</h2>
                    <p>Tambah <span>Transaksi</span> Baru</p>
                </div>

                <div class="row g-0">
                    <div id="form_image" class="col-lg-4 reservation-img" style="background-image: url(assets/img/lapangan/lapangan-1.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>
                    <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
					<form action="transaksi.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
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
                                    <select class="form-select" aria-label="Category" id="nama" name="nama" required>
                                        <option value="" selected disabled hidden>Pilih</option>
                                        <?php
                                        foreach($penyewa as $penyewa){
                                            echo '<option value="'.$penyewa['ID'].'">'.$penyewa['nama'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="checkbox" id="membership" name="membership">
                                <label for="membership">Saya Memiliki Membership</label>
                            </div>
							<div class="col-lg-6 col-md-6">
								<label for="ID_lapangan" class="form-label">Jenis Lapangan</label>
								<select class="form-select" aria-label="Category" id="ID_lapangan" name="ID_lapangan" required>
									<option value="" selected disabled hidden>Pilih</option>
									<?php
									foreach($lapangan as $lapangan){
										echo '<option value="'.$lapangan['ID'].'">'.$lapangan['jenis_lapangan'].'</option>';
									}
									?>
								</select>
							</div>
							<div class="col-lg-6 col-md-6">
								<label for="tanggal_transaksi" class="form-label">Tanggal Reservasi</label>
								<input type="date" name="tanggal_transaksi" class="form-control" id="tanggal_transaksi" placeholder="Tanggal Transaksi" required>
							</div>
							<div class="col-lg-6 col-md-6">
								<label for="waktu_mulai" class="form-label">Waktu Mulai</label>
								<input type="time" name="waktu_mulai" class="form-control" id="waktu_mulai" placeholder="Waktu Mulai" required>
							</div>
							<div class="col-lg-6 col-md-6">
								<label for="waktu_selesai" class="form-label">Waktu Selesai</label>
								<input type="time" name="waktu_selesai" class="form-control" id="waktu_selesai" placeholder="Waktu Selesai" required>
							</div>
							<div class="col-lg-6 col-md-6">
								<label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label><br>
								<select class="form-select" aria-label="Category" id="metode_pembayaran" name="metode_pembayaran" required>
									<option value="" selected disabled hidden>Pilih</option>
									<option value="Cash">Cash</option>
									<option value="QRIS">QRIS</option>
									<option value="Debit">Debit</option>
								</select>
							</div>
						</div>
						<div class="text-center mt-3">
							<button type="submit" name="btn-add">Tambah Transaksi</button>
						</div>
					</form>
                    </div><!-- End Form Tambah Transaksi -->

                </div>
            </div>
        </section><!-- End Form Tambah Transaksi Section -->

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
                            A108 Adam Street <br>
                            New York, NY 535022 - US<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>Reservations</h4>
                        <p>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <strong>Mon-Sat: 11AM</strong> - 23PM<br>
                            Sunday: Closed
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

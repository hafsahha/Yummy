<?php
  include('function.php');

  $listLapangan = readLapangan();

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ABADEEZ</title>
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

  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
          <li><a href="#hero">Home</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#lapangan">Fields</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="transaksi.php">Reservasi Lapangan</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Reserve Your Game,<br>Elevate Your Play</h2>
          <p data-aos="fade-up" data-aos-delay="100">Reservasi lapangan di Abadi Sport Center kini lebih mudah dengan Abadeez, memberikan Anda akses tanpa hambatan ke semua fasilitas olahraga.</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="transaksi.php" class="btn-book-a-table">Reservasi Lapangan</a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="assets/img/bola.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">
  <!-- ======= Gallery Section ======= -->
      <section id="gallery" class="gallery section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>gallery</h2>
            <p>Check <span>Our Gallery</span></p>
          </div>

          <div class="gallery-slider swiper">
            <div class="swiper-wrapper align-items-center">
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/lapangan/lapangan-1.jpg"><img src="assets/img/lapangan/lapangan-1.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/lapangan/lapangan-2.jpg"><img src="assets/img/lapangan/lapangan-2.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/lapangan/lapangan-3.jpg"><img src="assets/img/lapangan/lapangan-3.jpg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/lapangan/lapangan-4.jpeg"><img src="assets/img/lapangan/lapangan-4.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/lapangan/lapangan-5.jpeg"><img src="assets/img/lapangan/lapangan-5.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/lapangan/lapangan-6.jpeg"><img src="assets/img/lapangan/lapangan-6.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/lapangan/lapangan-7.jpeg"><img src="assets/img/lapangan/lapangan-7.jpeg" class="img-fluid" alt=""></a></div>
              <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery" href="assets/img/lapangan/lapangan-8.jpeg"><img src="assets/img/lapangan/lapangan-8.jpeg" class="img-fluid" alt=""></a></div>
            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>
      </section><!-- End Gallery Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>About Us</h2>
          <p>Learn More <span>About Us</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 position-relative about-img" 
              style="background-image: url(assets/img/about.jpg); background-size: contain; background-repeat: no-repeat; height: 750px;" 
              data-aos="fade-up" data-aos-delay="150">
            <div class="call-us position-absolute">
              <h4>Call Center</h4>
              <p>+(022) 20135755</p>
            </div>
          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Abadi Sport Center & Restaurant, sebuah destinasi yang menawarkan pengalaman berolahraga yang menyenangkan dan menikmati makanan yang enak, terletak di Jl. Dr. Setiabudi, Setiabudi, Bandung. 
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Lapangan Tenis/Futsal/Basket & Kolam Renang.</li>
                <li><i class="bi bi-check2-all"></i> Restaurant.</li>
              </ul>
              <p>
              Tempat ini sangat cocok untuk mereka yang ingin berolahraga dan bersantap di sampingnya. Fasilitas lapangan yang luas dan modern, serta pelayanan yang ramah, membuat Abadi Sport Center & Restaurant menjadi pilihan yang tepat untuk berbagai keperluan. Selain itu, restoran ini juga menawarkan berbagai pilihan makanan yang lezat dan minuman yang segar, sehingga pengunjung dapat menikmati waktu yang menyenangkan dengan keluarga dan teman. Dengan lokasi yang strategis dan fasilitas yang lengkap, Abadi Sport Center & Restaurant adalah tempat yang tepat untuk berolahraga dan bersantap di Bandung.
              </p>

              <div class="position-relative mt-4">
                <img src="assets/img/about-2.jpeg" class="img-fluid" style="width: 100%; max-width: 1200px; height: auto;" alt="">
                <a href="https://www.youtube.com/watch?v=jLlwYFd-K3I" class="glightbox play-btn"></a>
             </div>
          </div>
        </div>
        
        </div>
    </section><!-- End About Section -->

      <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="why-box">
              <h3>Why Choose Abadeez?</h3>
              <p>
                Pesan lapangan, reservasi ruang, atau amankan fasilitas olahraga apa pun di Abadi Sport Center dengan Abadeez, mitra pemesanan olahraga Anda yang terpercaya.
              </p>
              <div class="text-center">
                <a href="#about" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
              </div>
            </div>
          </div><!-- End Why Box -->

          <div class="col-lg-8 d-flex align-items-center">
            <div class="row gy-4" style="display: flex; flex-wrap: nowrap; overflow-x: auto;">

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200" style="flex: 0 0 auto;">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-trophy"></i>
                  <h4>Fasilitas Lapangan</h4>
                  <p>Tempat ini memiliki fasilitas lapangan yang luas dan modern, sehingga Anda dapat berolahraga dengan nyaman dan efektif.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300" style="flex: 0 0 auto;">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Lokasi Strategis</h4>
                  <p>Abadi Sport Center terletak di Jl. Dr. Setiabudi, Setiabudi, Bandung, yang membuatnya mudah diakses menggunakan transportasi umum. Stasiun terdekat adalah Kantor Pos Setiabudi, yang hanya berjarak 381 meter dan dapat ditempuh dalam waktu 6 menit berjalan.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400" style="flex: 0 0 auto;">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-people"></i>
                  <h4>Pelayanan Ramah</h4>
                  <p>Abadi Sport Center dikenal dengan pelayanan yang ramah dan profesional, sehingga Anda dapat merasa nyaman dan dihargai selama berada di tempat ini.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400" style="flex: 0 0 auto;">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-egg-fried"></i>
                  <h4>Variasi Makanan</h4>
                  <p>Abadi Sport Center menawarkan berbagai pilihan makanan yang lezat, termasuk bakmie, jajanan, dan aneka nasi. Hal ini membuat Anda dapat menemukan menu yang sesuai dengan selera Anda.</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400" style="flex: 0 0 auto;">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <i class="bi bi-tags"></i>
                  <h4>Promo dan Fitur Eksklusif</h4>
                  <p>Dengan menggunakan GoFood, Anda dapat menikmati berbagai promo dan fitur eksklusif, seperti pilihan makanan yang lebih luas dan harga yang lebih terjangkau.</p>
                </div>
              </div><!-- End Icon Box -->

            </div>
          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Lapangan Section ======= -->
    <section id="lapangan" class="lapangan">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>ABADI SPORT CENTER</h2>
          <p>Check Our <span>Field</span></p>
        </div>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
          <div class="tab-pane fade active show" id="menu-starters">

            <div class="row gy-5">
              <?php foreach($listLapangan as $lapangan): ?>
                <div class="col-lg-4 menu-item">
                  <div class="card h-100 shadow-sm">
                    <a href="assets/img/lapangan/<?= $lapangan['gambar'] ?>" class="glightbox">
                      <img src="assets/img/lapangan/<?= $lapangan['gambar'] ?>" class="menu-img img-fluid card-img-top" alt="gambar">
                    </a>
                    <div class="card-body d-flex flex-column">
                      <h4 class="card-title"><?= $lapangan['jenis_lapangan'] ?></h4>
                      <p class="price text-primary">Rp<?= number_format($lapangan['harga']) ?></p>
                      <div class="mt-auto text-center">
                        <div class="d-flex justify-content-between">
                          <a class="btn btn-primary mb-2" href="transaksi.php?id=<?= $lapangan['ID'] ?>">Sewa</a>
                          <a class="btn btn-info text-white" href="{{ route('detail') }}">Detail</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1983.5751751958746!2d107.5934193!3d-6.8519936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6b667c84abf%3A0xf3e55cc04ecdbef4!2sAbadi%20Sport%20Center!5e0!3m2!1sen!2sid!4v1685658311234!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>Jl. Dr. Setiabudi No.287B, Isola, Kec. Sukasari, Kota Bandung, Jawa Barat 40154</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>abadeez@example.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+(022) 20135755</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sun:</strong> 7AM - 22PM;
                  <strong>Holiday:</strong> Closed
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

        <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
          <div class="row">
            <div class="col-xl-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-xl-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form><!--End Contact Form -->

      </div>
    </section><!-- End Contact Section -->

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
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
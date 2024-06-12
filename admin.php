<?php
include('function.php');

// Read data from the database
$listLapangan = readLapanganWithPJ();
$listPJ = readPJ();
$listPenyewa = readPenyewa();
$listFasilitas = readFasilitas();
$listTransaksi = readTransaksiID();
$listTransaksiFasilitas = readTransaksiFasilitas();


// Handle form submissions for adding data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check which form was submitted and call the appropriate function to add data
    if (isset($_POST['addLapangan'])) {
        // Add lapangan
        $success = addLapangan($_POST);
        if ($success) {
            // Refresh page after adding data
            header("Location: admin.php");
            exit;
        }
    } elseif (isset($_POST['addPJ'])) {
        // Add PJ
        $success = addPJ($_POST);
        if ($success) {
            // Refresh page after adding data
            header("Location: admin.php");
            exit;
        }
    } elseif (isset($_POST['addPenyewa'])) {
        // Add penyewa
        $success = addPenyewa($_POST);
        if ($success) {
            // Refresh page after adding data
            header("Location: admin.php");
            exit;
        }
    } elseif (isset($_POST['addFasilitas'])) {
        // Add fasilitas
        $success = addFasilitas($_POST);
        if ($success) {
            // Refresh page after adding data
            header("Location: admin.php");
            exit;
        }
    }
}

$lapangan = null;
if (isset($_GET['id'])) {
    $id_lapangan = $_GET['id'];
    $lapangan = getLapanganById($id_lapangan);
    echo json_encode($lapangan);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>[Template] Sample Inner Page</title>
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

    <main id="main" style="padding-top: 70px;">
        <!-- Bagian untuk Lapangan -->
        <section id="lapangan" class="services">
            <div class="container">
                <div class="section-header">
                    <h2>Lapangan</h2>
                    <p>Data <span>Lapangan</span> Abadi</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addLapanganModal">+ Tambah Lapangan</a>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">NO</th> <!-- Ganti judul kolom -->
                            <th scope="col">Jenis Lapangan</th>
                            <th scope="col">Jenis Olahraga</th>
                            <th scope="col">Fasilitas Umum</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th> <!-- Tambahkan kolom status -->
                            <th scope="col">PJ</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?> <!-- Inisialisasi nomor urut -->
                        <?php foreach($listLapangan as $lapangan): ?>
                        <tr>
                            <td><?= $nomor++; ?></td> <!-- Tampilkan nomor urut dan tambahkan increment -->
                            <td><?= $lapangan['jenis_lapangan'] ?></td>
                            <td><?= $lapangan['jenis_olahraga'] ?></td>
                            <td><?= $lapangan['fasilitas_umum'] ?></td>
                            <td>Rp<?= number_format($lapangan['harga']) ?></td>
                            <td><?= $lapangan['status'] == 1 ? 'Tersedia' : 'Terisi' ?></td> <!-- Menampilkan status lapangan -->
                            <td><?= isset($lapangan['nama_pj']) ? $lapangan['nama_pj'] : "Belum Ditentukan" ?></td>
                            <td><img src="assets/img/lapangan/<?= $lapangan['gambar'] ?>" alt="<?= $lapangan['gambar'] ?>" style="width: 100px;"></td>
                            <td>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editLapanganModal" data-id="<?= $lapangan['ID'] ?>"><i class="bi bi-pencil-square"></i>Edit</button>
                                <a href="deleteLapangan.php?id_lapangan=<?= $lapangan['ID'] ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="bi bi-trash3"></i> Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </section>

        <!-- Bagian untuk PJ -->
        <section id="pj" class="services">
            <div class="container">
                <div class="section-header">
                    <h2>Penanggung Jawab</h2>
                    <p>Data <span>Penanggung Jawab</span> Abadi</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPJModal">+ Tambah PJ</a>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">NO</th> <!-- Ganti judul kolom -->
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor HP</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?> <!-- Inisialisasi nomor urut -->
                        <?php foreach($listPJ as $pj): ?>
                        <tr>
                            <td><?= $nomor++; ?></td> <!-- Tampilkan nomor urut dan tambahkan increment -->
                            <td><?= $pj['nama'] ?></td>
                            <td><?= $pj['no_hp'] ?></td>
                            <td>
                                <!-- Tambahkan tombol untuk mengedit dan menghapus PJ -->
                                <a href="editPJ.php?id_pj=<?= $pj['ID'] ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="deletePJ.php?id_pj=<?= $pj['ID'] ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="bi bi-trash3"></i> Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Bagian untuk Fasilitas Ekstra -->
        <section id="fasilitas" class="services">
            <div class="container">
                <div class="section-header">
                    <h2>Fasilitas Ekstra</h2>
                    <p>Data <span>Fasilitas Ekstra</span> Abadi</p>
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFasilitasModal">+ Tambah Fasilitas Ekstra</a>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Fasilitas</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?> <!-- Inisialisasi nomor urut -->
                        <?php foreach($listFasilitas as $fasilitas): ?>
                        <tr>
                            <td><?= $nomor++; ?></td> <!-- Tampilkan nomor urut dan tambahkan increment -->
                            <td><?= $fasilitas['nama_fasilitas'] ?></td>
                            <td>Rp <?= number_format($fasilitas['harga'], 0, ',', '.') ?></td>
                            <td>
                                <!-- Tambahkan tombol untuk mengedit dan menghapus fasilitas ekstra -->
                                <a href="editFasilitas.php?id_fasilitas=<?= $fasilitas['ID'] ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                                <a href="deleteFasilitas.php?id_fasilitas=<?= $fasilitas['ID'] ?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger"><i class="bi bi-trash3"></i> Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
        
        <!-- Bagian untuk Penyewa -->
        <section id="penyewa" class="services">
            <div class="container">
                <div class="section-header">
                    <h2>Penyewa</h2>
                    <p>Data <span>Penyewa</span> Abadi</p>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama Penyewa</th>
                            <th scope="col">No. HP</th>
                            <th scope="col">Membership</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?> <!-- Inisialisasi nomor urut -->
                        <?php foreach($listPenyewa as $penyewa): ?>
                        <tr>
                            <td><?= $nomor++; ?></td> <!-- Tampilkan nomor urut dan tambahkan increment -->
                            <td><?= $penyewa['nama'] ?></td>
                            <td><?= $penyewa['no_hp'] ?></td>
                            <td><?= ($penyewa['membership'] == 1) ? 'Member' : 'Non-Member' ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Bagian untuk Transaksi -->
        <section id="transaksi" class="services">
            <div class="container">
                <div class="section-header">
                    <h2>Transaksi</h2>
                    <p>Data <span>Transaksi</span> Abadi</p>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Penyewa</th>
                            <th scope="col">Lapangan</th>
                            <th scope="col">Tanggal Sewa</th>
                            <th scope="col">Waktu Mulai</th>
                            <th scope="col">Waktu Selesai</th>
                            <th scope="col">Fasilitas</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?> <!-- Inisialisasi nomor urut -->
                        <?php foreach($listTransaksi as $transaksi): ?>
                        <tr>
                            <td><?= $nomor++; ?></td> <!-- Tampilkan nomor urut dan tambahkan increment -->
                            <td><?= $transaksi['nama_penyewa'] ?></td>
                            <td><?= $transaksi['nama_lapangan'] ?></td>
                            <td><?= $transaksi['tanggal_transaksi'] ?></td>
                            <td><?= $transaksi['waktu_mulai'] ?></td>
                            <td><?= $transaksi['waktu_selesai'] ?></td>
                            <td>
                                <?= $transaksi['fasilitas_sewa'] ? $transaksi['fasilitas_sewa'] : "Tidak ada yang disewa" ?>
                            </td>
                            <td>Rp <?= number_format($transaksi['total'], 0, ',', '.') ?></td>
                            <td>
                                <?php 
                                    $status = $transaksi['status_pembayaran'];
                                    switch ($status) {
                                        case 1:
                                            echo "Pending";
                                            break;
                                        case 2:
                                            echo "Success";
                                            break;
                                        case 3:
                                            echo "Cancel";
                                            break;
                                        default:
                                            echo "Undefined";
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Bagian untuk Transaksi Fasilitas -->
        <section id="transaksi_fasilitas" class="services">
            <div class="container">
                <div class="section-header">
                    <h2>Transaksi Fasilitas</h2>
                    <p>Data <span>Transaksi Fasilitas</span> Abadi</p>
                </div>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Penyewa</th>
                            <th scope="col">Nama Fasilitas</th>
                            <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?> <!-- Inisialisasi nomor urut -->
                        <?php foreach($listTransaksiFasilitas as $transaksi_fasilitas): ?>
                        <tr>
                            <td><?= $nomor++; ?></td> <!-- Tampilkan nomor urut dan tambahkan increment -->
                            <td><?= $transaksi_fasilitas['nama_penyewa'] ?></td>
                            <td><?= $transaksi_fasilitas['nama_fasilitas'] ?></td>
                            <td>Rp <?= number_format($transaksi_fasilitas['harga'], 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
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


   <!-- Modal untuk menambah lapangan -->
   <div class="modal fade" id="addLapanganModal" tabindex="-1" aria-labelledby="addLapanganModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLapanganModalLabel">Tambah Lapangan Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process_add_lapangan.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="jenis_lapangan" class="form-label">Jenis Lapangan</label>
                            <input type="text" class="form-control" id="jenis_lapangan" name="jenis_lapangan" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_olahraga" class="form-label">Jenis Olahraga</label>
                            <input type="text" class="form-control" id="jenis_olahraga" name="jenis_olahraga" required>
                        </div>
                        <div class="mb-3">
                            <label for="fasilitas_umum" class="form-label">Fasilitas Umum</label>
                            <input type="text" class="form-control" id="fasilitas_umum" name="fasilitas_umum" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="1">Tersedia</option>
                                <option value="0">Terisi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ID_PJ" class="form-label">Penanggung Jawab</label>
                            <select class="form-select" id="ID_PJ" name="ID_PJ" required>
                                <option value="" disabled selected>Pilih Penanggung Jawab</option>
                                <?php
                                    // Ambil daftar Penanggung Jawab dari database
                                    $result = readPJ();
                                    while($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value=\"{$row['ID']}\">{$row['nama']}</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk mengedit lapangan -->
    <div class="modal fade" id="editLapanganModal" tabindex="-1" aria-labelledby="editLapanganModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLapanganModalLabel">Edit Lapangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process_edit_lapangan.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="ID" value="<?php echo $lapangan ? $lapangan['ID'] : ''; ?>">
                        <div class="mb-3">
                            <label for="jenis_lapangan" class="form-label">Jenis Lapangan</label>
                            <input type="text" class="form-control" id="jenis_lapangan" name="jenis_lapangan" required value="<?php echo $lapangan ? $lapangan['jenis_lapangan'] : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="jenis_olahraga" class="form-label">Jenis Olahraga</label>
                            <input type="text" class="form-control" id="jenis_olahraga" name="jenis_olahraga" required value="<?php echo $lapangan ? $lapangan['jenis_olahraga'] : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="fasilitas_umum" class="form-label">Fasilitas Umum</label>
                            <input type="text" class="form-control" id="fasilitas_umum" name="fasilitas_umum" required value="<?php echo $lapangan ? $lapangan['fasilitas_umum'] : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required value="<?php echo $lapangan ? $lapangan['harga'] : ''; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="1" <?php if ($lapangan && $lapangan['status'] == 1) echo 'selected'; ?>>Tersedia</option>
                                <option value="0" <?php if ($lapangan && $lapangan['status'] == 0) echo 'selected'; ?>>Terisi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ID_PJ" class="form-label">Penanggung Jawab</label>
                            <select class="form-select" id="ID_PJ" name="ID_PJ" required>
                                <option value="" disabled <?php echo $lapangan ? '' : 'selected'; ?>>Pilih Penanggung Jawab</option>
                                <?php
                                foreach ($listPJ as $pj) {
                                    $selected = ($lapangan && $lapangan['ID_PJ'] == $pj['ID']) ? 'selected' : '';
                                    echo "<option value=\"{$pj['ID']}\" $selected>{$pj['nama']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menambah Penanggung Jawab -->
    <div class="modal fade" id="addPJModal" tabindex="-1" aria-labelledby="addPJModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPJModalLabel">Tambah Penanggung Jawab Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process_add_pj.php" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_hp" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menambah fasilitas ekstra -->
    <div class="modal fade" id="addFasilitasModal" tabindex="-1" aria-labelledby="addFasilitasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFasilitasModalLabel">Tambah Fasilitas Ekstra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="process_add_fasilitas.php" method="POST">
                        <div class="mb-3">
                            <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
                            <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wareweb</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
</head>
<style>
  #info {
    transition: 0.5s ease;
  }

  #info:hover {
    color: orangered;
    rotate: 2deg;
    cursor: pointer;
  }
</style>

<body>
  <header class="p-3 shadow" style="
    background: rgb(74,74,74);
    background: linear-gradient(72deg, rgba(74,74,74,1) 0%, rgba(24,31,32,1) 40%, rgba(19,24,25,1) 53%);">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <img src="<?= base_url(); ?>/assets/img/warehouse.png" alt="logo" style="
          width: 30px; height: 30px;">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="/" class="nav-link px-2 text-white">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Official Website</a></li>
          <li><a href="#" class="nav-link px-2 text-white">About</a></li>
        </ul>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Masuk</button>
          <button type="button" class="btn btn-warning">Daftar</button>
        </div>
      </div>
    </div>
    <div class="container px-5">
      <div class="row gx-5 justify-content-center">
        <div class="col-lg-6">
          <div class="text-center my-5">
            <h1 class="display-5 text-white p-2 fw-bold">
              Halo Selamat Datang di WareWeb PT. ABC!
            </h1>
            <p class="lead text-white-50 mb-4">Website untuk nomor antrian pengiriman dan pengambilan barang, memudahkan kamu untuk ambil nomor antrian meski jarak memisahkan kita!</p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
              <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?= base_url('/ambilAntrian'); ?>">
                <i class="fab fa-get-pocket"></i>
                Ambil Antrian
              </a>
              <a class="btn btn-outline-light btn-lg px-4" href="#list_bongkar">
                <i class="far fa-eye"></i>
                Lihat Antrian</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Page Content-->
  <div id="carouselExampleIndicators" class="carousel slide shadown-lg" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?= base_url(); ?>/assets/img/slide1.jpg" class="d-block w-100" alt="<?= base_url(); ?>/assets/img/slide.jpg">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url(); ?>/assets/img/slide2.jpg" class="d-block w-100" alt="<?= base_url(); ?>/assets/img/slide.jpg">
      </div>
      <div class="carousel-item">
        <img src="<?= base_url(); ?>/assets/img/slide3.jpg" class="d-block w-100" alt="<?= base_url(); ?>/assets/img/slide.jpg">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <hr class="divider">
  <!-- Page Content-->
  <!-- panel informasi antrian -->
  <section class="panel-info">
    <div class="d-flex justify-content-center px-3 mb-3 gap-4" style="height: 22vh;">
      <div class="card-body bg-dark text-white px-3 py-2 rounded fw-bold">No. Antrian Sebelumnya :
        <?php foreach ($done as $d) : ?>
          <h1 id="info" style="text-align: end;"><?= $d['no_antrian'] ?></h1>
        <?php endforeach; ?>
      </div>
      <div class="card-body bg-dark text-white px-3 py-2 rounded fw-bold ">No. Antrian Saat Ini :
        <?php foreach ($onproc as $on) : ?>
          <h1 id="info" style="text-align: end;"><?= $on['no_antrian'] ?></h1>
        <?php endforeach; ?>
      </div>
      <div class="card-body bg-dark text-white px-3 py-2 rounded fw-bold">No. Antrian Selanjutnya :
        <?php foreach ($waiting as $w) : ?>
          <h1 id="info" style="text-align: end;"><?= $w['no_antrian'] ?></h1>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- table list antrian -->
  <section class="pt-4">
    <div class="container px-lg-5">
      <h1>Daftar Antrian Bongkar Gudang A</h1>
      <table id="list_bongkar" name="list_bongkar" class="table table-bordered table-hover table-light table-responsive">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">No. Antrian</th>
            <th scope="col">No. Delivery</th>
            <th scope="col">Pengirim</th>
            <th scope="col">Nama Supir</th>
            <th scope="col">No Polisi</th>
            <th scope="col">No Hp</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($data_antri as $antri) : ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $antri['no_antrian']; ?></td>
              <td><?= $antri['no_do']; ?></td>
              <td><?= $antri['pengirim']; ?></td>
              <td><?= $antri['nama_supir']; ?></td>
              <td><?= $antri['no_pol']; ?></td>
              <td><?= $antri['no_hp']; ?></td>
              <td><?= $antri['status']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </section>


  <footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <p>more information please click this link <a href="#">www.website.co.id</a></p>
      <!-- Section: Social media -->
      <section class="mb-4">
        <!-- Facebook -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

        <!-- Twitter -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>

        <!-- Google -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>

        <!-- Instagram -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>

        <!-- Linkedin -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>

        <!-- Github -->
        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
      </section>
      <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright SARWebDev
    </div>
    <!-- Copyright -->
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#dataTable').DataTable();
    });
  </script>
</body>

</html>
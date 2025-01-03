<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="image/Merah & Putih Ilustrasi Logo Mie Ayam.png" type="image/x-icon">
  <title>Mie Ayam Legenda</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="css/font.css">
  <link rel="stylesheet" href="css/darkmode.css">
</head>

<style>
  #about #img {
    rotate: 10deg;
    transition: rotate 0.5s ease-in-out;
    box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
  }


  #about #img:hover {
    rotate: 0deg;
    transition: all 0.5s ease-in-out;
  }

  .card,
  .card img {
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
  }

  @media screen and (max-width: 768px) {
    #about #img {
      rotate: 0deg;
    }

    #about #img:hover {
      rotate: 2deg;
      transition: all 0.5s ease-in-out;
    }

  }
</style>


<body class="lexend">
  <!-- nav begin -->
  <nav class="navbar navbar-expand-sm sticky-top border-bottom py-3" style="backdrop-filter: blur(10px);">
    <div class="container">
      <a class="navbar-brand" href=".">Mie Ayam Legenda</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#cabang">Cabang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#article">Article</a>
          </li>
          <?php
          session_start();
          ?>

          <li class="nav-item dropdown">
            <?php if (isset($_SESSION['username'])): ?>
              <!-- Jika sudah login, tampilkan dropdown dengan nama pengguna -->
              <a class="nav-link dropdown-toggle text-primary fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $_SESSION['username'] ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="admin.php">Profile</a></li>
                <li><a class="dropdown-item" href="logoutinindex.php">Logout</a></li>
              </ul>
            <?php else: ?>
              <!-- Jika belum login, tampilkan "Log In" -->
              <a class="nav-link" href="admin.php">Log In</a>
            <?php endif; ?>
          </li>
          <li>
            <!-- From Uiverse.io by Madflows  -->
            <div class="toggle-switch">
              <label class="switch-label">
                <input type="checkbox" class="checkbox">
                <span class="slider"></span>
              </label>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- nav end -->

  <!-- gallery -->
  <section class="container mt-5">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <?php
        // Query untuk mengambil gambar yang di-upload
        $sql = "SELECT * FROM gallery ORDER BY uploaded_at DESC";
        $hasil = $conn->query($sql);

        $counter = 0;
        while ($row = $hasil->fetch_assoc()) {
          // Menambahkan button untuk setiap gambar
          echo '<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' . $counter . '" class="' . ($counter === 0 ? 'active' : '') . '" aria-current="' . ($counter === 0 ? 'true' : 'false') . '" aria-label="Slide ' . ($counter + 1) . '"></button>';
          $counter++;
        }
        ?>
      </div>
      <div class="carousel-inner">
        <?php
        $counter = 0;
        // Mengatur ulang pointer ke awal data hasil query
        $hasil->data_seek(0);

        while ($row = $hasil->fetch_assoc()) {
          $activeClass = ($counter === 0) ? 'active' : ''; // Gambar pertama akan aktif
        ?>
          <div class="carousel-item <?= $activeClass ?>">
            <img src="img_gallery/<?= $row['gambar'] ?>" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5 class="text-dark"><?= htmlspecialchars($row['judul']) ?></h5>
            </div>
          </div>
        <?php
          $counter++;
        }
        ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <!-- gallery end -->

  <!-- about -->
  <section class="container d-flex align-items-center justify-content-center mt-5" id="about">
    <div class="d-lg-flex d-md-block gap-3">
      <?php
      $sql = "SELECT * FROM about ORDER BY timedate DESC";
      $hasil = $conn->query($sql);

      while ($row = $hasil->fetch_assoc()) {
      ?>
        <!-- left -->
        <div>
          <h2 class="fw-bold border-bottom border-5 border-primary py-3 my-5" style="width: max-content;">Tentang Mie Ayam Legenda</h2>
          <p><?= $row["deskripsi"] ?></p>
          <a href="<?= $row["link"] ?>" class="mb-3">Baca artikel selengkapnya</a>
          <br>
          <small class="text-body-secondary">Ditulis pada: <?= $row["timedate"] ?></small>
        </div>
        <!-- right -->
        <div id="img" class="mt-md-0 mt-3 border p-3 bg-dark rounded-3 border-2 d-flex justify-content-center">
          <img src="img_about/<?= $row["gambar"] ?>" alt="history" class="img-fluid border border-5 border-light w-100" />
        </div>
    </div>
  <?php
      }
  ?>
  </section>

  <!-- cabang begin -->
  <section id="cabang" class="container text-center mb-5">
    <h2 class="text-center fw-bold border-bottom border-5 border-primary py-3 my-5" style="width: max-content; margin: 0 auto;">Cabang</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
      <?php
      $sql = "SELECT * FROM cabang ORDER BY timedate DESC";
      $hasil = $conn->query($sql);

      while ($row = $hasil->fetch_assoc()) {
      ?>
        <div class="col">
          <div class="card mb-3 p-3">
            <img src="img_cabang/<?= $row["gambar"] ?>" class="card-img" alt="...">
            <div class="card-body m-0 mt-2 p-0 text-start">
              <h5 class="card-title text-start"><?= $row["nama_cabang"] ?></h5>
              <p class="mb-2 m-0">Dibuka pada: <i><?= $row["timedate"] ?></i></p>
              <div class="d-lg-flex justify-content-between align-items-end">
                <small class="text-body-secondary mb-2" style="max-width: 63%;"><?= $row["detail_alamat"] ?></small>
                <a href="<?= $row["google_maps"] ?>" class="d-flex align-items-center justify-content-center gap-1 text-end border border-2 text-decoration-none p-2 text-white fw-medium bg-primary rounded-4" target="_blank">
                  <i class="bi bi-geo-alt-fill"></i>
                  Open Maps</a>
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>

  </section>
  <!-- end cabang -->

  <!-- article begin -->
  <section id="article" class="container text-center mb-5">
    <div class="container">
      <h2 class="text-center fw-bold border-bottom border-5 border-primary py-3 my-5" style="width: max-content; margin: 0 auto;">Article</h2>
      <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php
        $sql = "SELECT * FROM article ORDER BY tanggal DESC";
        $hasil = $conn->query($sql);

        while ($row = $hasil->fetch_assoc()) {
        ?>
          <div class="col">
            <div class="card mb-3">
              <img src="img/<?= $row["gambar"] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-start" style="border-bottom: 3px dashed gray; max-width: max-content; padding-bottom: 3px;"><?= $row["judul"] ?></h5>
                <p class="card-text text-start mt-3"><?= $row["isi"] ?></p>
                <p class="card-text text-start">
                  <small class="text-body-secondary"><?= $row["tanggal"] ?></small>
                </p>
              </div>
            </div>

          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </section>
  <!-- article end -->

  <!-- footer begin -->
  <footer class="bg-dark text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4 mb-4">
          <img src="image/Logo Udinus - Official 02.png" alt="logo udinus" style="width: 100px; margin-right: 20px;">
          <img src="image/2022 Udinus - Logo Unggul.png" alt="logo udinus" style="width: 70px;">
        </div>

        <div class="col-6 col-md-4 mb-4">
          <h5>RESTU ARDIANSYAH</h5>
          <h6>HUBUNGI SAYA</h6>
          <ul class="list-unstyled">
            <li class="d-flex gap-3"><i class="bi bi-envelope"></i>
              <p class="m-0">admin123@gmail.com</p>
            </li>
            <li class="d-flex gap-3"><i class="bi bi-telephone-inbound"></i>
              <p class="m-0">+62 888 8888 8888</p>
            </li>
            <li class="d-flex gap-3"><i class="bi bi-geo-alt"></i><i>JL Imam bonjol No 227</i></li>

          </ul>
        </div>

        <div class="col-6 col-md-4 mb-4">
          <h5>KATEGORI TULISAN</h5>
          <ul class="list-unstyled">
            <li><a href="#home" class="text-white text-decoration-none">Home</a></li>
            <li><a href="#about" class="text-white text-decoration-none">About</a></li>
            <li><a href="#sejarah" class="text-white text-decoration-none">Sejarah</a></li>
            <li><a href="#article" class="text-white text-decoration-none">Article</a></li>
          </ul>
        </div>

        <div class="col-12 col-md-4 mb-4">
          <h5>SOCIAL MEDIA</h5>
          <div class="d-flex gap-3">
            <a href="404.php" class="text-white"><i class="bi bi-facebook fs-4"></i></a>
            <a href="404.php" class="text-white"><i class="bi bi-threads fs-4"></i></a>
            <a href="https://www.instagram.com/restuardyans/" class="text-white"><i class="bi bi-instagram fs-4"></i></a>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <small>&copy; 2024 Restu Ardiansyah. All rights reserved.</small>
      </div>
    </div>
  </footer>


  <!-- footer end -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>
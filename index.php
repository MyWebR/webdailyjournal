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
  <link rel="stylesheet" href="css/article-dan-about.css">
  <link rel="stylesheet" href="css/sejarah.css">
  <link rel="stylesheet" href="css/home.css">
</head>

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
            <a class="nav-link" href="#sejarah">Sejarah</a>
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

        </ul>
      </div>
    </div>
  </nav>

  <!-- home begin -->
  <section id="home" class="relative" style="height: 95vh; margin-top: -70px;">
    <div id="bg-home"></div>
    <div id="content-home" class="container text-center p-lg-5 p-4 absolute">
      <h2 class="fw-bold">Selamat Datang di Dunia Mie Ayam – Cita Rasa yang Tak Pernah Lekang oleh Waktu!</h2>
      <p>
        Mie Ayam, hidangan legendaris Indonesia, hadir dengan rasa gurih dan kenyal yang memikat. Dikenal sejak abad ke-20, mie ayam awalnya dibawa oleh pedagang Tionghoa dan segera menjadi favorit di seluruh Indonesia. Kini, dengan berbagai varian seperti ayam cincang, bakso, hingga mie ayam seafood, mie ayam terus berkembang menjadi hidangan yang disukai semua kalangan.
      </p>
    </div>
    <div id="content-scrol-down" class="container d-block text-center absolute">
      <a href="#about" class="text-decoration-none text-black">
        <p>Pelajari lebih lanjut</p>
        <p id="scrol-down"><i class="bi bi-caret-down-fill"></i></p>
      </a>

    </div>
  </section>
  <!-- home end -->

  <!-- about -->
  <section id="about" class="container">
    <div>
      <h2 class="fw-bold border-bottom border-5 border-primary py-3" style="width: max-content;">Tentang Mie Ayam</h2>
    </div>
    <div class="d-lg-flex justify-content-between relative">
      <div class="text-section">
        <p>Mie ayam adalah hidangan khas Indonesia yang berasal dari bakmi, mie tradisional Tiongkok Selatan, khususnya dari daerah Fujian dan Guangdong. Saat pertama kali diperkenalkan di Indonesia, bakmi menggunakan daging babi sebagai topping. Namun, karena mayoritas penduduk Indonesia adalah Muslim, penggunaan daging babi digantikan dengan daging ayam yang disemur kecap, sehingga hidangan ini dapat diterima oleh semua kalangan.</p>
        <a href="https://id.wikipedia.org/wiki/Mi_ayam">Baca artikel selengkapnya</a>
      </div>
      <div id="bingkai-1" class="image-container position-relative">
        <img src="image/history.png" alt="history" class="img-fluid img-history" />
      </div>
    </div>
  </section>

  <!-- sejarah -->
  <section id="sejarah" class="container " style="margin-top: 150px;">
    <h2 class="text-center fw-bold border-bottom border-5 border-primary py-3 my-5" style="width: max-content; margin: 0 auto;">Sejarah Mie Ayam</h2>
    <div class="container d-lg-block d-flex items-center justify-content-center gap-5">
      <!-- line -->
      <div id="content-line" class="d-lg-flex align-items-center justify-content-center">
        <p class="fs-4" title="Sekitar abad ke-19"><i class="bi bi-calendar3"></i></p>
        <div id="line-1" class="border border-2"></div>
        <p class="fs-4" title="Sekitar abad ke-19"><i class="bi bi-calendar3"></i></p>
        <div id="line-2" class="border border-2"></div>
        <p class="fs-4" title="Sekitar abad ke-19"><i class="bi bi-calendar3"></i></p>
        <div id="line-3" class="border border-2"></div>
        <p class="fs-4" title="Sekitar abad ke-19"><i class="bi bi-calendar3"></i></p>
        <div id="line-4" class="border border-2"></div>
        <p class="fs-4" title="Sekitar abad ke-19"><i class="bi bi-calendar3"></i></p>
      </div>
      <!-- content -->
      <div class="d-lg-flex justify-content-between">
        <!-- 1 -->
        <div class="text-center p-3" style="width: 300px;">
          <a href="https://jak101fm.com/2023/11/mengenal-sejarah-dan-asal-usul-mie-ayam-sarapan-pilihan-masyarakat-jakarta/#:~:text=Sejarah%20Mie%20Ayam%20di%20Indonesia,dengan%20sebutan%20mie%20ayam%20Wonogiri." title="Baca artikel selengkapnya" class="text-decoration-none text-dark">
            <div id="content-card-sejarah" class="mt-3 border border-2 border-grey rounded-3 p-3">
              <p class="fw-medium">Mie Ayam</p>
              <p>
                Mie ayam adalah makanan yang merupakan hasil akulturasi budaya Tionghoa dan Indonesia. Sejarah mie ayam di Indonesia dapat dijelaskan sebagai berikut:
              </p>
            </div>
          </a>
        </div>
        <!-- 2 -->
        <div class="text-center p-3" style="width: 300px;">
          <a href="https://jak101fm.com/2023/11/mengenal-sejarah-dan-asal-usul-mie-ayam-sarapan-pilihan-masyarakat-jakarta/#:~:text=Sejarah%20Mie%20Ayam%20di%20Indonesia,dengan%20sebutan%20mie%20ayam%20Wonogiri." title="Baca artikel selengkapnya" class="text-decoration-none text-dark">
            <div id="content-card-sejarah" class="mt-3 border border-2 border-grey rounded-3 p-3">
              <p class="fw-medium">Asal Usul</p>
              <p>
                Mie ayam berasal dari bakmi, hidangan khas China Selatan, terutama di wilayah Fujian dan Guangdong.
              </p>
            </div>
          </a>
        </div>
        <!-- 3 -->
        <div class="text-center p-3" style="width: 300px;">
          <a href="https://travel.okezone.com/read/2023/05/17/301/2815820/siapa-yang-pertama-kali-menciptakan-mi-ayam-begini-sejarahnya?page=all#:~:text=Zaman%20dulu%20banyak%20masyarakat%20dari,merupakan%20makanan%20otentik%20khas%20Chinese." title="Baca artikel selengkapnya" class="text-decoration-none text-dark">
            <div id="content-card-sejarah" class="mt-3 border border-2 border-grey rounded-3 p-3">
              <p class="fw-medium">Kedatangan bakmi ke Indonesia</p>
              <p>
                Bakmi dibawa oleh masyarakat Tionghoa yang merantau dan menetap di Indonesia.
              </p>
            </div>
          </a>
        </div>
        <!-- 4 -->
        <div class="text-center p-3" style="width: 300px;">
          <a href="https://www.nibble.id/asal-usul-mie-ayam/#:~:text=Hidangan%20ini%20mulai%20masuk%20ke,bisa%20dikonsumsi%20oleh%20semua%20orang.&text=Meskipun%20berasal%20dari%20China%2C%20mie,bawang%20putih%2C%20dan%20kulit%20ayam." title="Baca artikel selengkapnya" class="text-decoration-none text-dark">
            <div id="content-card-sejarah" class="mt-3 border border-2 border-grey rounded-3 p-3">
              <p class="fw-medium">Perubahan topping</p>
              <p>
                Pada awalnya, bakmi diberi topping daging babi, namun diganti dengan daging ayam yang disemur kecap karena menyesuaikan dengan selera lokal dan karena Indonesia saat itu masih didominasi kerajaan Islam.
              </p>
            </div>
          </a>
        </div>
        <!-- 5 -->
        <div class="text-center p-3" style="width: 300px;">
          <a href="https://jak101fm.com/2023/11/mengenal-sejarah-dan-asal-usul-mie-ayam-sarapan-pilihan-masyarakat-jakarta/#:~:text=Sejarah%20Mie%20Ayam%20di%20Indonesia,dengan%20sebutan%20mie%20ayam%20Wonogiri." title="Baca artikel selengkapnya" class="text-decoration-none text-dark">
            <div id="content-card-sejarah" class="mt-3 border border-2 border-grey rounded-3 p-3">
              <p class="fw-medium">Perkembangan di Wonogiri</p>
              <p>
                Mie ayam berkembang di daerah Wonogiri, Jawa Tengah, dan menjadi makanan wajib masyarakat setempat. Mie ayam Wonogiri memiliki ciri khas rasa yang enak dan racikan minyak ayam yang terbuat dari minyak sayur, jahe, ketumbar, lada, bawang putih, dan kulit ayam.
              </p>
            </div>
          </a>
        </div>

      </div>
    </div>
  </section>

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
<?php
session_start();

include "koneksi.php";

//check jika belum ada user yang login arahkan ke halaman login
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="image/Merah & Putih Ilustrasi Logo Mie Ayam.png" type="image/x-icon">
    <title>Mie Ayam Legenda</title>
    <link rel="icon" href="img/logo.png" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />

    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="darkmode.css">


    <!-- CDN JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class="lexend">
    <!-- nav begin -->
    <nav class="navbar navbar-expand-sm sticky-top border-bottom py-3" style="backdrop-filter: blur(10px);">
        <div class="container">
            <a class="navbar-brand cardTextLight" href="." id="smallcard">Mie Ayam Legenda</a>
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['username'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <li>
                        <!-- From Uiverse.io by Madflows  -->
                        <div class="toggle-switch">
                            <label class="switch-label">
                                <input id="darkMode" type="checkbox" class="checkbox">
                                <span class="slider"></span>
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav end -->

    <!-- content begin -->
    <section id="content" class="p-5">
        <div class="container">
            <!-- Breadcrumbs -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="admin.php">Admin</a></li>
                    <li class="breadcrumb-item active cardTextLight" id="smallcard" aria-current="page">
                        <?= isset($_GET['page']) ? ucfirst($_GET['page']) : "Menu" ?>
                    </li>
                </ol>
            </nav>

            <?php
            // Memeriksa apakah parameter 'page' ada di URL
            if (isset($_GET['page'])) {
                // Jika ada, tampilkan halaman sesuai dengan parameter 'page'
                include($_GET['page'] . ".php");
            } else {
                // Jika tidak ada, tampilkan 'menu.php' sebagai default
                include("menu.php");
            }
            ?>
        </div>
    </section>


    <!-- content end -->
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
                        <li><a href="admin.php?page=dashboard" class="text-white text-decoration-none">Dashboard</a></li>
                        <li><a href="admin.php?page=gallery" class="text-white text-decoration-none">Gallery</a></li>
                        <li><a href="admin.php?page=about" class="text-white text-decoration-none">About</a></li>
                        <li><a href="admin.php?page=cabang" class="text-white text-decoration-none">Cabang</a></li>
                        <li><a href="admin.php?page=article" class="text-white text-decoration-none">Article</a></li>
                        <li><a href="admin.php?page=price_list" class="text-white text-decoration-none">Daftar Harga</a></li>
                    </ul>
                </div>

                <div class="col-12 col-md-4 mb-4">
                    <h5>SOCIAL MEDIA</h5>
                    <div class="d-flex gap-3">
                        <a href="404.php" class="text-white"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="404.php" class="text-white"><i class="bi bi-threads fs-4"></i></a>
                        <a href="https://www.instagram.com/restuardyans/" class="text-white"><i class="bi bi-instagram fs-4"></i></a>
                        <a href="https://github.com/MyWebR" class="text-white"><i class="bi bi-github fs-4"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <small>&copy; 2025 Restu Ardiansyah. All rights reserved.</small>
            </div>
        </div>
    </footer>
    <!-- footer end -->

    <!-- CDN BOTSTRAP -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>


    <script src="dark-mode.js"></script>
</body>

</html>
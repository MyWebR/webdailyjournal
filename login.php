<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyertakan code dari file koneksi
include "koneksi.php";

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])) {
     header("location:admin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $username = $_POST['user'];

     //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
     $password = md5($_POST['password']);

     //prepared statement
     $stmt = $conn->prepare("SELECT username 
                          FROM user 
                          WHERE username=? AND password=?");

     //parameter binding 
     $stmt->bind_param("ss", $username, $password); //username string dan password string

     //database executes the statement
     $stmt->execute();

     //menampung hasil eksekusi
     $hasil = $stmt->get_result();

     //mengambil baris dari hasil sebagai array asosiatif
     $row = $hasil->fetch_array(MYSQLI_ASSOC);

     //check apakah ada baris hasil data user yang cocok
     if (!empty($row)) {
          //jika ada, simpan variable username pada session
          $_SESSION['username'] = $row['username'];

          //mengalihkan ke halaman admin
          header("location:admin.php");
     } else {
          //jika tidak ada (gagal), alihkan kembali ke halaman login
          header("location:login.php");
     }

     //menutup koneksi database
     $stmt->close();
     $conn->close();
} else {
?>

     <!DOCTYPE html>
     <html lang="en">

     <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="shortcut icon" href="image/Merah & Putih Ilustrasi Logo Mie Ayam.png" type="image/x-icon">
          <title>Mie Ayam Legenda</title>

          <!-- BOOTSTRAP CDN -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

          <!-- ICON -->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     </head>

     <body>
          <section class="d-lg-flex d-md-block">
               <div id="right" class="order-2 w-100 p-5 text-white d-flex justify-content-center align-items-center bg-success" style="height: 100vh;">
                    <div class="text-center">
                         <h1 class="fs-1 fw-bold">Hallo, Teman</h1>
                         <p class="fs-5">Silakan masuk ke akun Anda untuk melanjutkan.</p>
                         <a href="#left" class="d-lg-none d-md-flex p-2 rounded-4 text-white border border-2 text-decoration-none">Log In Sekarang</a>
                    </div>
               </div>
               <div id="left" class="order-1 w-100 p-5 d-flex align-items-center justify-content-center" style="height: 100vh;">
                    <form action="" method="POST" class="w-100">
                         <h1 class="text-center mb-5 fw-bold">Log In</h1>
                         <div class="form-floating mb-3">
                              <input type="text" id="user" name="user" class="form-control" placeholder="name@example.com">
                              <label for="floatingInput">Username</label>
                         </div>
                         <div class="form-floating">
                              <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                              <label for="floatingPassword">Password</label>
                         </div>
                         <button type="submit" class="mt-3 w-100 btn btn-success">Login</button>
                    </form>
               </div>
          </section>

     </body>

     <!-- BOOTSTRAP CDN -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

     </html>
<?php } ?>
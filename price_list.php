<!-- article.php -->
<?php
include 'koneksi.php'; // Path ke file koneksi.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>

     <link
          rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
     <link
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous" />

     <link rel="stylesheet" href="css/font.css">
</head>

<body>

     <div>
          <div class="d-flex justify-content-between mb-5">
               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <i class="bi bi-plus-lg"></i> Tambah Menu
               </button>
          </div>

          <div class="row poppins">
               <div class="table-responsive" id="price_list_data">
                    <!-- Data akan ditampilkan disini -->

               </div>
               <!-- Awal Modal Tambah-->
               <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Menu</h1>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="" enctype="multipart/form-data">
                                   <div class="modal-body">
                                        <div class="mb-3">
                                             <label for="formGroupExampleInput" class="form-label">Nama Menu</label>
                                             <input type="text" class="form-control" name="nama" placeholder="Tuliskan nama makanan" required>
                                        </div>
                                        <div class="mb-3">
                                             <label for="floatingTextarea2">Harga</label>
                                             <input type="number" class="form-control" name="harga" placeholder="Tuliskan harga" required>
                                        </div>
                                        <div class="mb-3">
                                             <label for="jenis">Kategori</label>
                                             <select class="form-control" name="jenis" required>
                                                  <option value="makanan">Makanan</option>
                                                  <option value="minuman">Minuman</option>
                                             </select>
                                        </div>
                                        <div class="mb-3">
                                             <label for="diskon">Diskon (Opsional)</label>
                                             <input type="number" class="form-control" name="diskon" placeholder="Tuliskan diskon jika ada">
                                        </div>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <input type="submit" value="simpan" name="simpan" class="btn btn-primary">
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>

               <!-- Akhir Modal Tambah-->
          </div>
     </div>



     <script>
          $(document).ready(function() {
               load_data();

               function load_data(hlm) {
                    $.ajax({
                         url: "price_list_data.php",
                         method: "POST",
                         data: {
                              hlm: hlm
                         },
                         success: function(data) {
                              $('#price_list_data').html(data);
                         }
                    })
               }

               $(document).on('click', '.halaman', function() {
                    var hlm = $(this).attr("id");
                    load_data(hlm);
               });
          });
     </script>

     <?php
     // Jika tombol simpan diklik
     if (isset($_POST['simpan'])) {
          // Validasi jika data ada dan tidak kosong
          if (
               isset($_POST['nama']) && !empty($_POST['nama']) &&
               isset($_POST['harga']) && !empty($_POST['harga']) &&
               isset($_POST['jenis']) && !empty($_POST['jenis'])
          ) {

               $nama = $_POST['nama'];
               $harga = $_POST['harga'];
               $jenis = $_POST['jenis'];

               $diskon = isset($_POST['diskon']) && !empty($_POST['diskon']) ? $_POST['diskon'] : NULL; // Jika kosong, set ke NULL

               // Cek apakah ada id yang dikirimkan dari form
               if (isset($_POST['id'])) {
                    // Jika ada id, lakukan update data dengan id tersebut
                    $id = $_POST['id'];

                    // Query untuk update data
                    $stmt = $conn->prepare("UPDATE price_list
                                    SET 
                                    nama =?,
                                    harga =?,
                                    diskon =?,
                                    jenis =?
                                    WHERE id = ?");

                    $stmt->bind_param("ssssi", $nama, $harga, $diskon, $jenis, $id); // Bind parameter
                    $simpan = $stmt->execute();
               } else {
                    // Jika tidak ada id, lakukan insert data baru
                    $stmt = $conn->prepare("INSERT INTO price_list (nama, harga, diskon, jenis)
                                    VALUES (?,?,?,?)");

                    $stmt->bind_param("ssss", $nama, $harga, $diskon, $jenis); // Bind parameter
                    $simpan = $stmt->execute();
               }

               // Menampilkan pesan setelah penyimpanan data
               if ($simpan) {
                    echo "<script>
                    alert('Simpan data sukses');
                    document.location='admin.php?page=price_list';
                </script>";
               } else {
                    echo "<script>
                    alert('Simpan data gagal');
                    document.location='admin.php?page=price_list';
                </script>";
               }

               // Menutup statement dan koneksi
               $stmt->close();
               $conn->close();
          } else {
               echo "<script>
                alert('Data tidak lengkap');
                document.location='admin.php?page=price_list';
            </script>";
          }
     }

     // Jika tombol hapus diklik
     if (isset($_POST['hapus'])) {
          $id = $_POST['id'];

          // Query untuk hapus data
          $stmt = $conn->prepare("DELETE FROM price_list WHERE id =?");

          $stmt->bind_param("i", $id); // Bind parameter
          $hapus = $stmt->execute();

          // Menampilkan pesan setelah penghapusan data
          if ($hapus) {
               echo "<script>
                alert('Hapus data sukses');
                document.location='admin.php?page=price_list';
            </script>";
          } else {
               echo "<script>
                alert('Hapus data gagal');
                document.location='admin.php?page=price_list';
            </script>";
          }

          // Menutup statement dan koneksi
          $stmt->close();
          $conn->close();
     }
     ?>

     <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
          crossorigin="anonymous"></script>


</body>

</html>
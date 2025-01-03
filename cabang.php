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
                    <i class="bi bi-plus-lg"></i> Tambah Cabang
               </button>
          </div>

          <div class="row poppins">
               <div class="table-responsive" id="cabang_data">
                    <!-- Data akan ditampilkan disini -->

               </div>
               <!-- Awal Modal Tambah-->
               <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Cabang</h1>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="" enctype="multipart/form-data">
                                   <div class="modal-body">
                                        <div class="mb-3">
                                             <label for="formGroupExampleInput" class="form-label">Nama cabang</label>
                                             <input type="text" class="form-control" name="nama_cabang" placeholder="Isi dengan nama cabang" required>
                                        </div>
                                        <div class="mb-3">
                                             <label for="floatingTextarea2">Detail alamat</label>
                                             <textarea class="form-control" placeholder="Tuliskan Isi Artikel" name="detail_alamat" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                             <label for="formGroupExampleInput" class="form-label">URL Google Maps</label>
                                             <input type="text" class="form-control" name="google_maps" placeholder="Isi dengan URL google maps" required>
                                        </div>
                                        <div class="mb-3">
                                             <label for="formGroupExampleInput2" class="form-label">Gambar</label>
                                             <input type="file" class="form-control" name="gambar">
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
                         url: "cabang_data.php",
                         method: "POST",
                         data: {
                              hlm: hlm
                         },
                         success: function(data) {
                              $('#cabang_data').html(data);
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
     include "upload_cabang.php";

     //jika tombol simpan diklik
     if (isset($_POST['simpan'])) {
          $nama_cabang = $_POST['nama_cabang'];
          $detail_alamat = $_POST['detail_alamat'];
          $google_maps = $_POST['google_maps'];
          $timedate = date("Y-m-d H:i:s");
          $gambar = '';
          $nama_gambar = $_FILES['gambar']['name'];

          //jika ada file yang dikirim  
          if ($nama_gambar != '') {
               //panggil function upload_foto untuk cek spesifikasi file yg dikirimkan user
               //function ini memiliki 2 keluaran yaitu status dan message
               $cek_upload = upload_foto($_FILES["gambar"]);

               //cek status true/false
               if ($cek_upload['status']) {
                    //jika true maka message berisi nama file gambar
                    $gambar = $cek_upload['message'];
               } else {
                    //jika true maka message berisi pesan error, tampilkan dalam alert
                    echo "<script>
                    alert('" . $cek_upload['message'] . "');
                    document.location='admin.php?page=cabang';
                </script>";
                    die;
               }
          }

          //cek apakah ada id yang dikirimkan dari form
          if (isset($_POST['id'])) {
               //jika ada id,    lakukan update data dengan id tersebut
               $id = $_POST['id'];

               if ($nama_gambar == '') {
                    //jika tidak ganti gambar
                    $gambar = $_POST['gambar_lama'];
               } else {
                    //jika ganti gambar, hapus gambar lama
                    unlink("img_cabang/" . $_POST['gambar_lama']);
               }

               $stmt = $conn->prepare("UPDATE cabang 
                                    SET 
                                    nama_cabang =?,
                                    detail_alamat =?,
                                    google_maps = ?,
                                    timedate = ?,
                                    gambar = ?
                                    WHERE id = ?");

               $stmt->bind_param("sssssi", $nama_cabang, $detail_alamat, $google_maps, $timedate, $gambar, $id);
               $simpan = $stmt->execute();
          } else {
               //jika tidak ada id, lakukan insert data baru
               $stmt = $conn->prepare("INSERT INTO cabang (nama_cabang, detail_alamat, google_maps, timedate, gambar)
                        VALUES (?,?,?,?,?)");


               $stmt->bind_param("sssss", $nama_cabang, $detail_alamat, $google_maps, $timedate, $gambar);
               $simpan = $stmt->execute();
          }

          if ($simpan) {
               echo "<script>
                alert('Simpan data sukses');
                document.location='admin.php?page=cabang';
            </script>";
          } else {
               echo "<script>
                alert('Simpan data gagal');
                document.location='admin.php?page=cabang';
            </script>";
          }

          $stmt->close();
          $conn->close();
     }

     //jika tombol hapus diklik
     if (isset($_POST['hapus'])) {
          $id = $_POST['id'];
          $gambar = $_POST['gambar'];

          if ($gambar != '') {
               //hapus file gambar
               unlink("img_cabang/" . $gambar);
          }

          $stmt = $conn->prepare("DELETE FROM cabang WHERE id =?");

          $stmt->bind_param("i", $id);
          $hapus = $stmt->execute();

          if ($hapus) {
               echo "<script>
                alert('Hapus data sukses');
                document.location='admin.php?page=cabang';
            </script>";
          } else {
               echo "<script>
                alert('Hapus data gagal');
                document.location='admin.php?page=cabang';
            </script>";
          }

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
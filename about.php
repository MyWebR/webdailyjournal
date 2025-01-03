<!-- about.php -->
<?php
include 'koneksi.php'; // Path ke file koneksi.php
include 'upload_about.php';

$check_count = "SELECT COUNT(*) as total FROM about";
$result = $conn->query($check_count);
$row_count = $result->fetch_assoc();
$total_records = $row_count['total'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>About</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
     <link rel="stylesheet" href="css/font.css">
</head>

<body>

     <div>
          <div class="d-flex mb-5">
               <?php if ($total_records == 0) { ?>
                    <div class="d-flex flex-wrap gap-3">
                         <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                              <i class="bi bi-plus-lg"></i> Tambah About
                         </button>
                         <div class="alert alert-info d-flex align-items-center gap-3" role="alert">
                              <i class="bi bi-exclamation-circle"></i>
                              Anda hanya bisa menambahkan satu data about saja.
                         </div>
                    </div>
               <?php } else { ?>
                    <div class="alert alert-info d-flex align-items-center gap-3" role="alert">
                         <i class="bi bi-exclamation-circle"></i>
                         Data about sudah ada. Anda hanya bisa mengedit data yang ada.
                         <br>
                         Untuk mengedit data, klik tombol edit pada baris table yang bersangkutan.
                    </div>
               <?php } ?>
          </div>

          <div class="row poppins">
               <div class="table-responsive" id="about_data">
                    <!-- Data gambar akan ditampilkan ddeskripsi$deskripsini -->
               </div>

               <!-- Modal Tambah about -->
               <?php if ($total_records == 0) { ?>
                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                         aria-labelledby="staticBackdropLabel" aria-hidden="true">
                         <div class="modal-dialog">
                              <div class="modal-content">
                                   <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Gambar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <form method="post" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                             <div class="mb-3">
                                                  <label for="formGroupExampleInput" class="form-label">Deskripsi</label>
                                                  <input type="text" class="form-control" name="deskripsi" placeholder="Tuliskan Deskripsi Gambar"
                                                       required>
                                             </div>
                                             <div class="mb-3">
                                                  <label for="formGroupExampleInput" class="form-label">Link Refrensi Deskripsi</label>
                                                  <input type="text" class="form-control" name="link" placeholder="Berikan refrensi link deskripsi"
                                                       required>
                                             </div>
                                             <div class="mb-3">
                                                  <label for="formGroupExampleInput2" class="form-label">Gambar</label>
                                                  <input type="file" class="form-control" name="gambar" required>
                                             </div>
                                        </div>
                                        <div class="modal-footer">
                                             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                             <input type="submit" value="Simpan" name="simpan" class="btn btn-primary">
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>
               <?php } ?>
               <!-- Akhir Modal Tambah Gambar -->
          </div>
     </div>

     <script>
          $(document).ready(function() {
               load_data();

               function load_data(hlm) {
                    $.ajax({
                         url: "about_data.php",
                         method: "POST",
                         data: {
                              hlm: hlm
                         },
                         success: function(data) {
                              $('#about_data').html(data);
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
     include "upload_about.php";

     //jika tombol simpan diklik
     if (isset($_POST['simpan'])) {
          // Check current number of records
          $check_count = "SELECT COUNT(*) as total FROM about";
          $result = $conn->query($check_count);
          $row_count = $result->fetch_assoc();

          // Only allow insert if there are no records
          if (!isset($_POST['id']) && $row_count['total'] > 0) {
               echo "<script>
                  alert('Tidak bisa menambah data baru. Silakan edit data yang ada.');
                  document.location='admin.php?page=about';
              </script>";
               exit;
          }

          // If we get here, we can proceed with save logic
          $deskripsi = $_POST['deskripsi'];
          $link = $_POST['link'];
          $timedate = date("Y-m-d H:i:s");
          $gambar = '';
          $nama_gambar = $_FILES['gambar']['name'];

          if ($nama_gambar != '') {
               $cek_upload = upload_foto($_FILES["gambar"]);
               if ($cek_upload['status']) {
                    $gambar = $cek_upload['message'];
               } else {
                    echo "<script>
                      alert('" . $cek_upload['message'] . "');
                      document.location='admin.php?page=about';
                  </script>";
                    exit;
               }
          }

          // Check if id is set (for update)
          if (isset($_POST['id'])) {
               $id = $_POST['id'];

               if ($nama_gambar == '') {
                    $gambar = $_POST['gambar_lama'];
               } else {
                    if (file_exists("img_about/" . $_POST['gambar_lama'])) {
                         unlink("img_about/" . $_POST['gambar_lama']);
                    }
               }

               // Update existing record
               $stmt = $conn->prepare("UPDATE about SET deskripsi = ?, link = ?, gambar = ?, timedate = ? WHERE id = ?");
               $stmt->bind_param("ssssi", $deskripsi, $link, $gambar, $timedate, $id);
               $simpan = $stmt->execute();
          } else {
               // Insert new record
               $stmt = $conn->prepare("INSERT INTO about (deskripsi, link, gambar, timedate) VALUES (?, ?, ?, ?)");
               $stmt->bind_param("ssss", $deskripsi, $link, $gambar, $timedate);
               $simpan = $stmt->execute();
          }

          if ($simpan) {
               echo "<script>
                  alert('Simpan data sukses');
                  document.location='admin.php?page=about';
              </script>";
          } else {
               echo "<script>
                  alert('Simpan data gagal');
                  document.location='admin.php?page=about';
              </script>";
          }

          $stmt->close();
     }

     // Handle delete operation
     if (isset($_POST['hapus'])) {
          // Check if this is the last record
          $check_count = "SELECT COUNT(*) as total FROM about";
          $result = $conn->query($check_count);
          $row_count = $result->fetch_assoc();

          if ($row_count['total'] <= 1) {
               echo "<script>
                  alert('Data tidak bisa dihapus karena minimal harus ada 1 data.');
                  document.location='admin.php?page=about';
              </script>";
               exit;
          }

          // If we get here, we can proceed with delete
          $id = $_POST['id'];
          $gambar = $_POST['gambar'];

          // Delete the image file if it exists
          if ($gambar != '' && file_exists("img_about/" . $gambar)) {
               unlink("img_about/" . $gambar);
          }

          // Delete the record
          $stmt = $conn->prepare("DELETE FROM about WHERE id = ?");
          $stmt->bind_param("i", $id);
          $hapus = $stmt->execute();

          if ($hapus) {
               echo "<script>
                  alert('Hapus data sukses');
                  document.location='admin.php?page=about';
              </script>";
          } else {
               echo "<script>
                  alert('Hapus data gagal');
                  document.location='admin.php?page=about';
              </script>";
          }

          $stmt->close();
     }

     // Close database connection if it's still open
     if (isset($conn) && $conn) {
          $conn->close();
     }

     ?>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
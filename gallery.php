<?php
include 'koneksi.php'; // Path ke file koneksi.php
include 'upload_gallery.php'; // Sertakan file upload_gallery.php
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Gallery</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
     <link rel="stylesheet" href="css/font.css">
</head>

<body>

     <div>
          <div class="d-flex justify-content-between mb-5">
               <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    <i class="bi bi-plus-lg"></i> Tambah Gambar
               </button>
          </div>

          <div class="row poppins">
               <div class="table-responsive" id="gallery_data">
                    <!-- Data gambar akan ditampilkan disini -->
               </div>

               <!-- Modal Tambah/Edit Gambar -->
               <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                         <div class="modal-content">
                              <div class="modal-header">
                                   <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Gambar</h1>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form method="post" action="" enctype="multipart/form-data">
                                   <div class="modal-body">
                                        <div class="mb-3">
                                             <label for="formGroupExampleInput" class="form-label">Judul</label>
                                             <input type="text" class="form-control" name="judul" placeholder="Tuliskan Judul Gambar" value="<?= isset($judul) ? $judul : ''; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                             <label for="formGroupExampleInput2" class="form-label">Gambar</label>
                                             <input type="file" class="form-control" name="gambar">

                                             <?php if (isset($gambar_lama) && $gambar_lama != ''): ?>
                                                  <div class="mt-3">
                                                       <img src="img_gallery/<?= $gambar_lama ?>" alt="Gambar Lama" width="150">
                                                  </div>
                                                  <input type="hidden" name="gambar_lama" value="<?= $gambar_lama ?>">
                                             <?php endif; ?>
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
               <!-- Akhir Modal Tambah/Edit Gambar -->

          </div>
     </div>

     <script>
          $(document).ready(function() {
               load_data();

               function load_data(hlm) {
                    $.ajax({
                         url: "gallery_data.php",
                         method: "POST",
                         data: {
                              hlm: hlm
                         },
                         success: function(data) {
                              $('#gallery_data').html(data);
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
     include "upload_gallery.php";

     //jika tombol simpan diklik
     if (isset($_POST['simpan'])) {
          $judul = $_POST['judul'];
          $tanggal = date("Y-m-d H:i:s");
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
                    document.location='admin.php?page=gallery';
                </script>";
                    die;
               }
          }

          // Check if id is set (for update)
          if (isset($_POST['id'])) {
               // If there is an id, perform update
               $id = $_POST['id'];

               if ($nama_gambar == '') {
                    // If no new image, retain the old image
                    $gambar = $_POST['gambar_lama'];
               } else {
                    // If new image, delete the old one
                    unlink("img_gallery/" . $_POST['gambar_lama']);
               }

               // Update query without the extra comma
               $stmt = $conn->prepare("UPDATE gallery 
                             SET 
                             judul = ?,
                             gambar = ?,
                             uploaded_at = ?
                             WHERE id = ?");

               $stmt->bind_param("ssss", $judul, $gambar, $tanggal, $id);  // Adjusted the parameter types for binding
               $simpan = $stmt->execute();
          } else {
               // Insert query for new data
               $stmt = $conn->prepare("INSERT INTO gallery (judul, gambar, uploaded_at)
                             VALUES (?, ?, ?)");

               $stmt->bind_param("sss", $judul, $gambar, $tanggal);
               $simpan = $stmt->execute();
          }


          if ($simpan) {
               echo "<script>
                alert('Simpan data sukses');
                document.location='admin.php?page=gallery';
            </script>";
          } else {
               echo "<script>
                alert('Simpan data gagal');
                document.location='admin.php?page=gallery';
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
               unlink("img_gallery/" . $gambar);
          }

          $stmt = $conn->prepare("DELETE FROM gallery WHERE id =?");

          $stmt->bind_param("i", $id);
          $hapus = $stmt->execute();

          if ($hapus) {
               echo "<script>
                alert('Hapus data sukses');
                document.location='admin.php?page=gallery';
            </script>";
          } else {
               echo "<script>
                alert('Hapus data gagal');
                document.location='admin.php?page=gallery';
            </script>";
          }

          $stmt->close();
          $conn->close();
     }
     ?>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
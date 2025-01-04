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
</head>

<body>

     <table class="table table-light table-striped table-hover" id="table">
          <thead class="table-primary">
               <tr>
                    <th>No</th>
                    <th class="col-1 col-sm-2 col-md-2">Nama cabang</th>
                    <th class="col-2 col-sm-3 col-md-4">Detail alamat</th>
                    <th class="col-2 col-sm-3 col-md-4">URL google maps</th>
                    <th class="col-2 col-sm-2 col-md-2">Dibuka pada</th>
                    <th class="col-2 col-sm-2 col-md-2">Gambar</th>
                    <th class="col-2 col-sm-2 col-md-2">Aksi</th>

               </tr>
          </thead>
          <tbody>
               <?php
               include 'koneksi.php';

               $hlm = (isset($_POST['hlm'])) ? $_POST['hlm'] : 1;
               $limit = 3;
               $limit_start = ($hlm - 1) * $limit;
               $no = $limit_start + 1;

               $sql = "SELECT * FROM cabang ORDER BY timedate DESC LIMIT $limit_start, $limit";
               $hasil = $conn->query($sql);

               $no = 1;
               while ($row = $hasil->fetch_assoc()) {
               ?>
                    <tr>
                         <td><?= $no++ ?></td>
                         <td>
                              <strong><?= $row["nama_cabang"] ?></strong>
                         </td>
                         <td><?= $row["detail_alamat"] ?></td>
                         <td><a href="<?= $row["google_maps"] ?>"><?= $row["google_maps"] ?></a></td>
                         <td><?= $row["timedate"] ?></td>
                         <td>
                              <?php
                              if ($row["gambar"] != '') {
                                   if (file_exists('img_cabang/' . $row["gambar"] . '')) {
                              ?>
                                        <img src="img_cabang/<?= $row["gambar"] ?>" class="rounded" width="" height="70">
                              <?php
                                   }
                              }
                              ?>
                         </td>
                         <td>
                              <div class="d-flex align-items-center gap-3">
                                   <a href="#" title="edit" class="d-flex align-items-center gap-1 bg-primary p-2 rounded  text-white text-decoration-none " data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                        Edit
                                   </a>
                                   <a href="#" title="delete" class="d-flex align-items-center gap-1 bg-danger p-2 rounded  text-white text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>">
                                        <i class="bi bi-trash3-fill fs-5"></i>
                                        Hapus
                                   </a>
                              </div>
                              <!-- Awal Modal Edit -->
                              <div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Cabang</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form method="post" action="" enctype="multipart/form-data">
                                                  <div class="modal-body">
                                                       <div class="mb-3">
                                                            <label for="formGroupExampleInput" class="form-label">Nama cabang</label>
                                                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                            <input type="text" class="form-control" name="nama_cabang" placeholder="Masukan nama cabang" value="<?= $row["nama_cabang"] ?>" required>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="floatingTextarea2">Detail alamat</label>
                                                            <textarea class="form-control" placeholder="Masukan detail alamat" name="detail_alamat" required><?= $row["detail_alamat"] ?></textarea>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="formGroupExampleInput" class="form-label">URL google maps</label>
                                                            <input type="text" class="form-control" name="google_maps" placeholder="Masukan url google maps" value="<?= $row["google_maps"] ?>" required>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="formGroupExampleInput2" class="form-label">Ganti Gambar</label>
                                                            <input type="file" class="form-control" name="gambar">
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="formGroupExampleInput3" class="form-label">Gambar Lama</label>
                                                            <?php
                                                            if ($row["gambar"] != '') {
                                                                 if (file_exists('img_cabang/' . $row["gambar"] . '')) {
                                                            ?>
                                                                      <br><img src="img_cabang/<?= $row["gambar"] ?>" width="100">
                                                            <?php
                                                                 }
                                                            }
                                                            ?>
                                                            <input type="hidden" name="gambar_lama" value="<?= $row["gambar"] ?>">
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
                              <!-- Akhir Modal Edit -->

                              <!-- Awal Modal Hapus -->
                              <div class="modal fade" id="modalHapus<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Cabang</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form method="post" action="" enctype="multipart/form-data">
                                                  <div class="modal-body">
                                                       <div class="mb-3">
                                                            <label for="formGroupExampleInput" class="form-label">Yakin akan menghapus Cabang"<strong><?= $row["nama_cabang"] ?></strong>"?</label>
                                                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                            <input type="hidden" name="gambar" value="<?= $row["gambar"] ?>">
                                                       </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                                                       <input type="submit" value="hapus" name="hapus" class="btn btn-primary">
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                              <!-- Akhir Modal Hapus -->
                         </td>
                    </tr>
               <?php
               }
               ?>
          </tbody>
     </table>


     <?php
     $sql1 = "SELECT * FROM cabang";
     $hasil1 = $conn->query($sql1);
     $total_records = $hasil1->num_rows;
     ?>
     <p>Total cabang : <?php echo $total_records; ?></p>
     <nav class="mb-2">
          <ul class="pagination justify-content-end">
               <?php
               $jumlah_page = ceil($total_records / $limit);
               $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
               $start_number = ($hlm > $jumlah_number) ? $hlm - $jumlah_number : 1;
               $end_number = ($hlm < ($jumlah_page - $jumlah_number)) ? $hlm + $jumlah_number : $jumlah_page;

               if ($hlm == 1) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#">First</a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
               } else {
                    $link_prev = ($hlm > 1) ? $hlm - 1 : 1;
                    echo '<li class="page-item halaman" id="1"><a class="page-link" href="#">First</a></li>';
                    echo '<li class="page-item halaman" id="' . $link_prev . '"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
               }

               for ($i = $start_number; $i <= $end_number; $i++) {
                    $link_active = ($hlm == $i) ? ' active' : '';
                    echo '<li class="page-item halaman ' . $link_active . '" id="' . $i . '"><a class="page-link" href="#">' . $i . '</a></li>';
               }

               if ($hlm == $jumlah_page) {
                    echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item disabled"><a class="page-link" href="#">Last</a></li>';
               } else {
                    $link_next = ($hlm < $jumlah_page) ? $hlm + 1 : $jumlah_page;
                    echo '<li class="page-item halaman" id="' . $link_next . '"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
                    echo '<li class="page-item halaman" id="' . $jumlah_page . '"><a class="page-link" href="#">Last</a></li>';
               }
               ?>
          </ul>
     </nav>


     <!-- CDN BOTSTRAP -->
     <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
          crossorigin="anonymous"></script>
</body>

</html>
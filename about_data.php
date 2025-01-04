<!-- about_data.php -->

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
                    <th class="col-5">Deskripsi</th>
                    <th class="col-2">Link refrensi deskripsi</th>
                    <th class="col-2">timedate</th>
                    <th class="col-2">Gambar</th>
                    <th class="col-2">Aksi</th>
               </tr>

          </thead>
          <tbody>
               <?php
               include 'koneksi.php';

               $hlm = (isset($_POST['hlm'])) ? $_POST['hlm'] : 1;
               $limit = 3;
               $limit_start = ($hlm - 1) * $limit;
               $no = $limit_start + 1;

               $sql = "SELECT * FROM about ORDER BY timedate DESC LIMIT $limit_start, $limit";
               $hasil = $conn->query($sql);

               // untuk mengecek jumlah data
               $count_query = "SELECT COUNT(*) as total FROM about";
               $count_result = $conn->query($count_query);
               $count_data = $count_result->fetch_assoc();
               $total_records = $count_data['total'];

               $no = 1;
               while ($row = $hasil->fetch_assoc()) {
               ?>
                    <tr>
                         <td><?= $no++ ?></td>
                         <td class="align-middle"><strong><?= $row["deskripsi"] ?></strong></td>
                         <td><a href="<?= $row["link"] ?>"><?= $row["link"] ?></a></td>
                         <td><?= $row["timedate"] ?></td>
                         <td>
                              <?php if ($row["gambar"] != '' && file_exists('img_about/' . $row["gambar"])) { ?>
                                   <img src="img_about/<?= $row["gambar"] ?>" class="rounded" width="100">
                              <?php } ?>
                         </td>
                         <td>

                              <div class="d-flex align-items-center gap-3">
                                   <a href="#" title="edit" class="bg-primary p-2 rounded text-white text-decoration-none" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>">
                                        <i class="bi bi-pencil-square text-white fs-5"></i>
                                        Edit
                                   </a>
                                   <?php if ($total_records > 1) { ?>
                                        <a href="#" title="delete" class="bg-danger p-2 rounded text-white text-decoration-none"
                                             data-bs-toggle="modal" data-bs-target="#modalHapus<?= $row["id"] ?>">
                                             <i class="bi bi-trash3-fill text-white fs-5"></i>
                                             Hapus
                                        </a>
                                   <?php } ?>
                              </div>

                              <!-- Awal Modal Edit -->
                              <div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Article</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form method="post" action="" enctype="multipart/form-data">
                                                  <div class="modal-body">
                                                       <div class="mb-3">
                                                            <label for="floatingTextarea2">Deskripsi</label>
                                                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                            <textarea class="form-control" placeholder="Tuliskan Isi deskripsi" name="deskripsi" rows="6" required><?= $row["deskripsi"] ?></textarea>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="formGroupExampleInput" class="form-label">link</label>
                                                            <input type="text" class="form-control" name="link" value="<?= $row["link"] ?>" required>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="formGroupExampleInput2" class="form-label">Ganti Gambar</label>
                                                            <input type="file" class="form-control" name="gambar">
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="formGroupExampleInput3" class="form-label">Gambar Lama</label>
                                                            <?php
                                                            if ($row["gambar"] != '') {
                                                                 if (file_exists('img_about/' . $row["gambar"] . '')) {
                                                            ?>
                                                                      <br><img src="img_about/<?= $row["gambar"] ?>" width="100">
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
                                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus gallery</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form method="post" action="" enctype="multipart/form-data">
                                                  <div class="modal-body">
                                                       <div class="mb-3">
                                                            <label for="formGroupExampleInput" class="form-label">Yakin akan menghapus gallery "<strong><?= $row["deskripsi"] ?></strong>"?</label>
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
     $sql1 = "SELECT * FROM about";
     $hasil1 = $conn->query($sql1);
     $total_records = $hasil1->num_rows;
     ?>
     <p>Total about : <?php echo $total_records; ?></p>
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
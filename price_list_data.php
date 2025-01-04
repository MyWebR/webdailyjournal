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
                    <th class="col-2">Nama</th>
                    <th class="col-2">Harga</th>
                    <th class="col-2">Diskon</th>
                    <th class="col-2">Potongan</th>
                    <th class="col-2">Harga Akhir</th>
                    <th class="col-6">Kategori</th>
                    <th class="col-6">Action</th>
               </tr>
          </thead>
          <tbody>
               <?php
               include 'koneksi.php';

               $hlm = (isset($_POST['hlm'])) ? $_POST['hlm'] : 1;
               $limit = 5;
               $limit_start = ($hlm - 1) * $limit;
               $no = $limit_start + 1;

               $sql = "SELECT * FROM price_list ORDER BY diskon DESC LIMIT $limit_start, $limit";
               $hasil = $conn->query($sql);

               $no = 1;
               while ($row = $hasil->fetch_assoc()) {
               ?>
                    <tr>
                         <td class="align-middle"><?= $no++ ?></td>
                         <td class="align-middle">
                              <strong><?= $row["nama"] ?></strong>
                         </td>
                         <td class="align-middle">Rp <?= number_format($row["harga"], 0, ',', '.') ?></td>
                         <td class="align-middle text-primary"><?= number_format($row["diskon"], 0, ',', '.') ?>%</td>
                         <td class="align-middle">
                              <?php
                              // Cek apakah ada diskon dan hitung potongan harga
                              $diskon_amount = ($row["diskon"] > 0) ? $row["harga"] * ($row["diskon"] / 100) : '-';
                              ?>
                              <span class="text-danger">
                                   <?= is_numeric($diskon_amount) ? 'Rp ' . number_format($diskon_amount, 0, ',', '.') : $diskon_amount ?>
                              </span>
                         </td>
                         <td class="align-middle">
                              <?php
                              // Cek apakah ada diskon dan hitung total harga setelah diskon
                              $total_harga = ($row["diskon"] > 0) ? $row["harga"] - ($row["harga"] * ($row["diskon"] / 100)) : '-';
                              ?>
                              <span class="fw-bold text-success">
                                   <?= is_numeric($total_harga) ? 'Rp ' . number_format($total_harga, 0, ',', '.') : $total_harga ?>
                              </span>
                         </td>
                         <td class="align-middle"><?= $row["jenis"] ?></td>
                         <td class="align-middle">
                              <div class="d-flex align-items-center gap-3">
                                   <a href="#" title="edit" class="d-flex align-items-center gap-1 bg-primary p-2 rounded  text-white text-decoration-none " data-bs-toggle="modal" data-bs-target="#modalEdit<?= $row["id"] ?>">
                                        <i class="bi bi-pencil-square fs-5"></i>
                                        Edit
                                   </a>
                                   <a href="#"
                                        class="d-flex align-items-center gap-1 bg-danger p-2 rounded text-white text-decoration-none"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalHapus<?= $row["id"] ?>">
                                        <i class="bi bi-trash3-fill fs-5"></i>
                                        Hapus
                                   </a>
                              </div>


                              <!-- Awal Modal Hapus -->
                              <div class="modal fade" id="modalHapus<?= $row["id"] ?>" tabindex="-1" aria-labelledby="modalHapusLabel<?= $row["id"] ?>" aria-hidden="true">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h5 class="modal-title" id="modalHapusLabel<?= $row["id"] ?>">Konfirmasi Hapus Menu Makanan</h5>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form method="post" action="">
                                                  <div class="modal-body">
                                                       <p>Yakin akan menghapus Menu "<strong><?= $row["nama"] ?></strong>" ?</p>
                                                       <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                  </div>
                                                  <div class="modal-footer">
                                                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                       <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                              <!-- Akhir Modal Hapus -->

                              <!-- Awal Modal Edit -->
                              <div class="modal fade" id="modalEdit<?= $row["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                   <div class="modal-dialog">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Harga</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                             </div>
                                             <form method="post" action="" enctype="multipart/form-data">
                                                  <div class="modal-body">
                                                       <div class="mb-3">
                                                            <label for="formGroupExampleInput" class="form-label">Nama</label>
                                                            <input type="hidden" name="id" value="<?= $row["id"] ?>">
                                                            <input type="text" class="form-control" name="nama" placeholder="Tuliskan nama makanan" value="<?= $row["nama"] ?>" required>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="floatingTextarea2">Harga</label>
                                                            <input type="text" class="form-control" name="harga" placeholder="Harga" value="<?= $row["harga"] ?>" required>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="floatingTextarea2">Berikan Dsikon</label>
                                                            <input type="number" class="form-control" placeholder="Tambahkan diskon" name="diskon" value="<?= $row["diskon"] ?>">
                                                       </div>
                                                       <div class="mb-3">
                                                            <label for="jenis">Jenis</label>
                                                            <select class="form-control" name="jenis" required>
                                                                 <option value="makanan">Makanan</option>
                                                                 <option value="minuman">Minuman</option>
                                                            </select>
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

                         </td>
                    </tr>
               <?php
               }
               ?>
          </tbody>
     </table>


     <?php
     $sql1 = "SELECT * FROM price_list";
     $hasil1 = $conn->query($sql1);
     $total_records = $hasil1->num_rows;
     ?>
     <p>Total Makanan dan Minuman : <?php echo $total_records; ?></p>
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
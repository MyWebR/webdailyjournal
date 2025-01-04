<?php
include "koneksi.php";
?>

<?php
//query untuk mengambil data article
$sql1 = "SELECT * FROM article ORDER BY tanggal DESC";
$hasil1 = $conn->query($sql1);

//menghitung jumlah baris data article
$jumlah_article = $hasil1->num_rows;

// query untuk mengambil data gallery
$sql2 = "SELECT * FROM gallery ORDER BY uploaded_at DESC";
$hasil2 = $conn->query($sql2);

// menghitung jumlah baris data gallery
$jumlah_gallery = $hasil2->num_rows;

// query untuk mengambil data about
$sql2 = "SELECT * FROM about ORDER BY timedate DESC";
$hasil2 = $conn->query($sql2);

// menghitung jumlah baris data about
$jumlah_about = $hasil2->num_rows;

// query untuk mengambil data cabang
$sql2 = "SELECT * FROM cabang ORDER BY timedate DESC";
$hasil2 = $conn->query($sql2);

// menghitung jumlah baris data cabang
$jumlah_cabang = $hasil2->num_rows;

// query untuk mengambil data menu
$sql2 = "SELECT * FROM price_list";
$hasil2 = $conn->query($sql2);

// menghitung jumlah baris data menu
$jumlah_price_list = $hasil2->num_rows;
?>

<div class="row row-cols-1 row-cols-md-4 g-4 justify-content-center pt-4">
    <!-- jumlah article -->
    <div class="col">
        <div class="card border border-5 border-warning-subtle mb-3 shadow bg-warning rounded-4" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title cardTextLight" id="smallcard"> <i class="bi bi-file-earmark-text"></i>
                            Article</h5>
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-warning fs-2 cardTextLight" id="smallcard"><?php echo $jumlah_article; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jumlah gallery -->
    <div class="col">
        <div class="card border border-5 border-success-subtle mb-3 shadow bg-success rounded-4" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title cardTextLight" id="smallcard"> <i class="bi bi-images"></i>
                            Gallery</h5>
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-success text-dark fs-2 cardTextLight" id="smallcard"><?php echo $jumlah_gallery;
                                                                                                                        ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jumlah about -->
    <div class="col">
        <div class="card border border-5 border-secondary-subtle mb-3 shadow bg-secondary rounded-4" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title cardTextLight" id="smallcard"> <i class="bi bi-file-earmark-richtext"></i>
                            About</h5>
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-secondary text-dark fs-2 cardTextLight" id="smallcard"><?php echo $jumlah_about;
                                                                                                                        ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jumlah cabang -->
    <div class="col">
        <div class="card border border-5 border-primary-subtle mb-3 shadow bg-primary rounded-4" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-3">
                        <h5 class="card-title cardTextLight" id="smallcard"> <i class="bi bi-buildings"></i>
                            Cabang</h5>
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-primary text-dark fs-2 cardTextLight" id="smallcard"><?php echo $jumlah_cabang;
                                                                                                                        ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jumlah menu -->
    <div class="col">
        <div class="card border border-5 border-primary-subtle mb-3 shadow bg-primary rounded-4" style="max-width: 18rem;">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="p-1 d-block">
                        <h5 class="card-title cardTextLight" id="smallcard">
                            <i class="bi bi-buildings"></i>
                            Menu
                        </h5>
                        <smal class="card-title cardTextLight" id="smallcard"></i>
                            Makanan dan minuman</h5>
                    </div>
                    <div class="p-3">
                        <span class="badge rounded-pill text-bg-primary text-dark fs-2 cardTextLight" id="smallcard"><?php echo $jumlah_price_list;
                                                                                                                        ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Menu Admin</title>
     <style>
          .hover-dashboard {
               transition: background-color 0.3s, transform 0.3s;
          }

          .hover-dashboard:hover {
               background-color: #5bc0de;
               transform: scale(1.05);
               box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
               transition: all 0.3s ease-in-out;
          }
     </style>
</head>

<body>
     <section class="justify-content-center d-flex align-items-center mb-5">
          <div>
               <div class="container d-flex flex-wrap gap-5 justify-content-center mt-5">
                    <a href="admin.php?page=dashboard" class="hover-dashboard border border-4 border-primary-subtle bg-primary d-flex align-items-center gap-3 fs-3 text-decoration-none p-3 rounded-4 justify-content-center text-white">
                         <i class="bi bi-clipboard-data"></i>
                         Dashboard
                    </a>
                    <a href="admin.php?page=gallery" class="hover-dashboard border border-4 border-success-subtle bg-success d-flex align-items-center gap-3 fs-3 text-decoration-none p-3 rounded-4 justify-content-center text-white">
                         <i class="bi bi-images"></i>
                         Gallery
                    </a>
                    <a href="admin.php?page=about" class="hover-dashboard border border-4 border-secondary-subtle bg-secondary d-flex align-items-center gap-3 fs-3 text-decoration-none p-3 rounded-4 justify-content-center text-white">
                         <i class="bi bi-file-earmark-richtext"></i>
                         About
                    </a>
                    <a href="admin.php?page=cabang" class="hover-dashboard border border-4 border-info-subtle bg-info d-flex align-items-center gap-3 fs-3 text-decoration-none p-3 rounded-4 justify-content-center text-white">
                         <i class="bi bi-buildings"></i>
                         Cabang
                    </a>
                    <a href="admin.php?page=article" class="hover-dashboard border border-4 border-warning-subtle bg-warning d-flex align-items-center gap-3 fs-3 text-decoration-none p-3 rounded-4 justify-content-center text-white">
                         <i class="bi bi-file-earmark-text"></i>
                         Article
                    </a>
                    <a href="admin.php?page=price_list" class="hover-dashboard border border-4 border-primary-subtle bg-primary d-flex align-items-center gap-3 fs-3 text-decoration-none p-3 rounded-4 justify-content-center text-white">
                         <i class="bi bi-receipt-cutoff"></i>
                         Price List
                    </a>
               </div>
          </div>
     </section>
</body>

</html>
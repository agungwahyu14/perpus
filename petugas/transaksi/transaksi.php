<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
  header("location: ../../index.php");
}

require '../../functions.php';

// Pagination
// konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData = count(query("SELECT * FROM transaksi"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$transaksi = query("SELECT * FROM transaksi WHERE status='pinjam' ORDER BY id_transaksi DESC");

//Tombol cari diklik
if (isset($_POST["cari"])) {
  $transaksi = cariTransaksi($_POST["keyword"]);
}


?>

<!DOCTYPE html>
<html>

<head>


  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>Petugas Dashboard</title>
 

  <!-- Bootstrap CSS -->
  <link href="../bs5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../bs5/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="../../bs5/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="../../bs5/css/style.css" />
  <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

  <script src="js/jquery.min.js"></script>
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-2"> Petugas <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading mt-2 mb-2">
        <div class="text-center"> Home</div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active mt-2 mb-2">
        <a class="nav-link" href="../home.php">
        <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading mt-2 mb-2">
        <div class="text-center"> Add User</div>
       
        
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item mt-2 mb-2">
        <a class="nav-link collapsed" href="../add/add_siswa.php">
            <i class="fas fa-fw fa-plus"></i>
            <span>Add Siswa</span>
        </a>
    </li>
   
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item mt-2 mb-2">
        <a class="nav-link collapsed" href="../add/add_buku.php" >
            <i class="fas fa-fw fa-plus"></i>
            <span>Add Buku</span>
        </a>
    </li>
   



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    <div class="text-center"> Transaction</div>
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item mt-2 mb-2">
        <a class="nav-link collapsed" href="#" >
            <i class="fas fa-fw fa-folder"></i>
            <span>Pinjaman</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item mt-2 mb-2">
        <a class="nav-link collapsed" href="pengembalian.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Pengembalian</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>
<!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="POST">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control bg-light border-0 small shadow" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" autofocus autocomplete="off">
                            <div class="input-group-append">
                                <button name="cari"class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>


            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-3 d-none d-lg-inline text-gray-600 small">Petugas</span>
                        <img class="img-profile rounded-circle" src="asset/img/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Activity Log
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
  <!-- offcanvas -->
  <!-- Begin Page Content -->
          <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 mb-0 text-gray-800">Daftar Pinjaman</h1>
        </div>



              <!-- Content Row -->
              <div class="row">
              <div class="col-lg-12 mb-4">
              <div class="card">
                  <div class="card-header bg-primary text-white"></div>
              <div class="card-body">
              
             
              <!-- NAVIGASI PAGINATION -->
              <!-- <?php if ($halamanAktif > 1) : ?>
                <a href="?halaman=<?= $halamanAktif - 1; ?>"> &laquo;</a>
              <?php endif; ?>

              <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                  <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: black;" class="btn btn-warning"><?= $i; ?></a>
                <?php else : ?>
                  <a href="?halaman=<?= $i; ?>" class="btn btn-primary"><?= $i; ?></a>
                <?php endif; ?>
              <?php endfor; ?>

              <?php if ($halamanAktif < $jumlahHalaman) : ?>
                <a href="?halaman=<?= $halamanAktif + 1; ?>"> &raquo;</a>
              <?php endif; ?> -->
              <table class="table table-bordered table-striped text-center " cellspacing="0" id="dataTables-example">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th width="12%">Aksi</th>
                  </tr>
                </thead>
                <tbody id="tampil">
                  <?php
                  $a = 1;
                  foreach ($transaksi as $data) : ?>
                    <tr>
                      <td><?php echo $a; ?></td>
                      <td>
                        <?= $data['judul']; ?>
                      </td>
                      <td>
                        <?= $data['username']; ?>
                      </td>
                      <td><?php echo $data['nama'];; ?></td>
                      <td><?php echo $data['tgl_pinjam']; ?></td>
                      <td><?php echo $data['tgl_kembali']; ?></td>
                      <td><?php
                          $tanggal_dateline = $data['tgl_kembali'];
                          $tgl_kembali = date('Y-m-d');
                          $lambat = terlambat($tanggal_dateline, $tgl_kembali);
                          $status = $data["status"];

                          if ($lambat > 0) {
                            echo "<font color='red'>Terlambat </font>";
                          } else {
                            echo "<font color='green'>$status</font>";
                          }

                          ?></td>

                      <td>
                        <a href="perpanjang.php?transaksi&aksi=perpanjang&id=<?php echo $data['id_transaksi']; ?>&judul=<?php echo $data['judul']; ?>&tgl_kembali=<?php echo $data['tgl_kembali'] ?>&lambat=<?php echo $lambat; ?>" class="btn btn-warning" onclick="return confirm('ANDA YAKIN MEMPERPANJANG MASA PINJAMAN BUKU INI?');">Perpanjang</a>
                      </td>
                    </tr>
                    <?php $a++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              </div>
                 </div>

                        
                            
                            </div>
                          

                        </div>
                    </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>






  <script src="../../bs5/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="../../bs5/js/jquery-3.5.1.js"></script>
  <script src="../../bs5/js/jquery.dataTables.min.js"></script>
  <script src="../../bs5/js/dataTables.bootstrap5.min.js"></script>
  <script src="../../bs5/js/script.js"></script>

  <script>
    $(document).ready(function() {
      $("#search").keyup(function() {
        $.ajax({
          type: 'POST',
          url: 'search/searchTransaksi.php',
          data: {
            search: $(this).val()
          },
          cache: false,
          success: function(data) {
            $("#tampil").html(data);
          }
        });
      });
    });
  </script>

  <!-- Bootstrap core JavaScript-->
  <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset/js/demo/chart-area-demo.js"></script>
    <script src="asset/js/demo/chart-pie-demo.js"></script>

</body>

</html>
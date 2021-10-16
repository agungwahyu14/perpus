<?php
session_start();

// cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
  header("location: ../../index.php");
}

require '../../functions.php';

$pinjam = date("d-m-Y");
$kembali = date("d-m-Y", time() + 60 * 60 * 24 * 5);

$buku = query("SELECT * FROM buku ORDER by id DESC");
$siswa = query("SELECT * FROM siswa ORDER by id DESC");

if (isset($_POST['simpan'])) {
  $tgl_pinjam    = isset($_POST['pinjam']) ? $_POST['pinjam'] : "";
  $tgl_kembali  = isset($_POST['kembali']) ? $_POST['kembali'] : "";

  $dapat_buku    = isset($_POST['judul']) ? $_POST['judul'] : "";
  $pecah_buku    = explode(".", $dapat_buku);
  $id_buku    = $pecah_buku[0];
  $judul      = $pecah_buku[1];

  $dapat_siswa  = isset($_POST['siswa']) ? $_POST['siswa'] : "";
  $pecah_siswa  = explode(".", $dapat_siswa);
  $id     = $pecah_siswa[0];
  $siswa      = $pecah_siswa[1];


  $query = query("SELECT * FROM buku WHERE judul = '$judul'");
  foreach ($query as $hasil) {
    $sisa = $hasil['jumlah_buku'];

    //cek apakah ada data yang sama
    $cek = $conn->query("SELECT * FROM transaksi WHERE username=$id AND id_buku=$id");


    if ($sisa == 0) {
      echo "
      <script>
        alert('Stok buku telah habis, tidak bisa melakukan transaksi, silahkan tambahkan stok buku segera');
        document.location.href = 'tambah.php';
      </script>";
    } elseif ($sisa != 0) {
      $qt = $conn->query("INSERT INTO transaksi VALUES (null, '$id', '$judul', '$id', '$siswa', '$tgl_pinjam', '$tgl_kembali', 'Pinjam', null)") or die("Gagal Masuk");
      $qb  = $conn->query("UPDATE buku SET jumlah_buku = (jumlah_buku-1) WHERE id = $id ");

      if ($qt && $qb) {
        echo "
        <script>
          alert('TRANSAKSI BERHASIL');
          document.location.href = 'transaksi.php';
        </script>";
      } else {
        echo "
        <script>
          alert('TRANSAKSI GAGAL');
          document.location.href = 'transaksi.php';
        </script>";
      }
    } else {
      echo "
      <script>
        alert('Anda sudah meminjam buku yang sama');
        document.location.href = 'tambah.php';
      </script>";
    }
  }
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

<body id="page-top" >
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
  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center">Tambah Data Pinjaman</h1>
        </div>
        <div class="container">
          <div class="card mt-3 shadow">
            <div class="card-header bg-primary text-white text-center">
              Form Input Data Pinjam Buku
            </div>
            <div class="card-body">
              <form action="" method="POST" aria-required="true">
                <div class="form-group mb-3">
                  <label class="mb-2"> Judul Buku</label>
                  <select class="form-control" name="judul" required>
                    <option required>== Pilih Buku==</option>
                    <?php
                    foreach ($buku as $bku) {
                      echo "<option value='$bku[id].$bku[judul]'>$bku[judul]</option>";
                    }
                    ?>
                  </select>

                </div>

                <div class="form-group mb-3">
                  <label class="mb-2">Nama Siswa</label>
                  <select class="form-control" name="siswa" required>
                    <option>== Pilih Siswa==</option>
                    <?php
                    foreach ($siswa as $swa) {
                      echo "<option value='$swa[username].$swa[nama]'>$swa[username] - $swa[nama]</option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group mb-3">
                  <label class="mb-2">Tanggal Pinjam</label>
                  <input class="form-control" type="text" name="pinjam" value="<?php echo $pinjam; ?>" readonly />
                </div>


                <div class="form-group mb-3">
                  <label class="mb-2">Tanggal Kembali</label>
                  <input class="form-control" type="text" name="kembali" value="<?php echo $kembali; ?>" readonly />
                </div>

                <div>
                  <input type="submit" name="simpan" value="simpan" class="btn btn-primary">
                  <input type="reset" name="simpan" value="reset" class="btn btn-warning">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </main>
  <script src="../../bs5/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
  <script src="../../bs5/js/jquery-3.5.1.js"></script>
  <script src="../../bs5/js/jquery.dataTables.min.js"></script>
  <script src="../../bs5/js/dataTables.bootstrap5.min.js"></script>
  <script src="../../bs5/js/script.js"></script>

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
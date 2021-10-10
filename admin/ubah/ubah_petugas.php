<?php
session_start();
require '../../functions.php';

$id = $_GET["id"];
$petugas = query("SELECT * FROM petugas WHERE id = $id")[0];
  
  if (isset($_POST["submit"])) {
    // cek apakah data berhasil di tambah atau tidak
    if (ubahPetugas($_POST) > 0) {
      echo "
          <script>
          alert('DATA BERHASIL DIUBAH !');
          document.location.href = '../tables/table_petugas.php';
          </script>
        ";
    } else {
      echo "
          <script>
          alert('DATA GAGAL DIUBAH !!');
          document.location.href = '../tables/table_petugas.php';
          </script>
        ";
    }
  }
  
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

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
                <div class="sidebar-brand-text mx-2"> Admin <sup>2</sup></div>
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
            <div class="sidebar-heading  mt-2 mb-2">
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
                <a class="nav-link collapsed" href="../add/add_petugas.php" >
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Add Petugas</span>
                </a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item mt-2 mb-2">
                <a class="nav-link collapsed" href="../add/add_buku.php" >
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Add Buku</span>
                </a>
            </li>
             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item mt-2 mb-2">
                <a class="nav-link collapsed" href="../add/add_admin.php" >
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Add Admin</span>
                </a>
            </li>




            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading  mt-2 mb-2">
            <div class="text-center"> Others</div>
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item mt-2 mb-2">
                <a class="nav-link collapsed" href="#" >
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item mt-2 mb-2">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h2 mb-0 text-gray-800 mt-4">Ubah Data Petugas</h1>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="asset/img/undraw_profile.svg"> </a>

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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                   
                    


                    <!-- Content Row -->
                    <div class="row">


                        <div class="col-lg-6 mb-4">

                        <form  class="user" method="POST">
                        <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $petugas["id"]; ?>">
                            <label for="">Full Name</label>
                            <input name="nama" type="text" value="<?= $petugas["nama"]; ?>" class="form-control form-control-user" placeholder="Enter Name" required autofocus autocomplete="off">
                            </div>
                            <div class="form-group">
                            <label for="">Username</label>
                            <input name="username" type="text" value="<?= $petugas["username"]; ?>" class="form-control form-control-user"placeholder="Enter Username" required autofocus autocomplete="off">
                            </div>
                            <div class="form-group">
                            <label for="">Email</label>
                            <input name="email" type="text" value="<?= $petugas["email"]; ?>" class="form-control form-control-user"placeholder="Enter Email" required autofocus autocomplete="off">
                            </div>
                            <div class="form-group">
                             <br>
                            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Ubah Data</button>
                       </form>

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
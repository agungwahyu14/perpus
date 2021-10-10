<?php

session_start();

require 'functions.php';

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $siswa = mysqli_query($conn, "SELECT * FROM siswa WHERE username = '$username'");
  $petugas = mysqli_query($conn, "SELECT * FROM petugas WHERE username = '$username'");
  $admin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

  // Cek username
  if (mysqli_num_rows($siswa) === 1) {

    // Cek password
    $rowSiswa = mysqli_fetch_assoc($siswa);
    if (password_verify($password, $rowSiswa["password"])) {
      // Set Session
      
      $_SESSION['login'] = true;
      $_SESSION['username'] = $rowSiswa['nama'];  
      $_SESSION['level'] = "Siswa";


      header("location: siswa/home.php");
    } else {
      $errorPass = true;
    }
  } elseif (mysqli_num_rows($petugas) === 1) {
    $rowPetugas = mysqli_fetch_assoc($petugas);
    if (password_verify($password, $rowPetugas["password"])) {
      $_SESSION['login'] = true;
      $_SESSION['username'] = $rowPetugas["nama"];
      $_SESSION['level'] = "Petugas";
      
      header("location: petugas/home.php");
    } else {
      $errorPass = true;
    }
  } elseif (mysqli_num_rows($admin) === 1) {
    $rowAdmin = mysqli_fetch_assoc($admin);
    if ($password == $rowAdmin["password"]) {
      $_SESSION['login'] = true;
      $_SESSION['username'] = $rowAdmin["nama"];
      $_SESSION['level'] = "Admin";
      header("location: admin/home.php");
    } else {
      $errorPass = true;
    }
  } else {
    $errorUsername = true;
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

    <title>Halaman Login</title>

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="container-fluid">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                  <form method="POST" action="" class="user">
                                    <div class="text-center">
                                          <h1 class="h4 text-gray-900 mb-4">Welcome Back</h1>
                                        <p class="mt-4">Masukkan Data anda dengan Benar!</p>
                                        <hr>
                                        </div>
                                        <div class="form-group">
                                            <input name="username" type="text" class="form-control form-control-user"placeholder="Enter Username" required autofocus autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <input name ="password" type="password" class="form-control form-control-user" placeholder="Password" required autofocus autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                      
                                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
                                      
                                  </form>
                                    <hr>
                                    <br>
                                    <div class="text-center">
                                       <p>No Have Account?<a class="medium" href="register.php"> Create Account!</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

</body>

</html>
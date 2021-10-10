<?php

require 'functions.php';

if (isset($_POST["register"]) ) {

  if (register($_POST) > 0) {
    echo "
        <script>
        alert('USER BARU BERHASIL DITAMBAH !');
        </script>
        
      ";
  } else {
    echo mysqli_error($conn);
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

    <title>Halaman Register</title>

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-light">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                <p class="mb-4">Masukkan Data anda dengan Benar!</p>
                                <hr>
                            </div>
                            <form class="user" method="POST">
                            <div class="form-group">
                              <input name="nama" type="text" class="form-control form-control-user"placeholder="Enter Full Name" required autofocus autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input name="username" type="text" class="form-control form-control-user"placeholder="Enter Username" required autofocus autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input name="email"  type="email" class="form-control form-control-user"placeholder="Enter Email" required autofocus autocomplete="off">
                            </div>
                            <div class="form-group">
                              <input name="password"  type="password" class="form-control form-control-user"placeholder="Enter Password" required autofocus autocomplete="off">
                            </div>
                            <div class="form-group">
                              <input name="password2" type="password" class="form-control form-control-user"placeholder="Enter Confirm Password" required autofocus autocomplete="off">
                            </div>
                            <button class="btn btn-lg btn-primary btn-block mt-5" type="submit" name="register" >Register</button>

                              
                            </form>
                            <hr>
                            <div class="text-center">
                                <p>Already have an account?<a class="medium" href="index.php"> Login!</a></p>
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




<?php
require '../functions.php';

$buku = query("SELECT * FROM buku");

// Tombol cari di click
if(isset($_POST["cari"]) ){
  $buku = caribuku($_POST["keyword"]);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dasboard Siswa</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />
  <!-- bootsrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="plugins/icofont/icofont.min.css">
  <!-- Custom fonts for this template-->
  <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/s lick-theme.css">


  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="top">
  <header>
<nav class="navbar navbar-expand navbar-light bg-white topbar static-top shadow" id="navbar">
        <div class="container">
          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-4 my-2 my-md-0 mw-100 navbar-search" action="" method="POST">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" autofocus autocomplete="off">
                            <div class="input-group-append">
                                <button name="cari" class="btn btn-main" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
        
          <div class="collapse navbar-collapse " id="navbarmain">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a class="nav-link" href="home.php">Home</a>
            </li>
           
            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            <li class="nav-item dropdown">
					  <a class="nav-link dropdown-toggle" href="department.html" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Settings
            <i class="icofont-thin-down"></i></a>
					  <ul class="dropdown-menu" aria-labelledby="dropdown02">
						<li><a class="dropdown-item" href="#">Profile</a></li>
						<li><a class="dropdown-item" href="../logout.php">Log Out</a></li>
          </ul>
          </div>
        </div>
	</nav>
</header>
      <!--Section Koleksi Buku  -->

      <div class="container mt-5 mb-2">
            <div class="row">
            <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-title text-center">
                    <h2 class="text-md mt-5">Koleksi Buku</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="mb-2">Laboriosam exercitationem molestias beatae eos pariatur, similique, excepturi mollitia sit perferendis maiores ratione aliquam?</p>                   
                </div>
            </div>
        </div>

          <!-- DataTales Example -->
          <div class="container mb-4">

            <div class="card-body">
              <div class="row">



                <?php if (empty($buku)) : ?>
                  <tr>
                    <td ><div class="alert alert-secondary alert-dismissible fade show" role="alert">
                      <strong>Buku tidak ditemukan!</strong> Coba periksa kembali
                      <a href="tabel_buku.php" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></a>
                    </div>
                  </td>
                  </tr>
                <?php endif; ?>

                <?php $i = 1; ?>
                <?php foreach ($buku as $row) { ?>

                    
                  <div class="card mb-4 col-md-5 mr-auto ml-auto" style="max-width: 540px;">
                    <div class="row no-gutters">
                      <div class="col-md-4 mt-3 mb-3">
                        <div class="card justify-content-center">
                        <img src="../admin/add/buku/<?= $row["cover"]; ?>" width="150">
                        </div>
                      </div>
                      
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title"><?= $row["judul"]; ?></h5>
                          <b>
                            <p class="card-text"> <?= $row["pengarang"]; ?></p>
                          </b>
                          <p class="card-text"><small class="text-muted"><?= $row["penerbit"]; ?></small></p>
                          <p class="card-text"><small class="text-muted"><?= $row["kode_buku"]; ?></small></p>
                          <a href="#" class="btn btn-success">Pinjam</a>
                          <a href="#" class="btn btn-primary"><i class="fas fa-bookmark"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php $i++; ?>
                <?php } ?>

              </div>
            </div>

          </div>

        </div>
      </div>
    </section>
      <!-- footer -->
  <footer>
    <div class="footer-btm py-4 mt-5">
    <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>

</footer>
<!-- Essential Scripts-->

    
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>

    <script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbwR4jwurM4OYW4WuH7F0AV1jjxjbHn3bOcSVKf1vCp3RWe9MpztbmtrXe7VTj4MeLue7Q/exec'
  const form = document.forms['perpus-contact-form']

  const btnKirim=document.querySelector('.btn-kirim');
  const btnLoading=document.querySelector('.btn-loading');
  const contactAlert=document.querySelector('.contact-alert');

  form.addEventListener('submit', e => {
    e.preventDefault()
    // ketika tombol submit diclick
    // tampilkan tobol loading hilang tombol kirim
    btnLoading.classList.toggle('d-none');
    btnKirim.classList.toggle('d-none');

    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
      .then(response => {

        btnLoading.classList.toggle('d-none');
        btnKirim.classList.toggle('d-none');

        contactAlert.classList.toggle('d-none');
        form.reset();
        console.log('Success!', response);
        })
      .catch(error => console.error('Error!', error.message))
  })
</script>
</body>
</html>
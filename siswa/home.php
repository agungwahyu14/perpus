<?php

session_start();

require '../functions.php';

$siswa = query("SELECT * FROM siswa");


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
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick-carousel/slick/s lick-theme.css">

  <!-- AOS -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body id="top">
  <header>
  <nav class="navbar navbar-expand navbar-light bg-white topbar static-top " id="navbar">
        <div class="container">

        <a class="navbar-brand" href="home.php">
			  	<img src="images/elearningskensa.png" width="80" alt="" class="img-fluid">
			  </a>
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
			  	</li>
          </ul>
          </div>
        </div>
	</nav>
</header>

        <!-- Slider Start -->
        <section class="banner">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-xl-7">
                <div class="block">
                  <div class="divider mb-3"></div>
                  <span class="text-uppercase text-md letter-spacing text-white ">WELCOME BACK!</span><br><br>
                  <h1 class="mb-3 mt-3 ">Hello</h1>
                  <h4 class="text-uppercase letter-spacing text-white ">Selamat datang ke website kami</h4><br>
                  <h4 class="text-white ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores esse,similique cupiditate, provident soluta voluptas.  recusandae dolore quasi impedit facere,  facilis!</h4>
                  <div class="btn-container">
                    <a href="#menu" class="btn btn-main-2 btn-icon btn-round-full mt-5 mb-5">STARTED <i class="icofont-simple-right ml-2  "></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <br><br><br><br>
        <section class="features" id="menu">
          <div class="container mt-5 mb-5" data-aos="fade-up" data-aos-duration="1000">
            <div class="row">
            <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mt-5">Feautures</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="mb-3">Laboriosam exercitationem molestias beatae eos pariatur, similique, excepturi mollitia sit perferendis maiores ratione aliquam?</p>                   
                </div>
            </div>
        </div>
              <div class="col-lg-12" data-aos="fade-left" data-aos-duration="1000">
                <div class="feature-block d-lg-flex">
                  <div class="feature-item mb-5 mr-5 mb-lg-0 ">
                    <div class="feature-icon mb-4">
                      <i class="icofont-book"></i>
                    </div>
                    <h4 class="mb-4">KOLEKSI BUKU</h4>
                    <span>Cari buku yang anda inginkan,banyak pilihan ada disini, semoga buku yang kamu cari ada disini</span><br>
                    <a href="tabel_buku.php" class="btn btn-main btn-round-full mt-4">DETAIL</a>
                  </div>
                
                  <div class="feature-item mb-5 mb-lg-0 " data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="feature-icon mb-4">
                      <i class="icofont-star"></i>
                    </div>
                    <h4 class="mb-4">FAVORIT SAYA</h4>
                    <span>Baca kembali buku yang sudah kamu baca di favorit</span><br>
                    <a href="favorite.php" class="btn btn-main btn-round-full mt-5">DETAIL</a>
                  </div>
                
                  <div class="feature-item mb-5 ml-5 mb-lg-0" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                    <div class="feature-icon mb-4">
                      <i class="icofont-list"></i>
                    </div>
                    <h4 class="mb-4">PINJAMAN SAYA</h4>
                    <span>Buku apa saja yang sudah kamu pinjam,periksa kembali dan kapan harus dikembalikan  </span><br>
                    <a href="pinjaman.php" class="btn btn-main btn-round-full mt-4">DETAIL</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <br>
        <br>
        <br><br>
      <!-- Section Contact -->
      <section class="contact-form-wrap section" id="contact" data-aos="fade-up" data-aos-duration="1000">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mb-2">Contact us</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="mb-3">Laboriosam exercitationem molestias beatae eos pariatur, similique, excepturi mollitia sit perferendis maiores ratione aliquam?</p>                   
                </div>
            </div>
        </div>
        <div class="alert alert-success alert-dismissible fade show d-none contact-alert" role="alert">
                      <strong>Terimakasih!</strong>   Pesan anda sudah terkirim
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form id="contact-form" class="contact__form " method="post"name="perpus-contact-form"> 
                 <!-- form message -->

                    <div class="row">
                        <div class="col-lg-12"data-aos="fade-up" data-aos-duration="500"data-aos-delay="200">
                            <div class="form-group">
                                <input name="name" id="name" type="text" class="form-control" placeholder="Your Full Name" >
                            </div>
                        </div>

                        <div class="col-lg-12" data-aos="fade-up" data-aos-duration="500"data-aos-delay="400">
                            <div class="form-group">
                                <input name="email" id="email" type="email" class="form-control" placeholder="Your Email Address">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-2 mb-4" data-aos="fade-up" data-aos-duration="500"data-aos-delay="600">
                        <textarea name="message" id="message" class="form-control" rows="8" placeholder="Your Message"></textarea>
                    </div>

                    <div class="text-center" data-aos="fade-up" data-aos-duration="500"data-aos-delay="800">
                        <input class="btn btn-main btn-round-full btn-kirim" name="submit" type="submit" value="Send Messege"></input>
                        <button class="btn btn-main btn-round-full btn-loading d-none" type="button" disabled>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                       Loading...
                    </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>
<br><br>
 <div class="google-map " data-aos="zoom-in" data-aos-duration="1000">
    <div id="map"></div>
</div>

          <!-- footer -->
  <footer>
    <div class="footer-btm py-4 mt-5">
    <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>

                <div class="row">
				<div class="col-lg-4">
					<a class="backtop js-scroll-trigger" href="#top">
						<i class="icofont-long-arrow-up"></i>
					</a>
				</div>
			</div>
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

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        once: true,
      });
    </script>

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
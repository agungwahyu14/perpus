<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "perpus");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
  }
  return $rows;
}

// FUNCTIONS SISWA

// Tambah Siswa
function tambahsiswa($data)
{
  global $conn;

  $nama = stripslashes($data["nama"]);
  $username = strtolower(stripslashes($data["username"]));
  $email = stripslashes($data["email"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);


  // Cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM siswa WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "
      <script>
        alert('USERNAME SUDAH TERDAFTAR!');
      </script>
    ";
    return false;
  }


  // Enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Tambah user baru ke database
  mysqli_query($conn, "INSERT INTO siswa VALUES('', '$nama', '$username', '$email', '$password')");

  return mysqli_affected_rows($conn);
}

// Hapus Data Siswa
function hapussiswa($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

  return mysqli_affected_rows($conn);
}

// Ubah Siswa
function ubahSiswa($data)
{
  global $conn;

  $id = $data["id"];
  $nama = stripslashes($data["nama"]);
  $username = strtolower(stripslashes($data["username"]));
  $email = stripslashes($data["email"]);

  $query = "UPDATE siswa SET

  nama = '$nama',
  username = '$username',
  email = '$email'
  
 WHERE id = $id 
";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

// Cari Siswa
function carisiswa($keyword){

  $query= "SELECT * FROM siswa
          WHERE
          nama LIKE '%$keyword%' OR
          username LIKE '%$keyword%' OR
          email LIKE '%$keyword%'
          ";
  return query($query);  
}

// FUNCTIONS PETUGAS

// Tambah Petugas
function tambahpetugas($data)
{
  global $conn;

  $nama = stripslashes($data["nama"]);
  $username = strtolower(stripslashes($data["username"]));
  $email = stripslashes($data["email"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);


  // Cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM petugas WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "
      <script>
        alert('USERNAME SUDAH TERDAFTAR!');
      </script>
    ";
    return false;
  }

  // Enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Tambah user baru ke database
  mysqli_query($conn, "INSERT INTO petugas VALUES('', '$nama','$username', '$password', '$email')");

  return mysqli_affected_rows($conn);
}

// Hapus Data Petugas
function hapuspetugas($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM petugas WHERE id = $id");

  return mysqli_affected_rows($conn);
}

// Ubah Petugas
function ubahPetugas($data)
{
  global $conn;

  $id = $data["id"];
  $nama = stripslashes($data["nama"]);
  $username = strtolower(stripslashes($data["username"]));
  $email = stripslashes($data["email"]);

  $query = "UPDATE petugas SET

  nama = '$nama',
  username = '$username',
  email = '$email'
  
 WHERE id = $id 
";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}

// Cari Petugas
function caripetugas($keyword){

  $query= "SELECT * FROM petugas
          WHERE
          nama LIKE '%$keyword%' OR
          username LIKE '%$keyword%' OR
          email LIKE '%$keyword%'
          ";
  return query($query);  
}

// FUNCTIONS ADMIN

// Tambah Admin

function tambahadmin($data)
{
  global $conn;

  $nama = stripslashes($data["nama"]);
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);


  // Cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "
      <script>
        alert('USERNAME SUDAH TERDAFTAR!');
      </script>
    ";
    return false;
  }

  // Enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Tambah user baru ke database
  mysqli_query($conn, "INSERT INTO admin VALUES('', '$nama','$username', '$password')");

  return mysqli_affected_rows($conn);
}
// Hapus Data Admin
function hapusadmin($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM admin WHERE id = $id");

  return mysqli_affected_rows($conn);
}

// Ubah Admin
function ubahAdmin($data)
{
  global $conn;

  $id = $data["id"];
  $nama = stripslashes($data["nama"]);
  $username = strtolower(stripslashes($data["username"]));

  $query = "UPDATE admin SET

  nama = '$nama',
  username = '$username'
  
 WHERE id = $id 
";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);
}



// FUCTIONS BUKU
function tambahbuku($data)
{
  global $conn;

  $judul = stripslashes($data["judul"]);
  $pengarang =stripslashes($data["pengarang"]);
  $penerbit = stripslashes($data["penerbit"]);
  $kode_buku = stripslashes($data["kode_buku"]);

  // Cek judul sudah ada atau belum
  $result = mysqli_query($conn, "SELECT judul FROM buku WHERE judul = '$judul'");

  if (mysqli_fetch_assoc($result)) {
    echo "
      <script>
        alert('BUKU SUDAH TERSEDIA!');
      </script>
    ";
    return false;
  }

  // Upload Cover
  $cover = uploadbuku();
  if (!$cover) {
    return false;
  }

  // Tambah buku baru ke database
  mysqli_query($conn, "INSERT INTO buku VALUES('', '$judul',  '$pengarang', '$penerbit', '$kode_buku', '$cover')");

  return mysqli_affected_rows($conn);;
}

function uploadbuku()
{
  $namaFile = $_FILES['cover']['name'];
  $ukuranFile = $_FILES['cover']['size'];
  $error = $_FILES['cover']['error'];
  $tmpName = $_FILES['cover']['tmp_name'];

  //Cek apakah tidak ada Cover yang diupload
  if ($error === 4) {
    echo "<script>
          alert('PILIH COVER TERLEBIH DAHULU!!')
          </script>";
    return false;
  }

  //Cek apakah yang di upload adalah gambar?
  $ekstensiCoverValid = ['jpg', 'jpeg', 'png'];
  $ekstensiCover = explode('.', $namaFile);
  $ekstensiCover = strtolower(end($ekstensiCover));
  if (!in_array($ekstensiCover, $ekstensiCoverValid)) {
    echo "<script>
            alert('YANG ANDA UPLOAD BUKAN GAMBAR!')
          </script>";
    return false;
  }

  //Cek jika ukurannya terlalu besar
  if ($ukuranFile > 1500000) {
    echo "<script>
            alert('UKURAN GAMBAR TERLALU BESAR!')
          </script>";
    return false;
  }

  //Lolos pengecekan, gambar siap diupload
  //Generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiCover;

  move_uploaded_file($tmpName, 'buku/' . $namaFileBaru);
  return $namaFileBaru;
}

function hapusBuku($id)
{
  global $conn;
  mysqli_query($conn, "DELETE FROM buku WHERE id = $id");

  return mysqli_affected_rows($conn);
}

function ubahBuku($data)
{
  global $conn;

  $id = $data["id"];
  $judul = htmlspecialchars($data["judul"]);
  $pengarang = htmlspecialchars($data["pengarang"]);
  $penerbit = htmlspecialchars($data["penerbit"]);
  $kode_buku =  htmlspecialchars($data["kode_buku"]);
  $coverLama =  htmlspecialchars($data["coverLama"]);


  //Cek apakah user pilih cover baru atau tidak
  if ($_FILES['cover']['error'] === 4) {
    $cover = $coverLama;
  } else {
    $cover = uploadbuku();
  }


  $query = "UPDATE buku SET
            judul = '$judul',
            pengarang = '$pengarang',
            penerbit = '$penerbit',
            kode_buku = '$kode_buku',
            cover = '$cover'

           WHERE id = $id 
          ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function caribuku($keyword){

  $query= "SELECT * FROM buku
          WHERE
          judul LIKE '%$keyword%' OR
          pengarang LIKE '%$keyword%' OR
          penerbit LIKE '%$keyword%' OR
          kode_buku LIKE '%$keyword%'
          ";
  return query($query);  
}

// FUNCTIONS REGISTRASI
function register($data){
  global $conn;

  $nama = htmlspecialchars($data["nama"]);
  $username =  htmlspecialchars($data["username"]);
  $email = htmlspecialchars($data["email"]);
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // Cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM siswa WHERE username = '$username'");

  // Cek konfirmasi password
  if ($password !== $password2) {
    echo "
      <script>
        alert('KONFIRMASI PASSWORD TIDAK SESUAI !');
      </script>";

    return false;
  }
  // Enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);


  if (mysqli_fetch_assoc($result)) {
    echo "
      <script>
        alert('USERNAME SUDAH TERDAFTAR!');
      </script>
    ";
    return false;
  }


  // tambahkan user baru ke database
  mysqli_query($conn, "INSERT INTO siswa VALUES('', '$nama','$username','$email','$password')");

  return mysqli_affected_rows($conn);
}
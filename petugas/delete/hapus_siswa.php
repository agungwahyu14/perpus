<?php

require '../../functions.php';

$id = $_GET["id"];

if (hapussiswa($id) > 0) {
  echo "
        <script>
        alert('DATA BERHASIL DIHAPUS !');
        document.location.href = '../tables/table_siswa.php';
        </script>
      ";
} else {
  echo "
        <script>
        alert('DATA GAGAL DIHAPUS !');
        document.location.href = '../tables/table_siswa.php';
        </script>
      ";
}
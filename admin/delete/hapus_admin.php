<?php

require '../../functions.php';

$id = $_GET["id"];

if (hapusadmin($id) > 0) {
  echo "
        <script>
        alert('DATA BERHASIL DIHAPUS !');
        document.location.href = '../tables/table_admin.php';
        </script>
      ";
} else {
  echo "
        <script>
        alert('DATA GAGAL DIHAPUS !');
        document.location.href = '../tables/table_admin.php';
        </script>
      ";
}
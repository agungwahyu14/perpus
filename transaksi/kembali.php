<?php

$id = $_GET['id'];
$id_buku = $_GET['judul'];

// $sql = $koneksi->query("update tb_transaksi set status='kembali' where id = '$id'");
$sql = $conn->query("DELETE FROM transaksi WHERE id = '$id'");

$buku = $conn->query("UPDATE  buku SET jumlah_buku = (jumlah_buku+1) WHERE judul='$id_buku' ");

if ($sql || $buku) {
?>

	<script type="text/javascript">
		alert("Buku Berhasil Dikembalikan");

		window.location.href = "transaksi.php";
	</script>
<?php
}

?>
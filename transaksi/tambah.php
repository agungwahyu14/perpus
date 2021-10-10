<?php
$pinjam = date("d-m-Y");
$kembali = date("d-m-Y", time() + 60 * 60 * 24 * 5);
?>

<?php

if (isset($_POST['simpan'])) {
	$tgl_pinjam		= isset($_POST['pinjam']) ? $_POST['pinjam'] : "";
	$tgl_kembali	= isset($_POST['kembali']) ? $_POST['kembali'] : "";

	$dapat_buku		= isset($_POST['judul']) ? $_POST['judul'] : "";
	$pecah_buku		= explode(".", $dapat_buku);
	$id_buku		= $pecah_buku[0];
	$judul			= $pecah_buku[1];

	$dapat_siswa	= isset($_POST['nama']) ? $_POST['nama'] : "";
	$pecah_siswa	= explode(".", $dapat_siswa);
	$id_siswa 		= $pecah_siswa[0];
	$siswa			= $pecah_siswa[1];


	$query = $conn->query("SELECT * FROM buku WHERE judul = '$judul'");
	while ($hasil = $query->fetch_assoc()) {
		$sisa = $hasil['jumlah_buku'];

		//cek data yang duplikate 	
		$cek = $conn->query("SELECT * FROM transaksi WHERE nis=$id_siswa AND id_buku=$id_buku");
		$num1 = mysqli_num_rows($cek);

		//cek buku
		// $cek2=$conn->query("SELECT * FROM transaksi WHERE id_buku=$id_buku");
		// $num2 = mysqli_num_rows($cek2);


		if ($sisa == 0) {
			echo "<script>alert('Stok bukunya telah habis, tidak bisa melakukan transaksi, tambahkan stok buku segera');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=transaksi&aksi=tambah'>";
		} elseif (!$num1) {
			$qt = $conn->query("INSERT INTO transaksi VALUES (null, '$id_buku', '$judul', '$id_siswa', '$siswa', '$tgl_pinjam', '$tgl_kembali', 'Pinjam', null)") or die("Gagal Masuk");

			$qu	= $conn->query("UPDATE buku SET jumlah_buku=(jumlah_buku-1) WHERE id_buku=$id_buku ");
			if ($qt && $qu) {
				echo "<script>alert('Transaksi Sukses');</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=transaksi'>";
			} else {
				echo "<script>alert('Tran
						saksi Gagal');</script>";
				echo "<meta http-equiv='refresh' content='0; url=?page=input-transaksi'>";
			}
		} else {
			echo "<script>alert('Anda sudah meminjam buku yang sama');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=transaksi&aksi=tambah'>";
		}
	}
}

?>

<div class="panel panel-default">
	<div class="panel-heading">
		Tambah Data Transaksi
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">

				<form method="POST" action="">

					<div class="form-group">
						<label> Judul Buku</label>
						<select class="form-control" name="judul">
							<option>== Pilih ==</option>
							<?php
							$query = $conn->query("SELECT * FROM buku ORDER by id_buku");

							while ($judul = $query->fetch_assoc()) {
								echo "<option value='$judul[id_buku].$judul[judul]'>$judul[judul]</option>";
								// echo "<option value='$buku[id_buku]'>$buku[judul]</option>";
							}

							?>
						</select>
					</div>

					<div class="form-group">
						<label>Nama Anggota</label>
						<select class="form-control" name="nama">
							<option>== Pilih ==</option>
							<?php
							$query = $conn->query("SELECT * FROM siswa ORDER by id");

							while ($nama = $query->fetch_assoc()) {
								echo "<option value='$nama[username].$nama[nama]'>$nama[username] - $nama[nama]</option>";
							}


							?>

						</select>
					</div>



					<div class="form-group">
						<label>Tanggal Pinjam</label>
						<input class="form-control" type="text" name="pinjam" value="<?php echo $pinjam; ?>" readonly />
					</div>


					<div class="form-group">
						<label>Tanggal Kembali</label>
						<input class="form-control" type="text" name="kembali" value="<?php echo $kembali; ?>" readonly />
					</div>

					<div>

						<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
						<input type="reset" name="simpan" value="reset" class="btn btn-warning">
					</div>
			</div>

			</form>
		</div>
	</div>
</div>
</div>
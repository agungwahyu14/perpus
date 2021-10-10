<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Transaksi
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <div>
                        <a href="?page=transaksi&aksi=tambah" class="btn btn-success" style="margin-top: 8px;"><i class="fa fa-plus"></i> Tambah Data</a>
                    </div><br>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Terlambat</th>
                                <th>Denda</th>
                                <th width="21%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $no = 1;

                            $sql = $conn->query("SELECT * FROM transaksi WHERE status='pinjam' ");

                            foreach ($sql as $data) {

                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td>
                                        <?php
                                        $test = $data['id_buku'];
                                        // echo $test;
                                        $jbuku = $koneksi->query("SELECT * FROM buku WHERE id_buku=$test");
                                        $jjbuku = $jbuku->fetch_assoc();
                                        echo $jjbuku['judul'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        $siswa = $data['username'];
                                        // echo $test;
                                        $siswaa = $koneksi->query("SELECT * FROM siswa WHERE username=$siswa");
                                        $show = $siswaa->fetch_assoc();
                                        echo $show['username'];
                                        ?>
                                    </td>
                                    <td><?php echo $show['nama'];; ?></td>
                                    <td><?php echo $data['tgl_pinjam']; ?></td>
                                    <td><?php echo $data['tgl_kembali']; ?></td>
                                    <td><?php echo $data['status']; ?></td>

                                    <td>
                                        <?php
                                        //$denda = 1000;

                                        $tanggal_dateline = $data['tgl_kembali'];

                                        $tgl_kembali = date('Y-m-d');

                                        $lambat = terlambat($tanggal_dateline, $tgl_kembali);

                                        //$denda1 = $lambat*$denda;

                                        if ($lambat > 0) {
                                            echo "<font color='red'>$lambat hari </font>";
                                        } else {
                                            echo $lambat . "hari";
                                        }

                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        $denda = 1000;

                                        $tanggal_dateline = $data['tgl_kembali'];

                                        $tgl_kembali = date('Y-m-d');

                                        $lambat = terlambat($tanggal_dateline, $tgl_kembali);

                                        $denda1 = $lambat * $denda;

                                        if ($lambat > 0) {
                                            echo "<font color='red'>Rp.$denda1</font>";
                                        } else {
                                            echo "Rp" . $lambat;
                                        }

                                        ?>
                                    </td>

                                    <td>
                                        <a href="kembali.php?id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul'] ?>" class="btn btn-info">Kembali</a>
                                        <a href="perpanjang.php?id=<?php echo $data['id']; ?>&judul=<?php echo $data['judul']; ?>&tgl_kembali=<?php echo $data['tgl_kembali'] ?>&lambat=<?php echo $lambat; ?>" class="btn btn-danger">Perpanjang</a>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
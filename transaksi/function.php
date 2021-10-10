<?php
function terlambat($tgl_dateline, $tgl_kembali)
{

	$tgl_dateline_tai = explode("-", $tgl_dateline);
	$tgl_dateline_tai = $tgl_dateline_tai[2] . "-" . $tgl_dateline_tai[1] . "-" . $tgl_dateline_tai[0];

	$tgl_kembali_tai = explode("-", $tgl_kembali);
	$tgl_kembali_tai = $tgl_kembali_tai[2] . "-" . $tgl_kembali_tai[1] . "-" . $tgl_kembali_tai[0];

	$selisih = strtotime($tgl_kembali_tai) - strtotime($tgl_dateline_tai);

	$selisih = $selisih / 86400;

	if ($selisih >= 1) {
		$hasil_tgl = floor($selisih);
		// folorr pake buletin kebawah
	} else {
		$hasil_tgl = 0;
	}
	return $hasil_tgl;
}

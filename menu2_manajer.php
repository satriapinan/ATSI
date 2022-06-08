<?php

// Session Start
session_start();

// Include
include("config.php");
include("includes/Template.class.php");
include("includes/DB.class.php");

include("includes/Pegawai.class.php");
include("includes/RekapAbsensi.class.php");
include("includes/LaporanAbsensi.class.php");
include("includes/DataKehadiran.class.php");
include("includes/DataKepulangan.class.php");

if (!empty($_GET['detail'])) {	
	$_SESSION['no_induk'] = $_GET['detail'];
}

// Session Variable -> Variable
$nip_user = $_SESSION['no_induk'];
$nama_user = $_SESSION['nama'];
$jabatan_user = $_SESSION['jabatan'];

// For user identity on header
$header_identity = null;
$header_identity .= "<p class='mb-0'>".$nama_user."</p>
					 <h6 class='m-0'>".$jabatan_user."</h6>";

// Instansiasi
$pegawai = new Pegawai($db_host, $db_user, $db_pass, $db_name);
$rekap = new RekapAbsensi($db_host, $db_user, $db_pass, $db_name);
$laporan = new LaporanAbsensi($db_host, $db_user, $db_pass, $db_name);
$kehadiran = new DataKehadiran($db_host, $db_user, $db_pass, $db_name);
$kepulangan = new DataKepulangan($db_host, $db_user, $db_pass, $db_name);
$pegawai->open();
$rekap->open();
$laporan->open();
$kehadiran->open();
$kepulangan->open();

$laporan->getSLaporanAbsensi($nip_user);

// Sort
if (!empty($_GET['sort'])) {	
	if ($_GET['sort'] == "all") {
		$laporan->getSLaporanAbsensi($nip_user);
	} else if ($_GET['sort'] == "yes"){
		$laporan->getLaporanValidasi(1, $nip_user);
	} else if ($_GET['sort'] == "no"){
		$laporan->getLaporanValidasi(0, $nip_user);
	}
}

// Validation Procedure
if (!empty($_GET['validasi'])) {
	$id_laporan = $_GET['validasi'];

	$laporan->setStatusValidasi($id_laporan);

	$laporan->getSLaporanAbsensi($nip_user);
}

// For sub menu name
$pegawai->getNamaPegawai($nip_user);
$sub_name = $pegawai->getResult();

$sub_menu = null;
$sub_menu .= "<span class='fw-semibold'>{$sub_name['nama_pegawai']}</a>";

// For Rekap Information
$rekap_absensi = null;

$rekap->getHadir($nip_user);
$hadir = $rekap->getResult();
$rekap->getTidakHadir($nip_user);
$tidak_hadir = $rekap->getResult();
$rekap->getTelat($nip_user);
$telat = $rekap->getResult();

$rekap_absensi .= "<div class='d-flex flex-column align-items-center me-3'>
					 <h5 class='py-3 px-4 rounded-3 shadow bg-secondary mb-0'>
					 	{$hadir['hadir']}
					 </h5>
					 <p class='m-0'>Hadir</p>
				  </div>
				  <div class='d-flex flex-column align-items-center me-3'>
					 <h5 class='py-3 px-4 rounded-3 shadow bg-secondary mb-0'>
					 	{$tidak_hadir['tidak_hadir']}
					 </h5>
					 <p class='m-0'>Absen</p>
				  </div>
				  <div class='d-flex flex-column align-items-center'>
					 <h5 class='py-3 px-4 rounded-3 shadow bg-primary mb-0'>
					 	{$telat['telat']}
					 </h5>
					 <p class='m-0'>Telat</p>
				  </div>";

$i = 1;
$tableL = null;
while ($dataL = $laporan->getResult()) {
	$id_kehadiran = $dataL['id_kehadiran']; 
	$id_kepulangan = $dataL['id_kepulangan'];
	$status_validasi = $dataL['status_validasi'];

	$kehadiran->getTanggalKehadiran($id_kehadiran);
	$tanggal = $kehadiran->getResult();
	$kehadiran->getWaktuKehadiran($id_kehadiran);
	$waktu_kehadiran = $kehadiran->getResult();
	$kepulangan->getWaktuKepulangan($id_kepulangan);
	$waktu_kepulangan = $kepulangan->getResult();
	
	if ($status_validasi == 1) {
		$tableL .= "<tr align='middle'>
						<th scope='row'>".$i."</th>
						<td>{$tanggal['tanggal_kehadiran']}</td>
						<td>{$waktu_kehadiran['waktu_kehadiran']}</td>
						<td>{$waktu_kepulangan['waktu_kepulangan']}</td>
						<td><i class='fa fa-check text-success'></i></td>
					</tr>";
	} else if ($status_validasi == 0) {
		$tableL .= "<tr align='middle'>
						<th scope='row'>".$i."</th>
						<td>{$tanggal['tanggal_kehadiran']}</td>
						<td>{$waktu_kehadiran['waktu_kehadiran']}</td>
						<td>{$waktu_kepulangan['waktu_kepulangan']}</td>
						<td><a href='menu2_manajer.php?validasi={$dataL['id_laporan']}' class='btn btn-success'>
							Validasi
						</a></td>
					</tr>";
	}

	$i++;
}

// Replace & Write template based on the data
$tpl = new Template("templates/menu2_manajer.html");
$tpl->replace("REKAP", $rekap_absensi);
$tpl->replace("USER", $header_identity);
$tpl->replace("SUB_MENU", $sub_menu);
$tpl->replace("DATA_ABSENSI", $tableL);
$tpl->write();
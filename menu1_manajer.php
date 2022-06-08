<?php

// Session Start
session_start();

// Include
include("config.php");
include("includes/Template.class.php");
include("includes/DB.class.php");

include("includes/Pegawai.class.php");

// Session Variable -> Variable 
$nama_user    = $_SESSION['nama'];
$jabatan_user = $_SESSION['jabatan'];
$divisi_user = $_SESSION['divisi'];

// For user identity on header
$header_identity = null;
$header_identity .= "<p class='mb-0'>".$nama_user."</p>
					 <h6 class='m-0'>".$jabatan_user."</h6>";
// For table title
$title = null;
$title .= "<h3 class='m-0'>Daftar Karyawan ".$divisi_user."</h3>";

// Instansiasi
$pegawai = new Pegawai($db_host, $db_user, $db_pass, $db_name);
$divisi = new Pegawai($db_host, $db_user, $db_pass, $db_name);
$pegawai->open();
$divisi->open();
$pegawai->getForManajer($divisi_user);

// Order by
if (!empty($_GET['order'])) {	
	if ($_GET['order'] == "nip") {
		$pegawai->getForManajer($divisi_user);
	}
	if ($_GET['order'] == "nama") {
		$pegawai->orderNamaForManajer($divisi_user);
	}
}

// For table 'pegawai'
$tableP = null;
while ($dataP = $pegawai->getResult()) {
	$tableP .= "<tr align='middle'>
					<th scope='row'>{$dataP['no_induk']}</th>
					<td>{$dataP['nama_pegawai']}</td>
					<td>{$dataP['no_telp']}</td>
					<td>{$dataP['email']}</td>
					<td>{$dataP['jabatan']}</td>
					<td>{$dataP['divisi']}</td>
					<td class='text-center'>
						<a href='menu2_manajer.php?detail={$dataP['no_induk']}' class='btn btn-primary'>Detail</a>
					</td>
				</tr>";
}

// Replace & Write template based on the data
$tpl = new Template("templates/menu1_manajer.html");
$tpl->replace("USER", $header_identity);
$tpl->replace("TITLE_TABLE", $title);
$tpl->replace("DATA_KARYAWAN", $tableP);
$tpl->write();
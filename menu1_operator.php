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

// For user identity on header
$header_identity = null;
$header_identity .= "<p class='mb-0'>".$nama_user."</p>
					 <h6 class='m-0'>".$jabatan_user."</h6>";

// Instansiasi
$pegawai = new Pegawai($db_host, $db_user, $db_pass, $db_name);
$divisi = new Pegawai($db_host, $db_user, $db_pass, $db_name);
$pegawai->open();
$divisi->open();

// SORTING

// Sorting Variable
$sorting_all = null;
$sorting_karyawan = null;
$sorting_operator = null;
$sorting_manager = null;
$sorting_jabatan = null;
$sorting_divisi = null;
$title = null;

// Sort based on 'Jabatan'
if (!empty($_GET['sorting_jabatan'])) {
	$sorting_jabatan = $_GET['sorting_jabatan'];

	if ($_GET['sorting_jabatan'] == "All") {
		$pegawai->getPegawai();

		$sorting_all .= "<a href='menu1_operator.php?sorting_jabatan=All' 
					      class='btn btn-primary shadow-sm' style='border-radius: 5px 0 0 5px;'>Semua</a>";
		$title .= "<h3 class='m-0'>Daftar Pegawai</h3>";
	} else {
		$sorting_all .= "<a href='menu1_operator.php?sorting_jabatan=All' 
					      class='btn btn-light shadow-sm' style='border-radius: 5px 0 0 5px;'>Semua</a>";
	}

	if ($_GET['sorting_jabatan'] == "Karyawan") {
		$pegawai->sortJabatan($sorting_jabatan);

		$sorting_karyawan .= "<a href='menu1_operator.php?sorting_jabatan=Karyawan' 
					          class='btn btn-primary shadow-sm' style='border-radius: 5px 0 0 5px;'>Karyawan</a>";
		$title .= "<h3 class='m-0'>Daftar Karyawan</h3>";
	} else {
		$sorting_karyawan .= "<a href='menu1_operator.php?sorting_jabatan=Karyawan' 
					          class='btn btn-light shadow-sm' style='border-radius: 5px 0 0 5px;'>Karyawan</a>";
	}
	
	if ($_GET['sorting_jabatan'] == "Operator") {
		$pegawai->sortJabatan($sorting_jabatan);

		$sorting_operator .= "<a href='menu1_operator.php?sorting_jabatan=Operator' 
					          class='btn btn-primary rounded-0 shadow-sm'>Operator</a>";
		$title .= "<h3 class='m-0'>Daftar Operator</h3>";
	} else {
		$sorting_operator .= "<a href='menu1_operator.php?sorting_jabatan=Operator' 
					          class='btn btn-light rounded-0 shadow-sm'>Operator</a>";
	}

	if ($_GET['sorting_jabatan'] == "Manajer") {
		$pegawai->sortJabatan($sorting_jabatan);

		$sorting_manager .= "<a href='menu1_operator.php?sorting_jabatan=Manajer' 
					         class='btn btn-primary shadow-sm' style='border-radius: 0 5px 5px 0;'>Manajer</a>";
		$title .= "<h3 class='m-0'>Daftar Manajer</h3>";
	} else {
		$sorting_manager .= "<a href='menu1_operator.php?sorting_jabatan=Manajer' 
					         class='btn btn-light shadow-sm' style='border-radius: 0 5px 5px 0;'>Manajer</a>";
	}
} else {
	$pegawai->getPegawai();

	$sorting_all .= "<a href='menu1_operator.php?sorting_jabatan=All' 
					  class='btn btn-primary shadow-sm' style='border-radius: 5px 0 0 5px;'>Semua</a>";
	$sorting_karyawan .= "<a href='menu1_operator.php?sorting_jabatan=Karyawan' 
					       class='btn btn-light shadow-sm' style='border-radius: 5px 0 0 5px;'>Karyawan</a>";
	$sorting_operator .= "<a href='menu1_operator.php?sorting_jabatan=Operator' 
					       class='btn btn-light rounded-0 shadow-sm'>Operator</a>";				       
	$sorting_manager .= "<a href='menu1_operator.php?sorting_jabatan=Manajer' 
					      class='btn btn-light shadow-sm' style='border-radius: 0 5px 5px 0;'>Manajer</a>";
	$title .= "<h3 class='m-0'>Daftar Pegawai</h3>";
}
// Sort based on 'Divisi'
if (!empty($_GET['sorting_divisi'])) {
	$sorting_divisi = $_GET['sorting_divisi'];
	$title = null;

	if ($_GET['sorting_divisi'] == "all") {
		$pegawai->getPegawai();
	} else {
		$pegawai->sortDivisi($sorting_divisi);
	}

	$title .= "<h3 class='m-0'>Daftar Pegawai</h3>";
}
// Order by
if (!empty($_GET['order'])) {	
	$title = null;

	if ($_GET['order'] == "nip") {
		$pegawai->getPegawai();
	}
	if ($_GET['order'] == "nama") {
		$pegawai->orderNama();
	}
	if ($_GET['order'] == "jabatan") {
		$pegawai->orderJabatan();
	}
	if ($_GET['order'] == "divisi") {
		$pegawai->orderDivisi();
	}

	$title .= "<h3 class='m-0'>Daftar Pegawai</h3>";
}

// Delete Procedure
if (!empty($_GET['delete'])) {
    $id = $_GET['delete'];
	
	$pegawai->deletePegawai($id);

	header('location: menu1_operator.php');
}

// For sort 'Divisi' option
$listAllD = null;
$listAllD .= "<li><a class='dropdown-item'
	           href='menu1_operator.php?sorting_divisi=all'>
	           Semua</a></li>";

$listD = null;
$divisi->getAllDivisi();
while ($dataD = $divisi->getResult()) {
	$listD .= "<li><a class='dropdown-item'
	            href='menu1_operator.php?sorting_divisi={$dataD['divisi']}'>
	            {$dataD['divisi']}</a></li>";
}

// For table 'pegawai'
$tableP = null;
$i = 1;
while ($dataP = $pegawai->getResult()) {
	$tableP .= "<tr align='middle'>
					<th scope='row'>{$dataP['no_induk']}</th>
					<td>{$dataP['nama_pegawai']}</td>
					<td>{$dataP['no_telp']}</td>
					<td>{$dataP['email']}</td>
					<td>{$dataP['jabatan']}</td>
					<td>{$dataP['divisi']}</td>
					<td class='text-center'>
						<a href='menu2_operator.php?edit={$dataP['no_induk']}'><i class='fa fa-pencil-square-o text-success fs-4 me-2'></i></a>
						<a href='menu1_operator.php?delete={$dataP['no_induk']}'><i class='fa fa-trash-o text-danger fs-4'></i></a>
					</td>
				</tr>";
	$i++;
}

// Replace & Write template based on the data
$tpl = new Template("templates/menu1_operator.html");
$tpl->replace("USER", $header_identity);
$tpl->replace("TITLE_TABLE", $title);
$tpl->replace("DATA_KARYAWAN", $tableP);
$tpl->replace("SORTING_JABATAN_ALL", $sorting_all);
$tpl->replace("SORTING_JABATAN_KARYAWAN", $sorting_karyawan);
$tpl->replace("SORTING_JABATAN_OPERATOR", $sorting_operator);
$tpl->replace("SORTING_JABATAN_MANAGER", $sorting_manager);
$tpl->replace("SORTING_DIVISI_ALL", $listAllD);
$tpl->replace("SORTING_DIVISI", $listD);
$tpl->write();
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

$pegawai = new Pegawai($db_host, $db_user, $db_pass, $db_name);
$pegawai->open();

if (isset($_POST['submit'])) {
    $pegawai->addPegawai($_POST);
    header("location:menu1_operator.php");
}
if (isset($_POST['submitEdit'])) {
    $pegawai->updatePegawai($_POST);
    header("location:menu1_operator.php");
}

$submit_button = null;
$pegawaiEdit = null;
$form = null;

if (!empty($_GET['edit'])) {
    $nip_edit = $_GET['edit'];

    $pegawai->getSPegawai($nip_edit);
    $pegawaiEdit = $pegawai->getResult();
    
    $submit_button .= "<button name='submitEdit' type='submit' class='btn btn-success'>Ubah</button>";
    $form .= "<div class='mb-3 col-md-6'>
                <label>Nomor Induk Pegawai</label>
                <input type='text' name='nip' class='form-control' readonly
                value='{$pegawaiEdit['no_induk']}'>
              </div>
              <div class='mb-3 col-md-6'>
                <label>Nama Lengkap</label>
                <input type='text' name='nama' class='form-control' required
                value='{$pegawaiEdit['nama_pegawai']}'>
              </div>
              <div class='mb-3 col-md-6'>
                <label>Jabatan Pegawai</label>
                <input type='text' name='jabatan' class='form-control' required
                value='{$pegawaiEdit['jabatan']}'>
              </div>
              <div class='mb-3 col-md-6'>
                <label>Divisi Pegawai</label>
                <input type='text' name='divisi' class='form-control' required
                value='{$pegawaiEdit['divisi']}'>
              </div>
              <div class='mb-3 col-md-4'>
                <label>Nomor Telepon</label>
                <input type='tel' name='no_telp' class='form-control' required
                value='{$pegawaiEdit['no_telp']}'>
              </div>
              <div class='mb-3 col-md-4'>
                <label>Email</label>
                <input type='email' name='email' class='form-control' required
                value='{$pegawaiEdit['email']}'>
              </div>
              <div class='mb-3 col-md-4'>
                <label>Password</label>
                <input type='text' name='pass' class='form-control' required>
              </div>";
} else {   
    $submit_button .= "<button name='submit' type='submit' class='btn btn-success'>Tambah</button>";
    $form .= "<div class='mb-3 col-md-6'>
                <label>Nomor Induk Pegawai</label>
                <input type='text' name='nip' class='form-control' required>
              </div>
              <div class='mb-3 col-md-6'>
                <label>Nama Lengkap</label>
                <input type='text' name='nama' class='form-control' required>
              </div>
              <div class='mb-3 col-md-6'>
                <label>Jabatan Pegawai</label>
                <input type='text' name='jabatan' class='form-control' required>
              </div>
              <div class='mb-3 col-md-6'>
                <label>Divisi Pegawai</label>
                <input type='text' name='divisi' class='form-control' required>
              </div>
              <div class='mb-3 col-md-4'>
                <label>Nomor Telepon</label>
                <input type='tel' name='no_telp' class='form-control' required>
              </div>
              <div class='mb-3 col-md-4'>
                <label>Email</label>
                <input type='email' name='email' class='form-control' required>
              </div>
              <div class='mb-3 col-md-4'>
                <label>Password</label>
                <input type='text' name='pass' class='form-control' required'>
              </div>";
}

$tpl = new Template("templates/menu2_operator.html");
$tpl->replace("USER", $header_identity);
$tpl->replace("FORM", $form);
$tpl->replace("SUBMIT_BUTTON", $submit_button);
$tpl->write();

<?php

require_once 'includes/DB.class.php';

class Pegawai extends DB
{
    // Get all
    function getPegawai()
    {
        $query = "SELECT * FROM pegawai";
        return $this->execute($query);
    }
    function getAllDivisi()
    {
        $query = "SELECT divisi FROM pegawai GROUP BY divisi";
        return $this->execute($query);
    }
    function getSPegawai($nip)
    {
        $query = "SELECT * FROM pegawai WHERE no_induk='$nip'";
        return $this->execute($query);
    }
    function getForManajer($divisi)
    {
        $query = "SELECT * FROM pegawai WHERE jabatan='Karyawan' AND divisi='$divisi'";
        return $this->execute($query);
    }

    // Sort
    function sortJabatan($jabatan)
    {
        $query = "SELECT * FROM pegawai WHERE jabatan='$jabatan'";
        return $this->execute($query);
    }
    function sortDivisi($divisi)
    {
        $query = "SELECT * FROM pegawai WHERE divisi='$divisi'";
        return $this->execute($query);
    }

    // Order
    function orderNama()
    {
        $query = "SELECT * FROM pegawai ORDER BY nama_pegawai";
        return $this->execute($query);
    }
    function orderNamaForManajer($divisi)
    {
        $query = "SELECT * FROM pegawai WHERE jabatan='Karyawan' AND divisi='$divisi' ORDER BY nama_pegawai";
        return $this->execute($query);
    }
    function orderJabatan()
    {
        $query = "SELECT * FROM pegawai ORDER BY jabatan";
        return $this->execute($query);
    }
    function orderDivisi()
    {
        $query = "SELECT * FROM pegawai ORDER BY divisi";
        return $this->execute($query);
    }

    // Get Attribute
    function getNamaPegawai($nip)
    {
        $query = "SELECT nama_pegawai FROM pegawai WHERE no_induk='$nip'";
        return $this->execute($query);
    }
    function getJabatan($nip)
    {
        $query = "SELECT jabatan FROM pegawai WHERE no_induk='$nip'";
        return $this->execute($query);
    }
    function getDivisi($nip)
    {
        $query = "SELECT divisi FROM pegawai WHERE no_induk='$nip'";
        return $this->execute($query);
    }
    function getNoTelp($nip)
    {
        $query = "SELECT no_telp FROM pegawai WHERE no_induk='$nip'";
        return $this->execute($query);
    }
    function getEmail($nip)
    {
        $query = "SELECT email FROM pegawai WHERE no_induk='$nip'";
        return $this->execute($query);
    }

    // CRUD
    function addPegawai($data)
    {
        $nip = $data['nip'];
        $nama = $data['nama'];
        $jabatan = $data['jabatan'];
        $divisi = $data['divisi'];
        $no_telp = $data['no_telp'];
        $email = $data['email'];
        $password = $data['pass'];
        $pass = md5($password);

        $query = "INSERT INTO pegawai VALUES ('$nip','$nama','$jabatan','$divisi','$no_telp','$email','$pass')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function deletePegawai($nip)
    {

        $query = "DELETE FROM pegawai WHERE no_induk='$nip'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function updatePegawai($data)
    {
        $nip = $data['nip'];
        $nama = $data['nama'];
        $jabatan = $data['jabatan'];
        $divisi = $data['divisi'];
        $no_telp = $data['no_telp'];
        $email = $data['email'];
        $pass = $data['pass'];
        $password_md5 = md5($pass);

        $query = "UPDATE pegawai 
                  SET nama_pegawai='$nama', jabatan='$jabatan', divisi='$divisi',
                      no_telp='$no_telp', email='$email', password='$password_md5' 
                  WHERE no_induk='$nip'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    // Login
    function getLogin($nip, $password)
    {
        $query = "SELECT * FROM pegawai WHERE no_induk='$nip' AND password='$password'";
        return $this->execute($query);
    }
}

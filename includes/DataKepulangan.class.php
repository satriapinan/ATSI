<?php

class DataKepulangan extends DB {
    // Get all
    function getDataKepulangan() {
        $query = "SELECT * FROM data_kepulangan";
        return $this->execute($query);
    }

    // Get Attribute
    function getTanggalKepulangan($nip) {
        $query = "SELECT tanggal_kepulangan FROM pegawai WHERE no_induk='nip'";
        return $this->execute($query);
    }
    function getWaktuKepulangan($nip) {
        $query = "SELECT waktu_kepulangan FROM pegawai WHERE no_induk='nip'";
        return $this->execute($query);
    }
}

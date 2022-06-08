<?php

class DataKehadiran extends DB {
    // Get all
    function getDataKehadiran() {
        $query = "SELECT * FROM data_kehadiran";
        return $this->execute($query);
    }

    // Get Attribute
    function getTanggalKehadiran($nip) {
        $query = "SELECT tanggal_kehadiran FROM pegawai WHERE no_induk='nip'";
        return $this->execute($query);
    }
    function getWaktuKehadiran($nip) {
        $query = "SELECT waktu_kehadiran FROM pegawai WHERE no_induk='nip'";
        return $this->execute($query);
    }
}

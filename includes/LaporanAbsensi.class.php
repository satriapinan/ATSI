<?php

class LaporanAbsensi extends DB {
    // Get all
    function getLaporanAbsensi() {
        $query = "SELECT * FROM laporan_absensi";
        return $this->execute($query);
    }

    // Get Attribute
    function getIDKehadiran($nip) {
        $query = "SELECT id_kehadiran FROM laporan_absensi WHERE no_induk='nip'";
        return $this->execute($query);
    }
    function getIDKepulangan($nip) {
        $query = "SELECT id_kepulangan FROM laporan_absensi WHERE no_induk='nip'";
        return $this->execute($query);
    }
    function getStatusValidasi($nip) {
        $query = "SELECT status_validasi FROM laporan_absensi WHERE no_induk='nip'";
        return $this->execute($query);
    }

    function setStatusValidasi($nip) {
        $query = "UPDATE laporan_absensi SET status_validasi=1 WHERE no_induk='nip'";
        return $this->execute($query);
    }
}

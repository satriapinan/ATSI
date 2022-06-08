<?php

class RekapAbsensi extends DB {
    // Get all
    function getRekapAbsensi() {
        $query = "SELECT * FROM rekap_absensi";
        return $this->execute($query);
    }

    // Get Attribute
    function getHadir($nip) {
        $query = "SELECT hadir FROM rekap_absensi WHERE no_induk='$nip'";
        return $this->execute($query);
    }
    function getTidakHadir($nip) {
        $query = "SELECT tidak_hadir FROM rekap_absensi WHERE no_induk='$nip'";
        return $this->execute($query);
    }
    function getTelat($nip) {
        $query = "SELECT telat FROM rekap_absensi WHERE no_induk='$nip'";
        return $this->execute($query);
    }
}

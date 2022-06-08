<?php

class RiwayatLogin extends DB {
    // Get all
    function getRiwayatLogin() {
        $query = "SELECT * FROM riwayat_login";
        return $this->execute($query);
    }

    // Set
    function setRiwayatLogin($nip, $tgl, $waktu) {
        $query = "INSERT INTO riwayat_login (no_induk, tanggal_login, waktu_login)
                  VALUES ('$nip', 'tgl', 'waktu')";
        return $this->execute($query);
    }
}

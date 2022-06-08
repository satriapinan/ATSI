<?php

class DataKepulangan extends DB {
    // Get all
    function getDataKepulangan() {
        $query = "SELECT * FROM data_kepulangan";
        return $this->execute($query);
    }

    // Get Attribute
    function getTanggalKepulangan($id) {
        $query = "SELECT tanggal_kepulangan FROM data_kepulangan WHERE id_kepulangan='$id'";
        return $this->execute($query);
    }
    function getWaktuKepulangan($id) {
        $query = "SELECT waktu_kepulangan FROM data_kepulangan WHERE id_kepulangan='$id'";
        return $this->execute($query);
    }
}

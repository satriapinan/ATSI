<?php

class DataKehadiran extends DB {
    // Get all
    function getDataKehadiran() {
        $query = "SELECT * FROM data_kehadiran";
        return $this->execute($query);
    }

    // Get Attribute
    function getTanggalKehadiran($id) {
        $query = "SELECT tanggal_kehadiran FROM data_kehadiran WHERE id_kehadiran='$id'";
        return $this->execute($query);
    }
    function getWaktuKehadiran($id) {
        $query = "SELECT waktu_kehadiran FROM data_kehadiran WHERE id_kehadiran='$id'";
        return $this->execute($query);
    }
}

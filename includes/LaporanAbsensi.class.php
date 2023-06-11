<?php

require_once 'includes/DB.class.php';

class LaporanAbsensi extends DB
{
    // Get all
    function getLaporanAbsensi()
    {
        $query = "SELECT * FROM laporan_absensi";
        return $this->execute($query);
    }
    function getSLaporanAbsensi($nip)
    {
        $query = "SELECT * FROM laporan_absensi WHERE no_induk='$nip'";
        return $this->execute($query);
    }
    function getLaporanValidasi($status, $nip)
    {
        $query = "SELECT * FROM laporan_absensi 
                  WHERE status_validasi='$status' AND no_induk='$nip'";
        return $this->execute($query);
    }

    function setStatusValidasi($id)
    {
        $query = "UPDATE laporan_absensi SET status_validasi=1 WHERE id_laporan='$id'";
        return $this->execute($query);
    }
}

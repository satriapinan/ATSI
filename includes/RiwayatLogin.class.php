<?php

require_once 'includes/DB.class.php';

class RiwayatLogin extends DB
{
    // Get all
    function getRiwayatLogin()
    {
        $query = "SELECT * FROM riwayat_login";
        $result = $this->execute($query);
        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    // Set
    function setRiwayatLogin($nip, $tgl, $waktu)
    {
        $query = "INSERT INTO riwayat_login (no_induk, tanggal_login, waktu_login)
              VALUES ('$nip', '$tgl', '$waktu')";

        var_dump($query); // Output the query for debugging purposes

        $result = $this->execute($query);

        if ($result === false) {
            var_dump($this->getError()); // Output the error message for debugging purposes
        }

        return $result;
    }
}
